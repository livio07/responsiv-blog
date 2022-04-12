<?php
session_start();

if(!isset($_SESSION['connexion']) && !isset($_SESSION['connexion_admin'])){
    header('location:../blog/login.php');
}

if($_SESSION['connexion']=="ko"){
    header('location:../blog/login.php');
}
require 'connexion.php';

$sql = "select * FROM articles ";
$res = mysqli_query($conn, $sql);
if(!$res){
    die("BDD non accessible");
}

$all = mysqli_fetch_all($res,MYSQLI_ASSOC);
mysqli_free_result($res);
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


<body class="blog-body">

<div class="contour-menu">
    <?php include('..\blog\includes\menu.php'); ?>
</div>
<div class="banner-blog"></div>
<div class="admin-blog-container-article  blog-container-article&" >
    <?php
    foreach($all as $key => $value) :?>
        <div class="admin-blog-contour-article">
        <div class="td-titre"><?=$value['titre'] ?></div>
        <div class="td-auteur-datepub">Publié le <?=$value['datepub']  ?> par <?=$value['auteur']?> </div>

    <?php
    $sql = "SELECT * FROM images WHERE id=7";
    $query = $conn->query($sql);
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
            $imageURL = 'static/images/'.$row["file_name"];
            ?>
            <img src="<?php echo $imageURL; ?>" alt=""/>
            <?php
            }
        }else{
            echo '<p>Aucune image(s) trouvée...</p>';
        }
    $sql = "SELECT * FROM images WHERE id=50";
    $query = $conn->query($sql);
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
            $imageURL = 'static/images/'.$row["file_name"];
            ?>
            <img src="<?php echo $imageURL; ?>" alt=""/>
            <?php
            }
        }else{
            echo '<p>Aucune image(s) trouvée...</p>';
        }
    ?>
    <div class="td-contenu" ><?=$value['contenu'] ?></div>
</div>

<?php endforeach;?>

<footer class="login-footer blog-footer">
    <div class="footer-list"></div>
        <p class="footer-paragraph">
            Copyright &copy;| Crée par mohamed et liviu | Tous droits réservés
        </p>
</footer>
</body>
</html>
