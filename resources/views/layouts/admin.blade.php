<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', config('app.name'))</title>

  <!-- General CSS Files -->
  @include('includes.style')
  @stack('styles')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <!-- Nav Bar -->
      @include('includes.navbar')
      <!-- end navbar -->

      <!-- Side Bar -->
      @include('includes.sidebar')
      <!-- end sidebar -->

      <!-- Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      <!-- end content -->

      <!-- Footer -->
      @include('includes.footer')
      <!-- end footer -->

    </div>
  </div>

  <!-- General JS Scripts -->
  @include('includes.script')
  <!-- Page Specific JS File -->
  @stack('scripts')
</body>
</html>
