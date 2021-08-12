@extends('layouts.admin')

@section('title', 'Anggota')

@section('content')

    <div class="section-header">
        <h1>Anggota</h1>
    </div>

<div id="controller">
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <div class="card-header">
                            <h4 v-if="!editStatus">Tambah Anggota</h4>
                            <h4 v-if="editStatus">Edit Anggota</h4>
                        </div>
                        <div class="card-body">
                            <form :action="actionUrl" @submit="submitForm($event, data.id)" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                <div class="form-group">
                                    <label for="name">Nama Anggota</label>
                                    <input id="name" class="form-control" type="text" name="name" maxlength="64" :value="data.name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="data.email" maxlength="50" required>
                                </div>

                                <div class="form-group">
                                    <label for="sex">Jenis Kelamin</label>
                                    <select class="form-control" name="sex" id="sex" required>
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option :selected="data.sex == 'Laki-Laki'" value="Laki-Laki">Laki-Laki</option>
                                        <option :selected="data.sex == 'Perempuan'" value="Perempuan">Perempuan</option>
                                    </select>
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
                    <h4>Data Anggota</h4>
                    <div class="card-header-action">
                        <a href="#" @click="addData()" class="btn btn-primary">Tambah Data Anggota <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <select name="jenkel" id="sex" class="form-control">
                        <option value="0">Semua Jenis Kelamin</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
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
                            <th>Nama Anggota</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
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
        var actionUrl = '{{ url('admin/anggota') }}';
        var columns = [
            {data: 'name', orderable: true},
            {data: 'email', orderable: true},
            {data: 'sex', orderable: true},
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
    <script>
        $('select[name=jenkel]').on('change', function() {
            sex = $('select[name=jenkel]').val();

            if(sex == 0){
                controller.table.ajax.url(actionUrl).load();
            }else{
                controller.table.ajax.url(actionUrl+'?sex='+sex).load();
            }
        });
    </script>
@endpush
