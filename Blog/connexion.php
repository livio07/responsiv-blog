<?php
$host="localhost";
$user="root";
$pass="";
$db="canada";

$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_error()){
    die('connexion echouée');
}
?>
