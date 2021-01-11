<?php
     $servidor='localhost';
     $cuenta='root';
     $password='';
     $bd='lucky7';
     $conexion = new mysqli($servidor,$cuenta,$password,$bd);

     if ($conexion->connect_errno){
          die('Error en la conexion');
     }
    else{
        if (isset($_POST['envia'])){
        $nom =$_POST['nom'];
        $cuenta=$_POST['cuenta'];
        $correo =$_POST['correo'];
        $pass=$_POST['contra'];
        $pass1=password_hash($pass, PASSWORD_DEFAULT);
        $est=1;
        $intento=0;
        
        

        $sql = "INSERT INTO usuario (nombre, cuenta, correo, contra, estado,intento) VALUES('$nom','$cuenta', '$correo', '$pass1', '$est','$intento')";
        //echo $sql;
		echo '<script>  swal("Usuario Bloqueado");</script>';
        $conexion->query($sql); 
        if ($conexion->affected_rows >= 1){
			
          header("Location: index.php");
            //echo '<br> registro insertado'; 
			
     }
     $conexion->close();
    }

    session_start();
   
    }
?>