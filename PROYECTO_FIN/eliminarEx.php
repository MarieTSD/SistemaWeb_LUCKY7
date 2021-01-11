<?php
   session_start();
error_reporting(0); 
$serv = 'localhost';
   $cuenta = 'root';
   $contra = '';
   $BaseD = 'lucky7';

 $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);

foreach ($_SESSION["shopping_cart"] as $product){
    $uno = $product['ids'];
    $cuatro = $product['ex'] - $product['quantity'];
    $ne="update prod set existencia = '$cuatro' WHERE id='$uno'";
    $fin = $conexion -> query($ne);
	error_reporting(0);
}

?>