<?php
    
    $conexion = new mysqli("localhost","root","","lucky7"); 
    
    if($conexion){
        //echo "conexion exitosa"; 
    }else{
        echo "conexion fallida"; 
    }
?>