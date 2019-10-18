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
                            <form action="{{ route('transaksi.store') }}" method="post">
                              @csrf

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
                            
                            </form>
                        </div>
                        <div class="card-body">

                        <button type="button" class="btn btn-primary btn-block rounded-pill shadow-sm" id="transaksiBaru">Bayar</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
      $('#transaksiBaru').click(function (e) { 
        e.preventDefault();
        $('section').find('form').submit();
      });
    </script>
@endpush