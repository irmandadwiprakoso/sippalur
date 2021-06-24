<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIP-PALUR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/AdminLTE/plugins/DataTables/DataTables/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.swal2-popup {
  font-size: 1.2rem !important;
}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>IP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIP</b>-PALUR</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <!-- <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> -->
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="
              @if(auth()->user()->role == 'user')
                {{auth()->user()->tkk->getFoto()}}
              @else
                /images/LogoKotaBekasi.png
              @endif"
              class="user-image" alt="User Image">
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="
              @if(auth()->user()->role == 'user')
                {{auth()->user()->tkk->getFoto()}}
              @else
              /images/LogoKotaBekasi.png
              @endif"
              class="img-circle" alt="User Image">
                <p>{{auth()->user()->name}}<small></small></p>
              </li>
              <li class="user-footer">

                @if (auth()->user()->role =="user")
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">My Profile</a>
                </div>
                @endif
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>

              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- <form action="" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
      </form> -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>

 <!-- MENU ADMIN -->
        @if (auth()->user()->role =="superadmin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/register"><i class="fa fa-circle-o"></i> Register User (Non Pamor)</a></li>
            <li><a href="/user"><i class="fa fa-circle-o"></i> User </a></li>
          </ul>
        </li>
        @endif

<!-- MENU SEKRET -->
        @if (auth()->user()->role == "superadmin")
        <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Sekretariat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/asn"><i class="fa fa-user"></i> PNS</a></li>
              <li><a href="/tkk"><i class="fa fa-user"></i> TKK</a></li>
            </ul>
          </li>
        @elseif (auth()->user()->role == "admin")
        <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Sekretariat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/asn"><i class="fa fa-user"></i> PNS</a></li>
              <li><a href="/tkk"><i class="fa fa-user"></i> TKK</a></li>
            </ul>
          </li>
        @elseif (auth()->user()->role == "sekret")
        <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Sekretariat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/asn"><i class="fa fa-user"></i> PNS</a></li>
              <li><a href="/tkk"><i class="fa fa-user"></i> TKK</a></li>
            </ul>
          </li>
        @endif

<!-- MENU KESSOS -->
        @if (auth()->user()->role == "superadmin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Kessos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/ibadah"><i class="fa  fa-table"></i> Sarana Ibadah </a></li>
            <li><a href="/kesehatan"><i class="fa  fa-table"></i> Sarana Kesehatan </a></li>
            <li><a href="/pendidikan"><i class="fa  fa-table"></i> Sarana Pendidikan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "user")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Kessos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/ibadah"><i class="fa  fa-table"></i> Sarana Ibadah </a></li>
            <li><a href="/kesehatan"><i class="fa  fa-table"></i> Sarana Kesehatan </a></li>
            <li><a href="/pendidikan"><i class="fa  fa-table"></i> Sarana Pendidikan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "admin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Kessos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/ibadah"><i class="fa  fa-table"></i> Sarana Ibadah </a></li>
            <li><a href="/kesehatan"><i class="fa  fa-table"></i> Sarana Kesehatan </a></li>
            <li><a href="/pendidikan"><i class="fa  fa-table"></i> Sarana Pendidikan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "kessos")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Kessos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/ibadah"><i class="fa  fa-table"></i> Sarana Ibadah </a></li>
            <li><a href="/kesehatan"><i class="fa  fa-table"></i> Sarana Kesehatan </a></li>
            <li><a href="/pendidikan"><i class="fa  fa-table"></i> Sarana Pendidikan </a></li>
          </ul>
        </li>
        @endif

<!-- MENU PEMTRANTIBUM -->
        @if (auth()->user()->role == "superadmin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pem Trantibum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/rtrw"><i class="fa  fa-table"></i> RT RW </a></li>
            <li><a href="/warga"><i class="fa  fa-table"></i> KTP </a></li>
            <li><a href="/kependudukan"><i class="fa  fa-table"></i> Data Kependudukan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "user")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pem Trantibum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/rtrw"><i class="fa  fa-table"></i> RT RW </a></li>
            <li><a href="/warga"><i class="fa  fa-table"></i> KTP </a></li>
            <li><a href="/kependudukan"><i class="fa  fa-table"></i> Data Kependudukan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "admin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pem Trantibum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/rtrw"><i class="fa  fa-table"></i> RT RW </a></li>
            <li><a href="/warga"><i class="fa  fa-table"></i> KTP </a></li>
            <li><a href="/kependudukan"><i class="fa  fa-table"></i> Data Kependudukan </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "pemtibum")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pem Trantibum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/rtrw"><i class="fa  fa-table"></i> RT RW </a></li>
            <li><a href="/warga"><i class="fa  fa-table"></i> KTP </a></li>
            <li><a href="/kependudukan"><i class="fa  fa-table"></i> Data Kependudukan </a></li>
          </ul>
        </li>
        @endif

<!-- MENU PERMASBANG -->
        @if (auth()->user()->role == "superadmin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Permasbang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/fasosfasum"><i class="fa  fa-table"></i> Fasos/Fasum </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "user")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Permasbang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/fasosfasum"><i class="fa  fa-table"></i> Fasos/Fasum </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "admin")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Permasbang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/fasosfasum"><i class="fa  fa-table"></i> Fasos/Fasum </a></li>
          </ul>
        </li>
        @elseif (auth()->user()->role == "permasbang")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Permasbang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="/fasosfasum"><i class="fa  fa-table"></i> Fasos/Fasum </a></li>
          </ul>
        </li>
        @endif
    
        <li><a href="/pamor"><i class="fa  fa-user"></i> Laporan Harian</a></li>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>

        <li><a href="/covid19"><i class="fa  fa-table"></i> COVID-19 </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>

        @if (auth()->user()->role == "superadmin")
        <li><a href="/password/reset" ><i class="fa  fa-table"></i> Reset Password </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>
        @elseif (auth()->user()->role == "admin")
        <li><a href="/password/reset" ><i class="fa  fa-table"></i> Reset Password </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>
        @elseif (auth()->user()->role == "kessos")
        <li><a href="/password/reset" ><i class="fa  fa-table"></i> Reset Password </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>
        @elseif (auth()->user()->role == "pemtibum")
        <li><a href="/password/reset" ><i class="fa  fa-table"></i> Reset Password </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>
        @elseif (auth()->user()->role == "permasbang")
        <li><a href="/password/reset" ><i class="fa  fa-table"></i> Reset Password </a></li>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </li>
        @endif

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@yield('title')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1  | HI Tech
    </div>
    <!-- <strong>Copyrigsht &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights -->
    <strong>Copyright &copy; 2021 <a>Kelurahan Jakasampurna</a>.</strong> All rights
  </footer>

<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- DataTables -->
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE/dist/js/demo.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>


<script>
  $(document).ready(function () {
    $('#Datatables').DataTable();
  });

    $('.sidebar-menu').tree();
      $(".swal-confirm").click(function(e) {
      id = e.target.dataset.id;
        Swal.fire({
        title: 'Yakin Mau Di Hapus?',
        text: "Data kamu bakal hilang loh.. Pikir-Pikir lagi deh :) ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Deleted it'
            }).then((result) => {
              if (result.isConfirmed) {
                //window.location = link;
                Swal.fire('Deleted!','Data Kamu Terhapus.','success');
                $(`#delete${id}`).submit();
              }
            });
       });  
</script>

@include('sweetalert::alert')
@yield('footer')
</body>
</html>
