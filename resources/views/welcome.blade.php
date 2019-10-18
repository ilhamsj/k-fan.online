@extends('layouts.master')

@section('content')

    {{-- Welcome Page --}}
    <section class="my-6">
        <div class="container">
            <div class="row h-100-kfan justify-content-center">
                <div class="col-12 col-md-10 text-center align-self-end">
                    <h1 class="text-primary display-1a">
                        Kami hadir untuk meringankan beban bagi keluarga yang ditinggal.
                    </h1>
                    Bergabunglah bersama K-FAN sekarang !
                    <div class="my-4"></div>
                </div>
                <div class="col-12 col-md-4 text-center align-self-start">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                            Daftar
                        </a>
                    @else 
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                            Tingkatkan Akun
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    {{-- Produk & Jasa --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-12">
                    <i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>PRODUK & <span class="text-primary">JASA</span> </h2>
                    <p class="lead">
                        Produk dan jasa yang kami tawarkan
                    </p>
                </div>

                @foreach ($produks as $item)                
                <div class="col-6 col-md-3 mb-4 produk-jasa">
                    <div class="card border-0 rounded">
                        <img class="card-img-top img-fluid rounded" data-src="holder.js/300x450?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-wrap flex-row-reverse">
                            <div class="card-body bg-dark align-self-start col-4 col-sm-6 d-none d-md-block" style="border-radius:0 0.25rem 0">
                                <strong class="text-light">
                                    1000+
                                </strong>
                            </div>
                            <div class="card-body bg-dark align-self-end col-4 col-sm-12 d-none d-md-block rounded-bottom">
                                <strong class="text-light">
                                    {{$item->nama}}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Layanan --}}
    <section class="my-6" id="service">
        <div class="container">
            <div class="row">
                <div class="col-10 m-auto text-center mb-4">
                    <i class="fas fa-star fa-2x"></i>
                    <div class="my-2"></div>
                    <h2>PAKET <span class="text-primary">PEMAKAMAN</span> </h2>
                    <p class="lead">
                        Pilih paket yang dibutuhkan
                    </p>
                </div>

                @foreach ($pakets as $item)
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" data-src="holder.js/300x200?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-header bg-transparent">
                            <span class="text-muted">${{$item->harga}}</span>
                            <h3>
                                {{$item->nama}}
                            </h3>
                        </div>
                        <div class="card-body">

                            @foreach ($item->paketproduk as $paket)
                                <p class="text-muted">
                                    <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                    {{$paket->produk->nama}}
                                </p>
                            @endforeach

                            <a href="{{ route('paket.show', $item->id) }}" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                         </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Berita Duka --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-12 text-center">
                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>BERITA <span class="text-primary">DUKA</span></h2>
                    <p class="lead">
                        Turut berduka cita atas meninggalnya
                    </p>
                </div>

                @foreach ($produks as $item)                                
                <div class="col-6 col-md-3 mb-4 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" data-src="holder.js/300x360?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex align-items-end">
                            <div class="card-body rounded-bottom bg-golden op-lg bg-dark text-light collapse" style="opacity: 0.7">
                                
                                    <a href="" class="text-light">
                                <strong>
                                    Si Meng
                                </strong>
                                <div class="" style="font-size: 0.8rem">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    {{ date('d M Y') }} - {{ date('d M Y') }}<br>
                                    
                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                        Yogyakarta, Bantul
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md text-right">
                    <a href="#" class="">
                        Tampilkan semuanya
                        <i class="fas fa-arrow-alt-circle-right    "></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section class="bg-image">
        <div class="container">
            <div class="row h-50-kfan align-items-center text-center">
                <div class="col text-light">
                    <h2>Persiapkan dirimu <span class="text-primary">Sekarang</span></h2>
                    <p>
                        Bagi dunia, mungkin Kamu adalah miliarder, selebriti atau tokoh penting lainnya. 
                        <br/>Namun, bagi Malaikat Maut, Kamu tidak lain hanyalah nama yang telah terdaftar
                    </p>
                    <div class="my-4"></div>
                    <a href="" class="btn btn-primary rounded-pill">
                       Upgrade Akun
                       <i class="fas fa-level-up-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .h-100-kfan {min-height: 100vh}
        .h-50-kfan {min-height: 50vh}
        .bg-image {
            background-image: url('/images/photo-1455819760800-d2aa223b237a.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center
        }
        h1, h2, h4, h5, h6 {
            font-weight: bold
        }

        .btn-primary-kfan {
            border: 4px solid
        }

        .display-1a {
            font-size: 29px;
            font-weight: 700;
            line-height: 42px;
        }

        .rounded-sm {
            border-radius:1rem;
        }

        .rounded-img-sm {
            'border-radius: 1rem 1rem 0 0;
        }
        
    </style>
@endpush
@push('scripts')
    <script>
        $('nav').first().addClass('fixed-top');

        $(window).scroll(function () { 
            if ($(document).scrollTop() > 50) {
                $('nav').hide()
            } else {
                $('nav').show()
            }
        });

        $('#service').find('.card').hover(function () {
                $(this).addClass('shadow');
            }, function () {
                $(this).removeClass('shadow');
            }
        );
        $('.berita-duka').hover(function () {
                $(this).find('.collapse').slideToggle()
            }, function () {
                $(this).find('.collapse').slideToggle();
            }
        );
    </script>
@endpush