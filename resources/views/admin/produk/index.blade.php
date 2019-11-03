@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Data Produk & Jasa
    </h1>
  <a href="{{ route('produk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
<div class="modal fade" id="c" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
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
            ajax: "{{ route('layanan.index') }}",
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
    </script>
@endpush