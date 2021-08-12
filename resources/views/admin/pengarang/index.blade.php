@extends('layouts.admin')

@section('title', 'Pengarang')

@section('content')
<div id="controller">

  <div class="section-header">
    <h1>Pengarang</h1>
  </div>

  <div class="section-body">

    <div class="row">
        <div class="col-md-12">
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class="card-header">
                        <h4 v-if="!editStatus">Tambah Pengarang</h4>
                        <h4 v-if="editStatus">Edit Pengarang</h4>
                    </div>
                    <div class="card-body">
                        <form :action="actionUrl" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label for="nama_pengarang">Nama Pengarang</label>
                                <input id="nama_pengarang" class="form-control" type="text" name="nama_pengarang" :value="data.nama_pengarang" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" :value="data.email" required>
                            </div>

                            <div class="form-group">
                                <label for="telp">Nomor Handphone</label>
                                <input  name="telp"
                                        class="form-control"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type = "number"
                                        maxlength = "14"
                                        :value="data.telp"
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pengarang</h4>
              <div class="card-header-action">
                <a href="#" @click="addData()" class="btn btn-primary">Tambah Data Pengarang <i class="fas fa-chevron-right"></i></a>
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
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tr>
                    <th>#</th>
                    <th>Nama Pengarang</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  @forelse ($data_pengarang as $pengarang)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $pengarang->nama_pengarang }}</td>
                    <td>{{ $pengarang->email }}</td>
                    <td>{{ $pengarang->telp }}</td>
                    <td>{{ $pengarang->alamat }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="#" @click="editData({{ $pengarang }})" class="btn btn-warning mr-1">Ubah</a>
                            <a href="#" @click="deleteData({{ $pengarang->id }})" class="btn btn-danger">Hapus</a>
                        </div>
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
</div>
@endsection
@push('scripts')
    <script>
        var controller = new Vue ({
            el: '#controller',
            data: {
                editStatus: false,
                data: {},
                actionUrl: ''
            },
            mounted: function () {

            },
            methods: {
                closeCollapse() {
                    $('#collapseExample').collapse('hide');
                },
                addData() {
                    this.editStatus = false;
                    this.actionUrl = '{{ url('admin/pengarang') }}';
                    this.data = {};
                    $('#collapseExample').collapse('show');
                },
                editData(pengarang) {
                    this.editStatus = true;
                    this.actionUrl = '{{ url('admin/pengarang') }}' + '/' + pengarang.id;
                    this.data = pengarang;
                    $('#collapseExample').collapse('show');
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('admin/pengarang') }}';
                    if(confirm('Apakah anda yakin ?')) {
                        axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        })
                    }
                }
            },
        });
    </script>
    @include('sweetalert::alert')
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@endpush
