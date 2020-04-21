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
        $num_emp = htmlspecialchars($_POST['numero']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $correo = htmlspecialchars($_POST['correo']);
        $area = htmlspecialchars($_POST['area']);
        $pass = htmlspecialchars($_POST['pass']);
        $status = "activo";
        $is_adm = 0;
        $is_user = 1;
        $cadena = $num_emp.",".$nombre.",".$correo.",".$area.",".$pass.",".$status.",".$is_adm.",".$is_user;
        try{
            //URL para mandar la infromación al API para que regrese la verificación
            $url = 'http://localhost:60863/api/registra_usuario/'.base64_encode($cadena);
            
            $contents = file_get_contents($url);
            //Separar los valores de la cadena obtenida
            $array = explode(",", $contents);
            $cod = explode(":", $array[0]);
            $cod= substr($cod[1],1,-1);
            //Validar usario existente
            if($cod=="1"){
                echo "<h1>usuario insertado</h1>";
			    header("Location: ./agregar_usuario.php");
		    }else{
                echo "<h1>Hubo un error</h1>";
                echo '<a href="./agregar_usuario.php" class="btn btn-info" >Regresar</a>';
		    }
		}catch(PDOException $e){
             echo "<h1>Hubo un error</h1>";
             echo '<a href="./agregar_usuario.php" class="btn btn-info" >Regresar</a>';
		}

    ?>
</body>
</html>
