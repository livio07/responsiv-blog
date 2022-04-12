<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    require_once "connexion.php";
     
    $emailId = mysqli_real_escape_string($conn, $_POST['email']);
 
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
  $token = md5($emailId).rand(10,9999);
  $time_out = time()+3600;
     
    $password = '';
 
    $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $time_out . "' WHERE email='" . $emailId . "'");
 
    $link = "<a href='http://localhost/projets-php/proyecto/Blog-up/blog/reset-password.php?key=".$emailId."&token=".$token."'>Click ici pour reinitialiser votre mot de passe</a>";
 
 
    //require_once('phpmail/PHPMailerAutoload.php');
 
    
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "lidax@libero.it";
    // GMAIL password
    $mail->Password = "Saturnalia99$";
    $mail->SMTPSecure = "ssl";  
    $mail->SMTPDebug = 3;
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.libero.it";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='lidax@libero.it';
    $mail->FromName='Centre reset_pwd';
    $mail->AddAddress($emailId, 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click sur le Link pour reinitialiser le mot de passe '.$link.'';
    if($mail->Send())
    {
      echo "Vérifiez votre email et cliquez sur le link qu'on vous a envoyé";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Retour";
  }
}
?>