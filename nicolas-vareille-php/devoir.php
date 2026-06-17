<?php

class devoir
{
    public int $id;
    public int $idEtudiant;
    public mixed $sujet;
    public mixed $note;

    public function Definir($id, $idEtudiant, $sujet, $note)
    {
        $this->id = $id;
        $this->idEtudiant = $idEtudiant;
        $this->sujet = $sujet;
        $this->note = $note;
    }

    function montrer()
    {
        echo "<br>Le devoir de l'étudiant avec l'ID $this->idEtudiant a pour sujet '$this->sujet' et a obtenu la note de $this->note.<br>";
    }
}
