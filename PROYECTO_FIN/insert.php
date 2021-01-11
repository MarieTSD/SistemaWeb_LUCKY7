<?php
session_start();
error_reporting(0);
$uname = $_SESSION['username'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'lucky7');
$quien = $_SESSION['chat'];
$tabla = $quien.""."lucky7";
  $nom = $_SESSION['username'];
mysqli_query($con,"INSERT INTO logs (`username`, `msg`, `nom`) VALUES ('$tabla', '$msg', '$nom')");
 $quien = $_SESSION['chat'];
//
//$result1 = mysqli_query($con,"SELECT * FROM logs WHERE username LIKE '$quien' ORDER BY id DESC");
////$result1 = mysqli_query($con,"SELECT * FROM logs");
//$con = mysqli_connect('localhost','root','');
//mysqli_select_db($con,'chatbox');
//while($extract = mysqli_fetch_array($result1)) {
//	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
//}