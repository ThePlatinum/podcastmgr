@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
  <div class="container">
    <div class="d-flex gap-5 align-items-end">
      <img src="{{ $episode->image }}" alt="Podcast Episode Image" width="300">
      <div>
        <h3> {{ $episode->title }} </h3>
        <hr>
        <p class="text-muted small p-0 m-0">Pubished at</p>
        <h4 class="text-muted p-0 m-0"> {{ $episode->updated_at->format('H:i') }} <b>&nbsp; | &nbsp;</b> {{ $episode->updated_at->format('D, d M Y') }}</h4>
      </div>
    </div>

    <div class="py-5">

      <h5>Listen</h5>
      <audio controls>
        <source src="{{$episode->url}}" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>

      <p class="mt-3">
        {{ $episode->description }}
      </p>
    </div>
  </div>
</div>

@include('footer')
@endsection