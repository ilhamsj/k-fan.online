@extends('layouts.auth')

@section('content')
    <section class="bg-gradient-success">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height:100vh">

                <div class="col-12 col-md-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0 ">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" data-src="holder.js/300x200?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-body bg-transparent">
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
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <div class="card-body">
                            <h3> 
                                Data Jenazah
                            </h3>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Tenetur vero aperiam voluptas at inventore similique? 
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama"> Nama </label>
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') : '' }}">
                
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col">
                                        <label for="tanggal-lahir"> Tanggal Lahir</label>
                                        <input id="tanggal-lahir" type="date" class="form-control @error('tanggal-lahir') is-invalid @enderror" name="tanggal-lahir" value="{{ old('tanggal-lahir') }}">
                    
                                        @error('tanggal-lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="tanggal-wafat"> Tanggal Wafat</label>
                                        <input id="tanggal-wafat" type="date" class="form-control @error('tanggal-wafat') is-invalid @enderror" name="tanggal-wafat" value="{{ old('tanggal-wafat') }}">
                    
                                        @error('tanggal-wafat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong> {{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto"> Foto </label>
                                    <input id="foto" type="text" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') ? old('foto') : 'holder.js/225x281?random=yes&auto=yes&texmode=exact'}}" autocomplete="foto" autofocus>
                
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, perferendis non id aut ea dolorem maiores totam natus nobis ipsam aliquid quas voluptas illum alias quidem repellat, ullam, ex voluptates?
                                </label>
                                </div>
                            
                            </form>
                        </div>
                        <div class="card-body">
                        <a href="" class="btn btn-primary btn-block rounded-pill shadow-sm">
                            Pembayaran <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection