<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Vmale | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{URL::asset('plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{URL::asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{URL::asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{ route('index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>V</b>F</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Vmale</b>Fashion</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ URL::to('/dist/img/user.png') }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->nama }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{ URL::to('/dist/img/user.png') }}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->nama }}
                    <small>{{Auth::user()->get_peran->Nama_Peran}}</small>
                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ route('profil-pegawai') }}" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Keluar
                       onclick="event.preventDefault(); 
                           document.getElementById('logout-form').submit();">

                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ URL::to('/dist/img/user.png') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->nama }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <?php if (Auth::user()->ID_Peran == 1) : ?> <li><a href="{{ url()->previous() }}"> Kembali</a></li> <?php endif; ?>
          <?php if (Auth::user()->ID_Peran == 3) : ?>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i><span>Barang</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('barang.index') }}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
                <li><a href="{{ route('barang.create') }}"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
                <li><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Daftar Kategori</a></li>
                <li><a href="{{ route('kategori.create') }}"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>
              </ul>
            </li>
            <li><a href="{{ route('transaksi.index') }}"><i class="fa fa-money"></i> <span>Transaksi</span></a></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-thumbs-up"></i> <span>Rekomendasi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('rekomendasiLama') }}"><i class=" fa fa-circle-o"></i> Rekomendasi Lama</a></li>
                <li><a href="{{ route('tampilApriori') }}"><i class="fa fa-circle-o"></i> Rekomendasi baru</a></li>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>Pekerja</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('pegawai.index') }}"><i class=" fa fa-circle-o"></i> Daftar Pegawai</a></li>
                <li><a href="{{ route('pegawai.create') }}"><i class="fa fa-circle-o"></i> Tambah Pegawai</a></li>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="{{ route('LaporanBulanan') }}"><i class="fa fa-circle-o"></i> Laporan Pendapatan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bulanan</a></li>
                <li><a href="{{ route('LaporanTahunan') }}"><i class="fa fa-circle-o"></i> Laporan Pendapatan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahunan</a></li>
               
              </ul>
            </li>
          <?php else : ?>

          <?php endif; ?>

          <?php if (Auth::user()->ID_Peran == 2) : ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i><span>Barang</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('barang.index') }}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
                <li><a href="{{ route('barang.create') }}"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
                <li><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Daftar Kategori</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>
              </ul>
            </li>
            <li><a href="{{ route('transaksi.index') }}"><i class="fa fa-money"></i> <span>Transaksi</span></a></li>

          <?php else : ?>

          <?php endif; ?>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>