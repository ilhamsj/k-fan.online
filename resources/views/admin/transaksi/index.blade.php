@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Transaksi
    </h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-file-export fa-sm text-white-50"></i>
    Export
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
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>User</th>
                      <th>Paket</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Catatan</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($items as $item)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->user->name }}</td>
                      <td>{{ $item->paket->nama }}</td>
                      <td>{{ $item->rupiah($item->jumlah) }}</td>
                      <td class="status">
                        {!! $item->status($item->status, $item->id) !!}
                      </td>
                      <td>{{ $item->created_at }}</td>
                      <td>{{ $item->catatan }}</td>
                      <td class="d-sm-flex justify-content-center">
                          <a href="#" class="mx-1 btn btn-secondary btn-sm btn-icon-split">
                              <span class="icon text-white-50">
                                  <i class="fas fa-pencil-alt"></i>
                              </span>
                          </a>
                          <form action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-icon-split btn-sm" type="submit">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-trash-alt"></i>
                                  </span>
                              </button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>User</th>
                    <th>Paket</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th class="text-center">Action</th>
                </tr>
              </tfoot>
          </table>
      </div>      
  </div>
</div>

@endsection

@push('scripts')
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
      $(document).ready(function() {
        $('table tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        });
        var table = $('table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
                }
            ]
        });
        
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $('input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                    .search( this.value )
                    .draw();
                }
            });
        } );
      });
    </script>
@endpush