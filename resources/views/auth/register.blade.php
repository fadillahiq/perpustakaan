@extends('layouts.register')

@section('content')
<div class="card-header"><h4>Register</h4></div>

<div class="card-body">
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
      <div class="form-group col-12">
        <label for="name">Full Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required name="email" value="{{ old('email') }}" autofocus autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="password" class="d-block">Password</label>
        <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" autofocus autocomplete="password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div id="pwindicator" class="pwindicator">
          <div class="bar"></div>
          <div class="label"></div>
        </div>
      </div>
      <div class="form-group col-6">
        <label for="password2" class="d-block">Password Confirmation</label>
        <input id="password2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">
        Register
      </button>
    </div>
  </form>
</div>
@endsection
