@extends('layouts.app')

@section('content')
<div class="bg_pattern">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-white p-3 p-md-5">
        <h2>Reset Password</h2>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <button type="submit" class="btn btn-primary px-5 my-3">
            Send Password Reset Link
          </button>
        </form>

      </div>
    </div>
  </div>
</div>

</div>
@endsection