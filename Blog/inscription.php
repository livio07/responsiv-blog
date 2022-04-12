<?php session_start(); require_once('connexion.php');


$mail = "";
$password = "";
$confirm_password = '' ;
$mail_err = $password_err = '';
$token = '';


if(isset($_POST['envoyer'])){

if(isset($_POST['mail'])) {
    $mail = $_POST['mail'];
    if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail_err = "Entrez une adresse mail valide<br>";
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0){
       $mail_err = "L'adresse mail existe déjà.";
    }
}

if(isset($_POST['password'])){
    $password = $_POST['password'];

    if(strlen($_POST['password']) < 3){
        $password_err = "Le mot de passe doit contenir au moins 3 characteres.<br>";
    }
    
}
if(isset($_POST['confirm_password'])){
    $confirm_password = $_POST['confirm_password'];
 
    if($password !=$confirm_password){
        $password_err .= "Le mot de passe et la confirmation ne correspondent pas.<br>";
    }
}

if($mail_err == '' && $password_err == '' ) {
      
    $user='["user"]';
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, password, role) VALUES ('$mail', '$pass_hash', '$user')";
    $run = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    if($run){
        header('location: confirmation_inscription.php');
    }else{
        echo 'formulaire pas envoyé';
    }
}
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <link href="../blog/static/assets/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link
            href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,600,700,900&display=swap"
            rel="stylesheet"
    />
    <link href="../blog/static/css/style.css" rel="stylesheet"/>
    <title>Canada Horizon</title>
</head>



<body>
<div class="contour-menu">

<?php

   include('../Blog/includes/menu.php'); ?>

</div>
<div class="container-login">


   <section class="login-contour" >
      <form class="login inscription-login " action="inscription.php" method="post" >
            <div class="login-header-image login-header-inscription"></div>
          <h2>Inscription :</h2>

          <input class="input-form-inscription" placeholder="Votre email ici..." type="text" name="mail" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mail; ?>">
                <span class="notif notif-inscription" ><?php echo $mail_err; ?></span>



<input class="input-form-inscription" placeholder="Votre mot de passe ici..." type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="notif notif-inscription" ><?php echo $password_err; ?></span>


            <input class="input-form-inscription" placeholder="Répétez votre mot de passe..." type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="notif notif-inscription" > <?php echo $password_err ;  ?></span>
          <button class="login-button-inscription" type="submit" name="envoyer" class="btn btn-primary">S'inscrire</button>
          <hr>
          <p class="inscription-for-login">Vous-avez deja un compte? <a href="login.php">Se connecter ici.</a></p>


          </div>

       </form>


   </section>
   <div class="inscription-footer">

      <div class="footer-list">



       </div>
       <p class="footer-paragraph">
           Copyright &copy;| Crée par mohamed et liviu | Tous droits réservés
       </p>
   </div>

</div>



</body>

</html>