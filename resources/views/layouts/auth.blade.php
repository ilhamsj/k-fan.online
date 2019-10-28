<!DOCTYPE html>
<html lang="en">
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
    <link rel="icon" href="{{ secure_asset('images/ic_launcher.png') }}" type="image/x-icon">
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
</head>
  <body>
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>
                {{ Str::title(session('status')) }}
            </strong> 
        </div>
      @endif
    @yield('content')

    <script src="{{ secure_url('js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>