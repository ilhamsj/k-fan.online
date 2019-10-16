@extends('layouts.master')

@section('content')

    {{-- Welcome Page --}}
    <section class="my-6">
        <div class="container">
            <div class="row h-100-kfan align-items-center">
                <div class="col-12 col-md-5">
                    <h1 class="text-primary display-1a">
                        Kami hadir untuk meringankan beban bagi keluarga yang ditinggal.
                    </h1>
                    <p>
                        Bergabung bersama Kfan sekarang !
                    </p>
                    <div class="my-4"></div>
                    <a href="" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                        Daftar
                    </a>
                    <a href="" class="btn btn-primary btn-block rounded-pill">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center text-center">

                <div class="col-12">
                    <i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>PRODUK & <span class="text-primary">JASA</span> </h2>
                    <p class="lead">
                        Produk dan jasa yang kami tawarkan
                    </p>
                </div>

                <div class="col-6 col-md mb-4 produk-jasa">
                    <div class="card border-0 rounded">
                        <img class="card-img-top img-fluid rounded" src="https://images.unsplash.com/photo-1561126841-3e34af7b2804?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=281&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=225" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-wrap flex-row-reverse">
                            <div class="card-body bg-dark align-self-start col-4 col-sm-6 d-none d-md-block" style="border-radius:0 0.25rem 0">
                                <strong class="text-light">
                                    1000+
                                </strong>
                            </div>
                            <div class="card-body bg-dark align-self-end col-4 col-sm-12 d-none d-md-block rounded-bottom">
                                <strong class="text-light">
                                    Rumah Duka
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>

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
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" src="{{ secure_url('images/3-columns (1).jpg') }}" alt="" srcset="">
                        <div class="card-body">
                            <h3>
                                Paket Bronze
                            </h3>
                            <span class="text-muted">$50</span>
                            <p class="text-muted">
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                            </p>
                            <a href="" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                         </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" src="{{ secure_url('images/3-columns (1).jpg') }}" alt="" srcset="">
                        <div class="card-body">
                            <h3>
                                Paket Bronze
                            </h3>
                            <span class="text-muted">$50</span>
                            <p class="text-muted">
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                            </p>
                            <a href="" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                         </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" src="{{ secure_url('images/3-columns (1).jpg') }}" alt="" srcset="">
                        <div class="card-body">
                            <h3>
                                Paket Bronze
                            </h3>
                            <span class="text-muted">$50</span>
                            <p class="text-muted">
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                            </p>
                            <a href="" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                         </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" src="{{ secure_url('images/3-columns (1).jpg') }}" alt="" srcset="">
                        <div class="card-body">
                            <h3>
                                Paket Bronze
                            </h3>
                            <span class="text-muted">$50</span>
                            <p class="text-muted">
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                Lorem ipsum dolor sit amet consectetur <br/> 
                            </p>
                            <a href="" class="btn btn-outline-primary btn-primary-kfan btn-block rounded-pill">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Berita Duka --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>BERITA <span class="text-primary">DUKA</span></h2>
                    <p class="lead">
                        Turut berduka cita atas meninggalnya
                    </p>
                </div>
                
                <div class="col-6 col-md-3 my-2 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="https://images.unsplash.com/photo-1537743708445-618780d77fbf?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=562&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=450" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-row-reverse align-items-end">
                            <div class="card-body rounded-bottom bg-golden op-lg bg-dark collapse" style="opacity: 0.9">
                                <a href="">
                                    <strong class="text-light">
                                        Kocheang
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 my-2 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="https://images.unsplash.com/photo-1537743708445-618780d77fbf?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=562&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=450" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-row-reverse align-items-end">
                            <div class="card-body rounded-bottom bg-golden op-lg bg-dark collapse" style="opacity: 0.9">
                                <a href="">
                                    <strong class="text-light">
                                        Kocheang
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 my-2 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="https://images.unsplash.com/photo-1537743708445-618780d77fbf?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=562&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=450" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-row-reverse align-items-end">
                            <div class="card-body rounded-bottom bg-golden op-lg bg-dark collapse" style="opacity: 0.9">
                                <a href="">
                                    <strong class="text-light">
                                        Kocheang
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 my-3 berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="https://images.unsplash.com/photo-1537743708445-618780d77fbf?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=562&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=450" alt="" srcset="">
                        <div class="card-img-overlay p-0 d-flex flex-row-reverse align-items-end">
                            <div class="card-body rounded-bottom bg-golden op-lg bg-dark collapse" style="opacity: 0.9">
                                <a href="">
                                    <strong class="text-light">
                                        Kocheang
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-right">
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                        Lihat Semuanya
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
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
                    <a href="" class="btn btn-primary rounded-pill">Gabung</a>
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
            /* background-image: url('/images/photo-1455819760800-d2aa223b237a.jpg'); */
            background-image: url(https://images.unsplash.com/photo-1503745328377-1f4355a2284b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80);
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

        .my-6 {
            margin: 0 0 20vh 0;
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
        console.log('helo');
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

        var a = [1,2,3];
        a.forEach(element => {
            var x = $('.produk-jasa').first().clone();
            $(x).appendTo($('.produk-jasa').parent(this));
        });

    </script>
@endpush