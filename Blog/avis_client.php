<?php
//session_start();

if(empty($_SESSION['connexion']) && empty($_SESSION['connexion_admin']) ){	
	$_SESSION['connexion']= "ko";
	$_SESSION['connexion_admin'] = "ko";
	$_SESSION['mail']= '';
	
};?>

<?php include('../Blog/includes/head_section.php');
//include('../Blog/includes/menu.php');?>

<!-- todo Stories -->
<section class="stories" id="stories">
        <div class="video-container">
            <video class="bg-video" autoplay muted loop>
                <source src="assets/images/video.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="stories-wrapper">
            <div class="story-bg">
                <div class="story">
                    <img
                            src="assets/images/story-img-1.jpg"
                            alt="Customer image"
                            class="story-image"
                    />
                    <div class="story-text">
                        <h1 class="story-heading">
                            J'ai passé les meilleurs moments de l'année
                        </h1>
                        <p class="story-paragraph">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto quas, repudiandae veritatis nam mollitia cumque
                            distinctio, quia aperiam aliquid at consequuntur libero
                            quisquam facilis laborum inventore repellat perspiciatis vel
                            fugiat molestias recusandae eum necessitatibus quo possimus
                            aspernatur? Nobis, architecto eaque.
                        </p>
                    </div>
                </div>
            </div>
            <div class="story-bg">
                <div class="story">
                    <img
                            src="assets/images/b-girl.jpg"
                            alt="Customer image"
                            class="story-image"
                    />
                    <div class="story-text">
                        <h1 class="story-heading">
                            Meilleur moment de ma vie avec Mohamed, ce beau gosse !
                        </h1>
                        <p class="story-paragraph">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto quas, repudiandae veritatis nam mollitia cumque
                            distinctio, quia aperiam aliquid at consequuntur libero
                            quisquam facilis laborum inventore repellat perspiciatis vel
                            fugiat molestias recusandae eum necessitatibus quo possimus
                            aspernatur? Nobis, architecto eaque.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- todo End of Stories -->
    <?php	//include('../Blog/includes/footer.php');?>
