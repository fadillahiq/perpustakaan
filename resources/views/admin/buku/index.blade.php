@extends('layouts.admin')

@section('title', 'Buku')

@section('content')

<div id="controller">
    <div class="section-header">
        <h1>Buku</h1>
        <a href="#" @click="addData()" class="btn btn-primary ml-auto">Tambah Data Buku <i class="fas fa-chevron-right"></i></a>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="collapse" id="collapseExample">
                <div class="card">
                    <div class="card-header">
                        <h4 v-if="!editStatus">Tambah Buku</h4>
                        <h4 v-if="editStatus">Ubah Buku</h4>
                    </div>
                    <div class="card-body">
                        <form :action="actionUrl" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                            <div class="form-group row">
                                <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" :value="data.isbn">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Buku" :value="data.judul">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-2 col-form-label">Tahun terbit</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="Telepon" name="tahun" placeholder="Masukkan Tahun Buku"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" :value="data.tahun" maxlength = "4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <select name="id_penerbit" class="form-control">
                                        <option value="">Pilih Penerbit</option>
                                        @foreach($penerbits as $penerbit)
                                            <option :selected="data.id_penerbit == {{ $penerbit->id }} " value="{{ $penerbit->id }}" >{{ $penerbit->nama_penerbit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                <div class="col-sm-10">
                                    <select name="id_pengarang" class="form-control">
                                        <option value="">Pilih Pengarang</option>
                                        @foreach($pengarangs as $pengarang)
                                            <option :selected="data.id_pengarang == {{ $pengarang->id }} " value="{{ $pengarang->id }}" >{{ $pengarang->nama_pengarang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_katalog" class="col-sm-2 col-form-label">Katalog</label>
                                <div class="col-sm-10">
                                    <select name="id_katalog" class="form-control">
                                        <option value="">Pilih Katalog</option>
                                        @foreach($katalogs as $katalog)
                                            <option :selected="data.id_katalog == {{ $katalog->id }} " value="{{ $katalog->id }}" >{{ $katalog->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qty_stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="qty_stok" name="qty_stok" placeholder="Masukkan Stok" :value="data.qty_stok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga_pinjam" class="col-sm-2 col-form-label">Harga Pinjam</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga_pinjam" name="harga_pinjam" placeholder="Masukkan Harga pinjam" :value="data.harga_pinjam">
                                </div>
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Cari buku..." v-model="search">
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-3" v-for="buku in filteredList">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">@{{ buku.judul }}</h5>
            </div>
            <div class="card-body">
              <p>Rp. @{{ formatPrice(buku.harga_pinjam) }},-</p>
              <p>Stok : @{{ buku.qty_stok }}</p>
              <div class="mt-3">
                <a href="#" @click="editData(buku)" class="btn btn-warning">Ubah</a>
                <a href="#" @click="deleteData(buku.id)" class="btn btn-danger">Hapus</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection


@push('scripts')

<script type="text/javascript">
  var actionUrl = '{{ url('admin/buku') }}';
   var app = new Vue({
    el: '#controller',
    data: {
      search: '',
      data_buku: [],
      data: {},
      actionUrl: actionUrl,
      editStatus: false,
    },
    mounted: function() {
      this.databuku();
    },
    methods: {
      databuku() {
        const _this = this
        $.ajax({
          url: actionUrl,
          method: 'GET',
          success: function (data) {
            _this.data_buku = JSON.parse(data)
          },
          error: function( error) {
            console.log(error)
          }
        })
      },
      closeCollapse() {
                    $('#collapseExample').collapse('hide');
      },
      addData() {
        this.editStatus = false;
        this.data = {};
        this.actionUrl = '{{ url('admin/buku') }}';
        $('#collapseExample').collapse('show');
      },
      editData(buku) {
        this.editStatus = true;
        this.data = buku;
        this.actionUrl = '{{ url('admin/buku') }}' + '/' + buku.id;
        $('#collapseExample').collapse('show');
      },
      deleteData(id) {
        if(confirm('Apakah anda yakin ?')) {
            axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
                location.reload();
            })
        }
      },
      formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      },
    },
    computed: {
      filteredList() {
        return this.data_buku.filter(buku => {
          return buku.judul.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    }
   })
</script>
@endpush
