@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Data Produk & Jasa
    </h1>
  <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnAdd">
    <i class="fa fa-plus-circle fa-sm text-white-50" aria-hidden="true"></i>
    Tambah
  </a>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th class="text-center">Action</th>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Kategori</th>
                      <th>Foto</th>
                      <th>Create</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
          </table>
      </div>      
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formLayanan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') : ''}}">
    
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group collapse">
                        <label for="id"> Id </label>
                        <input disabled id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') ? old('id') : '' }}" autocomplete="id" autofocus>
    
                        @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group collapse">
                        <label for="mitra_id"> Mitra </label>
                        <input id="mitra_id" type="number" class="form-control @error('mitra_id') is-invalid @enderror" name="mitra_id" value="{{ old('mitra_id') ? old('mitra_id') : Auth::user()->id }}" autocomplete="mitra_id" autofocus>
    
                        @error('mitra_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') : '' }}" autocomplete="nama" autofocus>
    
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="harga"> Harga </label>
                        <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') ? old('harga') : '' }}" autocomplete="harga" autofocus>
    
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="kategori"> Kategori </label>
                        <select id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                            <option value="barang">Barang</option>
                            <option value="jasa">Jasa</option>
                        </select>
    
                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
        $('table').DataTable({
            order : [[0,'desc'], [1,'desc']],
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('produk.index') }}",
            columns: [
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'DT_RowIndex', name: 'id' },
                {data: 'nama', name: 'nama' },
                {data: 'harga', name: 'harga' },
                {data: 'kategori', name: 'kategori' },
                {data: 'foto', name: 'foto' },
                {data: 'created_at', name: 'created_at' },
            ],
        });

        
        // delete
        $('table').on('click','.btnDestroy',function(e){
            e.preventDefault();
            
            var url_delete = $(this).attr('data-url');

            $.ajax({
                type: "DELETE",
                url: url_delete,
                success: function (response) {
                    $('table').DataTable().ajax.reload();
                }
            });
        });

        // show modal
        $('table').on('click', '.btnEdit', function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var url_edit = $(this).attr('data-edit');

            $('#formLayanan').modal('show');
            $('#formLayanan > div > div > div.modal-footer > button.btn.btn-primary').attr('id', 'btnUpdate').attr('data-url', url);

            $.ajax({
                type: "GET",
                url: url_edit,
                success: function (response) {
                    $('#foto').val(response.foto);
                    $('#id').val(response.id);
                    $('#mitra_id').val(response.mitra_id);
                    $('#nama').val(response.nama);
                    $('#harga').val(response.harga);
                    $('#kategori').val(response.kategori).change();
                }
            });
        });

        // update
        $('#formLayanan').on('click', '#btnUpdate', function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url')
            var form = $('#formLayanan form');
            
            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    console.log(response);
                    $('#formLayanan').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    displayError(xhr.responseJSON);
                }
            });
        });

        // show the create form
        $('#btnAdd').click(function (e) { 
            e.preventDefault();
            $('#formLayanan').modal('show');
            $('#formLayanan > div > div > div.modal-footer > button.btn.btn-primary').attr('id', 'btnStore').removeAttr('data-url');
        });

        // store
        $('#formLayanan').on('click', '#btnStore', function (e) {
            e.preventDefault();

            var url = '{{ route("produk.store")}}'
            var form = $('#formLayanan form');
            
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    console.log(response);
                    $('#formLayanan').modal('hide');
                    $('table').DataTable().ajax.reload();
                },
                error: function (xhr) {
                    displayError(xhr.responseJSON);
                }
            });
        });

        // show error
        function displayError(res) {
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

        // reset
        $('#formLayanan').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $(this).find('form').trigger('reset');
            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");
        });
    </script>
@endpush