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
        $num_user = htmlspecialchars($_POST['num_user']);
        echo $num_user;
        try{
            //URL para mandar la infromación al API para que regrese la verificación
            $url = 'http://localhost:60863/api/cambia_estatus_usuario/'.$num_user;
            
            $contents = file_get_contents($url);
            //Separar los valores de la cadena obtenida
            $array = explode(",", $contents);
            $cod = explode(":", $array[0]);
            $cod= substr($cod[1],1,-1);
            //Validar usario existente
            if($cod=="1"){
                echo "<h1>Usuario cambiado con exito</h1>";
			    header("Location: ./modificar_usuario.php");
		    }else{
                echo "<h1>Hubo un error</h1>";
                echo '<a href="./modificar_usuario.php" class="btn btn-info" >Regresar</a>';
		    }
		}catch(PDOException $e){
             echo "<h1>Hubo un error</h1>";
             echo '<a href="./modificar_usuario.php" class="btn btn-info" >Regresar</a>';
		}

    ?>
</body>
</html>
