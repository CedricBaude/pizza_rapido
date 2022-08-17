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
    session_start();

    if (isset($_POST['name_user'])) {
        $username = stripslashes($_REQUEST['name_user']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password_user']);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM `users` WHERE name_user='$username' and password_user='" . hash('sha256', $password) . "'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name_user'] = $username;
            header("Location: back.php");
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
    ?>
    <form class="box" action="" method="post" name="login">
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="name_user" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password_user" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <?php if (!empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
        <p>Retour</p>
    </form>

</body>

</html>