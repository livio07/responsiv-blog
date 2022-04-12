<?php
session_start();
//sécuriser la session de connexion
if($_SESSION['connexion_admin'] == "ko") {
  header('location:../blog/login.php');
}
if(!isset($_SESSION['connexion']) && !isset($_SESSION['connexion_admin'])){
  header('location:../blog/login.php');
}
require_once('connexion.php');

if(isset($_POST['submit'])){ 
  //configuration upload images
  $targetDir = "static/images/"; 
  $allowTypes = array('jpg','png','jpeg','gif'); 
  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
  $fileNames = array_filter($_FILES['files']['name']); 
  if(!empty($fileNames)){ 
      foreach($_FILES['files']['name'] as $key=>$val){ 
          //déclarer le chemin des fichiers à charger 
          $fileName = basename($_FILES['files']['name'][$key]); 
          $targetFilePath = $targetDir . $fileName; 
           
          //vérifier si le type de fichier est valide
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          if(in_array($fileType, $allowTypes)){ 
              //charger le fichier sur le serveur
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                  $insertValuesSQL .= "('".$fileName."', NOW()),"; 
              }else{ 
                  $errorUpload .= $_FILES['files']['name'][$key].' | '; 
              } 
          }else{ 
              $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
          } 
        } 
      
      
      // gestion des messages d'erreur
      $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
      $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
      $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
       
      if(!empty($insertValuesSQL)){ 
          $insertValuesSQL = trim($insertValuesSQL, ','); 
          // Insert image dans la bdd 
          $insert = $conn->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
          if($insert){ 
              $statusMsg = "Le fichier a été chargé avec succès.".$errorMsg; 
          }else{ 
              $statusMsg = "Désolé, une erreur est survenue pendant le chargement du fichier."; 
          } 
      }else{ 
          $statusMsg = "Erreur de chargement".$errorMsg; 
      } 
  }else{ 
      $statusMsg = 'Choisir un fichier à charger.'; 
  } 
}
include('..\blog\includes\head_section.php');
?>

<body class="body-upload">
  <div class="contour-menu">
<?php
  include('..\blog\includes\menu.php');?>
  </div>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <div class="upfrm">
<?php if(!empty($statusMsg)){?>
      <p class="status-msg"><?php echo $statusMsg;?></p>
<?php } ?>
    <form class="jumbotron form-upload" action="upload.php" method="post" enctype="multipart/form-data">
        <p>Charger une image : </p>
        <label class="files-upload" for="files-upload" > ⚡ </label>
        <input id="files-upload" style="visibility:hidden;" type="file" name="files[]" multiple >
        <p>Integrer l'image charger : </p>

        <label class="files-upload" for="integration-upload" > + </label>
        <input id="integration-upload" type="submit" style="visibility:hidden;" name="submit" value="Integrer">
    </form>
  </div>
<?php
  //requetes pour select et afficher les images avec le bouton delete
  $sql = "SELECT * from images";
	$res = mysqli_query($conn, $sql);
  	while($row = mysqli_fetch_assoc($res))
		{
		$imageURL = "static/images/".$row['file_name'];
?>
    <div class="container-upload">
			<div class="content-image-upload" style="margin-top:10px">
				<img src="<?php echo $imageURL ?>" width="200"><br>
				<a href="?deleteid=<?php echo $row["id"]?>" onclick="return confirm('Vous êtes sûr de vouloir supprimer cette image?')" class="btn btn-primary upload-delete-button">×</a>
			</div>
    </div>
<?php }
?>

<?php
    //requete pour supprimer les images de la bdd
    if(isset($_GET['deleteid'])){
      $sql = "SELECT * from images where id = ".$_GET['deleteid'];
      $res = mysqli_query($conn,$sql);
      $fetchRecords = mysqli_fetch_assoc($res);
      $fetchImgTitleName = $fetchRecords['file_name'];
      $createDeletePath = "static/images/".$fetchImgTitleName;
      if($createDeletePath)
      {
        $liveSqlQQ = "delete from images where id = ".$fetchRecords['id'];
        $rsDelete = mysqli_query($conn, $liveSqlQQ);
        if($rsDelete){
          echo "<script> window.location.href='upload.php?success=true'</script>";
          exit();
        }
      }
      else
      {
        $displayErrMessage = "Unable to delete Image";
      }

  }
  mysqli_close($conn);
?>
</body>