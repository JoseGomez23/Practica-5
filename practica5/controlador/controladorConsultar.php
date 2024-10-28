<?php 
//JOSE GOMEZ
require "../conexio.php";

//Funcio que controla l'execucio de la funcio consultar
function consultarArticle(){
    global $conex;

    ini_set('session.gc_maxlifetime', 40*60); 
    session_start();
    
    $titolarticle = $_POST["titol"];
try {

    if(isset($_SESSION['usuari'])){

        require_once "../model/modelConsultar.php";
        verificarConsultar($titolarticle); //Crida de la funcio
    } else {
        
        echo "No hi ha cap sessió en actiu";
    }
    

} catch (PDOException $e) {

    echo "Error al consultar les dades: " . $e->getMessage();

}
}
?>