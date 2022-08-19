<?php

$host = "remotemysql.com:3306";
$dbname = "KvbV9Uv8qY"; // to adapt
$login = "KvbV9Uv8qY";
$mdp = "AzU583ZUYx";

/**
 * try connection
 * catch and display the error and stop process
 */
try {
    $db = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8',
        $login,
        $mdp
    );
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
}
