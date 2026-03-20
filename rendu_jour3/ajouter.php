<?php
require 'config/db.php';
$erreurs = [];
$donnee = [];

if ($_POST) {
    $titre = trim($_POST['titre'] ?? '');
    $studio_id = trim($_POST['studio_id'] ?? '');
    $annee = trim($_POST['annee'] ?? '');
    $plateforme = trim($_POST['plateforme'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $note = trim($_POST['note'] ?? '');
    $description = trim($_POST['description'] ?? '');

    $donnee = [
        'titre'=> $titre,
        'studio_id' => $studio_id,
        'annee' => $annee,
        'plateforme' => $plateforme,
        'genre' => $genre,
        'note' => $note,
        'description' => $description,
    ];

  
    if(isset($titre)){
        echo "<p style='color:red'>Veuillez entrer un nom de film.</p>";
    }

    if (empty($studio_id)) {
        $erreurs[] = 'Veuillez choisir un studio.';
    } 


        header('Location: liste.php');
        exit;
    }
