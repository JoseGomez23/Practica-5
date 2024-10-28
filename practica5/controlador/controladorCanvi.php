<?php

require_once "../conexio.php";
function canviContrasenya(){

    ini_set('session.gc_maxlifetime', 40*60); 
    session_start();

    if(isset($_SESSION['usuari'])){

        $psswd = $_POST["contrasenya"];
        $psswdnova = $_POST['contrasenyanova'];
        $psswdnovaconf = $_POST['contrasenyanovaconf'];

        require_once "../model/modelCanvi.php";
        verificarCanvi($psswd,$psswdnova,$psswdnovaconf);

    } else {
        echo "No hi ha cap sessió en actiu";
    }

}

?>