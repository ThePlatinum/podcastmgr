@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card-header">{{ __('Dashboard') }}</div>

  <div class="py-5">
    <div class="d-flex justify-content-between align-items-center">
      <div class="flex-grow-1">
        <h4 class="m-0">All Podcasts</h4>
      </div>
      <a href="" class="btn btn-dark px-4">Add New Episode</a>
    </div>
    <hr>
    <div class="row">
      @forelse ($podcasts as $podcast)
      <div class="col-md-3">
        <div class="card">
          <div class="card-img">
            <img src="{{ $podcast->podcast_image_url }}" alt="Podcast Image" class="img-fluid">
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      @empty
      <div class="text-center p-5">
        You have not created any Podcasts yet
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection