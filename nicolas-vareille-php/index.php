<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("etudiant.php");
require_once("fonction.php");
require_once("classe.php");
require_once("database.php");
require_once("devoir.php");

$database = new database($pdo);

$etudiant = $database->getEtudiant();


/*

$classe = new classe();

$resultat = $pdo->query('SELECT * FROM etudiants');
$etudiants = $resultat->fetchAll();

foreach ($etudiants as $e) {
    $etudiant = new etudiant();
    $etudiant->Definir($e['id'], $e['prenom'], $e['nom'], $e['age']);

    $etudiant->age = $etudiant->age + 1;

    $etudiant->SePresenter();
    $etudiant->Update($pdo);
}

$resultat = $pdo->query('SELECT * FROM devoir');
$devoir = $resultat->fetchAll();

foreach ($devoir as $d) {
    $devoir = new devoir();
    $devoir->Definir($d['id'], $d['idEtudiant'], $d['sujet'], $d['note']);

    $devoir->montrer();
}



$classe = new classe();
$Anas = new etudiant();
$Yassine = new etudiant();

$Anas -> Definir("Anas", "Haddane", 28);
$Yassine -> Definir("Yassine", "Haddane", 30);

$classe -> ajouterEtudiant($Anas);
$classe -> ajouterEtudiant($Yassine);

$classe -> PresenterClasse();
*/
