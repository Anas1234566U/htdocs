<?php

class classe{

    public $etudiants = [];

    public function ajouterEtudiant($etudiant){
        $this->etudiants[] = $etudiant;
    }
    public function PresenterClasse(){
        echo "<br>Voici les étudiants de la classe :<br>";
        foreach ($this->etudiants as $etudiant){
            echo "- " . $etudiant->prenom . " " . $etudiant->nom . ", " . $etudiant->age . " ans<br>";
        }
    }
    
}



?>