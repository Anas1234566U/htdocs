<?php

class etudiant
{
    public int $id;
    public mixed $prenom;
    public mixed $nom;
    public int $age;

    public function __construct() {}

    public function Definir($id, $prenom, $nom, $age)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }


    function SePresenter()
    {
        echo "<br>Bonjour, je m'appelle $this->prenom et j'ai  $this->age ans.<br>";
    }

    public function ajout($prenom, $nom, $age)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        echo "<br>L'étudiant $this->prenom $this->nom a été ajouté avec succès. Il a $this->age ans.<br>";
    }

    public function Update($pdo)
    {

        $r = $pdo->prepare("UPDATE etudiants SET prenom = :prenom, nom = :nom, age = :age WHERE id = :id");

        $r->execute([
            'id' => $this->id,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'age' => $this->age
        ]);
    }
}
