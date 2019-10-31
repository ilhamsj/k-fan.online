@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Berita Lelayu
    </h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-add">
        <i class="fa fa-plus-circle fa-sm text-white-50"></i>
        Tambah
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="databerita-lelayu" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Action</th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Surat Kematian</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Wafat</th>
                        <th>ID Transaksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="transaksi_id"> Transaksi </label>
                        <input id="transaksi_id" type="text" class="form-control @error('transaksi_id') is-invalid @enderror" name="transaksi_id" value="">
                    </div>
      
                    <div class="form-group">
                        <label for="nama"> Nama Jenazah</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="">
                    </div>
      
                    <div class="row">
                        <div class="form-group col lahir">
                            <label for="lahir"> Tanggal Lahir </label>
                            <input id="lahir" type="datetime-local" class="form-control @error('lahir') is-invalid @enderror" name="lahir" value="">
                        </div>
                        <div class="form-group col wafat">
                            <label for="wafat"> Tanggal Wafat </label>
                            <input id="wafat" type="datetime-local" class="form-control @error('wafat') is-invalid @enderror" name="wafat" value="">
                        </div>
                    </div>
      
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') ? old('alamat') :  '' }}">
                    </div>
      
                    <div class="form-group">
                        <label for="surat_kematian"> Link Surat Kematian </label>
                        <input id="surat_kematian" type="text" class="form-control @error('surat_kematian') is-invalid @enderror" name="surat_kematian" value="{{ old('surat_kematian') ? old('surat_kematian') : '' }}">
                    </div>
      
                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') :  '' }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>

        // read
        var table = $('table').DataTable({
            order : [1,'desc'],
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.lelayu') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'DT_RowIndex', name: 'id' },
                {data: 'nama', name: 'nama' },
                {data: 'alamat', name: 'alamat' },
                {data: 'foto', name: 'foto' },
                {data: 'surat_kematian', name: 'surat_kematian' },
                {data: 'lahir', name: 'lahir' },
                {data: 'wafat', name: 'wafat' },
                {data: 'transaksi_id', name: 'transaksi_id' },
            ],
        });

        // delete
        $('table').on('click','.btnDelete',function(e){
            e.preventDefault();
            
            var urlDelete = $(this).attr('data-url');
            var idDelete = $(this).attr('data-id');
            $.ajax({
                type: "DELETE",
                url: urlDelete,
                data: {
                    _token: "{{csrf_token()}}",
                },
                dataType: "json",
                success: function (response) {
                    $('table').DataTable().ajax.reload();
                }
            });     
        });
        

        // show modal to edit
        $('table').on('click','.btnEdit',function(e){
            e.preventDefault();

            var url = $(this).attr('data-url');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");
            
            $('#modelId').modal('show')
            $('#modelId form').attr('action', url);
            $('#modelId').find('button:last-child').attr('id', 'btn-update');

            
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#id').val(response.id);
                    $('#transaksi_id').val(response.transaksi_id);
                    $('#nama').val(response.nama);
                    $('#foto').val(response.foto);
                    $('#alamat').val(response.alamat);
                    $('#surat_kematian').val(response.surat_kematian);
                    
                    var lahir = response.lahir;
                    var lahir = lahir.split(' ').join('T');
                    
                    var wafat = response.wafat;
                    var wafat = wafat.split(' ').join('T');

                    $('#lahir').attr('value', lahir);
                    $('#wafat').attr('value', wafat);
                }
            });
        });
        
        // update
        $('#modelId').on('click','#btn-update',function(e){
            e.preventDefault();

            var form = $('#modelId form');
            var url = $(form).attr('action');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");

            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    $('#modelId').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    showError(xhr.responseJSON)
                }
            });
        });

        // add
        $('#btn-add').click(function (e) { 
            e.preventDefault();
            $('#modelId').modal('show')
            var form = $('#modelId form');
            form.trigger('reset');
            $('#modelId').find('button:last-child').attr('id', 'btn-store');
        });

        // store
        $('#modelId').on('click','#btn-store',function(e){
            e.preventDefault();

            var form = $('#modelId form');

            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");


            $.ajax({
                type: "POST",
                url: "{{ route('lelayu.store') }}",
                data: form.serialize(),
                success: function (response) {
                    $('#modelId').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    showError(xhr.responseJSON)
                }
            });
        });


        // show error
        function showError(res) 
        {
            if ($.isEmptyObject(res) == false)
            {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .append('<span class="invalid-feedback" role="alert"> <strong>'+ value +'</strong> </span>')
                        .find('input').addClass("is-invalid")
                })
            }
        }

        
        $('#modelId').on('hidden.bs.modal', function () {
            var form = $('#modelId form');
            form.trigger('reset');
            $('input[type=datetime-local]').removeAttr('value');
        });
    </script>
@endpush