@extends('layouts.admin')

@section('title', 'Katalog')

@section('content')
  <div class="section-header">
    <h1>Katalog</h1>
  </div>

  <div class="section-body">
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>Data Katalog</h4>
              <div class="card-header-action">
                <a href="{{ route('katalog.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            <div class="card-body mx-2">
                {{-- Menampilkan error ketika tidak sesuai dengan validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Memasukkan data ke table katalog --}}
                <form action="{{ route('katalog.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Katalog</label>
                        <input id="nama" class="form-control" type="text" name="nama" placeholder="Masukkan Nama Katalog" required maxlength="64" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
@push('scripts')
    @include('sweetalert::alert')
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endpush
