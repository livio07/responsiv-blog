<?php

$name = '';
$mail = '';
$message = '';
$error = '';

$name = $_POST['name'] ?? '';
$mail = $_POST['mail'] ?? '';
$message = $_POST['message'] ?? '';


if(!empty($name) && !empty($message)){
    $error = "Votre message a été envoyé";
    }else{
    $error = "Veuillez remplir tous les champs";
    
  };

  require('connexion.php');

  if(isset($_POST['ajouter'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
  
    $sql = "insert into contact (name, email, message) values ('$name', '$mail', '$message')";
    $res = mysqli_query($conn, $sql);
    
  }
?>

<body>
  
<?php //include('../Blog/includes/head_section.php');
//include('../Blog/includes/menu.php');?>

<section class="contact" id="contact">

<div class="box-contact">
<h1 class="contact-heading center" >Contactez-nous</h1><br>
    
<form class="contact-form center" action="" method="post">
  <div class="input-group">
    <label>Nom complet</label>        
    <input type="text" name="name" class="contact-input" placeholder="Entrez votre nom et prénom" required >
  </div>
  <div class="input-groups">
    <div class="input-group">
      <label>Email</label>
      <input type="text" class="contact-input" name="mail" required value=<?php echo $_SESSION['mail'];?>>
    </div>

  </div>

  <div class="input-group">
    <label>Message</label>
    <textarea class="form-textarea" name="message" placeholder="Votre message ici..."></textarea>
  </div>
  <input type="submit" value="Envoyer" name="ajouter" class="form-btn">
  
  <div class="notif">
    <?php if($error): echo $error; endif;?>
  </div>
      
</form>


    </div>
</section>
<?php //include('../Blog/includes/footer.php');?>


</body>




