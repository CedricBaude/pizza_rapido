<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["name_user"])) {
	header("Location: login.php");
	exit();
}

require_once('settings/db.php');

if (isset($_POST)) {
	if (
		isset($_POST['name_pizza']) && !empty($_POST['name_pizza'])
		&& isset($_POST['description_pizza']) && !empty($_POST['description_pizza'])
		&& isset($_POST['price_pizza']) && !empty($_POST['price_pizza'])
		&& isset($_POST['img_pizza']) && !empty($_POST['img_pizza'])
		&& isset($_POST['base_pizza']) && !empty($_POST['base_pizza'])
		&& isset($_POST['promo_pizza']) && !empty($_POST['promo_pizza'])
		&& isset($_POST['quantity_pizza']) && !empty($_POST['quantity_pizza'])
	) {
		$name = strip_tags($_POST['name_pizza']);
		$description = strip_tags($_POST['description_pizza']);
		$price = strip_tags($_POST['price_pizza']);
		$img = strip_tags($_POST['img_pizza']);
		$base = strip_tags($_POST['base_pizza']);
		$promo = strip_tags($_POST['promo_pizza']);
		$quantity = strip_tags($_POST['quantity_pizza']);

		$sql = "INSERT INTO `pizzas` (`name_pizza`, `description_pizza`, `price_pizza`, `img_pizza`, `base_pizza`, `promo_pizza`, `quantity_pizza`) VALUES (:name_pizza, :description_pizza, :price_pizza, :img_pizza, :base_pizza, :promo_pizza, :quantity_pizza);";

		$query = $db->prepare($sql);

		$query->bindValue(':name_pizza', $name, PDO::PARAM_STR);
		$query->bindValue(':description_pizza', $description, PDO::PARAM_STR);
		$query->bindValue(':price_pizza', $price, PDO::PARAM_INT);
		$query->bindValue(':img_pizza', $img, PDO::PARAM_STR);
		$query->bindValue(':base_pizza', $base, PDO::PARAM_STR);
		$query->bindValue(':promo_pizza', $promo, PDO::PARAM_STR);
		$query->bindValue(':quantity_pizza', $quantity, PDO::PARAM_INT);

		$query->execute();
		$_SESSION['message'] = "Produit ajouté avec succès !";
		header('Location: back.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
require('include/head.php');
?>

<body>
	<a href="logout.php">Déconnexion</a>
	<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['name_user']; ?>!</h1>
		<p>C'est votre tableau de bord.</p><br>
		<h2> Ajouter de nouvelles pizzas </h2>
		<form method="post">
			<label for="name_pizza">Nom de la pizza</label>
			<input type="text" name="name_pizza" id="name_pizza">

			<label for="description_pizza">Description</label>
			<input type="text" name="description_pizza" id="description_pizza">

			<label for="price_pizza">Prix</label>
			<input type="text" name="price_pizza" id="price_pizza">

			<label for="img_pizza">Photo</label>
			<input type="text" name="img_pizza" id="img_pizza">

			<label for="base_pizza">Base</label>
			<input type="text" name="base_pizza" id="base_pizza">

			<label for="promo_pizza">Promo</label>
			<input type="text" name="promo_pizza" id="promo_pizza">

			<label for="quantity_pizza">Quantité</label>
			<input type="text" name="quantity_pizza" id="quantity_pizza">

			<button>Enregistrer</button>
		</form>
		<br>

		<?php



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

		<h2 class="titre_2">Nos produits:</h2>

		<div class="container product_pizza">

			<?php
			foreach ($result as $produit) {
			?>
				<div class="card_pizza">
					<div class="picture_pizza">
						<img src="<?php echo $produit['img_pizza']; ?>" alt="">
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
					<div class="edit_pizza">
					<a href="update.php?id_pizza=<?= $produit['id_pizza'] ?>">Modifier</a> <a href="delete.php?id_pizza=<?= $produit['id_pizza'] ?>">Supprimer</a>
					</div>
				</div>
			<?php
			}
			?>
		</div>


</body>

</html>