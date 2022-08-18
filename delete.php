<?php
require_once('settings/db.php');

if (isset($_GET['id_pizza']) && !empty($_GET['id_pizza'])) {
    $id = strip_tags($_GET['id_pizza']);
    $sql = "DELETE FROM `pizzas` WHERE `id_pizza`=:id_pizza;";

    $query = $db->prepare($sql);

    $query->bindValue(':id_pizza', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: back.php');
}

require_once('close.php');
