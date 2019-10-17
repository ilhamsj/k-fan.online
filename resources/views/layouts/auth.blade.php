<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paket Wisata & Rental Mobil Terpercaya - Travel Agency</title>
    <link rel="icon" href="{{ secure_asset('images/ic_launcher.png') }}" type="image/x-icon">
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/travel.css') }}">
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
  </body>
</html>