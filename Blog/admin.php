<?php
session_start();
if(!isset($_SESSION['connexion']) && !isset($_SESSION['connexion_admin'])){
  header('location:../blog/login.php');
}

if($_SESSION['connexion_admin'] == "ko") {
  header('location:../blog/login.php');
}

require_once('suite.php');


?>


