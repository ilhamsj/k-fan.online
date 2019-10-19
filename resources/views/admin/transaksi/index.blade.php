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
                      <th>User</th>
                      <th>Paket</th>
                      <th>Jumlah</th>
                      <th>Catatan</th>
                      <th>Status</th>
                      <th>Snap Token</th>
                      <th>Tanggal</th>
                      <th class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($items as $item)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->user->name }}</td>
                      <td>{{ $item->paket->nama }}</td>
                      <td>{{ $item->rupiah($item->jumlah) }}</td>
                      <td>{{ $item->catatan }}</td>
                      <td>{{ $item->status }}</td>
                      <td>{{ $item->snap_token }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td class="d-sm-flex justify-content-center">
                          <a href="{{ route('transaksi.edit', $item->id) }}" class="mx-1 btn btn-secondary btn-sm btn-icon-split">
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
          </table>
      </div>      
  </div>
</div>

@endsection

@push('scripts')
    <script>
      $(document).ready(function() {
          $('table').DataTable();
      });
    </script>
@endpush