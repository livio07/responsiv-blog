<?php
session_start();

if($_SESSION['connexion']=="ko"){
    header('location:../blog/login.php');
}
if($_SESSION['connexion_admin']=="ko"){
  header('location:../blog/login.php');
}

if(!isset($_SESSION['connexion']) && !isset($_SESSION['connexion_admin'])){
  header('location:../blog/login.php');
}

function protection_minimal($conn, $var){
  return mysqli_real_escape_string($conn, $_POST[$var]);
}

require('connexion.php');


if(isset($_POST['btnmodif'])){
  $id = protection_minimal($conn, 'valider');
  $id = $_POST['valider'];
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);


  $sql = "UPDATE users SET email='$email', role='$role' WHERE id='$id'";
  $res = mysqli_query($conn, $sql); 
  if(!$res){
    echo "Erreur de modification";
    }
}

$id = $email = $role = '';

$sql = "SELECT id, email, role FROM users WHERE 1";
$res = mysqli_query($conn, $sql);
if(!$res){
    die("BDD non accessible");
}
$all = mysqli_fetch_all($res,MYSQLI_ASSOC);
mysqli_free_result($res);

$em = $ro = $champ_id = '';

if(isset($_POST['update'])){
  $id = mysqli_real_escape_string($conn, $_POST['update']);
    
  $sql = "SELECT * FROM users WHERE id='$id'";
  $res = mysqli_query($conn, $sql);
  $enreg = mysqli_fetch_assoc($res);
  
  if(!$res){
    echo "Erreur de table";
    }
  $em = $enreg['email'];
  $ro = htmlentities($enreg['role']);
  $champ_id = '<input type="hidden" name="valider" value="'.$id. '">'; 
}

?>
<?php include('../Blog/includes/head_section.php'); ?>

<div class="contour-menu">

    <?php

    include('../Blog/includes/menu.php');?>

</div>
<h1 class="blog-h1">Liste des utilisateurs</h1>
<div class="contour-form-role">
<form class="role-modify" method="post" >

  <div class="jumbotron modify-role" style="background-color: transparent" >
    <label for="email" >Email : &nbsp; </label><br>
    <input type="text" id="email" name="email" placeholder="entrez l'adresse email ici..." value="<?=$em?>" ><br>
    <label for="role">Role : &nbsp; </label><br>
    <input type="text" id="role" name="role" placeholder="entrez le role ici..." value="<?=$ro?>" ><br>
                
    <?=$champ_id?>
                
    <?php if(isset($_POST['update'])){
      echo '<button class="btn btn-info" type="submit" name="btnmodif" value="btnmodif"> Valider les modifications </button>';
    }?>
  
  </div>
</form>

<table class="user-table-role">
        <thead class="user-role-id">
          <tr>
            <th scope="">ID</th>
            <th scope="">Email</th>
            <th scope="" >Role</th>
          </tr>
        </thead>
        <tbody>
        
<?php foreach($all as $key => $value) : ?>
            <form action="utilisateur.php"  method="post" >
                <tr class="user-role-id">
                  <td class="col-3 col-md-4"><?=$value['id']?></td> &nbsp;&nbsp;
                  <td class="col-3 col-md-4"><?=$value['email']?></td>
                  <td class="col-3 col-md-4"><?=$value['role']?></td>
                  <td class="col-3 col-md-4">
                    <button class="btn btn-info user-button-role" title="Modifier" type="submit" value="<?=$value['id']?>" name="update">Editer</button>
                  </td>
                </tr>               
              <?php endforeach;?>
            </form>
          </tbody>
      </table>
    </div>
  </pre>
</form>
    </div>

<footer class="login-footer ">

<div class="footer-list">



</div>
<p class="footer-paragraph">
    Copyright &copy;| Crée par mohamed et liviu | Tous droits réservés
</p>
</footer>