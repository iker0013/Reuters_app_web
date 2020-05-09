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
                echo "<script>window.alert('Usuario cambiado con exito');
			            location.href='./modificar_usuario.php';
                    </script> ";
		    }else{
                echo "<script>window.alert('Error :".$contents."');
			            location.href='./modificar_usuario.php';
                    </script> ";
		    }
		}catch(PDOException $e){
             echo "<script>window.alert('Error :".$e."');
			            location.href='./modificar_usuario.php';
                    </script> ";
		}
    ?>
</body>
</html>
