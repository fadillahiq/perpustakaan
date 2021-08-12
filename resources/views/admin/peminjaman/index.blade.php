
@extends('layouts.admin')

@section('title', 'Peminjaman')

@section('content')

    <div class="section-header">
        <h1>Peminjaman</h1>
    </div>

<div id="controller">
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <div class="card-header">
                            <h4 v-if="!editStatus">Tambah Peminjaman</h4>
                            <h4 v-if="editStatus">Edit Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <form :action="actionUrl" @submit="submitForm($event, data.id)" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                <div class="form-group">
                                    <label for="id_anggota">Nama Anggota</label>
                                    <select name="id_anggota" class="form-control" id="id_anggota">
                                        <option value="">-- Pilih Anggota --</option>
                                        @foreach($anggotas as $anggota)
                                            <option :selected="data.id_anggota == {{ $anggota->id }} " value="{{ $anggota->id }}" >{{ $anggota->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input id="tanggal_pinjam" class="form-control" type="date" name="tanggal_pinjam" :value="data.tanggal_pinjam"required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input id="tanggal_kembali" class="form-control" type="date" name="tanggal_kembali" :value="data.tanggal_kembali"required>
                                </div>

                                <div class="form-group">
                                    <label for="select2-buku">Buku</label>
                                    <select name="id_buku[]" class="form-control select2" multiple id="select2-buku">
                                        @foreach($bukus as $buku)
                                            <option value="{{ $buku->id }}" >{{ $buku->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" v-if="editStatus">
                                    <label for="status">Stauts</label>
                                    <br>
                                    <input type="radio" name="status" id="status" :checked="data.status == 1" value="1"> Sudah Dikembalikan
                                    <br>
                                    <input type="radio" name="status" id="status" :checked="data.status == 0" value="0"> Belum Dikembalikan
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
                <div class="collapse" id="detailPeminjam">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Peminjaman</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="my-input">Anggota Peminjam</label>
                                <p class="text-dark">@{{ anggota }}</p>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Tanggal Pinjam</label>
                                <p class="text-dark">@{{ data.tanggal_pinjam }} s.d @{{ data.tanggal_kembali }} ( @{{ data.lama_pinjam }} hari )</p>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Buku</label>
                                <ul>
                                    <li v-for="buku in data.buku">@{{ buku.judul }}</li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Status</label>
                                <p class="text-dark">@{{ data.status == 1 ? "Sudah dikembalikan" : "Belum dikembalikan" }}</p>
                            </div>

                            <div class="form-group">
                                <button type="button" @click="closeCollapse()" class="btn btn-danger">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h4>Data Peminjaman</h4>
                    <div class="card-header-action">
                        <a href="#" @click="addData()" class="btn btn-primary">Tambah Data Peminjaman <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col-md-2 mt-2">
                        <select name="kembali" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="belum">Belum Dikembalikan</option>
                            <option value="sudah">Sudah Dikembalikan</option>
                        </select>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                    </div>
                    <button onclick="reset_date_jquery()" class="btn btn-primary btn-sm">Reset Tanggal Pinjam</button>
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
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            <th>Lama Pinjam (hari)</th>
                            <th>Total Buku</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
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
        var actionUrl = '{{ url('admin/peminjaman') }}';
        var columns = [
            {data: 'tanggal_pinjam', orderable: true},
            {data: 'tanggal_kembali', orderable: true},
            {render: function(index, row, data, meta) {
                return data.anggota.name;
            }, class: 'text-center', orderable: true},
            {data: 'lama_pinjam', orderable: true},
            {render: function(index, row, data, meta) {
                return data.buku.length;
            }, class: 'text-center', orderable: true},
            {data: 'total_bayar', orderable: true},
            {render: function (index, row, data, meta) {
                return data.status == 0 ? '<span class="badge badge-danger">Belum dikembalikan</span>' : '<span class="badge badge-success">Sudah dikembalikan</span>';
            }, orderable: false, width: '200px', class: 'text-center'},
            {render: function (index, row, data, meta) {
                return `<div class='d-flex my-1'>
                                <a href="#" class="btn btn-warning mr-1" onclick="controller.editData(event, ${meta.row})">
                                Ubah
                                </a>
                                <a href="#" class="btn btn-primary mr-1" onclick="controller.detailData(event, ${meta.row})">
                                Detail
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
        $('select[name=kembali]').on('change', function() {
            status_kembali = $(this).val();
            if (status_kembali == '') {
            controller.table.ajax.url(actionUrl).load();
            } else {
            controller.table.ajax.url(actionUrl + '?status_kembali=' + status_kembali).load();
            }
        })

        $('input[name=tanggal]').on('change', function() {
            tanggal = $(this).val();
            if (tanggal == '') {
            controller.table.ajax.url(actionUrl).load();
            } else {
            controller.table.ajax.url(actionUrl + '?tanggal=' + tanggal).load();
            }
        })

        function reset_date_jquery() {
            $('#tanggal').val('')
                .attr('type', 'text')
                .attr('type', 'date');
                controller.table.ajax.url(actionUrl).load();
        }
    </script>
@endpush
