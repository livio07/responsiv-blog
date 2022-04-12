<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="card">
<div class="card-header text-center">
Reinitialisation mot de passe
</div>
<div class="card-body">
<?php
require_once 'connexion.php';
if($_GET['key'] && $_GET['token']){
    $email = mysqli_real_escape_string($conn, $_GET['key']);
    $token = $_GET['token'];
    $time_out = time()+3600;

    $req = "SELECT * FROM users WHERE email='$email'";
    $sql = mysqli_query($conn,$req);


    if (mysqli_num_rows($sql) > 0) {
    $row= mysqli_fetch_array($sql);
    
    if($row){ ?>
        <form action="update-forget-password.php" method="post">
        <input type="text" name="email" value="<?=$email;?>">
        
        <div class="form-group">
            
            <input type="password" name='password' placeholder="password" class="form-control"/>
        </div>                
        <div class="form-group">
            
            <input type="password" name='cpassword' placeholder="confirm pawword" class="form-control"/>
        </div>
        <button type="submit" name="new-password" class="btn btn-primary">Valider</button>
    </form>
    <?php } } else{?>
    <p>Le link pour la reinitialisation du mot de passe a expiré</p><?php
    }
}
?>
</div>
</div>
</div>
</body>
</html>