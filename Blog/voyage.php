<?php
//session_start();

if(empty($_SESSION['connexion']) && empty($_SESSION['connexion_admin']) ){	
	$_SESSION['connexion']= "ko";
	$_SESSION['connexion_admin'] = "ko";
	$_SESSION['mail']= '';
	
};?>

<?php include('../Blog/includes/head_section.php');
//include('../Blog/includes/menu.php');?>

<!-- todo Popular tours -->
<section class="popular-tours" id="popular-tours">
        <h1 class="popular-tours-heading">Voyages populaires</h1>
        <div class="cards-wrapper">
            <div class="card">
                <div class="front-side">
                    <img src="assets/images/toronto-building.jpg" alt="building de toronto au canada" class="card-image" />
                    <h1 class="tour-name">Ville de Toronto</h1>
                    <ul class="card-list">
                        <li class="card-list-item">5 jours d'horizon</li>
                        <li class="card-list-item">10 personnes a bord</li>
                        <li class="card-list-item">2 guides touristiques & 1 photographe</li>
                        <li class="card-list-item">Nuit nature avec tente privée</li>
                        <li class="card-list-item">Photographe: 5 prises gratuites</li>
                    </ul>
                    <button class="navigation-button">
                        399€
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="front-side">
                    <img src="assets/images/lac-moraine.jpg" alt="Lac moraine au canada" class="card-image" />
                    <h1 class="tour-name">Lac Moraine</h1>
                    <ul class="card-list">
                        <li class="card-list-item">7 jours d'horizon</li>
                        <li class="card-list-item">20 personnes a bord</li>
                        <li class="card-list-item">4 guides touristiques & 2 photographes</li>
                        <li class="card-list-item">Nuit nature avec tente privée</li>
                        <li class="card-list-item">Photographe: 20 prises gratuites</li>
                    </ul>
                    <button class="navigation-button">
                        799€
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="front-side">
                    <img src="assets/images/mer-tofino.jpg" alt="Mer de tofino au canada" class="card-image" />
                    <h1 class="tour-name">Mer de Tofino</h1>
                    <ul class="card-list">
                        <li class="card-list-item">9 jours d'horizon</li>
                        <li class="card-list-item">30 personnes a bord</li>
                        <li class="card-list-item">4 guides touristiques & 4 photographes</li>
                        <li class="card-list-item">Nuit nature avec tente privée</li>
                        <li class="card-list-item">Photographe: 50 prises gratuites</li>
                    </ul>
                    <button class="navigation-button">
                        899€
                    </button>
                </div>
            </div>
        </div>

    </section>
    <!-- todo End of Popular tours -->

    <?php//	include('../Blog/includes/footer.php');?>