@extends('layouts.app')

@section('content')
    <section class="bg-light">
        <div class="container p-4">
            <div class="row justify-content-center flex-row-reverse" style="min-height:100vh">                
                <div class="col-12 col-md-4 mb-4">
                    <div class="card rounded-card border-0" style="box-shadow: rgba(49, 53, 59, 0.12) 0px 1px 6px 0px;">
                        <div class="card-header text-center bg-primary text-light border-0" style="border-radius: 1rem 1rem 0 0">
                            <strong>Ringkasan Paket</strong>
                        </div>
                        <div class="card-body d-flex text-center justify-content-center align-items-center" style="min-height: 35vh">
                            <div>
                                <h3>{{$item->paket->nama}}</h3>
                                Total Harga <br/>
                                <h4>Rp. {{ number_format($item->jumlah, 2, ',', ',') }}</h4>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            @if (count($item->BeritaLelayu) == null)
                                <a class="btn btn-link text-danger" href="" data-toggle="modal" data-target="#modelId">* Tambahkan Informasi Jenazah</a>
                            @endif
                            <button {{ count($item->BeritaLelayu) == null ? 'disabled' : ''}} data-token="{{$item->snap_token}}" id="pay-button" type="button" class="rounded-card btn btn-primary btn-block">Pilih Pembayaran</button>

                        </div>

                    </div>
                </div>

                <div class="col" id="data-jenazah">
                    <div class="card rounded-card shadow-sm">
                        <div class="card-header border-0 bg-transparent" style="border-radius: 1rem 1rem 0 0">
                            <strong>Informasi Jenazah</strong>
                        </div>
                        <div class="card-body">
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
                                                    <img class="img-fluid rounded" src="{{ $berita->foto }}" alt="" srcset="">
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
                            @endif
                        </div>
                    </div>
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
            onSuccess: function(result){
                ShowMessage('Transaksi Berhasil')
            },
            onPending: function(result){
                ShowMessage('Selesaikan Pembayaran')
            },
            onError: function(result){
                ShowMessage('Transaksi Error')
            }
        });
    });

    function ShowMessage(message) {
        alert(message);
        location.replace('/home')
    }
</script>

    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
    <script>
        $('.tour').click(function (e) { 
            e.preventDefault();
            tourWebsite()
        });

        function tourWebsite() {
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
            // intro.start();
        }
    </script>
@endpush