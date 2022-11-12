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
  </div>
</div>
@endsection