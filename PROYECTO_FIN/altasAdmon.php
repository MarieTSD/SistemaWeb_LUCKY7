<?php
   session_start();
   error_reporting(0);
   $serv = 'localhost';
   $cuenta = 'root';
   $contra = '';
   $BaseD = 'lucky7';
   $_SESSION['exito']="";
  //Realiar la conexion con la base de datos 
   $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
  if($conexion->connect_error){
      die('Ocurrio un error en la conexion con la BD');
  }else{
      //Si entra aqui es que hubo una conexion existosa
      //Verificamos que haya dado enviar producto
      //Sacamos los valores con post
      if(isset($_POST['submit'])){
                //obtenemos datos del formulario
                $id = $_POST['idA'];
                $nom =$_POST['nomA'];
                $des =$_POST['desA'];
                $existe =$_POST['ExA'];
                $precio = $_POST['preA'];
                $categoria = $_POST['categoria'];
                $imgA = addslashes(file_get_contents($_FILES['imA']['tmp_name']));
                $talla = $_POST['tallaA'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO prod (id, nombre, descripcion, existencia, precio, imagen, talla, categoria) VALUES('$id','$nom','$des','$existe', '$precio', '$imgA','$talla','$categoria')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    //alert("Se agrego correctamente elproducto");
                 $_SESSION['exito'] = "si";
                    
                  header("Location: altasAdmon1.php");
                }else{
                    $_SESSION['exito'] = "no";
                    echo "<script>
                document.location='altasAdmon1.php';
                </script>";
                    
                }
         }//fin
  }
?>