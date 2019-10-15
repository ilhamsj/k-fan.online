@extends('layouts.master')

@section('content')

    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col"><h1>Halaman Welcome</h1></div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .h-100-kfan {
          min-height: 100vh
        }
    </style>
@endpush
@push('scripts')
    <script>
        $('nav').first().addClass('fixed-top');
    </script>
@endpush