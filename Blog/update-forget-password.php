<?php
require "connexion.php";

if(isset($_POST['password']) && $_POST['email']){
    
    $emailId = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE  email='$emailId'");
    $row = mysqli_num_rows($sql);
    if($row){
    mysqli_query($conn,"UPDATE users set password='$pass_hash' WHERE email='$emailId'");
    echo '<p>Félicitations! Votre mot de passe a été reinitialisé.</p>';
    echo '<span class="psw"><a href="login.php">Se connecter ici</a></span>';
    }else{
    echo "<p>Une erreur est survenue. Réessayer</p>";
    }
}
?>