 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reuters | Hot Desk</title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Nav bar-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/nav_bar.css">
</head>
<body class="hold-transition sidebar-mini">
<?php
  session_start();
  if(!isset($_SESSION["nombre_emp"])){
		echo "<script> 
			alert('No estas autorizado para ver esta pagina');
			location.href='../examples/login.php';
			</script>";
  }
?>
<div class="wrapper">
  <!-- Navbar -->
  <div class="topnav" id="nav_mobile">
    <div id="myLinks">
        <a href="./modificar_reserva.php">Modificar Reserva</a>
        <a href="./reservar.php">Reservar</a>
        <a href="../../index.php">Hogar</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="navBar()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <!-- /.navbar -->

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
          <a href="#" class="d-block"><?php echo $_SESSION["nombre_emp"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="../../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Reservaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./reservar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservar Hot Desk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./modificar_reserva.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar reservación</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
	  <div class="user-panel mt-5 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="../examples/login.php" class="nav-link">Log out</a>
          </div>
        </div>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modificar reservación</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Mis reservaciones</h3>
            </div>
            <!-- /.card-header -->
              <?php
                $url = 'http://localhost:60863/api/proximas_reservaciones/'.$_SESSION["numero_emp"];
                $contents = file_get_contents($url);
                $contents = str_replace('"','', $contents); //Cleans de string
                //Check if it has to display the table or not
                $find = "codigo: 0";
                $pos = strpos($contents, $find);
                if($pos===false){
                    $array = explode("|", $contents);
                    $rows = sizeof($array);
                    ?>
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Número de Hot Desk</th>
                              <th>Fecha</th>
                              <th>Hora Check In</th>
                              <th>Hora Check Out</th>
                              <th></th>
                            </tr>
                            <tbody>
                              <?php $n=1; 
                                for($i=0; $i<$rows-1; $i++): 
                                  $innerArr = explode(",", $array[$i]);
                                ?>
                                <tr>
                                  <td><?php echo substr($innerArr[$n+1],13)?></td>
                                  <td><?php echo substr($innerArr[$n+2],7, 11)?></td>
                                  <td><?php echo substr($innerArr[$n+3],14)?></td>
                                  <td><?php echo substr($innerArr[$n+4],13)?></td>
                                  <td><?php echo '<form action="datos_reserva.php" method="post">
                                      <input type="hidden" name="num_reserv" value="'.substr($innerArr[$n],22).'">
                                      <input type="hidden" name="num_desk" value="'.substr($innerArr[$n+1],13).'">
                                      <input type="hidden" name="fecha" value="'.substr($innerArr[$n+2],7, 11).'">
                                      <input type="hidden" name="hora_e" value="'.substr($innerArr[$n+3],14).'">
                                      <input type="hidden" name="hora_s" value="'.substr($innerArr[$n+4],13).'">
                                      <button type="submit"  class="btn btn-info">Modificar</button> 
                                    </form>
                                    <form action="./mod_reserva-action.php" method="post">
                                      <input type="hidden" name="num_reserva" value="'.substr($innerArr[$n],22).'">
                                      <button type="submit"  class="btn btn-danger">Cancelar</button> 
                                    </form>'?>
                                  </td>
                                </tr>
                              <?php $n=2; //The first array is shorter than the others so the value must go up
                              endfor; ?>
                            </tfoot>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    <?php
				}else{
                    echo "&nbsp;&nbsp; No tiene proximas reservaciones";
				}
              ?>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
    });
  });

  function update(numHot){
        document.getElementById("nHotdesk").value=numHot;
  }
</script>

</body>
</html>
