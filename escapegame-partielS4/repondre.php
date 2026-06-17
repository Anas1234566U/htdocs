<?php
require 'includes/db.php';

$id = $_GET['id'];

$requete = $pdo->prepare("SELECT *, IF(nb_tentative = 0, 0, nb_reussite / nb_tentative * 100) AS taux FROM questions WHERE id = ?");
$requete->execute([$id]);
$question = $requete->fetch();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reponse = $_POST['reponse'];
    if (strtolower(trim($reponse)) === strtolower(trim($question['reponse_attendu']))) {
        $message = $question['message_de_succes'];
        $couleur = 'text-green-600';
        $maj = $pdo->prepare("UPDATE questions SET nb_tentative = nb_tentative + 1, nb_reussite = nb_reussite + 1 WHERE id = ?");
    } else {
        $message = $question['message_erreur'];
        $couleur = 'text-red-600';
        $maj = $pdo->prepare("UPDATE questions SET nb_tentative = nb_tentative + 1 WHERE id = ?");
    }
    $maj->execute([$id]);
    $requete->execute([$id]);
    $question = $requete->fetch();
}

$taux = $question['taux'];

include 'includes/header.php';

?>

<h2 class="font-bold mb-4"><?php echo htmlspecialchars($question['question']); ?> </h2>

<p class="mb-4"> Taux de réussite : <?php echo $taux; ?> % </p>

<?php if ($message !== '') { ?>
    <div class="<?php echo $couleur; ?> font-bold mb-4"><?php echo htmlspecialchars($message); ?></div>
<?php } ?>

<?php if ($_SERVER['REQUEST_METHOD'] !== 'POST') { ?>
    <form method="post" action="repondre.php?id=<?php echo $id; ?>">
        <input type="text" name="reponse" required class="w-full border p-4 mb-4">
        <button type="submit" class="border p-4">Valider</button>
    </form>
<?php } ?>

</body>

</html>