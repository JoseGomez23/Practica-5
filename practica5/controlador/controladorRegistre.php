<?php

include_once "../model/modelRegistre.php";

function comprovacions(){

    $nomusuari = $_POST["nomusuari"];
    $psswd1 = $_POST["pswd1"];
    $psswd2 = $_POST["pswd2"];
    $correu = $_POST["email"];

    $regexp = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    if(preg_match($regexp,$psswd1)){

        verificarUsuari($correu, $psswd1, $psswd2, $nomusuari);

    } else {
        echo "Contrasenya poc consistent";
    }
}

?>