<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["name_user"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
require('include/head.php');
?>

<body>
    <h2>Modifier une pizza</h2>

    <?php
    require_once('settings/db.php');

    if (isset($_POST)) {
        if (
            isset($_POST['id_pizza']) && !empty($_POST['id_pizza'])
            && isset($_POST['name_pizza']) && !empty($_POST['name_pizza'])
            && isset($_POST['description_pizza']) && !empty($_POST['description_pizza'])
            && isset($_POST['price_pizza']) && !empty($_POST['price_pizza'])
            && isset($_POST['img_pizza']) && !empty($_POST['img_pizza'])
            && isset($_POST['base_pizza']) && !empty($_POST['base_pizza'])
            && isset($_POST['promo_pizza']) && !empty($_POST['promo_pizza'])
            && isset($_POST['quantity_pizza']) && !empty($_POST['quantity_pizza'])
        ) {
            $id = strip_tags($_GET['id_pizza']);
            $name = strip_tags($_POST['name_pizza']);
            $description = strip_tags($_POST['description_pizza']);
            $price = strip_tags($_POST['price_pizza']);
            $img = strip_tags($_POST['img_pizza']);
            $base = strip_tags($_POST['base_pizza']);
            $promo = strip_tags($_POST['promo_pizza']);
            $quantity = strip_tags($_POST['quantity_pizza']);



            $sql = "UPDATE `pizzas` SET `name_pizza`=:name_pizza, `description_pizza`=:description_pizza, `price_pizza`=:price_pizza, 
    `img_pizza`=:img_pizza, `base_pizza`=:base_pizza, `promo_pizza`=:promo_pizza, `quantity_pizza`=:quantity_pizza WHERE `id_pizza`=:id_pizza;";

            $query = $db->prepare($sql);

            $query->bindValue(':id_pizza', $id, PDO::PARAM_INT);
            $query->bindValue(':name_pizza', $name, PDO::PARAM_STR);
            $query->bindValue(':description_pizza', $description, PDO::PARAM_STR);
            $query->bindValue(':price_pizza', $price, PDO::PARAM_INT);
            $query->bindValue(':img_pizza', $img, PDO::PARAM_STR);
            $query->bindValue(':base_pizza', $base, PDO::PARAM_STR);
            $query->bindValue(':promo_pizza', $promo, PDO::PARAM_STR);
            $query->bindValue(':quantity_pizza', $quantity, PDO::PARAM_INT);

            $query->execute();

            header('Location: index.php');
        }
    }

    if (isset($_GET['id_pizza']) && !empty($_GET['id_pizza'])) {
        $id = strip_tags($_GET['id_pizza']);
        $sql = "SELECT * FROM `pizzas` WHERE `id_pizza`=:id_pizza;";

        $query = $db->prepare($sql);

        $query->bindValue(':id_pizza', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();
    }


    ?>

    <div class="container form_add_pizza">
			<form method="post" class="add_pizza">
				<label for="name_pizza">Nom de la pizza</label>
				<input type="text" name="name_pizza" id="name_pizza" placeholder="Exemple: Pizza 1">

				<label for="description_pizza">Description</label>
				<input type="text" name="description_pizza" id="description_pizza" placeholder="Description de la pizza">

				<label for="price_pizza">Prix</label>
				<input type="text" name="price_pizza" id="price_pizza" placeholder="Exemple: 10">

				<label for="img_pizza">Photo</label>
				<input type="text" name="img_pizza" id="img_pizza" placeholder="Ecrivez pour l'instant: Non">

				<label for="base_pizza">Base</label>
				<input type="text" name="base_pizza" id="base_pizza" placeholder="Exemple: Créme">

				<label for="promo_pizza">Promo</label>
				<input type="text" name="promo_pizza" id="promo_pizza" placeholder="Ecrivez pour l'instant: Non"">

				<label for=" quantity_pizza">Quantité</label>
				<input type="text" name="quantity_pizza" id="quantity_pizza" placeholder="Exemple: 10">

				<button type="button" class="btn btn-secondary">Enregistrer</button>
                <br>
                <a class="btn btn-secondary" href="index.php" role="button">Retour à l'accueil</a>
			</form>
            <br>
		</div>

</body>

</html>