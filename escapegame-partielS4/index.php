<?php

require 'includes/db.php';

$tri = $_GET['tri'] ?? '';
if ($tri === 'asc') {
    $ordre = 'ORDER BY (nb_tentative = 0), taux ASC, id';
} elseif ($tri === 'desc') {
    $ordre = 'ORDER BY (nb_tentative = 0), taux DESC, id';
} else {
    $ordre = 'ORDER BY id';
}

$questions = $pdo->query("SELECT *, IF(nb_tentative = 0, 0, nb_reussite / nb_tentative * 100) AS taux FROM questions $ordre")->fetchAll();

include 'includes/header.php';

?>

<h2 class="font-bold mb-4">Liste des questions</h2>

<div class="mb-4">
    <a href="index.php?tri=asc" class="underline mr-4">Croissant</a>
    <a href="index.php?tri=desc" class="underline">Décroissant</a>
</div>

<?php foreach ($questions as $ligne) { ?>
    <div class="mb-4">
        <a href="repondre.php?id=<?php echo $ligne['id']; ?>" class="underline"><?php echo htmlspecialchars($ligne['question']); ?></a>
        <?php echo $ligne['taux']; ?> %
        <a href="supprimer.php?id=<?php echo $ligne['id']; ?>" class="text-red-600 underline"> Supprimer </a>
    </div>
<?php } ?>

</body>

</html>