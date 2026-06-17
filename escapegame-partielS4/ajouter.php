<?php
require 'includes/db.php';

$lien = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requete = $pdo->prepare("INSERT INTO questions (question, reponse_attendu, message_de_succes, message_erreur) VALUES (?, ?, ?, ?)");
    $requete->execute([
        $_POST['question'],
        $_POST['reponse_attendu'],
        $_POST['message_de_succes'],
        $_POST['message_erreur'],
    ]);
    $id = $pdo->lastInsertId();
    $lien = 'repondre.php?id=' . $id;
}

include 'includes/header.php';

?>

<h2 class="font-bold mb-4">Ajouter une question</h2>

<?php if ($lien !== '') { ?>
    <div class="mb-4">
        Question ajoutée. Lien de partage :
        <a href="<?php echo $lien; ?>" class="underline"><?php echo $lien; ?> </a>
    </div>
<?php } ?>

<form method="post">
    <div class="mb-4">
        <label class="font-bold"> Question </label>
        <textarea name="question" required class="w-full border p-4"></textarea>
    </div>
    <div class="mb-4">
        <label class="font-bold"> Réponse attendue </label>
        <input type="text" name="reponse_attendu" required class="w-full border p-4">
    </div>
    <div class="mb-4">
        <label class="font-bold"> Message de succès </label>
        <input type="text" name="message_de_succes" required class="w-full border p-4">
    </div>
    <div class="mb-4">
        <label class="font-bold"> Message de mauvaise réponse </label>
        <input type="text" name="message_erreur" required class="w-full border p-4">
    </div>
    <button type="submit" class="border p-4"> Ajouter </button>
</form>

</body>

</html>