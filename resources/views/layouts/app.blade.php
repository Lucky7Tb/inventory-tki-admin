<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
  </head>
  <body class="header-fixed">
  <div class="preloader" id="preloader"></div>
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="{{url('/')}}">
          <img class="logo mr-4" src="{{asset('assets/images/inventorylogo.png')}}" style="width:90px" alt="Logo">
          <img class="logo-mini" src="{{asset('assets/images/inventorylogo.png')}}"  style="width:90px" alt="Logo">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <ul class="nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline mdi-1x"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right"  id="notificationDropdown" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Notifikasi</h6>
                  <p class="dropdown-title-text"></p>
                </div>
                <div class="dropdown-body">
                </div>
                <div class="dropdown-footer">
                  <a href="{{route('borrowing')}}">View All</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-body">
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{asset('assets/images/profile/male/image_1.png')}}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{Auth::user()->name}}</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="{{url('/')}}">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="#management" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Management data</span>
              <i class="mdi mdi-archive link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="management">
              <li>
                  <a href="{{route('item')}}">Barang</a>
              </li>
              <li>
                <a href="{{route('item_category')}}">Kategori barang</a>
              </li>
              <li>
                  <a href="{{route('room')}}">Ruangan</a>
              </li>
              <li>
                  <a href="{{route('student')}}">Siswa</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#transaksi" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Transaksi</span>
              <i class="mdi mdi-basket link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="transaksi">
              <li>
                <a href="{{route('borrowing')}}">Peminjaman</a>
              </li>
              <li>
                <a href="{{route('returning')}}">Pengembalian</a>
              </li>
            </ul>
          </li>
          <li>
            <a  href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item">
              <span class="link-title">{{ __('Logout') }}</span>
              <i class="mdi mdi-logout link-icon"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            @yield('content')
          </div>
      </div>
    </div>
    <script src="{{asset('assets/vendors/js/core.js')}}"></script>
    <script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/charts/chartjs.addon.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
      const loading = document.getElementById("preloader");
      window.addEventListener("load", function () {
        loading.style.display = "none";
      });
    </script>
    @stack('scripts')
  </body>
</html>