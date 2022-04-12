<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include('../Blog/includes/head_section.php')?>;

<body>
<?php
if(empty($_SESSION['connexion']) && empty($_SESSION['connexion_admin']) ){
$_SESSION['connexion']= "ko";
$_SESSION['connexion_admin'] = "ko";
$_SESSION['mail']= '';

};


?>

<div class="container">
    <?php include('../Blog/includes/menu.php')?>;

    <!--Header-->
    <header class=" header center " id="header-bgi">
        <div class="header-text">
            <h1 class="heading">Nouvelle vision du monde</h1>
            <p class="header-paragraph">Découvrez de nouveaux horizons au coeur du canada avec Canada Horizon</p>
        </div>
        <img
                alt="header image"
                class="header-image"
                src="assets/images/air-balloon.png"
        >
        <div class="logo">
            <div><img class="logo-canada" src="assets/logo/logomongolfiere.png"></div>
            <h2>

                <span> &nbsp </span>
                <span class="logo-style center ">H</span>
                <span class="logo-style center ">o</span>
                <span class="logo-style center ">r</span>
                <span class="logo-style center ">i</span>
                <span class="logo-style center ">z</span>
                <span class="logo-style center ">o</span>
                <span class="logo-style center ">n</span>
            </h2>

        </div>
    </header>
    <!--End of header-->

    <!-- todo Popular tours -->
    <div id="index-voyage"><?php	include('voyage.php');?></div>
    <!-- todo End of Popular tours -->

    <!-- todo Stories -->
    <div id="index-avis_client"><?php	include('avis_client.php');?></div>
    <!-- todo End of Stories -->
    
    <!-- todo team -->
        <div id="team"><?php	include('team.php');?></div>
    <!-- todo end of team -->
    
    <!-- todo Contact -->
    <div id="index-contact"><?php	include('contact.php');?></div>

    <!-- todo End of Contact -->

    <!-- todo Footer -->
	<?php	include('../Blog/includes/footer.php');?>
    <!-- todo End of Footer -->

</div>


 </body>
</html>






















