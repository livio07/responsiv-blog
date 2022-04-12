<?php
session_start();

unset($_SESSION['mail']);
unset($_SESSION['connexion']);
unset($_SESSION['connexion_admin']);

header('location:index.php');
?>