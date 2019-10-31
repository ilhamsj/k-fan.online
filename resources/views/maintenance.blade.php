<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Kafan | Layanan perawatan jenazah pertama di Jogja</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ilham Saputra Jati">
    <meta name="description" content="Kafan menghadirkan layanan perawatan jenazah pertama di Jogja.
    Pengguna dapat melakukan pemesanan untuk pemakaman keluarga, kerabat, atau teman.">
    <meta property="og:title"content="Kafan | Layanan perawatan jenazah pertama di Jogja" />
    <meta property="og:description"content="Kafan menghadirkan layanan perawatan jenazah pertama di Jogja.
    Pengguna dapat melakukan pemesanan untuk pemakaman keluarga, kerabat, atau teman." />
    @laravelPWA
    <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
    <style>
        .bg-image {
            background-image: url('https://beyond.life/bottom-mascot-waving-b0eb6ff60b3db3776209faa5822b419a.webp');
            background-repeat: no-repeat;
            background-size: auto;
            background-attachment: fixed;
            background-position: bottom
        }

    </style>
</head>
<body>
      <section class="bg-image">
          <div class="container">
              <div class="row justify-content-center align-items-center" style="min-height:100vh">
                  <div class="col-12 col-md-10 text-center">
                      <h1 class="text-info">
                          Please be patient,
                      </h1>
                      <p class="lead">
                        <strong>
                            we will be performing some <span class="btn-warning">upgrades</span> 
                            during this time service will be 
                            <span class="btn-warning">limited</span>
                        </strong>
                      </p>
                          <a target="_blank" href="http://bit.ly/kafan-alpha-test">Help survey here</a>
                  </div>
              </div>
          </div>
      </section>
  
        
    @yield('content')
  <script src="{{ secure_url('js/app.js') }}"></script>
</body>
</html>