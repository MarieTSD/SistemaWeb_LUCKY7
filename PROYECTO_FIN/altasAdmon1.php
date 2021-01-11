<?php
  session_start();
error_reporting(0);
session_start();
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'lucky7';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title> ALTAS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="vendor/fontawesome/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--  Para el los menajes de confimacion ets-->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="icon" href="img/icon.gif" type="img/png">

  </head>
 <body>
  	<?php
    if (isset($_POST['inicia'])) {
      $usuario = $_POST["user"];
      $pass = $_POST["pass"];
      $captcha = $_POST["tmptxt"];
      if ($conexion->connect_errno) {
        die('Error en la conexion');
      } else {
        $sql = "select * from usuario where cuenta ='$usuario'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows) {
          $fila = $resultado->fetch_assoc();
          $v1 = $fila['id'];
          $v6 = false;
          $v7 = $fila['intento'];
          if ($_SESSION['cod'] == $captcha) {
            if ($fila["estado"] == true) {
              if (password_verify($pass, $fila["contra"])) {
                $_SESSION["usuario"] = $usuario;

                if (isset($_POST['remember'])) {
                  setcookie("username", $_POST["user"], time() + 3600);
                  setcookie("password", $_POST["pass"], time() + 3600);
                }
                if($_SESSION["usuario"]=="Lucky7"){
					  header("Location: paginaAdmon.php");
				  }else{
					  header("Location: index.php");
				  }
              } else {
                $v7 += 1;
                $sql = "update usuario set intento='$v7' where id= '$v1'";
                $resultado = $conexion->query($sql);
                echo '<script>  swal("Contraseña incorrecta");</script>';
              }
            }
            if ($v7 == 3 && $fila['estado'] == true) {
              echo '<script>  swal("' . $usuario . ' se ha bloqueado");</script>';
              $sql = "update usuario set estado='$v6', intento='0' where id= '$v1'";
              $resultado = $conexion->query($sql);
            }
            if ($fila['estado'] == false) {
              echo '<script>  swal("Usuario Bloqueado");</script>';
            }
          } else {
            echo '<script>  swal("Error en el captcha");</script>';
          }
        } else {
          echo '<script>  swal("Usuario no existente");</script>';
        }
      }
    }
    ?>





   	<!-- menu -->
	  <nav id="menu" class="navbar navbar-expand-sm bg">
	  <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt=""></a>
	  <button  id="menu_btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	  <span class="text-white" class="navbar-toggler-icon">+</span>
	  </button>
	  <div class="collapse navbar-collapse row justify-content-around" id="collapsibleNavbar">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a id="menu_item" class="nav-link menu_item" href="index.php">Inicio</a>
		  </li>
		  
		  <!-- Dropdown -->
			<li class="nav-item dropdown">
			  <a id="menu_item" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Acera De</a>
			  <div style="padding: 0px;" class="dropdown-menu menu_acerca_de">
				<a id="menu_item" class="dropdown-item" href="vision.php">Visión</a>
				<a id="menu_item" class="dropdown-item" href="mision.php">Misión</a>
				<a id="menu_item" class="dropdown-item" href="objetivo.php">Objetivo de la compañía</a>
			  </div>
      	  </li>   
		  <li class="nav-item">
			<a id="menu_item" class="nav-link" href="contactanos.php">Contactanos</a>
		  </li>  
		  <li class="nav-item">
			<a id="menu_item" class="nav-link" href="ayuda.php">Ayuda</a>
		  </li> 
		  
         <!-- Pagina para el adminitrador		  -->
		  <?php
			//echo $admin;
			
			if($_SESSION['usuario'] == "Lucky7"){
				echo '<li "> <a style="color:#ffcc00;
	padding: 10px;
	font-weight: 500;" href="paginaAdmon.php">USUARIO: ' . $_SESSION['usuario'] . "</a></li>";
			echo '<li class="nav-item dropdown">
			  <a id="menu_item" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Productos </a>
			  <div style="padding: 0px;" class="dropdown-menu menu_acerca_de">
				<a id="menu_item" class="dropdown-item" href="altasAdmon1.php">Alta Producto</a>
				<a id="menu_item" class="dropdown-item" href="bajasAdmon.php">Baja Producto</a>
				<a id="menu_item" class="dropdown-item" href="actualizarAdmon.php">Actualizar Producto</a>
			  </div>
      	  </li>';
			}elseif(isset($_SESSION["usuario"])){
				echo '<li style="color:#ffcc00;
	padding: 10px;
	font-weight: 500;"> USUARIO: ' . $_SESSION['usuario'] . "</li>";
			}
			?>
      	  
		</ul>
	  </div> 
	  
<!-- Codigo LOGIN-->  
	<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <!--Content-->
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="modal-content form-elegant">
              <!--Header-->
              <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-success font-weight-500 my-3" id="myModalLabel"><strong>INICIAR SESION</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->

              <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                  <input type="text" name="user" id="user" class="form-control validate" value="<?php if (isset($_COOKIE["username"])) {$usuario = $_COOKIE["username"];echo $usuario;} ?>" required>
                </div>

                <div class="md-form pb-3 ">
                  <input type="password" name="pass" id="pass" class="form-control validate" value="<?php if (isset($_COOKIE["password"])) {$pass = $_COOKIE["password"];echo $pass;} ?>" required>
                  <p class="text-success d-flex justify-content-end">Olvidaste tu <a href="recupera.php" class="text-primary bg-white">
                      contraseña?</a></p>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" id="defaultIndeterminate2">
                  <label class="custom-control-label text-success " for="defaultIndeterminate2">Recordar usuario y contraseña</label>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                  <img id="captcha" src="captcha.php" width="100" height="30" class="img-polaroid">
                  <button type="button" class="btn btn-outline-info" onclick="refresh(event)"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                  <input type="text" name="tmptxt" id="cod" class="form-control validate" required placeholder="Ingresa el Código" value="" /><br />
                  <br> <br>
                </div>
                <div class="text-center mb-3">

                  <button type="submit" id="log" name="inicia" class="btn bg-success text-white btn-block btn-rounded z-depth-1a" >Iniciar sesion</button>
                </div>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"></p>
              </div>
              <!--Footer-->
              <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small  d-flex justify-content-end text-success">No estas registrado? <a href="#" data-toggle="modal" data-target="#elegantModalFormregister" class="text-primary bg-white">
                    Registrate</a></p>
              </div>
            </div>
          </form>
          <!--/.Content-->
        </div>
      </div>
      <!-- Modal -->
      <?php
      if (isset($_SESSION["usuario"])) {
        echo '<a  class="btn btn-danger btn-rounded" href="logout.php">Salir</a>';

      } else {
        echo '<div class="text-center">';
        echo '<a href=""class="btn btn-outline-success" data-toggle="modal" data-target="#elegantModalForm">Login</a>';
        echo '</div>';
      }

      ?>
      <div class="modal fade" id="elegantModalFormregister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <!--Content-->
          <form action="reg1.php" onSubmit="return validarPasswd()" method="post">
            <div class="modal-content form-elegant">
              <!--Header-->
              <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-success font-weight-bold my-3" id="myModalLabel"><strong>Registro</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->

              <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                  <input type="text" class="form-control validate" name="nom" required maxlength="30" placeholder="Nombre" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="text" class="form-control validate" name="cuenta" required maxlength="30" placeholder="Cuenta" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="email" class="form-control validate" name="correo" placeholder="Correo" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="password" class="form-control validate" placeholder="Contraseña" name="contra" id="contra"> 
                </div>
                <div class="md-form mb-5">
                  <input type="password" class="form-control validate" name="contra2" id="contra2" placeholder="Escriba de nuevo su contraseña"> 

                </div>

                <div class="text-center mb-3">
                  <button type="submit" name="envia" class="btn bg-success text-white btn-block btn-rounded z-depth-1a">Registrarse</button>
                </div>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"></p>
              </div>
            </div>
          </form>
          <!--/.Content-->
        </div>
      </div>
    
    <!--Fin codigo login--> 
	</nav>
   	<!-- fin menu -->
  
   <!-- Hero section -->
   <?php
                      if($_SESSION['exito'] == "si"){
                         echo '<script>swal("Alta Exitosa", "Continua dando de alta productos", "success");</script>';
                          
                        $_SESSION['exito'] = "";
                      }else if($_SESSION['exito'] == "no"){
                          echo '<script>swal("ID Repetido", "el id para cada producto es unico", "error");</script>';
                          $_SESSION['exito']="";
                      }
                   ?>
    <section class="hero3 hero6">
     	<!--SMACSS-->
     	<!--BEM BLOVK ELEMENT MODIFIER-->
<!--      <h1 class="hero__title">Altas Productos</h1>-->
<!--      <p class="hero__paragraph">Ingresa los datos necesarios para dar de alta el producto: </p>-->
               
      			<form class="contact100-form validate-form" action="altasAdmon.php" enctype="multipart/form-data" method="POST" id="alta">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">ID:</span>
					<input class="input100" type="number" name="idA" placeholder="Enter id producto" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Nombre Producto:</span>
					<input class="input100" type="text" name="nomA" placeholder="Igresa nombre del producto" required>
					<span class="focus-input100"></span>
				</div>
               
                <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Precio:</span>
					<input class="input100" type="number" name="preA" placeholder="Precio" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Existencia:</span>
					<input class="input100" type="number" name="ExA" placeholder="Existencia">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Phone is required">
					<span class="label-input100">Talla:</span>
					<input class="input100" type="text" name="tallaA" placeholder="Talla del producto">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Descripcion:</span>
<!--					<input class="input100" type="text" name="desA" placeholder="Descripcion del producto" required>-->
					<textarea class="input100" name="desA" placeholder="Ingresa una descripcion"></textarea>
					<span class="focus-input100"></span>
				</div>
                <div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Categoria:</span>
					<select name="categoria" id="altaC" class="input100">
					    <option value="dama">Dama</option>
					    <option value="caballero">Caballero</option>
					</select>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Imagen:</span>
					<input type="file" class="input100" name="imA">
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="submit">
						<span>
							Agregar Producto
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
			
    </section>
    <!-- End Hero section -->
    
    <!-- End characteristics section -->
<footer class="jumbotron text-center text-primary" style="margin:0px; width: 100%;">
 <p class="pie_parrafo">Lucky 7 México y Centroamérica ©2019 | LA MODA N0 ES NADA SIN PERSONAS</p>
 <p class="pie_parrafo">Todos los derechos reservados</p>
  <!--<p class="pie_parrafo1">Num Visitas: </p>-->
</footer>
    
  </body>
</html>