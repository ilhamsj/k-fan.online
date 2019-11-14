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

  <title>Admin - Pusat Urusan Kematian Yogyakarta</title>
  <link rel="stylesheet" href="{{ secure_url('css/app.css') }}">
  @stack('styles')
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
      
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-chart-area"></i>
        </div>
        <div class="sidebar-brand-text mx-3">K-FAN <sup>2</sup></div>
      </a>
      
      @php
        $menu = [
            0 => [
                'title' => 'dashboard',
                'icon' => 'fas fa-fw fa-tachometer-alt',
                'color' => 'border-left-info',
                'link'  => route('admin.home')
            ],
            1 => [
                'title' => 'user',
                'icon' => 'fa fa-user',
                'color' => 'border-left-info',
                'link'  => route('admin.user')
            ],
            2 => [
                'title' => 'produk',
                'icon' => 'fa fa-table',
                'color' => 'border-left-info',   
                'link'  => route('admin.produk')
            ],
            3 => [
                'title' => 'paket',
                'icon' => 'fa fa-table',
                'color' => 'border-left-info',
                'link'  => route('paket.index')
            ],
            4 => [
                'title' => 'transaksi',
                'icon' => 'fas fa-dollar-sign',
                'color' => 'border-left-info',
                'link'  => route('admin.transaksi')
            ],
            5 => [
                'title' => 'berita duka',
                'icon' => 'fa fa-circle',
                'color' => 'border-left-info',
                'link'  => route('admin.lelayu')
            ],
        ];
      @endphp

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      @foreach ($menu as $item)
        <li class="nav-item {{ url()->current() == $item['link'] ? 'active' : '' }}">
          <a class="nav-link" href="{{ $item['link'] }}">
            <i class="{{ $item['icon'] }}"></i>
            <span>{{ Str::title($item['title']) }}</span></a>
        </li>
      @endforeach

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1" id="">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="jumlah_notifikasi">9999</span>
              </a>
              <div id="notifikasi_items" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <div></div>
                {{-- <a class="dropdown-item text-center small text-gray-500" href="#"></a> --}}
              </div>
            </li>
            @auth
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  {{ Str::title(Auth::user()->name) }}
                </span>
                <img class="img-profile rounded-circle" data-src="holder.js/60x60?random=yes&auto=yes&textmode=exact">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('home') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            @endauth

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if (session('status'))
              <div id="pesanSukses" class="alert alert-success" role="alert">
                  <strong>{{ session('status') }}</strong>
              </div>
          @endif

          <!-- Page Heading -->
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" id="logoutButton" href="">Logout</a>
          <form action="{{ route('logout') }}" id="logoutForm" method="post" class="d-none">
            @csrf
          </form>
        </div>

      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade border-0" id="modal_notifikasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Notifikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <ul>
            <li>Transaksi id : </li>
            <li>User : </li>
            <li>Paket : </li>
            <li>Jumlah : </li>
            <li>Jenazah : </li>
          </ul>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary btn-sm">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm">
            <i class="fa fa-ban" aria-hidden="true"></i>
          </button> --}}
        </div>
      </div>
    </div>
  </div>

  <audio id="myAudio">
    <source src="{{ secure_url('css/jarvis_incoming_mess.mp3')}}" type="audio/ogg">
  </audio>

  <script src="{{ secure_url('js/app.js') }}"></script>
  <script>
      $("#pesanSukses").delay(2500).slideUp(200, function() {
          $(this).alert('close');
      });

      $('#logoutButton').click(function (e) { 
        e.preventDefault();
        $('#logoutForm').submit();
      });
  </script>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('44c07d75b84acf6201e2', {
    //   cluster: 'ap1',
    //   forceTLS: true
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(response) {
    //   // alert(JSON.stringify(data));
    //   $('#myAudio')[0].play();
    //   console.log(response);
    //   $('#notifikasi_items > div > a').remove();
    //   notifikasi ()
    // });

  //   notifikasi ()

  // function notifikasi () {
  //     $.ajax({
  //     type: "GET",
  //     url: "{{ route('notifikasi') }}",
  //     success: function (response) {
  //       console.log(response);
        
  //       var notifikasi = $.map(response.data, function (value, index) {
  //         var abc =  $('#notifikasi_items > div').append('<a data-id="'+value.data.transaksi.id+'" data-notif="'+value.id+'" class="dropdown-item d-flex align-items-center" href="">'+value.data.user+', order paket '+value.data.paket+', status '+value.data.status+'</a>');
  //       });

  //       $('#jumlah_notifikasi').text(response.jumlah); 
  //     }
  //   });
  // }

  
  $(document).on('click', '#notifikasi_items > div > a', function (e) {
      e.preventDefault()
      var abc = $(this).attr('data-id');

      let notifikasi = $(this).attr('data-notif');
      $('#modal_notifikasi').modal('show');

      let url = "{{ route('pembayaran.show', [111111, 99999999999999999])}}";
      let url_baru = url.replace("111111", abc).replace('99999999999999999', notifikasi);

      $.ajax({
        type: "GET",
        url: url_baru,
        success: function (response) {
          var transaksi = $('#modal_notifikasi').find('ul > li:first-child').append(abc)
          var user      = transaksi.next().append(response.data.user.name)
          var paket     = user.next().append(response.data.paket.nama)
          var harga     = paket.next().append(response.data.jumlah)
          var jenazah   = user.next().append(response.data.berita.nama)
          console.log(response);
        }
      });
  });

  $('#modal_notifikasi').on('hidden.bs.modal', function (e) {
    e.preventDefault()
    var transaksi = $('#modal_notifikasi').find('ul > li:first-child').append(" ")
    var user      = transaksi.next().append(" ")
    var paket     = user.next().append(" ")
    var harga     = paket.next().append(" ")
    var jenazah   = user.next().append(" ")
    $('#notifikasi_items > div > a').remove();
      notifikasi ()
  });

  </script>
  @stack('scripts')
</body>

</html>
