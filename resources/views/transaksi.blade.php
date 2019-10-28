@extends('layouts.app')

@section('content')
    <section class="">
        <div class="container p-4">
            <div class="row justify-content-center flex-row-reverse" style="min-height:100vh">                
                <div class="col-12 col-md-4">
                    <div class="card border-0" style="box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 6px 0px;">
                        <div class="card-body">
                            <strong>Ringkasan Paket</strong>
                        </div>
                        <div class="card-body row">
                            <div class="col text-left">
                                Total Harga
                            </div>
                            <div class="col text-right">
                                <strong>{{ number_format($item->jumlah, 2, ',', ',') }}</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <button data-token="{{$item->snap_token}}" id="pay-button" type="button" class="btn btn-primary btn-block">Pilih Pembayaran</button>
                        </div>

                    </div>
                </div>

                <div class="col" id="data-jenazah">
                    <p>
                        <strong>Informasi Jenazah</strong>
                    </p>

                    @if (count($item->BeritaLelayu) == null)
                        <a href="" data-toggle="modal" data-target="#modelId">Tambah</a>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Wafat</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->beritalelayu as $berita)
                                    <tr>
                                        <td>{{ $berita->nama }}</td>
                                        <td>{{ $berita->lahir}}</td>
                                        <td>{{ $berita->wafat }}</td>
                                        <td>
                                            <img class="img-fluid" src="{{ $berita->foto }}" alt="" srcset="">
                                        </td>
                                        <td class="d-sm-flex justify-content-center">
                                            <form action="{{ route('berita-lelayu.destroy', $berita->id) }}" method="post">
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
                        <a href="" data-toggle="modal" data-target="#modelId">Tambah</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('lelayu.create')
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>

<script>
    $('#pay-button').click(function (e) { 
        e.preventDefault();
        var x = $(this).attr('data-token');
        snap.pay(x, {
            // Optional
            onSuccess: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                location.replace("/")
            },
            // Optional
            onPending: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
              location.replace("/home")
            },
            // Optional
            onError: function(result){
            // /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                location.replace("/home")
            }
        });
    });
</script>

    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
    <script>
        $('.tour').click(function (e) { 
            e.preventDefault();
            var intro = introJs();
            intro.setOptions({
                steps: [
                    {
                        element: document.querySelector('#data-jenazah'),
                        intro: "Tambah informasi jenazah"
                    },
                    {
                        element: document.querySelector('#pay-button'),
                        intro: "Pilih pembayaran"
                    },
                ]
            });
            intro.start();
        });
    </script>
@endpush