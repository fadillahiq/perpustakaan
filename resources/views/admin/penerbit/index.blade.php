@extends('layouts.admin')

@section('title', 'Penerbit')

@section('content')

    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

<div id="controller">
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <div class="card-header">
                            <h4 v-if="!editStatus">Tambah Penerbit</h4>
                            <h4 v-if="editStatus">Edit Penerbit</h4>
                        </div>
                        <div class="card-body">
                            <form :action="actionUrl" @submit="submitForm($event, data.id)" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                <div class="form-group">
                                    <label for="nama_penerbit">Nama Penerbit</label>
                                    <input id="nama_penerbit" class="form-control" type="text" name="nama_penerbit" maxlength="64" :value="data.nama_penerbit" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="data.email" maxlength="50" required>
                                </div>

                                <div class="form-group">
                                    <label for="telp">Nomor Handphone</label>
                                    <input  name="telp"
                                            class="form-control"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type = "number"
                                            maxlength = "14"
                                            :value="data.telp"
                                            required
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" class="form-control" type="text" name="alamat" :value="data.alamat" maxlength="300" required>
                                </div>

                                <div class="form-group">
                                <button type="submit" class="btn btn-success" v-if="!editStatus">Simpan</button>
                                <button type="submit" class="btn btn-warning" v-if="editStatus">Perbarui</button>
                                <button type="button" @click="closeCollapse()" class="btn btn-danger">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h4>Data Penerbit</h4>
                    <div class="card-header-action">
                        <a href="#" @click="addData()" class="btn btn-primary">Tambah Data Penerbit <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                  <div class="table-responsive">
                    <table class="table-hover scroll-horizontal-vertical w-100" id="datatable">
                      <thead>
                        <tr>
                            <th>Nama Penerbit</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Penerbit</h4>
                        <div class="card-header-action">
                            <a href="#" @click="addData()" class="btn btn-primary">Tambah Data Penerbit <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table-hover scroll-horizontal-vertical w-100" id="datatable">
                            <thead>
                                <tr>
                                    <th>Nama Penerbit</th>
                                    <th>Email</th>
                                    <th>No Handphone</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
    <script>
        var actionUrl = '{{ url('admin/penerbit') }}';
        var columns = [
            {data: 'nama_penerbit', orderable: true},
            {data: 'email', orderable: true},
            {data: 'telp', orderable: true},
            {data: 'alamat', orderable: true},
            {render: function (index, row, data, meta) {
                return `<div class='d-flex my-1'>
                            <a href="#" class="btn btn-warning mr-1" onclick="controller.editData(event, ${meta.row})">
                                Ubah
                                </a>
                                <a href="#" class="btn btn-danger" onclick="controller.deleteData(event, ${data.id})">
                                Hapus
                            </a>
                        </div>`;
            }, orderable: false, width: '100px'},
        ];
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
@endpush
