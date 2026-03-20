<?php
 session_start();

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


$studiosQuery = $conn->query("SELECT * FROM studios");
$studios = $studiosQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout de jeux</title>
</head>
<body>
    <h1>Ajouter un jeu</h1>
    <form method="post" action="ajouter.php" style="display: flex; flex-direction: column ; width: 300px">
        <input name="titre" placeholder="Titre du jeu" required>
        <select name="studio_id" required>
            <option value="">--Veuillez choisir un studio--</option>
            <?php foreach ($studios as $studio): ?>
                <option value="<?= htmlspecialchars($studio['id']) ?>">
                    <?= htmlspecialchars($studio['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input name="annee" placeholder="Année de sortie" required>
        <input name="plateforme" placeholder="Plateforme" required>
        <input name="genre" placeholder="Genre" required>
        <select name="note" required>
            <option value="">--Veuillez choisir une note /5--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <textarea name="description" placeholder="Description (optionnelle)"></textarea>

        <button type="submit">Ajouter le jeu</button>  
    </form>

            

</body>
</html>