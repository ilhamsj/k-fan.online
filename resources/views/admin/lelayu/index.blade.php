@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Berita Lelayu
    </h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Wafat</th>
                        <th>Foto</th>
                        <th>Surat Kematian</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{ $item->lahir}}</td>
                        <td>{{ $item->wafat }}</td>
                        <td><img class="img-fluid rounded" src="{{$item->foto}}" alt="{{$item->foto}}" srcset=""></td>
                        <td>
                            <a href="{{ $item->surat_kematian }}" target="_blank">Lihat</a>
                        </td>
                        <td class="d-sm-flex justify-content-center">
                            <a href="#" class="mx-1 btn btn-secondary btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                            </a>

                            <form action="{{ route('berita-lelayu.destroy', $item->id) }}" method="post">
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