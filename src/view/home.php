<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/leaflet.css">
    <link rel="stylesheet" href="/public/css/leaflet-gesture-handling.min.css">
    <title>Ta Destination Surf</title>
</head>

<body>

<header>
    <div class="row">
        <nav class="navbar">
            <div class="title col-lg-6">
                <a href="http://voyagesetsurf.com/"><img class="img-fluid" src="/public/images/logo.png" alt="logo"></a>
            </div>
            <div class="dropdown col-lg-6 ">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    Menu
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/">Accueil</a>

                </div>
            </div>
        </nav>
    </div>
</header>
<div class="container-page">

    <div class="container">
        <div class="row">
         
            <div class="carousel-inner">
                <img class="img-fluid" src="/public/images/slider1.jpg" alt="Surf">
                <!-- Description slider 1 -->
                <div class="carousel-caption">
                    <h1 class="style_title">Bienvenue sur le blog de Voyages et Surf !</h1>
                    
                </div>
            </div>
        </div>
    </div>

    <h2>Rempli le formulaire et découvre la destination surf faite pour toi !</h2>

    <div class="container">

        <br>
        <form action="#" method="post" enctype="text/plain">
            <div>Budget:
                <?php
                foreach ($budgets as $budget) { ?>
                    <div class="form-group">
                        <input id="budget-<?= $budget->getId() ?>" type="radio" name="budget"
                               value="<?= $budget->getId() ?>">
                        <label for="budget-<?= $budget->getId() ?>"
                               class="budget"><?php echo $budget->getValeur(); ?></label>
                    </div>
                <?php } ?>
                <br>
            </div>
            <br>
            <div>Niveau:
                <br>
                <?php
                foreach ($niveaux as $niveau) { ?>
                    <div class="form-group">
                        <input id="niveau-<?= $niveau->getId() ?>" type="radio" name="niveau"
                               value="<?= $niveau->getId() ?>">
                        <label for="niveau-<?= $niveau->getId() ?>"
                               class="niveau"><?php echo $niveau->getValeur() ?></label>
                    </div>
                <?php } ?>
                <br>
            </div>
            <br>
            <div>Saison:
                <?php
                foreach ($saisons as $saison) {
                    ?>
                    <div class="form-group">
                        <input id="saison-<?= $saison->getId() ?>" type="radio" name="saison"
                               value="<?= $saison->getId() ?>">
                        <label for="saison-<?= $saison->getId() ?>"
                               class="saison"><?php echo $saison->getMois(); ?></label>
                    </div>
                    <?php
                }
                ?>
                <br>
            </div>
            <br>
            <div id="popup"  data-toggle="modal" data-target="#subscribeCustomer"
                    ><a href="javascript:showPopup();" title="Voir la destination">Voir la
                    destination</a>
            </div>
        </form>
    </div>
    <br>

    <div class="modal fade" id="subscribeCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Inscris toi pour voir le résultat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="create-customer" action="#" method="POST">
                    <div class="modal-body">
                        <div>
                            <label class="form-body" for="prenom">Prénom *:</label>
                            <input type="text" id="prenom" name="prenom" required>
                        </div>

                        <div>
                            <label class="form-body" for="nom">Nom *:</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>

                        <div>
                            <label class="form-body" for="email">E-mail *:</label>
                            <input type="email" id="email" name="email" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Voir le résultat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="container-map" class="container">
        <h2>Voici les destinations surf faites pour toi</h2>
        <div id="map"></div>

    </div>

    <footer>
        <p><a href="http://voyagesetsurf.com/"> 2019 Voyages et Surf</a> -
            <a href="/admin">Espace Administrateur</a>
        </p>
    </footer>
</div>


<script src="/public/js/lib/jquery.min.js"></script>
<script src="/public/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/js/lib/leaflet.js"></script>
<script src="/public/js/lib/leaflet-gesture-handling.min.js"></script>
<script src="/public/js/Popup.js"></script>
<script src="/public/js/Carte.js"></script>
<script src="/public/js/index.js"></script>


</body>
</html>
