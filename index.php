<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>🍕 Pizza RAPIDO, les pizzas cuite à l'eau 💦</title>
</head>

<body>

    <header>
        <div class="logo">
            <img src="img/pizza_rapido_logo_50.png" alt="">
        </div>
        <div class="nav">
            <nav>
                <ul>
                    <li>Base tomate</li>
                    <li>Base crême</li>
                    <li>Spéciales</li>
                    <li><a href="back.php">Admin</a></li>

                </ul>
            </nav>

        </div>
    </header>
    <h1 class="titre_1"> 🍕 Pizza RAPIDO, les pizzas cuites à l'eau 💦</h1>





    <?php

    // On inclut la connexion à la base
    require_once('settings/db.php');

    // On écrit notre requête
    $sql = 'SELECT * FROM `pizzas`';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    ?>



    <h2 class="titre_2">Nos produits:</h2>

    <div class="container product_pizza">

        <?php
        foreach ($result as $produit) {
        ?>
            <div class="card_pizza">
                <div class="picture_pizza">
                    <img src="<?php echo $produit['img_pizza']; ?>" alt="" >
                </div>
                <div class="name_pizza">
                    <?= $produit['name_pizza'] ?>
                </div>
                <div class="desc_pizza">
                    <i><?= $produit['description_pizza'] ?></i>
                </div>
                <div class="price_pizza">
                    <?= $produit['price_pizza'] ?>€.
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</body>

</html>