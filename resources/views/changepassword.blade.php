
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
              <li class="nav-item"><a href="#" class="nav-link active">Change Password</a></li>
              <li class="nav-item"><a href="{{ route('change.avatar.view', Auth::user()->id) }}" class="nav-link">Change Avatar</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
          <div class="card" id="settings-card">
            <div class="card-header">
              <h4>Change Password</h4>
            </div>
            <form action="{{ route('change.password.post') }}" method="POST">
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
                        <label for="current_password" class="form-control-label col-sm-3 text-md-right">Current Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Enter New Password" required autocomplete="new-password">
                                @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    <div class="form-group row align-items-center">
                        <label for="new_password" class="form-control-label col-sm-3 text-md-right">New Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter New Password" required autocomplete="new-password">
                                @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="new_confirm_password" class="form-control-label col-sm-3 text-md-right">Confirm New Password</label>
                        <div class="col-sm-6 col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" placeholder="Enter Confirm New Password" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
              {{-- <div class="form-group row align-items-center">
                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site Description</label>
                <div class="col-sm-6 col-md-9">
                  <textarea class="form-control" name="site_description" id="site-description"></textarea>
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                <div class="col-sm-6 col-md-9">
                  <div class="custom-file">
                    <input type="file" name="site_logo" class="custom-file-input" id="site-logo">
                    <label class="custom-file-label">Choose File</label>
                  </div>
                  <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                <div class="col-sm-6 col-md-9">
                  <div class="custom-file">
                    <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon">
                    <label class="custom-file-label">Choose File</label>
                  </div>
                  <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                </div>
              </div>
              <div class="form-group row">
                <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics Code</label>
                <div class="col-sm-6 col-md-9">
                  <textarea class="form-control codeeditor" name="google_analytics_code"></textarea>
                </div>
              </div> --}}
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
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
@endpush



