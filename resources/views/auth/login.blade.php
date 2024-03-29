@extends('layouts.login')

@section('content')
<div class="card-header"><h4>Login</h4></div>
<div class="card-body">
  <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <div class="d-block">
          <label for="password" class="control-label">Password</label>
        <div class="float-right">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-small">
            Forgot Password?
          </a>
          @endif
        </div>
      </div>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
        <label class="custom-control-label" for="remember-me">Remember Me</label>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        Login
      </button>
    </div>
  </form>
</div>
@endsection

