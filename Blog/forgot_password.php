<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('connexion.php');
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      <title>Send Reset Password Link with Expiry Time</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Reinitialisation de votre mot de passe
            </div>
            <div class="card-body">
              <form action="password-reset-token.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Adresse mail</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
 
   </body>
</html>

<?php


require_once('connexion.php');
include('password-reset-token.php');
//require('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";
 
		$message = "Please use this password to login " . $password;
		$headers = "From : vivek@codingcyber.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}
 
	}else{
		echo "User name does not exist in database";
	}
}
 
 
?>