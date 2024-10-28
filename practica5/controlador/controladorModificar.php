<?php 
//JOSE GOMEZ
require "../conexio.php";

//Funcio que controla l'execucio de la funcio modificar
function modificarArticle(){
    
    ini_set('session.gc_maxlifetime', 40*60); 
    session_start();

    global $conex;

    $titolarticle = $_POST["titolmodificar"];
    $titolnou = $_POST["titolmodificat"];
    $cos = $_POST["cosmodificar"];

    $titolnou = trim($titolnou);

    if(empty($titolnou)){
        echo "El titol a modificar no pot ser buit";
    } else {

    
   

    try {

        if(isset($_SESSION['usuari'])){

        require_once "../model/modelModificar.php";
        verificarModificar($titolarticle,$cos,$titolnou); //Crida de la funcio
        } else {
            echo "Has d'iniciar sessió";
        }
    

} catch (PDOException $e) {

    echo "Error al modificar les dades: " . $e->getMessage();

}
    }
}
?>