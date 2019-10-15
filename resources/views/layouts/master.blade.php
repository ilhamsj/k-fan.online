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

  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <strong>When i die</strong>
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
          <h5>CONTACT US</h5>
          <p>
            <strong>Address</strong> <br/>
            ipsum dolor sit amet consectetur adipisicing elit. 
          </p>
          <p>
            <strong>Phone</strong> <br/>
            6289666445551
          </p>
        </div>
        <div class="col-12 col-md mb-4">
          <div class="row">
            <div class="col-12"><h5>GALLERY</h5></div>
            <div class="col mb-4">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
            <div class="col">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
            <div class="col mb-4">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
            <div class="w-100"></div>
            <div class="col mb-4">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
            <div class="col mb-4">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
            <div class="col mb-4">
                <img class="img-fluid" data-src="holder.js/400x400?random=yes&auto=yes&textmode=exact" alt="">              
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <h5>NEWSLETTER</h5>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem non fuga molestiae
          <div class="form-group">
            <label for="">Enter your email</label>
            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="btn btn-primary">Submit</div>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-center">
        <div class="col">
            Copyright © 2019. All Rights Reserved
        </div>
        <div class="col text-right">
          <a href="">Blog</a>
          <a href="">About</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script src="{{ secure_url('js/admin.js') }}"></script>
  @stack('scripts')
</body>
</html>