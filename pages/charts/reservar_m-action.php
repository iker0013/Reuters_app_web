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
        $hi= substr($hora_i,0,2);
        $hf= substr($hora_s,0,2);
        if(intval($hi)>=intval($hf)){
            echo "<script>window.alert('La hora de Check In debe ser menor que la de Check out');
			        location.href='./reservar.php';
                </script> ";
		}else{
            try{
                //URL para mandar la infromación al API para que regrese la verificación
                $url = 'http://localhost:60863/api/reserva_manual/'.base64_encode($cadena);
            
                $contents = file_get_contents($url);
                //Separar los valores de la cadena obtenida
                $array = explode(",", $contents);
                $cod = explode(":", $array[0]);
                $cod= substr($cod[1],1,-1);
                //Validar usario existente
                if($cod=="1"){
                    echo "<script>window.alert('Reserva realizada');
			                location.href='./reservar.php';
                        </script> ";
		        }else{
                    echo "<script>window.alert('Error :".$contents."');
			                location.href='./reservar.php';
                        </script> ";
		        }
		    }catch(PDOException $e){
                echo "<script>window.alert('Error :".$e."');
			            location.href='./reservar.php';
                    </script> ";
		    }
		}

    ?>
</body>
</html>
