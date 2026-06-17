<?php
require 'includes/db.php';

$id = $_GET['id'];

$requete = $pdo->prepare("DELETE FROM questions WHERE id = ?");
$requete->execute([$id]);

header('Location: index.php');
exit;
