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
                <a href="{{ route('katalog.create') }}" class="btn btn-primary">Tambah Data Katalog <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  @forelse ($data_katalog as $katalog)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $katalog->nama }}</td>
                    <td>
                      <form action="{{ route('katalog.destroy', $katalog->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                        <a href="{{ route('katalog.edit', $katalog->id) }}" class="btn btn-warning">Ubah</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="12"><p class="text-center"><strong>Data Masih Kosong</strong></p></td>
                  </tr>
                  @endforelse
                </table>
              </div>
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
