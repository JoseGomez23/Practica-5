<?php 
//JOSE GOMEZ
require "../conexio.php";

//Funcio que controla l'execucio de la funcio eliminar
function eliminarArticle(){
    global $conex;

    ini_set('session.gc_maxlifetime', 40*60); 
    session_start();
    $titolarticle = $_POST["titoleliminar"];

    try {
        
        if(isset($_SESSION['usuari'])){

            require_once "../model/modelEliminar.php";
            verificarEliminar($titolarticle); //Crida de la funcio
            
        } else {

            echo "No hi ha cap sessió en actiu";
        }
    

    } catch (PDOException $e) {

        echo "Error al eliminar les dades: " . $e->getMessage();

}
}
?>