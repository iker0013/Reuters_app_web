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
        $fecha = htmlspecialchars($_POST['fecha']);
        $n_desk = htmlspecialchars($_POST['n_desk']);
        $hora_i = htmlspecialchars($_POST['hora_i']);
        $hora_s = htmlspecialchars($_POST['hora_s']);
        $cadena = $fecha.",".$n_desk.",".$_SESSION["numero_emp"].",".$hora_i.",".$hora_s;
        echo $cadena;
        
        try{
            //URL para mandar la infromación al API para que regrese la verificación
            $url = 'http://localhost:60863/api/registra_manual/'.base64_encode($cadena);
            
            $contents = file_get_contents($url);
            //Separar los valores de la cadena obtenida
            $array = explode(",", $contents);
            $cod = explode(":", $array[0]);
            $cod= substr($cod[1],1,-1);
            //Validar usario existente
            if($cod=="1"){
                echo "<h1>usuario insertado</h1>";
			    header("Location: ./reservar.php");
		    }else{
                echo "<h1>Hubo un error</h1>";
                echo '<a href="./reservar.php" class="btn btn-info" >Regresar</a>';
		    }
		}catch(PDOException $e){
             echo "<h1>Hubo un error</h1>";
             echo '<a href="./reservar.php" class="btn btn-info" >Regresar</a>';
		}

    ?>
</body>
</html>
