@extends('layouts.master')

@section('content')

    {{-- Product --}}
    <section>
        <div class="container">
            <div class="row h-100-kfan align-items-center text-center">
                <div class="col">
                    <i class="fas fa-cog fa-4x fa-spin"></i>
                    <h1>BORN GROW DIE </h1>
                    <p class="lead">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, mollitia error distinctio perspiciatis, ratione velit molestias quas consequatur suscipit rerum dolorum praesentium culpa, ea dolor
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
            <div class="row h-100-kfan align-items-center justify-content-center text-center">
                <div class="col-10">
                    <h2>OUR <span class="text-primary">SERVICE</span> </h2>
                    <p class="lead">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, mollitia error distinctio perspiciatis, ratione velit molestias quas consequatur suscipit rerum dolorum praesentium culpa, ea dolor
                    </p>
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
            <div class="row h-50-kfan align-items-center text-center">
                <div class="col"><h2>Ready to <span class="text-primary">join with us ?</span> </h2>
                    <a href="" class="btn btn-primary rounded-pill">Grab this button</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .h-100-kfan {min-height: 100vh}
        .h-50-kfan {min-height: 50vh}
    </style>
@endpush
@push('scripts')
    <script>
        $('nav').first().addClass('fixed-top');
    </script>
@endpush