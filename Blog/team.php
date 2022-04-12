<?php
//session_start();

if(empty($_SESSION['connexion']) && empty($_SESSION['connexion_admin']) ){	
	$_SESSION['connexion']= "ko";
	$_SESSION['connexion_admin'] = "ko";
	$_SESSION['mail']= '';
	
};?>

<?php include('../Blog/includes/head_section.php');
//include('../Blog/includes/menu.php');?>

<section class="main_team" id="main_team">
    <h1 class="popular-tours-heading">Rencontrez notre Equipe !</h1>
     
        <div class="team">
            <div class="member">
                <img src="static\images\team4.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Jean-Yves Leblanc</h2>
                    <p class="title">Président</p>
                    <p>40 ans d'expérience, il est le grand ordonnateur de vos périples, notamment vers la partie francophone du Canada.</p>
                    <p class="addmail">jean-yves@canada-horizon.com</p>
                </div>
            </div>
            <div class="member">
                <img src="static\images\ceo.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Brigitte Dubois</h2>
                    <p class="title">Vice Présidente</p>
                    <p>20 ans d'expérience consacrés à toutes les destinations de Canada. Un sens inné de l'écoute et du service doublé d'une grande disponibilité sont les indéniables qualités que lui reconnaissent nos fidèles clients.</p>
                    <p class="addmail">brigitte@canada-horizon.com</p>
                </div>
            </div>
            <div class="member">
                <img src="static\images\team1.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Yasmine Alaoui</h2>
                    <p class="title">Conseillère voyages</p>
                    <p>Un dynamisme à toute épreuve et une connaissance approfondie des plus belles destinations au Canada : une conseillère hors pair. Laissez-vous tenter par ses coups de cœur et ses adresses de charme !</p>
                    <p class="addmail">yasmine@canada-horizon.com</p>
                </div>
            </div>
            <div class="member">
                <img src="static\images\team2.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Olivier Lequébécois</h2>
                    <p class="title">Responsable voyages d'affaires</p>
                    <p>Une carrière entièrement vouée aux voyages d'affaires. De la haute précision, qui lui vaut la fidélité sans faille d'importantes sociétés issues notamment de la Communication et de la Publicité</p>
                    <p class="addmail">olivier@canada-horizon.com</p>
                </div>
            </div>
            <div class="member">
                <img src="static\images\team3.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Emmanuel Maquerreaux</h2>
                    <p class="title">Responsable communication et publicité</p>
                    <p>"Manu" pour les intimes, le lien vital entre Vous et Nous. Sa bonne humeur, son professionnalisme et sa grande rigueur sont unanimement appréciés.</p>
                    <p class="addmail">manu@canada-horizon.com</p>
                </div>
            </div>
            <div class="member">
                <img src="static\images\team5.jpg" alt="">
                <div class="story-paragraph">
                    <h2 >Camille Torron</h2>
                    <p class="title">Responsable billeterie</p>
                    <p>Hautement spécialisée en billetterie, appréciée pour sa rigueur dans la gestion des voyages. Elle règne en maître sur tous les tarifs et combinaisons de transport, ainsi que sur les nouveaux outils technologiques.</p>
                    <p class="addmail">camille@canada-horizon.com</p>
                </div>
            </div>
        </div>
    


</section>

<style>
    
.team {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 2rem;
  margin-top: 3rem;
}

.team .member {
  position: relative;
  border-radius: 5px;
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.1);
  
}

.team .member:hover {
  box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.3);
  }


.team .member img {
  width: 100%;
  height: 300px;
  
}
.addmail, .title{
    color: var(--primary-color);
}

@media screen and (max-width: 720px) {
    .team{
        grid-template-columns: 1fr;
        padding-bottom: 6rem;
    }
}

</style>