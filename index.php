<!DOCTYPE html>
<html lang="fr">

<?php
require('include/head.php');
?>

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