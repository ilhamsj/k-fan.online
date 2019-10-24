@extends('layouts.app')

@section('content')

    {{-- Welcome Page --}}
    <section class="bg-image-welcome border-bottom">
        <div class="container">
            <div class="row h-100-kfan justify-content-center">
                <div class="col-12 col-md-10 text-center align-self-end">
                    <h1 class="text-primary display-1a">
                        Kami hadir untuk meringankan beban bagi keluarga yang ditinggal.
                    </h1>
                    Bergabunglah bersama <strong>Kafan</strong> sekarang !
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
                        <a href="#service" class="d-none d-md-block btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                            Upacara Pemakaman
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    {{-- Produk & Jasa --}}
    <section class="py-4 my-4" id="produk">
        <div class="container">
            <div class="row h-100-kfan align-items-center justify-content-center text-center">
                <div class="col-12 align-self-end">
                    <i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>PRODUK & <span class="text-primary">JASA</span> </h2>
                    <p class="lead">
                        Produk dan jasa yang kami tawarkan
                    </p>
                </div>

                @foreach ($produks as $item)                
                <div class="col-6 col-md-3 mb-4 produk-jasa  align-self-start">
                    <div class="card border-0 rounded">
                        <img class="card-img-top img-fluid rounded" src="{{$item->foto ? $item->foto : 'holder.js/300x450?auto=yes&random=yes&textmode=exact'}}" alt="" srcset="">
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

    {{-- Layanan --}}
    <section id="service" class="py-4 my-4 bg-light bg-image-paket">
        <div class="container">
            <div class="row">
                <div class="col-10 m-auto text-center mb-4">
                    <i class="fas fa-star fa-2x"></i>
                    <div class="my-2"></div>
                    <h2>PAKET <span class="text-primary">PEMAKAMAN</span> </h2>
                    <p class="lead">
                        Beragam paket pilihan paket untuk upacara pemakaman
                    </p>
                </div>

                @foreach ($pakets as $item)
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" src="{{ $item->foto }}" alt="" srcset="">
                        <div class="card-body">
                            <span class="text-muted" style="text-decoration: line-through">{{ number_format($item->harga,2,',','.') }}</span>
                            <strong class="text-muted">| {{ number_format($item->harga - ($item->diskon/100*$item->harga),2,',','.') }}</strong>
                            <h3>
                                Paket {{$item->nama}}
                            </h3>
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
    <section id="berita" class="py-4 my-4">
        <div class="container">
            <div class="row align-items-center mb-4 justify-content-center">
                <div class="col-12 text-center">
                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>BERITA <span class="text-primary">DUKA</span></h2>
                    <p class="lead">
                        Turut berduka cita atas meninggalnya
                    </p>
                </div>

                @foreach ($lelayu as $item)                                
                <div class="col-6 col-md-3 mb-4 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="{{ $item->foto }}" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex align-items-end">
                            <div class="card-body rounded-bottom bg-light collapse">
                                
                                    <strong>
                                        <a href="">{{ $item->nama }}</a>
                                    </strong>
                                    <div class="" style="font-size: 0.8rem">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                        {{ \Carbon\Carbon::parse($item->lahir)->format('d M Y') }} -
                                        {{ \Carbon\Carbon::parse($item->wafat)->format('d M Y') }}
                                        <br>
                                        
                                        <i class="fas fa-map-marked-alt    "></i>
                                        {{ $item->alamat }}
                                    </div>
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

    <hr>

    <section class="py-4 my-4" id="payment-list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="lead text-center">
                        Beragam pilihan cara pembayaran yang mempercepat proses pemakaman
                    </p>
                </div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/bca.svg" alt="Pembayaran via BCA"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/mandiri.svg" alt="Pembayaran via Mandiri"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/bni.svg" alt="Pembayaran via BNI"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/bri.svg" alt="Pembayaran via BRI"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/bii.svg" alt="Pembayaran via BII"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/cimb.svg" alt="Pembayaran via CIMB NIAGA"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/alto.svg" alt="Pembayaran via ALTO"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/atm-bersama.svg" alt="Pembayaran via ATM BERSAMA"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/paypal.svg" alt="Pembayaran via PAYPAL"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/indomart.svg" alt="Pembayaran via Indomart"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/alfamart.svg" alt="Pembayaran via Alfamart"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/pegadaian.svg" alt="Pembayaran via Pegadaian"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/pos.svg" alt="Pembayaran via POS"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/ovo.svg" alt="Pembayaran via OVO"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/gopay.svg" alt="Pembayaran via GoPay"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/visa.svg" alt="Pembayaran via Visa Card"></div>
                <div class="col-3 col-md-2 mb-4 py-4"><img class="img-fluid" src="https://www.niagahoster.co.id/assets/images/2019/payment-gateway/master.svg" alt="Pembayaran via Master Card"></div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section class="bg-image py-4 mt-4">
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
        .bg-image {
            background-image: url('https://images.unsplash.com/photo-1517405030045-45f7ad942106?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1349&h=400&fit=crop&ixid=eyJhcHBfaWQiOjF9');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center
        }

        .bg-image-welcome {
            background-image: url('https://beyond.life/bottom-mascot-waving-b0eb6ff60b3db3776209faa5822b419a.webp');
            background-repeat: no-repeat;
            background-size: auto;
            background-attachment: fixed;
            background-position: bottom
        }

        .bg-image-paket {
            background-image: url('https://beyond.life/mascot-hand-desktop-bb4d836093b0b0958fe7f69f7f56e08c.png');
            background-repeat: no-repeat;
            background-size: auto;
            background-attachment: scroll;
            background-position: bottom right;
        }

        .btn-primary-kfan {
            border: 4px solid
        }

        .display-1a {
            font-size: 29px;
            font-weight: 700;
            line-height: 42px;
        }      
        
        #payment-list img {
            /* -webkit-filter: grayscale(1); */
            /* -webkit-transition: all .3s; */
            opacity: .8;
            cursor: pointer;
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