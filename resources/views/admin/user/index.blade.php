@extends('layouts.admin')

@section('content')

<div class="alert alert-success" role="alert">
    <strong>message</strong>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Data User
    </h1>
  <a id="btnTambah" href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

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
                        <button type="button" class="btn btn-primary shadow-sm">Save</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    {{-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>  --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>  --}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script> 
    <script>  
        $(document).ready(function () {

            // Read
            var table = $('table').DataTable({
                dom: 'Bfrtip',
                order : [[0,'desc'], [1,'desc']],
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
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength', 
                ]
            });
            // table.buttons().container()
            // .appendTo( '#example_wrapper .col-md-6:eq(0)' );

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

            $('#btnTambah').click(function (e) { 
                e.preventDefault();
                $('#modelId').modal('show'); 
                
                $('#modelId > div > div > div.modal-body > form > div:nth-child(7) > button.btn.btn-primary.shadow-sm').attr('id', 'btnStore').html('Save');
                
                $('#password').removeAttr('disabled').parent().removeClass('collapse');
                $('#password-confirm').removeAttr('disabled').parent().removeClass('collapse');
            });
            
            // tambah data
            $('#modelId').on('click', '#btnStore', function (e) {
                e.preventDefault();
                var form = $('#modelId form');
                
                $('.invalid-feedback').remove();
                $('.form-group').find('input').removeClass("is-invalid");

                $.ajax({
                    type: "POST",
                    url: "{{route('user.store')}}",
                    data: form.serialize(),
                    success: function (response) {
                        sukses(response.success, 'table')
                    },
                    error: function (xhr) {
                        displayError(xhr.responseJSON);
                    }
                });
            });

            // Show the modal
            $('table').on('click', '.btnEdit', function (e) { 
                e.preventDefault(); 
                $('#modelId').modal('show');
                
                var url = $(this).attr('data-url');
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');

                $('#password').attr('disabled', true).parent().addClass('collapse');
                $('#password-confirm').attr('disabled', true).parent().addClass('collapse');
                $('#status').val(status).change()

                $('#modelId form').attr('data-id', id);
                $('#modelId form').attr('action', url);
                $('#modelId > div > div > div.modal-body > form > div:nth-child(7) > button.btn.btn-primary.shadow-sm').attr('id', 'btnUpdate').html('Update');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                    }
                }); 
            });

            // update the form
            $('#modelId').on('click', '#btnUpdate', function (e) { 
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

            $('#modelId').on('hidden.bs.modal', function () {
                var form = $('#modelId form');
                form.trigger('reset');
                $('input[type=datetime-local]').removeAttr('value');
                $('.invalid-feedback').remove();
                $('.form-group').find('input').removeClass("is-invalid");
            });
        });
    </script>
@endpush