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
  <?php
  require('config.php');
  if (isset($_REQUEST['name_user'], $_REQUEST['email_user'], $_REQUEST['password_user'])) {
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $username = stripslashes($_REQUEST['name_user']);
    $username = mysqli_real_escape_string($conn, $username);
    // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $email = stripslashes($_REQUEST['email_user']);
    $email = mysqli_real_escape_string($conn, $email);
    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $password = stripslashes($_REQUEST['password_user']);
    $password = mysqli_real_escape_string($conn, $password);
    //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (name_user, email_user, password_user)
              VALUES ('$username', '$email', '" . hash('sha256', $password) . "')";
    // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if ($res) {
      echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
  } else {
  ?>
    <form class="box" action="" method="post">
      <h1 class="box-title">S'inscrire</h1>
      <input type="text" class="box-input" name="name_user" placeholder="Nom d'utilisateur" required />
      <input type="text" class="box-input" name="email_user" placeholder="Email" required />
      <input type="password" class="box-input" name="password_user" placeholder="Mot de passe" required />
      <input type="submit" name="submit" value="S'inscrire" class="box-button" />
      <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
    </form>
  <?php } ?>
</body>

</html>