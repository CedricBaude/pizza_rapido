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

require_once('settings/close.php');
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
        foreach ($result as $produit) {
        ?>
            <tr>
                <td><?= $produit['name_pizza'] ?></td>
                <td><?= $produit['description_pizza'] ?></td>
                <td><?= $produit['price_pizza'] ?></td>
                <td><?= $produit['img_pizza'] ?></td>
                <td><?= $produit['base_pizza'] ?></td>
                <td><a href="update.php?id_pizza=<?= $produit['id_pizza'] ?>">Modifier</a> <a href="delete.php?id_pizza=<?= $produit['id_pizza'] ?>">Supprimer</a></td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>