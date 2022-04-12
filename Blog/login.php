<?php
session_start();

$_SESSION['connexion']="ko";
$_SESSION['connexion_admin']="ko";

function protection_minimal($conn, $var){
    return mysqli_real_escape_string($conn, $_POST[$var]);
}

require_once('connexion.php');

$mail = $password = $submit = $error = '';

if(isset($_POST['submit'])){



	if(!empty($_POST['mail']) && !empty($_POST['password'])) {
		mysqli_set_charset($conn, 'utf8mb4');
		$mail = mysqli_real_escape_string($conn, $_POST['mail']);
  		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM users WHERE email LIKE '$mail'";

		$run = mysqli_query($conn, $sql);
		$all = mysqli_fetch_array($run, MYSQLI_ASSOC);

		if($all){
		// foreach($all as $k => $value);
		if(password_verify($password, $all['password'])) {

            $role = $all['role'];
            $_SESSION['mail'] = $mail;
            $_SESSION['connexion'] = "ok";
            header('location: index.php');

            if ($role == '["admin"]') {
                $_SESSION['connexion_admin'] = "ok";
                header('location: index.php');
            }

        }
        }else {
			$error = "Adresse mail / mot de passe incorrects";
		}

        ?> <div class="animation-error"><?php
	}else{

        $error = ' champs vide !';

    }
    ?> </div> <?php
    }

mysqli_close($conn);
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

    include('../Blog/includes/menu.php');?>

</div>
<div class="container-login">


	<section class="login-contour" >
		<form class="login" method="post" >
            <div class="login-header-image"></div>
			<h2>Connexion au Blog :</h2>
			<input type="text" name="mail" placeholder="Adresse mail">
			<input type="password" name="password"  placeholder="Mot de passe">
            <span class="psw"><a href="forgot_password.php">Mot de passe oublié ?</a></span>
			<button class="btn" type="submit" name="submit">Se connecter</button>

			<div class="notif">
            	<?php echo $error ;?>

			</div>
            <hr>
            <p class="inscription-for-login">Vous n'avez pas de compte? <a href="inscription.php">S'inscrire Ici.</a></p>
		</form>


    </section>
        <footer class="login-footer">

            <div class="footer-list">



            </div>
            <p class="footer-paragraph">
                Copyright &copy;| Crée par mohamed et liviu | Tous droits réservés
            </p>
        </footer>


</div>



</body>

</html>