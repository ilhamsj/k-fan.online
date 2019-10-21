@extends('layouts.master')

@section('content')
{{-- <hr> --}}
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="card shadow">
                        <div class="card-header">
                            Profil
                        </div>
                        <div class="card-body">                
                            <div>
                                Nama<br/>
                                <strong>{{ Auth::user()->name }}</strong>
                            </div>
                            <div>
                                Email<br/>
                                <strong>{{ Auth::user()->email }}</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Paket</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th>Token</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                        @foreach (Auth::user()->transaksi as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->paket->nama }}</td>
                                            <td>{{ $item->rupiah($item->jumlah) }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->snap_token }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a data-token="{{ $item->snap_token }}" href="">Selesaikan Pembayaran</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });

        $('table').find('a').click(function (e) { 
            e.preventDefault();

            var x = $(this).attr('data-token');
            console.log(x);
            snap.pay(x);
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        });


        // function (data, status) {
        //     snap.pay(data.snap_token, {
        //         onSuccess: function (result) {
        //             location.reload();
        //         },
        //         onPending: function (result) {
        //             location.reload();
        //         },
        //         onError: function (result) {
        //             location.reload();
        //         }
        //     });
        // });
    </script>
@endpush