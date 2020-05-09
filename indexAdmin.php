<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reuters | Hot Desk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Nav bar-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/nav_bar.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Navbar -->
  <div class="topnav" id="nav_mobile">
    <div id="myLinks">
        <a href="pages/charts/modificar_usuario.php">Modificar usuario</a>
        <a href="pages/charts/agregar_usuario.php">Agregar usuario</a>
        <a href="pages/charts/reportes.php">Reportes</a>
        <a href="./indexAdmin.php">Hogar</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="navBar()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <!-- /.navbar -->
  <div class="wrapper">
     <?php
     //Variables from login
      session_start();
      if(!isset($_SESSION["nombre_emp"])){
		echo "<script> 
			alert('No estas autorizado para ver esta pagina');
			location.href='pages/examples/login.php';
			</script>";
	  }
    ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="aside1">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="https://globalriskinsights.com/wp-content/uploads/2016/03/Reuters-Logo.jpg" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Reuters | Hot Desk</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION["nombre_emp"] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<li class="nav-item has-treeview menu-open">
              <a href="./indexAdmin.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="pages/charts/reportes.php" class="nav-link	">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Reportes

                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Control de Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/agregar_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/modificar_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modificar usuario</p>
                  </a>
                </li>
                
              </ul>
            </li>
          </ul>
        </nav>
		<div class="user-panel mt-5 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="pages/examples/login.php" class="nav-link">Log out</a>
          </div>
        </div>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
	  <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
          document.getElementById("aside1").style.display="none";
          function navBar() {
          var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
          }
        }
      </script>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
			<div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
			<div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3> 
                    <?php
                    //The URL with the informtion to GET from API
                    $url = 'http://localhost:60863/api/datos_dashboard_user/1';
                    $contents = file_get_contents($url);
                    $array = explode(",", $contents);
                    $nHotDesk = explode(":", $array[1]);
                    echo substr($nHotDesk[1],1,-2);
                    ?>
                  </h3>

                  <p>Hot Desk</p>
                </div>
                <div class="icon">
                  <i class="icon ion-android-laptop"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
			<div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php
                    //The URL with the informtion to GET from API
                    $url = 'http://localhost:60863/api/datos_dashboard_user/3';
                    $contents = file_get_contents($url);
                    $array = explode(",", $contents);
                    $nHotDeskDis = explode(":", $array[1]);
                    echo substr($nHotDeskDis[1],1,-2);
                    ?></sup></h3>

                  <p>Hot Desk disponibles</p>
                </div>
                <div class="icon">
                  <i class="icon ion-calendar"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php
                    //The URL with the informtion to GET from API
                    $url = 'http://localhost:60863/api/datos_dashboard_user/4';
                    $contents = file_get_contents($url);
                    $array = explode(",", $contents);
                    $nUserOffice = explode(":", $array[1]);
                    echo substr($nUserOffice[1],1,-2);
                    ?></h3>

                  <p>Usuarios en la oficina</p>
                </div>
                <div class="icon">
                  <i class="icon ion-person-stalker"></i>
                </div>
              </div>
            </div>
			<!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php
                    //The URL with the informtion to GET from API
                    $url = 'http://localhost:60863/api/datos_dashboard_user/2';
                    $contents = file_get_contents($url);
                    $array = explode(",", $contents);
                    $nUser = explode(":", $array[1]);
                    echo substr($nUser[1],1,-2);
                    ?></h3>

                  <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                  <i class="icon ion-person"></i>
                </div>
              </div>
            </div>
            
            <!-- ./col -->
		   </div>
          <!-- /.row (main row) -->
		  </div><!-- /.container-fluid -->
		</div>
        <br>
        <form action="pages/charts/prioridades-action.php" method="post">
            <button type="submit"  class="btn btn-primary" >Actualizar prioridades hot desks</button> 
		<form>	
        <br><br>  
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">

              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Reportes recientes</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                        <th>Codigo Reporte</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img
                            src="http://176.32.230.6/beresfordbusinesscentre.co.uk/wp-content/uploads/2016/03/desk-icon.png"
                            alt="Product 1" class="img-circle img-size-32 mr-2">
                          REHD010320
                        </td>
                        <td>01/03/2020</td>
                      </tr>
                      <tr>
                        <td>
                          <img
                            src="http://176.32.230.6/beresfordbusinesscentre.co.uk/wp-content/uploads/2016/03/desk-icon.png"
                            alt="Product 1" class="img-circle img-size-32 mr-2">
                          REHD010220
                        </td>
                        <td>01/02/2020</td>
                      </tr>
                      <tr>
                        <td>
                          <img
                            src="http://176.32.230.6/beresfordbusinesscentre.co.uk/wp-content/uploads/2016/03/desk-icon.png"
                            alt="Product 1" class="img-circle img-size-32 mr-2">
                          REHD010120
                        </td>
                        <td>01/01/2020</td>
                      </tr>
                      <tr>
                        <td>
                          <img
                            src="http://176.32.230.6/beresfordbusinesscentre.co.uk/wp-content/uploads/2016/03/desk-icon.png"
                            alt="Product 1" class="img-circle img-size-32 mr-2">
                          REHD011219
                        </td>
                        <td>01/12/2019</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </section>

            <!-- ./Left col -->
          </div>
		  
      </section>
      <!-- /.content -->
    
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>
