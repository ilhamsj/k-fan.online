<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pusat Urusan Kematian Yogyakarta - PUKJ</title>
    @laravelPWA
    <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
    @stack('styles')
    <style>
      .navbar-toggler {border:none}
      .h-100-kfan {min-height: 100vh}
      .h-50-kfan {min-height: 50vh}
      h1, h2, h4, h5, h6 {font-weight: bold}
      .rounded-sm {border-radius:1rem;}
      .rounded-card {border-radius:1rem;}
      .rounded-img-sm {border-radius: 1rem 1rem 0 0;}
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-transparent p-4">
    <div class="container">
      <a class="navbar-brand" href="/">
        <strong><span class="text-primary">Company</span> Name</strong>
      </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bg-primary icon-bar top-bar text"></span>
          <span class="bg-primary icon-bar my-1 middle-bar text" style="width:15px"></span>
          <span class="bg-primary icon-bar bottom-bar text"></span>		
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#produk">Produk & Jasa</a>
                <a class="dropdown-item" href="#service">Paket Pemakaman</a>
              </div>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#berita">Berita Duka</a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Str::title(Auth::user()->name) }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Panel</a>
                <a class="dropdown-item" id="logoutButton" href="#">Logout</a>
                <form action="{{ route('logout') }}" id="logoutForm" method="post" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
        
    @yield('content')

  <footer class="py-4">
    <div class="container">
      <div class="row">
        <div class="col mb-4">
          <h5>KONTAK KAMI</h5>
          <p>
            <strong>Alamat</strong> <br/>
            <i class="fas fa-map-marker-alt    "></i>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          </p>
          <p>
            <strong>Sosial Media</strong> <br/>
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
            6289666445551 <br/>
            <i class="fab fa-instagram" aria-hidden="true"></i>
            K-FAN
          </p>
        </div>
        <div class="col-12 col-md-4 mb-4">
          <h5>UPDATE INFORMASI</h5>
          <div class="form-group">
            <label for="">Daftarkan email kamu untuk mengetahui info tentang rilis aplikasi, acara, dan lainnya dari K-FAN</label>
            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <a href="" class="btn btn-primary">Submit</a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-center">
        <div class="col text-muted">
            Made with <i class="fas fa-heart"></i> in Yogyakarta
        </div>
        <div class="col text-right">
          <a href="">Peraturan Kebijakan</a>
          <a href="">Tentang Kami</a>
          <a href="">Bantuan</a>
          <a href="">Blog</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script>
    $('div > button').first().click(function (e) { 
    e.preventDefault();
        $('nav').toggleClass( 'bg-light bg-transparent', 5000);
    });

    $('#logoutButton').click(function (e) { 
      e.preventDefault();
      confirm('Apakah kamu yakin akan logout ?') ? $('#logoutForm').submit() : console.log('no');
    });

  </script>
  @stack('scripts')
</body>
</html>