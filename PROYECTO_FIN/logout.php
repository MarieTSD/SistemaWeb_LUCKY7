<?php

session_start();

$_SESSION['usuario']=null;
//session_destroy();
header("Location: index.php");
$_SESSION['usuario']=null;
?>