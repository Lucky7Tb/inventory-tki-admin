<!DOCTYPE html>
<html lang="en">
  <head>
    <title>  @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/web.png')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
  </head>
  <body class="header-fixed">
  <div class="preloader" id="preloader"></div>
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="{{url('/')}}">
          <img class="logo mr-4" src="{{asset('assets/images/web.png')}}" style="width:90px" alt="Logo">
          <img class="logo-mini" src="{{asset('assets/images/web.png')}}"  style="width:90px" alt="Logo">
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
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Notifications</h6>
                  <p class="dropdown-title-text">You have 4 unread notification</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                      <i class="mdi mdi-alert"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Storage Full</small>
                      <small class="content-text">Server storage almost full</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-success text-success">
                      <i class="mdi mdi-cloud-upload"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Upload Completed</small>
                      <small class="content-text">3 Files uploded successfully</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning">
                      <i class="mdi mdi-security"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Authentication Required</small>
                      <small class="content-text">Please verify your password to continue using cloud services</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
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
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Management data</span>
              <i class="mdi mdi-archive link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
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
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Transaksi</span>
              <i class="mdi mdi-basket link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
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
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script>
      const loading = document.getElementById("preloader");
      window.addEventListener("load", function () {
        loading.style.display = "none";
      });
     
        var BarData = {
          labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
          datasets: [{
            label: '# of Votes',
            data: [10, 19, 3, 5, 12, 3],
            backgroundColor: chartColors,
            borderColor: chartColors,
            borderWidth: 0
          }]
        };
        var barChartCanvas = $("#chartjs-bar-chart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas, {
          type: 'bar',
          data: BarData,
          options: {
            legend: false
          }
        });

         // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('6e49ca7b930fac5e00f3', {
          cluster: 'ap1',
          forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
        });
      
    </script>
    @stack('scripts')
  </body>
</html>