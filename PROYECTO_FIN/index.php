<?php
	function contador()
    {
        $archivo = "contador.txt"; //el archivo que contiene en numero
        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
        if($f)
        {
            $contador = fread($f, filesize($archivo)); //leemos el archivo
            $contador = $contador + 1; //sumamos +1 al contador
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contador);
            fclose($f);
        }
        return $contador;
    }

//Codigo para las sesiones
$_SESSION['usuario']="";
session_start();

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'lucky7';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
error_reporting(0);
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lucky 7</title>
    <!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="vendor/fontawesome/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,500,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
  	
  	 <!--fontawesome para el icono del refresh-->
  <script src="https://use.fontawesome.com/478910eb2a.js"></script>
  <!--este es para los alert bonitos-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  
  
  <link rel="icon" href="img/icon.gif" type="img/png">
	<style>
		
		@import url(https://fonts.googleapis.com/css?family=Share+Tech+Mono);
		svg{
		  display: block;
		  overflow: hidden; 
		  margin: -50px 0px 0;
		  padding: 10px 0 0 190px;
		  background: black;
		  width: 100%;
			text-align: center;
			align-content: center;
			align-self: center;
		}
		
	</style>
  </head>
  
  
<body>
 
<!-- ACCESIBILIDAD-->
<?php
if(isset($_SESSION['usuario']))
{
  ?>
    <script>
      
      
  jQuery(function reiniciar(){				
	/* Se cargan los estilos guardados en cookies al momento de ingresar a la pagina*/
    /*FONDO*/
    cambio=Cookies.get('colorCookie');

    jQuery('.cambiafondo').css('background-color',Cookies.get('colorCookie'));
		jQuery('#menu').css('background-color',Cookies.get('colorCookie'));
    jQuery('#menu a').css('background',Cookies.get('colorCookie'));
    if(cambio!==''){
      jQuery('.cambiafuente').css('color', 'white');
      jQuery('.cambiafuente i').css('color', 'white');
    }
    
    

    /*TEXTO*/
			if (Cookies.get('cookietexto') == 'normal') {
				$('.cambiatexto').css({
				'font-weight': 'normal',
				'font-style': 'normal',
				'text-decoration': 'none',
				'font-size':'15px'
				});
			}    
			if (Cookies.get('cookietexto') == 'negrita') 
			{
			
				$('.cambiatexto').css('font-weight', 'bold');
				$('.nav-link').css('font-size', '200%');

			
			
			}
			if (Cookies.get('cookietexto') == 'cursiva') 
			{

				$('cambiatexto').css('font-style', 'italic');
				$('.nav-link').css('font-size', '200%');

			}
			if (Cookies.get('cookietexto') == 'subrayado') 
			{

				$('cambiatexto').css('text-decoration', 'underline');
				$('.nav-link').css('font-size', '200%');

			}
		/*FUENTE*/	
			$('.cambiafuente').css('font-family',Cookies.get('cookiefuente') );
		
		});
    </script>
    <?php
 
  
  

    echo '<!-- MENU ACCESIBILIDAD -->';
    

    echo '<div class="fondo" >';
      

      
      echo '<div style="display : inline-flex">';
      echo '<label >Fondo</label><br>';
      echo    '<a href="#" class="thumbnail" data-color="#555151" style="height: 50px; width: 50px;"  >';  
      echo    '<img alt="gris" src="img/color1.png" style="height: 30px; width: 30px">';
      echo    '</a>' ;
      
      echo    '<a href="#" class="thumbnail" data-color="#669999" style="height: 50px; width: 50px;">'  ;
      echo    '<img alt="Manzana verde" src="img/color2.png" style="height: 30px; width: 30px"> ';
      echo    '</a> ';
      
      echo    '<a href="#" class="thumbnail" data-color="#52527a" style="height: 50px; width: 50px;">'  ;
      echo    '<img alt="Naranja" src="img/color3.jpg" style="height: 30px; width: 30px"> ';
      echo    '</a> ';
      echo    '<a href="#" class="thumbnail" data-color="#993333" style="height: 50px; width: 50px;"> ' ;
      echo    '<img alt="Limón amarillo" src="img/color4.png" style="height: 30px; width: 30px">' ;
      echo    '</a>' ;
      echo '</div> '  ; 
      echo '<div>';
      echo     '<label for="texto">Texto</label>';
      echo      '<select name="texto" id="texto">';
      echo        '<option value="normal">Normal</option>';
      echo        '<option value="negrita">Negrita</option>';
      echo        '<option value="cursiva">Cursiva</option>';
      echo        '<option value="subrayado">Subrayado</option>';
      echo    '</select>';
      echo '</div>';
      
      echo '<div>';
      echo   '<label for="fuente" >Fuente</label>';
      echo   '<select  id="fuente" name="fuente">';

      echo    '<option value="Times New Roman">Times New Roman</option>';
      echo    '<option value="Courier New">Courier New</option>';
      echo    '<option value="Arial">Arial</option>';
      echo  '</select>';

      echo '</div>';

      
    echo   '<div class="col-xs-12">';
    echo    '<a class="recargar" href="#" target="_blank"><i class="far fa-save"></i></a>';
    echo    '<a id="eliminaCookie"  href="#" target="_blank"><i class="far fa-trash-alt"></i></a>';
    echo   '</div>';
    echo    '<div>';
    echo    '<br><br><br>';
    echo    '</div>';
    echo '</div>'    ;

    
}?>
<!-- /MENU ACCESIBILIDAD -->




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
  <header>
	<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 width="600px" height="100px" viewBox="0 0 600 100">
<style type="text/css">

<![CDATA[

	text {
		align-self: center;
		filter: url(#filter);
		fill: white;
    	font-family: 'Share Tech Mono', sans-serif;
    	font-size:25px;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		
     }
]]>
</style>
	<defs>

		<filter id="filter">
		    <feFlood flood-color="black" result="black" />
		    <feFlood flood-color="red" result="flood1" />
		    <feFlood flood-color="limegreen" result="flood2" />
			<feOffset in="SourceGraphic" dx="3" dy="0" result="off1a"/>
			<feOffset in="SourceGraphic" dx="2" dy="0" result="off1b"/>
			<feOffset in="SourceGraphic" dx="-3" dy="0" result="off2a"/>
			<feOffset in="SourceGraphic" dx="-2" dy="0" result="off2b"/>
		    <feComposite in="flood1" in2="off1a" operator="in"  result="comp1" />
		    <feComposite in="flood2" in2="off2a" operator="in" result="comp2" />

 		  	<feMerge x="0" width="100%" result="merge1">
				<feMergeNode in = "black" />
				<feMergeNode in = "comp1" />
				<feMergeNode in = "off1b" />

				<animate 
					attributeName="y" 
		    		id = "y"
		    		dur ="4s"
		    		
		    		values = '104px; 104px; 30px; 105px; 30px; 2px; 2px; 50px; 40px; 105px; 105px; 20px; 6ßpx; 40px; 104px; 40px; 70px; 10px; 30px; 104px; 102px'

		    		keyTimes = '0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'

		    		repeatCount = "indefinite" />
 
				<animate attributeName="height" 
		    		id = "h" 
		    		dur ="4s"
		    		
		    		values = '10px; 0px; 10px; 30px; 50px; 0px; 10px; 0px; 0px; 0px; 10px; 50px; 40px; 0px; 0px; 0px; 40px; 30px; 10px; 0px; 50px'

		    		keyTimes = '0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'

		    		repeatCount = "indefinite" />
		    </feMerge>
 			

 			<feMerge x="0" width="100%" y="60px" height="65px" result="merge2">
				<feMergeNode in = "black" />
				<feMergeNode in = "comp2" />
				<feMergeNode in = "off2b" />

				<animate attributeName="y" 
		    		id = "y"
		    		dur ="4s"
		    		values = '103px; 104px; 69px; 53px; 42px; 104px; 78px; 89px; 96px; 100px; 67px; 50px; 96px; 66px; 88px; 42px; 13px; 100px; 100px; 104px;' 

		    		keyTimes = '0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513; 0.548; 0.577; 0.613; 1'

 		    		repeatCount = "indefinite" />
 
				<animate attributeName="height" 
		    		id = "h"
		    		dur = "4s"
					
					values = '0px; 0px; 0px; 16px; 16px; 12px; 12px; 0px; 0px; 5px; 10px; 22px; 33px; 11px; 0px; 0px; 10px'

		    		keyTimes = '0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513;  1'
		    		 
		    		repeatCount = "indefinite" />
		    </feMerge>
			
		 	<feMerge>
 				<feMergeNode in="SourceGraphic" />	

				<feMergeNode in="merge1" /> 
 			<feMergeNode in="merge2" />

		    </feMerge>
	    </filter>

	</defs>

<g>
	<text x="0" y="100" style="padding='20px;'">ENVIOS GRATIS DESDE $599 MXN, APROVECHA!!</text>
</g>
</svg>

</header>

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
		  <li class="nav-item">
			<a id="menu_item" class="nav-link" href="categoria.php">Tienda</a>
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
		   
		  <li class="nav-item">
			<?php
			if(!empty($_SESSION["shopping_cart"]) and isset($_SESSION["usuario"])) {
			$cart_count = count(array_keys($_SESSION["shopping_cart"]));
			?>
						<a id="menu_item" class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"><?php echo $cart_count; ?></i></a>
						<?php
			}?>
		  </li>
		  
		  
		  <!-- Pagina para el adminitrador		  -->
		  <?php
			//echo $admin;
			
			if($_SESSION["usuario"] == "Lucky7"){
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
      	  <!-- FIN Pagina para el adminitrador		  -->
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
                  <button type="button" class="btn btn-outline-info" onclick="refresh(event)"><i class="fa fa-refresh" aria-hidden="true"></i></button>
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
        echo '<button class="botonAccesibilidad" style="color:black"><i class="fab fa-accessible-icon"> </i> </button>';
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
    <section class="hero hero1">
     	<!--SMACSS-->
     	<!--BEM BLOVK ELEMENT MODIFIER-->
      <h1 class="hero__title">LUCKY 7</h1>
      <p class="hero__paragraph">La moda no es nada sin personas</p>
      <button class="btn-primary">
        A COMPRAR 
      </button>
    </section>
    <!-- End Hero section -->
   
    <!-- Introduction section -->
    <section class="introduction cambiafondo cambiafuente">
      <h1 class="introduction__title cambiafuente cambiatexto">
       REGISTRATE PARA OBTENER UN CUPON DE DESCUENTO !
      </h1>
      <hr/>
    <form method="post">
      <div class="input-group mb-3 suscribirse">
      <input type="email" class="form-control" placeholder="correo" id="demo" name="correo">
      <div class="input-group-append">
        <span class="input-group-text">@ejemplo.com</span>
      </div>
    </div>
     <?php
		//lucky7original@gmail.com
		//equipodinamita11
			if (isset($_POST['send'])){
				include("sendemail1.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
				
				/*Configuracion de variables para enviar el correo*/
				$mail_username="lucky7original@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="equipodinamita11";//Tu contraseña de gmail
				$correo = $_POST['correo'];
				$mail_addAddress=$correo;//correo electronico que recibira el mensaje
				$template="email_template_suscripcion.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				
				/*Inicio captura de datos enviados por $_POST para enviar el correo */
				$mail_setFromEmail=$_POST['correo'];
				$mail_setFromName="SUSCRIPCION";
				
				
				//random
				$txt_message=0;
				$d=rand(1,3);
  				//echo $d; 
				$random=$d;
				if($random == 1){
					$txt_message = "http://34.94.135.88/bd_hosting/PROYECTO_FIN/img/cupon1.png";
				}elseif($random == 2){
					$txt_message = "http://34.94.135.88/bd_hosting/PROYECTO_FIN/img/cupon2.png";
				}elseif($random == 3){
					$txt_message = "http://34.94.135.88/bd_hosting/PROYECTO_FIN/img/cupon3.png";
				}
				
				
				//$mail_SetFromApellido=$_POST['apellido'];
				$mail_subject=" ";
sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
			}
		?>
      <button class="btn-secondary" name="send">
        subscribirse ahora
      </button>
      </form>
    </section>
    <!-- End Introduction section -->

   <!-- Gallery section -->
    <section class="gallery" >
      <article class="gallery__item gallery__item-1">
        <div class="gallery__item-overlay">
          <h1 class="gallery__item-title">
           <a class="categoria_a" href="categoriaH.php"  style="text-decoration: none; color: black">HOMBRE</a> 
          </h1>
          <h2 class="gallery__item-subtitle">
            MAN
          </h2>
        </div>
      </article>
      <article class="gallery__item gallery__item-2">
        <div class="gallery__item-overlay">
          <h1 class="gallery__item-title">
            <a class="categoria_a" href="categoriaM.php" style="text-decoration: none; color: white">MUJER</a> 
          </h1>
          <h2 class="gallery__item-subtitle">
            WOMAN
          </h2>
        </div>
      </article>
    <!-- End Gallery section -->
    
   

       <!--CARRUCEL DE IMAGENES-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/c1.jpg" alt=""  >
        </div>
        <div class="item">
            <img src="img/c2.png" alt="">
        </div>
        <div class="item">
            <img src="img/c3.png" alt="">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
        <!--CARRUCEL DE IMAGENES FIN-->
    <!-- Characteristics section -->
    <section class="characteristics cambiafondo cambiafuente">
      <h1 class="characteristics__title cambiafuente ">VISITANOS EN NUESTRAS REDES SOCIALES</h1>
      <hr class="primary-separator"/>
      <section class="characteristics__container" style="display: flex; padding: 0 90px; max-width: 1400px
       margin: 0 auto;
       flex-wrap: wrap;">
        <article class="characteristics__item">
         <a href="https://www.facebook.com/Lucky-7-100763338067666/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook primary-icon"></i></a>
          <h2 class="characteristics__item-title cambiafuente">
            Facebook
          </h2>
          <p class="characteristics__item-paragraph cambiafuente">
          Podras encontrar publicaciones de la tienda, asi como posts de otras personas.
          </p>
        </article>
        <article class="characteristics__item">
			<a href="https://www.messenger.com/t/100763338067666" target="_blank"><i class="fab fa-facebook-messenger primary-icon"></i></a>
          <h2 class="characteristics__item-title cambiafuente">
            Messenger
          </h2>
          <p class="characteristics__item-paragraph cambiafuente">
          Envianos un mensaje a messenger con tu opinion.
          </p>
        </article>
        <article class="characteristics__item">
         <a href="https://www.instagram.com/luckysevenoriginal/?hl=es-la" target="_blank"><i class="fab fa-instagram primary-icon"></i></a>
          <h2 class="characteristics__item-title cambiafuente">
            Instagram
          </h2>
          <p class="characteristics__item-paragraph cambiafuente">
          Ve todas nuestras post con algunos outfits para ti.
          </p>
        </article>
        <article class="characteristics__item">
         <a href="https://twitter.com/lucky781420356" target="_blank"><i class="fab fa-twitter primary-icon"></i></a>
          <h2 class="characteristics__item-title cambiafuente">
            Twitter
          </h2>
          <p class="characteristics__item-paragraph cambiafuente">
          Sigue toda nuestra fanpage para mas publicidad.
          </p>
        </article>
      </section>
    </section>
    <!-- End characteristics section -->



<footer class="jumbotron text-center text-body" style="margin:0px; width: 100%;">
 <p class="pie_parrafo">Lucky 7 México y Centroamérica ©2019 | LA MODA N0 ES NADA SIN PERSONAS</p>
 <p class="pie_parrafo">Todos los derechos reservados</p>
  <p class="pie_parrafo1">Num Visitas: <?php $visitante = contador(); echo  $visitante; ?> </p>
</footer>
    <script src="js/password.js"></script>
    <script src="js/refresh.js"></script>

      <!-- ARCHIVOS JSACCESIBILIDAD -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/js.cookie.js"></script>
      <script src="js/functions.js"></script>
      <!-- FIN ARCHIVOS -->



  </body>
</html>
