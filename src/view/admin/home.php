<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/images/icon.png" />
    <title>Admin</title>

</head>
<body>

    
    <nav>
        <div class="btn-nav">
        <a class="btn btn-primary m-4" href="/logout">Se déconnecter</a>
        <a class="btn btn-primary" href="/">Accueil</a>
        </div>
    </nav>


<div class="container-page">

    <div class="container">


        <h1>Espace admin</h1>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Noms</th>
                <th>Email</th>
                <th>Gérer les customers</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td><?= $customer->getPrenom() ?></td>
                    <td><?= $customer->getNom() ?></td>
                    <td><?= $customer->getEmail() ?></td>
                    <td>
                        <button class="btn btn-primary delete-customer" data-customer-id="<?= $customer->getId() ?>">
                            Supprimer un customer
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>


        </table>

    </div>
</div>

<script src="/public/js/lib/jquery.min.js"></script>
<script type="application/javascript" src="/public/js/admin.js"></script>

</body>
</html>
