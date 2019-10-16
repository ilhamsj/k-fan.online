@extends('layouts.master')

@section('content')

    {{-- Product --}}
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
                                Login
                            </a>
                            <a href="" class="btn btn-primary btn-block rounded-pill">
                                Register
                            </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section class="my-6" id="service">
        <div class="container">
            <div class="row">
                <div class="col-10 m-auto text-center mb-4">
                    <i class="fas fa-star fa-2x"></i>
                    <div class="my-2"></div>
                    <h2>OUR <span class="text-primary">SERVICE</span> </h2>
                    <p class="lead d-none d-md-block">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos laborum, ut nulla dolore eveniet recusandae assumenda, ducimus odio
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

    {{-- Service --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-12">
                    <i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>
                    <h2>OUR <span class="text-primary">PRODUCT</span> </h2>
                    <p class="lead d-none d-md-block">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos laborum, ut nulla dolore eveniet recusandae assumenda, ducimus odio
                    </p>
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
            </div>
        </div>
    </section>

    {{-- Service --}}
    <section class="my-6">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-12">
                    <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                    <div class="my-2"></div>

                    <h2>REST IN <span class="text-primary">PEACE</span></h2>
                    <p class="lead">
                        Turut berduka cita atas meninggalnya
                    </p>
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>
                <div class="col-6 col-md mb-4">
                    <img class="img-fluid rounded" data-src="holder.js/225x281?random=yes&auto=yes&textmode=exact" alt="">              
                </div>

                <div class="col-12 text-right">
                    <a href="#" class="btn btn-sm btn-primary shadow-sm">
                        Show more
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
                    <h2>Ready to <span class="text-primary">join with us ?</span></h2>
                    <div class="my-4"></div>
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
    </script>
@endpush