@extends('layouts.app')

@section('content')
<section class="text-center py-5 bg-pattern_lightbox">
  <div class="container py-md-5">
    <h1 class="text_primary display-1 pt-md-4"> Onicha Ado Dialect Podcast </h1>
    <h2 class="text-muted h4 px-md-5 mb-3">We seek to break the language barrier amongst the younger generation who do not know how to speak the Onicha dialect and are also interested in learning how to write and speak the Onitsha dialect.</h2>
    <h3 class="h5"> Connect to the podcasts on your favourate platform </h3>
    <h4 class="text-muted h5">New episodes every week</h4>
  </div>
  <div class="container mt-4 mt-md-0">
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
        <a href="https://podcasts.google.com/feed/aHR0cHM6Ly9vbmljaGFwb2RjYXN0LmJsZW5kZWRsZWFybmluZ2NlbnRlci5jb20vb25pY2hhcG9kY2FzdHJzcw">
          <img src="{{asset('assets/signal-google.png')}}" alt="Apple Podcast" width='50'>
          <p class="pt-3">Google Podcast</p>
        </a>
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