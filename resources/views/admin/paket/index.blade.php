@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">
        Data Paket
    </h1>
    <a href="{{ route('paket.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
            <table id="dataPaket" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Barang atau Jasa</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Foto</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama}}</td>
                        <td class="listProduks">
                            @foreach ($item->paketproduk as $paket)
                                {{$paket->produk->nama}}
                                <a href="" class="text-danger listProduk"><i class="fa fa-window-close"></i></a>
                                <form action="{{ route('paket-produk.destroy', $paket->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endforeach
                            <div class="tambahProduk">
                                <a href="" data-paket="{{ $item->id}}">
                                    <i class="fa fa-plus-circle fa-sm" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                        <td>{{ $item->rupiah($item->harga) }}</td>
                        <td>{{$item->diskon}}</td>
                        <td>
                            <img class="img-fluid rounded" src="{{$item->foto}}" alt="{{$item->foto}}" srcset="">
                        </td>
                        <td class="d-sm-flex justify-content-center">
                            <a href="{{ route('paket.edit', $item->id) }}" class="mx-1 btn btn-secondary btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                            </a>

                            <form action="{{ route('paket.destroy', $item->id) }}" method="post">
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

<!-- Modal -->
<div class="modal fade" id="tambahPaketProduk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paket-produk.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="paket_id"> Paket </label>
                        <select id="paket_id" type="text" class="form-control @error('paket_id') is-invalid @enderror" name="paket_id">
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        @error('paket_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="produk_id"> Produk </label>
                        <select id="produk_id" type="text" class="form-control @error('produk_id') is-invalid @enderror" name="produk_id[]" multiple>
                        </select>

                        @error('produk_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow-sm" data-dismiss="modal">Close</button>
                <button type="button" id="tambahLayanan" class="d-none d-sm-inline-block btn btn-primary shadow-sm">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });

        $('#tambahLayanan').click(function (e) { 
            e.preventDefault();
            $('#tambahPaketProduk').find('form').submit();
        });

        $('.listProduk').click(function (e) { 
            e.preventDefault();
            confirm() ? $(this).next().submit() : console.log('no');
        });

        $('.tambahProduk').find('a').click(function (e) { 
            e.preventDefault();
            var x = $(this).attr('data-paket');
            $("#paket_id").val(x).change();

            $('#tambahPaketProduk').modal('toggle');
        });

        $('#tambahPaketProduk').find('#paket_id').select2({
                theme: 'bootstrap4',
                allowClear: true,
                placeholder: "Pilih"
        })

        $('#tambahPaketProduk').find('#produk_id').select2({
            dropdownParent: $('#tambahPaketProduk .modal-content'),
            theme: 'bootstrap4',
            allowClear: true,
            placeholder: "Pilih",
            ajax: {
                url: '{{ route("produk.cari") }}',
                dataType: 'json',
                type: 'GET',
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nama + ' | ' + item.kategori + ' | ' + item.harga,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
      </script>
@endpush