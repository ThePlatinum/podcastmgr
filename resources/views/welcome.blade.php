@extends('layouts.app')

@section('content')
<section class="py-5 bg-pattern_lightbox">
  <div class="container">
    <img src="{{asset('assets/blass_logo.png')}}" alt="BLSC Logo" height="60">
    <div class="row py-3">
      <div class="col-md-5">
        <img src="{{asset('assets/people_bg.png')}}" alt="Onicha Image" class="w-100">
      </div>
      <div class="col-md-7 text-white d-flex flex-column gap-4">
        <h1 class="display-2 text-uppercase"> Onicha Ado Dialect Podcast </h1>
        <h2 class="h5">We seek to break the language barrier amongst the younger generation who do not know how to speak the Onicha dialect and are also interested in learning how to write and speak the Onicha dialect.</h2>
        <h3 class="h5 yellow_bg">Connect to the podcasts on your favourite platform</h3>
        <h4 class="h5">New episodes every week</h4>

        <div class="d-flex align-items-center gap-4 flex-wrap">
          <div class="apple bg-white">
            <a href="https://podcasts.apple.com/us/podcast/onicha-ado-dialect/id1655510192">
              <img src="{{asset('assets/apple-podcasts.png')}}" alt="Apple Podcast" width='30' height="30">
              <p class="d-none d-md-block p-0 m-0">Apple Podcast</p>
            </a>
          </div>
          <div class="spotify bg-white">
            <a href="">
              <img src="{{asset('assets/spotify.png')}}" alt="Spotify Podcast" width='30' height="30">
              <p class="d-none d-md-block p-0 m-0">Spotify Podcast</p>
            </a>
          </div>
          <div class="google">
            <a href="https://podcasts.google.com/feed/aHR0cHM6Ly9vbmljaGFwb2RjYXN0LmJsZW5kZWRsZWFybmluZ2NlbnRlci5jb20vb25pY2hhcG9kY2FzdHJzcw">
              <img src="{{asset('assets/signal-google.png')}}" alt="Google Podcast" width='30' height="30">
              <p class="d-none d-md-block p-0 m-0 text-white">Google Podcast</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg_pattern">
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

@include('footer')
@endsection