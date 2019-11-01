@extends('layouts.app')

@section('content')

    <section id="berita" class="py-4 my-4">
        <div class="container">
            <div class="row h-100-kfan align-items-center mb-4 justify-content-center">
                <div class="col-12 align-self-end">
                    <p class="lead">
                        Turut berduka cita atas meninggalnya
                    </p>
                </div>

                @foreach ($lelayu as $item)
                <div class="col-6 col-md-3 mb-4 align-self-start berita-duka">
                    <div class="card border-0">
                        <img class="card-img-top img-fluid rounded" src="{{ preg_match('/jpg|png|jpeg|gif|unsplash/', $item->foto) ? $item->foto : 'https://i.ibb.co/Wt7rX7K/RDJ-Tony-Stark-min-1.jpg' }}" alt="" srcset="">
                            <div class="card-body rounded-bottom px-0">
                                    <strong>
                                        <a href="">{{ $item->nama }}</a>
                                    </strong>
                                    <div class="" style="font-size: 0.8rem">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                            {{ \Carbon\Carbon::parse($item->lahir)->format('d M Y') }} -
                                            {{ \Carbon\Carbon::parse($item->wafat)->format('d M Y') }}
                                        <br>
                                        
                                        <a class="d-none d-md-block" target="_blank" href="https://www.google.co.in/maps/search/{{$item->alamat}}">
                                            <i class="fas fa-map-marked-alt"></i>
                                            {{ $item->alamat }}
                                        </a>
                                    </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        img {
            -webkit-filter: grayscale(1);
            -webkit-transition: all .3s;
            opacity: .8;
            cursor: pointer;
        }
        img:hover {
          -webkit-filter: none;
          -webkit-transition: all .3s;
            opacity: .8;
            cursor: pointer;
        }
    </style>
@endpush
@push('scripts')
    <script>
    </script>
@endpush