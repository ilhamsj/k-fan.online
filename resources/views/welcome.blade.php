@extends('layouts.master')

@section('content')

    {{-- Product --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col">
                    <h1>Before I die</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi quia perspiciatis vitae placeat commodi iste accusamus, illo maiores atque temporibus nostrum eum omnis consequuntur facilis esse maxime voluptatibus voluptates suscipit.
                    </p>
                    <div class="btn btn-primary">Login</div>
                    <div class="btn btn-primary">Register</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Promotional --}}
    <section>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col">
                    <img class="img-fluid" data-src="holder.js/1349x400?random=yes&auto=yes&textmode=exact" alt="">
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col">
                    
                    <h2>OUR <span class="text-primary">SERVICE</span> </h2>
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col"><h2>OUR <span class="text-primary">PRODUCT</span> </h2></div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col"><h2>OUR <span class="text-primary">CLIENTS SAY</span> </h2></div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col"><h2>Ready to <span class="text-primary">join with us ?</span> </h2></div>
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