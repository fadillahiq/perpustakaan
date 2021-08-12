
@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
<div class="section-header">
    <div class="section-header-back">
      <a href="{{ route('home') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>General Settings</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
      <div class="breadcrumb-item">General Settings</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">All About General Settings</h2>
    <p class="section-lead">
      You can adjust all general settings here
    </p>

    <div id="output-status"></div>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4>Jump To</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item"><a href="{{ route('change.password.view') }}" class="nav-link">Change Password</a></li>
              <li class="nav-item"><a href="{{ route('change.avatar.view', Auth::user()->id) }}" class="nav-link active">Change Avatar</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
          <div class="card" id="settings-card">
            <div class="card-header">
              <h4>Change Avatar</h4>
            </div>
            <form action="{{ route('change.avatar.post', $user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row align-items-center">
                        <label for="current_password" class="form-control-label col-sm-3 text-md-right">New Avatar</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="avatar" class="custom-file-input" id="avatar" onchange="loadPreview(this);">
                                    <label id="avatar" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="current_password" class="form-control-label col-sm-3 text-md-right">Preview New Avatar</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <img alt="No New Avatar Selected" id="preview_img" src="{{ asset('avatars/loading.gif') }}" class="rounded-circle profile-widget-picture img-fluid">
                            </div>
                        </div>
                      </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('stislaa/assets_node/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('stislaa/assets_node/codemirror/theme/duotone-dark.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('stislaa/assets_node/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('stislaa/assets_node/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('stislaa/assets/js/page/features-setting-detail.js') }}"></script>
    <script src="{{ asset('stislaa/assets_node/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('stislaa/assets/js/page/forms-advanced-forms.js') }}"></script>
    <script>
        function loadPreview(input, id) {
          id = id || '#preview_img';
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $(id)
                          .attr('src', e.target.result)
                          .width(200)
                          .height(150);
              };

              reader.readAsDataURL(input.files[0]);
          }
       }
    </script>
@endpush



