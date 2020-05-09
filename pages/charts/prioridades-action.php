<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reuters | Hot Desk</title>
  
</head>
<body class="hold-transition login-page">
    <?php
        
        try{
            //URL para mandar la infromación al API para que regrese la verificación
            $url = 'http://localhost:60863/api/actualiza_prioridades/';
            
            $contents = file_get_contents($url);
            //Separar los valores de la cadena obtenida
            $array = explode(",", $contents);
            $cod = explode(":", $array[0]);
            $cod= substr($cod[1],1,-1);
            //Validar usario existente
            if($cod=="1"){
                echo "<script>window.alert('Prioridades actualizadas');
			            location.href='../../indexAdmin.php';
                    </script> ";
		    }else{
                echo "<script>window.alert('Error :".$contents."');
			            location.href='../../indexAdmin.php';
                    </script> ";
		    }
		}catch(PDOException $e){
             echo "<script>window.alert('Error :".$e."');
			            location.href='../../indexAdmin.php';
                    </script> ";
		}

    ?>
</body>
</html>
