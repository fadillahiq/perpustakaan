var controller = new Vue({
    el: '#controller',
    data: {
        editStatus: false,
        data: {},
        actionUrl: actionUrl,
        datas: [],
    },
    mounted: function() {
        this.datatable()
    },
    methods: {
        datatable() {
            const _this = this;
            _this.table = $('#datatable').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                ajax: {
                    url: _this.actionUrl,
                    type: 'get',
                },
                columns: columns
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data
            })
        },
        closeCollapse() {
            $('#collapseExample').collapse('hide');
            $('#detailPeminjam').collapse('hide');
        },
        addData() {
            $('#collapseExample').collapse('show')
            this.editStatus = false
            this.data = {}
        },
        editData(event, index) {
            $('#collapseExample').collapse('show')
            this.editStatus = true
            this.data = this.datas[index]

            $('#select2-buku').empty();
            var option = '';

            for (var i = 0; i < this.data.list_buku.length; i++) {
                option = option + `<option ` + (this.data.list_buku[i]['dipinjam'] == true ? `selected` : ``) + ` value="` + this.data.list_buku[i]['id'] + `">` + this.data.list_buku[i]['judul'] + `</option>`;
            }

            $('#select2-buku').append(option);
        },
        detailData(event, index) {
            $('#detailPeminjam').collapse('show')
            this.editStatus = true
            this.data = this.datas[index]
            this.anggota = this.data.anggota.name
        },
        deleteData(event, id) {
            if (confirm('Apakah anda yakin ?')) {
                axios.post(this.actionUrl + '/' + id, { _method: 'DELETE' })
                    .then(response => {
                        $('#collapseExample').collapse('hide');
                        $(event.target).parents('tr').remove();
                        console.log('Data berhasil dihapus')
                    })
                    .catch(error => {
                        alert(error.response.data.message)
                    })
            }
        },
        submitForm(event, id) {
            event.preventDefault()
            const _this = this
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0]))
                .then(response => {
                    $('#collapseExample').collapse('hide')
                    _this.table.ajax.reload()
                })
                .catch(error => {
                    alert(error.response.data.message)
                })
        }
    }
})