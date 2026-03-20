<?php
require 'db.php';

$jeuxQuery = $conn->query("
    SELECT 
        j.id,
        j.titre,
        j.annee_sortie,
        j.plateforme,
        j.genre,
        j.note,
        j.description,
        s.nom AS studio_nom
    FROM jeux j
    INNER JOIN studios s
        ON j.studio_id = s.id ORDER BY j.note DESC
");
$jeux = $jeuxQuery->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des jeux avec studio </title>
</head>
<body>
    <h1>Liste des jeux avec studio (du mieux noté au moins bon)</h1>

    <table >
        <thead>
            <tr>
                <th >ID</th>
                <th >Titre</th>
                <th >Année</th>
                <th >Plateforme</th>
                <th>Genre</th>
                <th>Note /5</th>
                <th>Description</th>
                <th >Studio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeux as $jeu): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($jeu['id']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['titre']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['annee_de_sortie']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['plateforme']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['genre']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['note']) ?>/5
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['description'] ?? '') ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($jeu['studio_nom']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
