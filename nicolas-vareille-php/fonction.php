<?php


function afficher_tableau(int $min = 4, int $max = 7){
    $tableau = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    foreach ($tableau as $idx){
        if ($idx >= $min && $idx <= $max){
            echo "$idx <br>";
        }

    }
}




?>