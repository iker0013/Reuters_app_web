<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reuters | Hot Desk</title>
  
</head>
<body class="hold-transition login-page">
    <?php
        session_start();
        $num_reserva = htmlspecialchars($_POST['num_reserva']);
        echo $num_reserva;
        try{
            //URL para mandar la infromación al API para que regrese la verificación
            $url = 'http://localhost:60863/api/cancelar_reservacion/'.$num_reserva;
            
            $contents = file_get_contents($url);
            //Separar los valores de la cadena obtenida
            $array = explode(",", $contents);
            $cod = explode(":", $array[0]);
            $cod= substr($cod[1],1,-1);
            //Validar usario existente
            if($cod=="1"){
                echo "<script>
			            location.href='./modificar_reserva.php';
                        window.alert('Reservación cancelada con exito');
                    </script> ";
		    }else{
                echo "<script>window.alert('Error al cancelar la reservación');
			            location.href='./modificar_reserva.php';
                    </script> ";
		    }
		}catch(PDOException $e){
             echo "<script>window.alert('Error inesperado :".$e."');
			            location.href='./modificar_reserva.php';
                    </script> ";
		}
    ?>
</body>
</html>
