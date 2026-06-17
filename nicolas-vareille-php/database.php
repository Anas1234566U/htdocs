<?php

$host = 'localhost';
$db   = 'ecole';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

class database
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}

function getEtudiant()
{
    $r = [];
    $result = $this->pdo->query('SELECT * FROM etudiants');
    return $result->fetchAll();

    foreach ($result as $e) {
        $i = new etudiant();

        $etudiant->Definir($e['id'], $e['prenom'], $e['nom'], $e['age']);
        $r[] = $etudiant;
    }
}

function UpdateEtudiant($pdo, $id)
{
    $r = $this->pdo->prepare("UPDATE etudiants SET prenom = :prenom, nom = :nom, age = :age where id = :id");

    $result = $r->execute([
        'id' => $etudiant->id,
        'prenom' => $etudiant->prenom,
        'nom' => $etudiant->nom,
        'age' => $etudiant->age
    ]);
}
