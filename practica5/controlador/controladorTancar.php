<?php
//Jose Gomez

function tancarSessio(){

    ini_set('session.gc_maxlifetime', 40*60); 
    session_start();
    if(isset($_SESSION['usuari'])){

        require_once "../model/modelTancar.php";
        

        tancarSessioUsuari();

    } else {
        echo "No hi ha cap sessio en actiu";
    }
    
}

?>