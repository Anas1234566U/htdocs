<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$serveur = 'localhost';
$base = 'escapegame';
$utilisateur = 'root';
$mdp = 'root';

$dsn = "mysql:host=$serveur;port=3306;dbname=$base;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $utilisateur, $mdp, $options);
