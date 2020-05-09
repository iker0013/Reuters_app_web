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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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
  date_default_timezone_set('America/Mexico_City');
  $fecha_hoy = date('Y-m-d');
  $nueva_fecha = strtotime('+7 day', strtotime($fecha_hoy));
  $nueva_fecha = date('Y-m-d', $nueva_fecha);
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
            <h1>Reservar Hot Desk</h1>
          </div>
          <div class="col-sm-6">

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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="reservar_a-action.php" method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reserva tu Hot Desk (Asignación automática)</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Fecha:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                        <?php echo '<input type="date" class="form-control" name="fecha_a" min="'.$fecha_hoy.'" max="'.$nueva_fecha.'">'; ?>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- phone mask -->
                <div class="form-group">
                  <label>Hora Check In:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <select class="form-control select2bs4" name="hora_a_i" style="width: 100%;">
                      <option value="08:00:00">08:00</option>
                      <option value="09:00:00">09:00</option>
                      <option value="10:00:00">10:00</option>
                      <option value="11:00:00">11:00</option>
                      <option value="12:00:00">12:00</option>
                      <option value="13:00:00">13:00</option>
                      <option value="14:00:00">14:00</option>
                      <option value="15:00:00">15:00</option>
                      <option value="16:00:00">16:00</option>
                      <option value="17:00:00">17:00</option>
                      <option value="18:00:00">18:00</option>
                      <option value="19:00:00">19:00</option>
                      <option value="20:00:00">20:00</option>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                <div class="form-group">
                  <label>Hora Check Out:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <select class="form-control select2bs4"  name="hora_a_s" style="width: 100%;">
                      <option value="09:00:00">09:00</option>
                      <option value="10:00:00">10:00</option>
                      <option value="11:00:00">11:00</option>
                      <option value="12:00:00">12:00</option>
                      <option value="13:00:00">13:00</option>
                      <option value="14:00:00">14:00</option>
                      <option value="15:00:00">15:00</option>
                      <option value="16:00:00">16:00</option>
                      <option value="17:00:00">17:00</option>
                      <option value="18:00:00">18:00</option>
                      <option value="19:00:00">19:00</option>
                      <option value="20:00:00">20:00</option>
                      <option value="21:00:00">21:00</option>
                    </select>
                  </div>
                  
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Reservar</button>
              </div>
              <!-- /.card-body -->
            </div>
            </form>
            <!-- /.card -->

            <!-- iCheck -->
            
            <!-- /.card -->

            <!-- Bootstrap Switch -->
            
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <form action="reservar_m-action.php" method="post">
            <div class="card card-danger">
            
              <div class="card-header">
                <h3 class="card-title">Reserva tu Hot Desk</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Fecha:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                        <?php echo '<input type="date" class="form-control" name="fecha" min="'.$fecha_hoy.'" max="'.$nueva_fecha.'">'; ?>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Número de Hot Desk:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                    </div>
                    <input type="number" class="form-control" name="n_desk" min="1" max="200">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <!-- phone mask -->
                <div class="form-group">
                  <label>Hora Check In:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <select class="form-control select2bs4" name="hora_i" style="width: 100%;">
                      <option value="08:00:00">08:00</option>
                      <option value="09:00:00">09:00</option>
                      <option value="10:00:00">10:00</option>
                      <option value="11:00:00">11:00</option>
                      <option value="12:00:00">12:00</option>
                      <option value="13:00:00">13:00</option>
                      <option value="14:00:00">14:00</option>
                      <option value="15:00:00">15:00</option>
                      <option value="16:00:00">16:00</option>
                      <option value="17:00:00">17:00</option>
                      <option value="18:00:00">18:00</option>
                      <option value="19:00:00">19:00</option>
                      <option value="20:00:00">20:00</option>
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <!-- IP mask -->
                <div class="form-group">
                  <label>Hora Check Out:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <select class="form-control select2bs4"  name="hora_s" style="width: 100%;">
                      <option value="09:00:00">09:00</option>
                      <option value="10:00:00">10:00</option>
                      <option value="11:00:00">11:00</option>
                      <option value="12:00:00">12:00</option>
                      <option value="13:00:00">13:00</option>
                      <option value="14:00:00">14:00</option>
                      <option value="15:00:00">15:00</option>
                      <option value="16:00:00">16:00</option>
                      <option value="17:00:00">17:00</option>
                      <option value="18:00:00">18:00</option>
                      <option value="19:00:00">19:00</option>
                      <option value="20:00:00">20:00</option>
                      <option value="21:00:00">21:00</option>
                    </select>
                  </div>
                  
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Reservar</button>
              </div>
              
              <!-- /.card-body -->
            </div>
            </form>
            <!-- /.card -->

  
            <!-- /.card -->

          </div>
          <!-- /.col (left) -->
         
          <!-- /.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>
