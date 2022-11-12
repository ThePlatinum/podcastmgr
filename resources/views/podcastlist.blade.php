<div class="row">
  @forelse ($podcasts as $podcast)
  <div class="col-md-3 my-2">
    <div class="card">
      <div class="card-img">
        <img src="{{ $podcast->image }}" alt="Podcast Image" class="img-fluid">
      </div>
      <div class="card-body">
        <p class="text-muted m-0 p-0">{{ date_format($podcast->created_at, 'D d, M-Y') }}</p>
        <a href="{{route('episode', $podcast->slug)}}"><h4 class="card-title text-capitalize">{{ $podcast->title }}</h4></a>
        <p class="card-text"> {{ \Str::limit($podcast->description, 100, "...") }} </p>
      </div>
    </div>
  </div>
  @empty
  <div class="text-center p-5">
    You have not created any Podcasts yet
  </div>
  @endforelse
</div>