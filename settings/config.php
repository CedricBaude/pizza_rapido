<?php
// Informations d'identification
define('DB_SERVER', 'remotemysql.com:3306');
define('DB_USERNAME', 'KvbV9Uv8qY');
define('DB_PASSWORD', 'AzU583ZUYx');
define('DB_NAME', 'KvbV9Uv8qY');

// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
