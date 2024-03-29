<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Perpustakaan</title>

  <!-- General CSS Files -->
  @include('includes.style')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stislaa/assets_node/selectric/public/selectric.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ asset('stislaa/assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
             @yield('content')
            </div>
            <div class="mt-5 text-muted text-center">
                Already have account? <a href="{{ route('login') }}">Login</a>
              </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  @include('includes.script')
  <!-- Page Specific JS File -->
  <script src="{{ asset('stislaa/assets_node/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('stislaa/assets_node/selectric/public/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('stislaa/assets/js/page/auth-register.js') }}"></script>
</body>
</html>
