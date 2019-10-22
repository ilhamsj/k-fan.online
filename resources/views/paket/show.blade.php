@extends('layouts.master')

@section('content')
    <section class="bg-gradient-info">
        <div class="container p-4">
            <div class="row justify-content-center" style="min-height:100vh">
                <div class="col-12 col-md mb-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0 ">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" data-src="holder.js/300x200?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-body bg-transparent">
                                <span class="text-muted" style="text-decoration: line-through">{{ number_format($item->harga,2,',','.') }}</span>
                                <strong class="text-muted">| {{ number_format($item->harga - ($item->diskon/100*$item->harga),2,',','.') }}</strong>
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
                
                <div class="col-12 col-md-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <div class="card-body">
                            <h3> 
                                Data Jenazah
                            </h3>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Tenetur vero aperiam voluptas at inventore similique? 
                        </div>
                        <div class="card-body">
                            <form action="{{ route('transaksi.store') }}" method="POST">
                              @csrf

                              <input type="text" name="id" value="{{ 'T' . date('dmYHis') }}">
                              <div class="form-group">
                                  <label for="user_id"> user_id </label>
                                  <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') ? old('user_id') : Auth::user()->id }}">
              
                                  @error('user_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="form-group">
                                  <label for="paket_id"> paket_id </label>
                                  <input id="paket_id" type="number" class="form-control @error('paket_id') is-invalid @enderror" name="paket_id" value="{{ old('paket_id') ? old('paket_id') : $item->id }}">
              
                                  @error('paket_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="form-group">
                                  <label for="jumlah"> jumlah </label>
                                  <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') ? old('jumlah') : $item->harga }}">
              
                                  @error('jumlah')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>

                              <div class="form-group">
                                  <label for="catatan"> catatan </label>
                                  <input id="catatan" type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" value="{{ old('catatan') ? old('catatan') :  \Faker\Factory::create()->name . ' wafat gan' }}">
              
                                  @error('catatan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <button type="submit" class="btn btn-primary btn-block rounded-pill shadow-sm" id="transaksiBaru">Bayar</button>    
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection