<?php

require_once "../model/modelLogin.php";

function introduccioDadesLogin() {

    $correu = $_POST["email"];
    $psswd = $_POST["contrasenya"];

    
    verificarUsuari5($correu,$psswd);
    
}

?>