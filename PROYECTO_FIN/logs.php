<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'lucky7');
$quien = $_SESSION['chat'];
$tabla2 = $quien.""."lucky7";
$result1 = mysqli_query($con,"SELECT * FROM logs WHERE username LIKE '$tabla2' ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
        echo "<span>" . $extract['nom'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}