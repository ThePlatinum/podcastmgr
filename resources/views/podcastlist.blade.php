<div class="row">
  @forelse ($podcasts as $podcast)
  <div class="col-md-3 my-2">
    <div class="card">
      <img src="{{ $podcast->image }}" alt="Podcast Image" class="card-img topic_img" height="250">
      <div class="card-body">
        <p class="text-muted m-0 p-0">{{ date_format($podcast->created_at, 'D d, M-Y') }}</p>
        <a href="{{route('episode', $podcast->slug)}}">
          <h4 class="card-title text-capitalize text-line-limit-2">{{ $podcast->title }}</h4>
        </a>
        <p class="card-text text-line-limit-3"> {{ \Str::limit($podcast->description, 120, "...") }} </p>
      </div>
      @auth
      @if (Route::is('dashboard'))
      <div class="card-footer">
        <a href="{{ route('episode.edit', $podcast->slug) }}" class="btn btn-outline-secondary">Edit</a>
        <button class="btn btn-danger" onclick="deleteepisode('{{$podcast->slug}}')">Delete</button>
      </div>
      @endif
      @endauth
    </div>
  </div>
  @empty
  <div class="text-center p-5">
    You have not created any Podcasts yet
  </div>
  @endforelse
</div>

<script>
  function deleteepisode(slug) {
    bootbox.confirm({
      title: 'Delete this episode?',
      message: "<p class='text-center'> <b>Are you really sure you want to delete this episode? <br> Please note, that this action cannot be undone.</b> </p>",
      centerVertical: true,
      buttons: {
        confirm: {
          label: 'Yes, Delete it!',
          className: 'btn-danger'
        },
        cancel: {
          label: 'No',
          className: 'btn-secondary'
        }
      },
      callback: result => {
        if (result) {
          $.ajax({
            url: "{{ route('delete.episode') }}",
            method: "POST",
            data: {
              _token: "{{csrf_token()}}",
              episode: slug
            },
            success: (data) => {
              window.location.href = "/dashboard"
            },
            error: () => {},
          })
        }
      }
    });
  }
</script>