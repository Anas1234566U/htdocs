<?php
require "config/db.php";
$jeuxQuery = $conn->query("SELECT * FROM jeux");
$jeux = $jeuxQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Collection de Jeux</title>
</head>
<body>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Année de sortie</th>
                <th>Plateforme</th>
                <th>Genre</th>
                <th>Note</th>
                <th>Desciption (optionnelle)</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($jeux as $jeu): ?>
                <tr>
                    <td><?php echo htmlspecialchars($jeu['id']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['titre']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['annee_de_sortie']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['plateforme']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['genre']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['note']); ?></td>
                    <td><?php echo htmlspecialchars($jeu['description']); ?></td>
                </tr>
                <p></p>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
