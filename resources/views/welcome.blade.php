@extends('layouts.app')

@section('content')
<section class="text-center py-5 bg-light">
  <div class="container py-md-5">
    <h1 class="text-primary display-1"> Onicha Ado Dialect Podcast </h1>
    <h2 class="text-muted h2"> Enjoy weekly Podcasts on your favourate platform </h2>
    <h3 class="text-muted h6">New Episodes every Sunday</h3>
  </div>
  <div class="container pt-2 pb-5">
    <div class="d-flex justify-content-center gap-5">
      <div>
        <a href="">
          <img src="{{asset('assets/apple-podcasts.png')}}" alt="Apple Podcast" width='50'>
          <p class="pt-3">Apple Podcast</p>
        </a>
      </div>
      <div>
        <a href="">
          <img src="{{asset('assets/spotify.png')}}" alt="Apple Podcast" width='50'>
          <p class="pt-3">Spotify Podcast</p>
        </a>
      </div>
      <div>
        <a href="">
          <img src="{{asset('assets/signal-google.png')}}" alt="Apple Podcast" width='50'>
          <p class="pt-3">Google Podcast</p>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h4>Latest Episodes</h4>
    @include('podcastlist')

    <div class="mt-3">
      <nav aria-label="pagination">
        <ul class="pagination pagination-sm justify-content-center">
          {{ $podcasts->links() }}
        </ul>
      </nav>
    </div>
  </div>
</section>

<!-- Subscription -->
<section class="bg-light py-5">
  <div class="container">
    <div class='row d-flex flex-column align-items-center text-center'>
      <div class="col-md-7">
        <p class="display-5">Subscribe</p>
        <form action="{{route('subscribe')}}" method="post">
          @csrf
          <p>We got many more awesome things in store, be among the first to know about them</p>
          <div class="input-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" required name="email" placeholder="Enter your email" />
            <span class="input-group-btn">
              <button class="btn btn-dark px-4" type="sbumit">Subscribe</button>
            </span>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-dark text-light">
  <div class="container">
    <div class="text-center">
      <h5>Onicha Ado Dialect Podcast</h5>
      <hr>
      <p class="text-muted">&#169; 2022 - {{date('Y')}} BLSC</p>
    </div>
  </div>
</section>
@endsection