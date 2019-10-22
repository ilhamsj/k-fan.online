@extends('layouts.master')

@section('content')
    <section class="bg-transparent">
        <div class="container p-4">
            <div class="row justify-content-center" style="min-height:100vh">
                <div class="col-12 col-md mb-4">
                    <div style="border-radius:1rem" class="card border-0 shadow-sm">
                        <img style="border-radius: 1rem 1rem 0 0" class="card-img-top" data-src="holder.js/300x200?auto=yes&random=yes&textmode=exact" alt="" srcset="">
                        <div class="card-body bg-transparent">

                            <div class="row">
                                <div class="col">
                                    <h4>Informasi Paket</h4>
                                    @foreach ($item->paketproduk as $paket)
                                        <p class="text-muted">
                                            <i class="fa fa-check-circle text-primary" aria-hidden="true"></i>
                                            {{$paket->produk->nama}}
                                        </p>
                                    @endforeach
                                </div>                                
                            </div>

                        </div>
                        <div class="card-body">
                            
                                <h4>Deskripsi Paket</h4>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi provident eaque quidem dolores qui veniam voluptatem natus fugit architecto, repellat cum magnam praesentium non, hic corporis quasi quae eum aut.
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-4">
                    <div style="border-radius:1rem" class="card shadow-sm border-0">
                        <div class="card-body">
                            <h3>
                                Paket {{$item->nama}}
                            </h3>
                            {{ number_format($item->harga - ($item->diskon/100*$item->harga),2,',','.') }}
                        </div>
                        <div class="card-body">
                            <h4>
                                Data Jenazah
                            </h4>

                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            </p>

                            <form action="{{ route('transaksi.store') }}" method="POST">
                              @csrf

                              <input type="text" name="id" value="{{ 'T' . date('dmYHis') }}" hidden>
                              <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') ? old('user_id') : Auth::user()->id }}" hidden>
                              <input id="paket_id" type="number" class="form-control @error('paket_id') is-invalid @enderror" name="paket_id" value="{{ old('paket_id') ? old('paket_id') : $item->id }}" hidden>
                              <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') ? old('jumlah') : $item->harga }}" hidden>

                              <div class="form-group">
                                  <label for="catatan"> Catatan </label>
                                  <input id="catatan" type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" value="{{ old('catatan') ? old('catatan') :  \Faker\Factory::create()->name . ' wafat gan' }}">
              
                                  @error('catatan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <button type="submit" class="btn btn-primary btn-block rounded-pill shadow-sm" id="transaksiBaru">Order</button>    
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('nav').first().addClass('border-bottom');
    </script>
@endpush