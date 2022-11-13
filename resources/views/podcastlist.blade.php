<div class="row">
  @forelse ($podcasts as $podcast)
  <div class="col-md-3 my-2">
    <div class="card">
      <img src="{{ $podcast->image }}" alt="Podcast Image" class="card-img">
      <div class="card-body">
        <p class="text-muted m-0 p-0">{{ date_format($podcast->created_at, 'D d, M-Y') }}</p>
        <a href="{{route('episode', $podcast->slug)}}">
          <h4 class="card-title text-capitalize">{{ $podcast->title }}</h4>
        </a>
        <p class="card-text"> {{ \Str::limit($podcast->description, 100, "...") }} </p>
      </div>
      @auth()
      <div class="card-footer">
        <a href="{{ route('episode', $podcast->slug) }}" class="btn btn-outline-secondary">Edit</a>
        <!-- <button class="btn btn-danger">Delete</button> -->
      </div>
      @endauth
    </div>
  </div>
  @empty
  <div class="text-center p-5">
    You have not created any Podcasts yet
  </div>
  @endforelse
</div>