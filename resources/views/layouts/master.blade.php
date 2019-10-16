<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pusat Urusan Kematian Yogyakarta - PUKJ</title>
    <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
    @stack('styles')
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-light bg-transparent py-4">
    <div class="container">
      <a class="navbar-brand" href="/">
        <strong>K-Fan.Online</strong>
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Clients Say</a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="#">Action 1</a>
                <a class="dropdown-item" href="#">Action 2</a>
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
            <i class="fa fa-map-marker" aria-hidden="true"></i>
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
        <div class="col">
            Made with <i class="fas fa-heart    "></i> in Yogyakarta
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
    $('nav').first().addClass('fixed-top');

    $(window).scroll(function () { 
        if ($(document).scrollTop() > 50) {
            $('nav').hide()
        } else {
            $('nav').show()
        }
    });
  </script>
  @stack('scripts')
</body>
</html>