@extends('layouts.master')

@section('content')
{{-- <hr> --}}
    <section class="py-4 bg-gradient-success">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="card shadow border-0">
                        <div class="card-header bg-dark">
                            <strong class="text-light">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                Profil
                            </strong>        
                        </div>
                        <div class="card-body">                
                            <div>
                                Nama
                                <h4>
                                    {{ Auth::user()->name }}
                                </h4>
                            </div>
                            <div>
                                Email
                                <h4>
                                    {{ Auth::user()->email }}
                                </h4>
                            </div>
                            <div>
                                <a href="">Edit akun <i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('password.request') }}">Ganti Password <i class="fas fa-pencil-alt"></i></a>
                            </div>
                        </div>
                        <div class="card-header bg-success">
                            <strong class="text-light">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                History Transaksi
                            </strong>
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