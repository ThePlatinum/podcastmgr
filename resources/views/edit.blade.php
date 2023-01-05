@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="h3 pb-4">Create a New Episode</h1>
        <form action="{{route('episode.update')}}" method="post" class="bg-white p-4 p-md-5" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="episode" value="{{$episode->id}}">

          <div class="file_selector form-group">
            <label for="image">Episode Image <span class="small p-0 m-0">(Optional)</span></label>
            <div class="wrapper d-flex justify-content-center align-items-center flex-column active">
              <img src="{{$episode->image}}" alt="Episode Art" id="preview_img" width="150">
              <div class="file_name p-2"></div>
            </div>
            <button onclick="selectFile()" id="custom-btn" type="button" class="btn btn-outline-secondary">Choose a file</button>
            <input id="default_file" type="file" name="image" hidden class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="title">Episode Title</label>
            <input required type="text" name="title" id="title" placeholder="The Episode title, e.g: How to welcome a visitor in Onicha" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $episode->title }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="audio">Episode Audio Content</label>
            <div class="d-flex flex-column gap-2">
            <audio controls class="w-100">
              <source src="{{$episode->url}}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            <input type="file" name="audio" id="audio" class="form-control @error('audio') is-invalid @enderror" accept="audio/*">
            </div>
            @error('audio')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Episode Audio Duration</label>

            <div class="row">
              <div class="col-4">
                <label for="hour">Hour</label>
                <input required type="number" min="0" max="5" value="{{$time[0]}}" name="hour" id="hour" class="form-control @error('hour') is-invalid @enderror" value="{{ old('hour') }}">
                @error('hour')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-4">
                <label for="minutes">Minutes</label>
                <input required type="number" min="0" max="59" value="{{$time[1]}}" name="minutes" id="minutes" class="form-control @error('minutes') is-invalid @enderror" value="{{ old('minutes') }}">
                @error('minutes')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="col-4">
                <label for="seconds">Seconds</label>
                <input required type="number" min="0" max="59" value="{{$time[2]}}" name="seconds" id="seconds" class="form-control @error('seconds') is-invalid @enderror" value="{{ old('seconds') }}">
                @error('seconds')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Episode Description</label>
            <textarea name="description" rows="6" id="description" placeholder="About 1000 characters to describe the episode, more like a short note people can read to know what the episode is about" class="form-control @error('description') is-invalid @enderror">{{old('description')??$episode->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-dark px-5 mt-4"> Update Episode </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file_name");
    const default_file = document.querySelector("#default_file");
    const customBtn = document.querySelector("#custom-btn");
    const preview_img = document.querySelector("#preview_img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function selectFile() {
      default_file.click();
    }
    default_file.addEventListener("change", function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          preview_img.src = reader.result;
          wrapper.classList.add("active");
        }
        reader.readAsDataURL(file);
        fileName.innerHTML = file.name.match(regExp);
      }
    });
  </script>
  @endsection