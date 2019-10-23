@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row h-50-kfan justify-content-center align-items-center">
            <div class="col">
                {{-- <h1 class="text-danger">You are currently not connected to any networks.</h1> --}}
                <h1 class="text-danger">Saat ini kamu tidak terkoneksi dengan internet</h1>
                <p>
                    Silahkan Hubungi kami via panggilan telfon
                </p>
                <a href="tel:089666445551" target="_blank">Telfon</a>
            </div>
        </div>
    </div>

@endsection