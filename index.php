<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>🍕 Pizza RAPIDO, les pizzas cuite à l'eau 💦</title>
</head>

<body>

    <header>
        <div class="logo">

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
    <h1>Bienvenu sur Pizza RAPIDO, les pizzas cuitent à l'eau </h1>


        


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

    <h1>Liste des produits</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Image</th>
            <th>Base</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $produit){
        ?>
                <tr>
                    <td><?= $produit['name_pizza'] ?></td>
                    <td><?= $produit['description_pizza'] ?></td>
                    <td><?= $produit['price_pizza'] ?></td>
                    <td><?= $produit['img_pizza'] ?></td>
                    <td><?= $produit['base_pizza'] ?></td>
                    
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    
</body>
</html>
