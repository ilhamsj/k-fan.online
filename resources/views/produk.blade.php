@extends('layouts.app')

@section('content')
    <section class="py-4 my-4" id="produk">
      <div class="container">
          <div class="row">
              <div class="col-12 align-self-end">
                  <p class="lead">
                      Produk dan jasa yang kami tawarkan
                  </p>
              </div>
              @foreach ($produks as $item)
              <div class="col-6 col-md-3 mb-4 produk-jasa align-self-start">
                  <div class="card border-0 rounded">
                      <img class="card-img-top img-fluid rounded" src="{{ file_exists((public_path('images/produk/'.$item->foto ))) ? secure_url('images/produk', $item->foto) : $item->foto }}" alt="{{ $item->foto }}" srcset="">
                      <div class="card-img-overlay p-0 d-flex flex-wrap flex-row-reverse">
                          <div class="card-body bg-dark align-self-end col-12 rounded-bottom">
                              <strong class="text-light d-none d-md-block">
                                  {{$item->nama}}
                              </strong>
                              <span class="text-light d-block d-md-none" style="font-size: small">
                                  {{$item->nama}}
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>
@endsection