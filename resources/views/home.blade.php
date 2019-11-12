@extends('layouts.app')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm">
                    <div class="card">
                        <div class="card-header border-0">
                            <strong>
                                Profil
                            </strong>
                        </div>
                        <div class="card-body">
                            <p>
                                Nama <br/>
                                <strong>{{ Auth::user()->name }}</strong>
                            </p>
                            <p>
                                Email <br/>
                                <strong>
                                    {{ Auth::user()->email }}
                                </strong>
                            </p>
                            <div>
                                <a href="{{ route('password.request') }}">Ganti Sandi</a>
                            </div>
                        </div>
                        <div class="card-header bg-transparent border-0 text-right">
                            <strong class="">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                History Transaksi
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Paket</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                
                                    <tbody>
                                        @foreach (Auth::user()->transaksi as $item)
                                        <tr>
                                            <td>{{ $no++}}</td>
                                            <td>{{ $item->paket->nama }}</td>
                                            <td>{{ $item->rupiah($item->jumlah) }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if ($item->status == 'capture' || $item->status == 'settlement')
                                                    <span class="badge badge-success">{{ $item->status}}</span>
                                                @elseif($item->status == 'pending')
                                                    <span class="badge badge-info">{{ $item->status}}</span>
                                                @else 
                                                    <span class="badge badge-danger">{{ $item->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 'capture' || $item->status == 'settlement')
                                                    <a class="badge badge-primary" href="https://wa.me/6289666445551?text=Konfirmasi Order {{$item->id}}" target="_blank">Konfirmasi Pembayaran</a>
                                                @elseif($item->status == 'pending')
                                                    <a class="badge badge-primary" href="{{ route('transaksi.show', $item->id) }}">Selesaikan Pembayaran</a>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    
    $(document).ready(function() {
            $('table').DataTable();
        });
        </script>
@endpush