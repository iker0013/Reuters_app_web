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
</head>
<body class="hold-transition sidebar-mini">
<?php
  session_start();
?>
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
              <a href="../../indexAdmin.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard

                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="./reportes.php" class="nav-link	">
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
                 <a href="./agregar_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar usuario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./modificar_usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modificar usuario</p>
                  </a>
                </li>
                
              </ul>
            </li>
          </ul>
        </nav>
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
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <?php
                $url = 'http://localhost:60863/api/todos_usuarios/';
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
                              <th>Número de empleado</th>
                              <th>Nombre</th>
                              <th>Correo</th>
                              <th>Area</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                            <tbody>
                              <?php $n=1; 
                                for($i=0; $i<$rows-1; $i++): 
                                  $innerArr = explode(",", $array[$i]);
                                ?>
                                <tr>
                                  <td><?php echo substr($innerArr[$n],17)?></td>
                                  <td><?php echo substr($innerArr[$n+1],8)?></td>
                                  <td><?php echo substr($innerArr[$n+2],8)?></td>
                                  <td><?php echo substr($innerArr[$n+3],6)?></td>
                                  <td><?php echo substr($innerArr[$n+4],8)?></td>
                                  <td><?php echo '<button type="button" class="btn btn-info onClick="update('.substr($innerArr[$n+1],13).');">Modificar</button>
                                    <form action="" method="post">
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
                    echo "&nbsp;&nbsp; Error al obtener usuarios";
				}
              ?>
          </div>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Datos del usuario</h3>
                    </div>
                    <div class="card-body">
						<!-- Date dd/mm/yyyy -->
						<div class="form-group">
						<label>Numero de Empleado:</label>

						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-address-card"></i></span>
							</div>
							<input type="text" class="form-control" >
						</div>
						<!-- /.input group -->
				  
						<label>Nombre:</label>

						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-address-card"></i></span>
							</div>
							<input type="text" class="form-control" >
						</div>
						<!-- /.input group -->
				  
						<label>Correo:</label>

						<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-address-card"></i></span>
							</div>
							<input type="text" class="form-control" >
						</div>
						<!-- /.input group -->
						<label>Area:</label>

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-address-card"></i></span>
							</div>
							<input type="text" class="form-control" >
						</div>
						<!-- /.input group -->
						<label>Contraseña:</label>

						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-address-card"></i></span>
							</div>
							<input type="text" class="form-control" >
						</div>
						<!-- /.input group -->
					</div>
				
                

              </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
                  <!-- iCheck -->
                  
                  <!-- /.card -->
      
                  <!-- Bootstrap Switch -->
                  
                  <!-- /.card -->
                </div>

                <!-- /.col (left) -->
               
                <!-- /.col (right) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.card -->
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
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
