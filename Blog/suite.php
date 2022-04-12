<?php

if(!isset($_SESSION['connexion']) && !isset($_SESSION['connexion_admin'])){
  header('location:../blog/login.php');
}
//if(isset($_SESSION['connexion_admin'])== "ko"){
 // header('location:../blog/login.php');
//}

function protection_minimal($conn, $var){
    return mysqli_real_escape_string($conn, $_POST[$var]);
}
require('connexion.php');
//ici j' ajoute
if(isset($_POST['ajouter'])){
  $titre = mysqli_real_escape_string($conn, $_POST['titre']);
  $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
  $datepub = mysqli_real_escape_string($conn, $_POST['datepub']);
  $contenu = mysqli_real_escape_string($conn, $_POST['contenu']);
  $sql = "insert into articles (titre, auteur, datepub, contenu) values ('$titre', '$auteur', '$datepub', '$contenu')";
  $res = mysqli_query($conn, $sql);
  if(!$res){
      echo "Erreur de ajout";
  }
}
//ici je supprime
if(isset($_POST['id_delete'])){
  $id = protection_minimal($conn, 'id_delete');
  $sql = "delete from articles where id='$id'";
  $res = mysqli_query($conn, $sql);
  if(!$res){
  echo "Erreur de suppression";
  }
}
//ici j'edite
if(isset($_POST['btnmodif'])){
  $id = protection_minimal($conn, 'valider');
  $id = $_POST['valider'];
  
  $titre = mysqli_real_escape_string($conn, $_POST['titre']);
  $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
  $datepub = mysqli_real_escape_string($conn, $_POST['datepub']);
  $contenu = mysqli_real_escape_string($conn, $_POST['contenu']);


  $sql = "update articles set titre='$titre', auteur='$auteur', datepub='$datepub', contenu='$contenu' where id='$id'";
  $res = mysqli_query($conn, $sql); 
  if(!$res){
    echo "Erreur de modification";
    }
}

$t = $a = $d = $c = $champ_id = '';

if(isset($_POST['id_update'])){
  $id = mysqli_real_escape_string($conn, $_POST['id_update']);
  $sql = "select * FROM articles where id='$id'";
  $res = mysqli_query($conn, $sql);
  $all = mysqli_fetch_assoc($res);
  if(!$res){
    echo "Erreur de table";
    }
  $t =  $all['titre'];
  $a =  $all['auteur'];
  $d =  $all['datepub'];
  $c = $all['contenu'];
  $champ_id = '<input type="hidden" name="valider" value="'. $id. '">'; 
}

//archiver
if(isset($_POST['id_archive'])){
  $id = mysqli_real_escape_string($conn, $_POST['id_archive']);
  $sql = "update articles set isarchived=1 where id='$id'";
  $res = mysqli_query($conn, $sql);
}
//desarchiver
if(isset($_POST['id_desarchive'])){
  $id = mysqli_real_escape_string($conn, $_POST['id_desarchive']);
  $sql = "update articles set isarchived=0 where id='$id'";
  $res = mysqli_query($conn, $sql);
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


<body class="admin-body">

<div class="contour-menu">
<?php include('..\blog\includes\menu.php'); ?>
</div>
<form action="admin.php" method="post" >

    <div class="contour-admin-blog" >

          <div class="contour-article-admin-blog"  >
<h1 >GESTION DES ARTICLES</h1>
        <div class="admin-blog-enter-article-info">
            <div class="admin-blog-input-title">
              <label for="titre" >Titre : </label>
              <input type="text" style="width:50%" id="titre" name="titre" placeholder="entrez un titre ici..." value="<?=$t?>" ><br>
            </div>
            <div class="admin-blog-input-auteur">
                <label for="auteur">Auteur : </label>
                <input type="text" style="width:50%" id="auteur" name="auteur" placeholder="entrez un auteur ici..." value="<?=$a?>" ><br>
            </div>
            <div class="admin-blog-input-datepub">

            <label for="datepub">Date de publication : </label>
                <input type="date" style="width:18%" id="datepub" name="datepub" value="<?=$d?>"><br>
            </div>

        </div>
              
              <textarea class="textarea-admin-blog" type="textarea" type="text" class="input-contenu"  name="contenu" placeholder="Contenu" value=""> <?=$c?> </textarea> <br>
              
              <?=$champ_id?>

<div class="contour-button-action-blog-admin">
                <?php if(isset($_POST['id_update'])){
                  $str = '';

                  $str.= '<button class="btn btn-primary button-admin-blog-top button-admin-blog-left" type="submit" name="btnmodif" value="btnmodif"> Valider les modifications </button>';

                }else{
                  $str = '';

                  $str= '<button class="btn btn-primary button-admin-blog-top button-admin-blog-left" type="submit" name="ajouter" value="ajouter"> Ajouter l\'article </button>';

                }
                echo $str ;
                ?>

            <button type="submit" class="btn btn-primary button-admin-blog-top button-admin-blog-center" name="archiver" value="archiveAll">Tout Archiver</button>
            <button type="submit" class="btn btn-primary button-admin-blog-top button-admin-blog-right" name="desarchiver" value="unarchiveAll">Tout Desarchiver</button>
          </div>
        </div>
          <div>

            <?php if(isset($_POST['archiver'])){
                  $sql = "update articles set isarchived=1 where 1";
                  $res = mysqli_query($conn, $sql);
            }
            ?>

            <?php if(isset($_POST['desarchiver'])){

                  $sql = "update articles set isarchived=0 where 1";
                  $res = mysqli_query($conn, $sql);
            }
            ?>
          </div>

      <div class="body-admin-article" >
      <div class="table table-dark">

<!--            <div style="text-align:center" ></div> a supprimer si rien n'est ajouter -->

        <tbody >
        
              <?php
              $sql = "select * FROM articles ";
              $res = mysqli_query($conn, $sql);
              if(!$res){
                  die("BDD non accessible");
              }

              $all = mysqli_fetch_all($res,MYSQLI_ASSOC);
              mysqli_free_result($res);
                ?>  <div class="admin-blog-container-article"> <?php
              foreach($all as $key => $value) :?>
                <div class="admin-blog-contour-article">
                  <div class="td-titre"><?=$value['titre'] ?></div>
                  <div class="td-auteur-datepub">Publié le <?=$value['datepub']  ?> par <?=$value['auteur']?> </div>
                  <div class="td-contenu" ><?=$value['contenu'] ?></div>

                  <div class="col-4 col-md-2 text-center" style="display: flex; flex-direction: row" >

                    <form class="admin-form-3button-article" action="admin.php" method="post" >

                      <button class="admin-button-edite " title="Editer Infos" type="submit" value="<?=$value['id']?>" name="id_update">Editer</button>
                      <button class="admin-button-delete" title="Supprimer Livre" type="submit" value="<?=$value['id']?>" onclick="return confirm('Vous êtes sûr de vouloir supprimer cet article?')" name="id_delete">Supprimer</button>

                      <?php
                      if($value['isarchived']) {
                        echo '<button class="admin-button-archive" title="Desarchiver Livre" type="submit" value="'. $value['id'] . '"name="id_desarchive">Desarchiver</button>';
                      }else{
                        echo '<button class="admin-button-archive" title="Archiver Livre" type="submit" value="' . $value['id'] . '"name="id_archive">Archiver</button>';
                      }       
                      ?>
                    </form>
                  </div>
                </div>
              <?php endforeach;?> </div>

        </tbody>
      </div>
      </div>
    </div>

</form>
<footer class="login-footer">

    <div class="footer-list">



    </div>
    <p class="footer-paragraph">
        Copyright &copy;| Crée par mohamed et liviu | Tous droits réservés
    </p>
</footer>
<script src="static/js/blog.js" ></script>
        </body>
</html>
        