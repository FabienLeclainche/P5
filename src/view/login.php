<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/images/icon.png" />
    <title>Login</title>
</head>
<header>
    <div class="row">
        <nav class="navbar">
            <div class="title col-lg-6">
                <a href="http://voyagesetsurf.com/"><img class="img-fluid" src="/public/images/logo.png" alt="logo"></a>
            </div>
            <div class="dropdown col-lg-6 col-xs-1">
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
<body>

<div class="container-page">
    <div class="container">
        <br>
        <form class="login form" action="/login" method="post">
            <div class="form-group">
                <label>Login:</label>
                <input type="text" name="login" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="password" class="form-control" required/>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Connexion"/>

        </form>
    </div>
    <br>
    <footer>
        <p><a href="http://voyagesetsurf.com/"> 2019 Voyages et Surf</a> -
            <a href="/login">Espace Administrateur</a>
        </p>
    </footer>
</div>

<script src="/public/js/lib/jquery.min.js"></script>
<script src="/public/bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>
</html>

