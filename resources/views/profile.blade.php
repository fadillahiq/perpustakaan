@extends('layouts.admin')

@section('title', 'Profile')


@section('content')
<div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Hi, {{ $user->name }}!</h2>
    <p class="section-lead">
      Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">
            <img alt="image" src="{{ url('avatars') }}/{{ $user->avatar }}" class="rounded-circle profile-widget-picture">
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">{{ $user->name }} <div class="text-muted d-inline font-weight-normal"></div></div>
                {!! $user->bio !!}
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form action="{{ route('profile.post', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
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

                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Full Name</label>
                    <input name="name" type="text" class="form-control" value="{{ $user->name }}" required="">
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $user->email }}" required="">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input name="phone" type="number" class="form-control" value="{{ $user->phone }}">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label>Bio</label>
                    <textarea name="bio" id="editor" cols="30" rows="10">{!! $user->bio !!}</textarea>
                  </div>
                </div>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('stislaa/assets_node/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('stislaa/assets_node/summernote/dist/summernote-bs4.css') }}">
@endpush
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                cloudServices: {
                    tokenUrl: 'https://81596.cke-cs.com/token/dev/59dfb033f6644081b92b843da56e4a43b054002aace497d6f427ff704274',
                    uploadUrl: 'https://81596.cke-cs.com/easyimage/upload/'
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
