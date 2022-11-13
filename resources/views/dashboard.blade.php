@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
  <div class="container">
    <div class="d-flex gap-3 align-items-end">
      <img src="{{\Storage::url('images/default.png')}}" alt="Podcast Default Image">
      <div>
        <p class="text-muted small p-0 m-0">Total</p>
        <h3> {{ $podcasts->count() }} Podcasts </h3>
        <hr>
        <p class="text-muted small p-0 m-0">Logged in as</p>
        <h4 class="text-muted p-0 m-0"> {{ auth()->user()->email }} </h4>
        <h3 class="text-muted p-0 m-0">{{auth()->user()->name}}</h2>
      </div>
    </div>

    <div class="py-5">
      <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
          <h4 class="m-0">All Podcasts</h4>
        </div>
        <a href="{{route('create.episode')}}" class="btn btn-dark px-4">Add New Episode</a>
      </div>
      <hr>
      @include('podcastlist')
    </div>
  </div>
</div>
@endsection