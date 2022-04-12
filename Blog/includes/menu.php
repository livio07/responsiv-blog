<menu>
    <menu class="menu">
        <div class="menu-list">

			
			<a class="menu-link" href="index.php">Accueil</a>
			<a href="../blog/index.php#index-voyage" class="menu-link">Voyages</a>
			<a href="../blog/index.php#index-avis_client" class="menu-link ">Témoignages</a>
            <a href="../blog/index.php#team" class="menu-link ">Team</a>
			<a href="../blog/index.php#index-contact" class="menu-link">Contact</a>
			
			<?php
            if($_SESSION['connexion']=="ok") {
				echo '<a href="alpha-blog.php" class="menu-link menu-blog" >Blog</a>';
								
				if($_SESSION['connexion_admin']=="ok"){
				echo '<a href="admin.php" class="menu-link menu-admin">Gestion</a>';
				echo '<a href="utilisateur.php" class="menu-link menu-role">Roles</a>';
				echo '<a href="upload.php" class="menu-link menu-role">Gallerie</a>';
				}
				echo '<a href="deconnexion.php"class="menu-link menu-quitter">Quitter</a>';
				
			}else{
				echo'<a href="../blog/login.php" class="menu-link menu-conexion" >Connexion</a>';
				echo'<a href="../blog/inscription.php" class="menu-link menu-conexion" >S\'inscrire</a>';
				}
			?>
        </div>
    </menu>
</menu>

