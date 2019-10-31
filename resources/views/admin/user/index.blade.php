@extends('layouts.admin')

@section('content')

<div class="alert alert-success" role="alert">
    <strong>message</strong>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Data User
    </h1>
  <a data-toggle="modal" data-target="#modelId" href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                      <th>Action</th>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Verivikasi</th>
                      <th>Created at</th>
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
                <h5 class="modal-title">User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    </div>
    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                    </div>
    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                    </div>
    
                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
    
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="kirim" type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                        <button id="btnUpdate" type="submit" class="btn btn-primary shadow-sm">Update</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        
        $(document).ready(function () {
            // Read
            $('table').DataTable({
                order : [0,'desc'],
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.index') }}",
                columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'DT_RowIndex', name: 'id' },
                    {data: 'name', name: 'name' },
                    {data: 'email', name: 'email' },
                    {data: 'status', name: 'status' },
                    {data: 'email_verified_at', name: 'email_verified_at' },
                    {data: 'created_at', name: 'created_at' },
                ],
            });
        });

        // Hapus
        $('table').on('click','.btnDelete',function(e){
            e.preventDefault();
            
            if(confirm()) {
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
                        sukses(response.success, 'table')
                    }
                });
            }
        });
        

        // tambah data
        $('#kirim').click(function (e) { 
            e.preventDefault();
            var form = $('#modelId form'),
                url = "{{route('user.store')}}";
            
            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    sukses(response.success, 'table')
                },
                error: function (xhr) {
                    displayError(xhr.responseJSON);
                }
            });
        });

        // edit/update
        // Show the modal
        $('table').on('click', '.btnEdit', function (e) { 
            e.preventDefault(); 
            $('#modelId').modal('show');
            
            var url = $(this).attr('data-url');
            var id = $(this).attr('data-id');

            $('#modelId form').attr('data-id', id);
            $('#modelId form').attr('action', url);

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                }
            }); 
        });

        // 2. update the form
        $('#btnUpdate').click(function (e) { 
            e.preventDefault();
            var form = $('#modelId form');
            var id = $(form).attr('data-id');
            var url = $(form).attr('action');
            
            $('.invalid-feedback').remove();
            $('.form-group').find('input').removeClass("is-invalid");

            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    console.log(response);
                    sukses(response.success, 'table')
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

        // message
        function sukses(message, table) {
            $('#modelId').modal('hide')
            $('.alert').find('strong').html(message)
            $('.alert').show();
            $('#modelId form').trigger('reset');

            $(table).DataTable().ajax.reload();
            $('.alert').delay(2500).slideUp(200, function() {
                $(this).toggleClass('collapse');
            });
        }
        
        $('.alert').toggleClass('collapse');
    </script>
@endpush