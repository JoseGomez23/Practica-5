<?php
//JOSE GOMEZ

$host = 'localhost';            //Host de la bd
$nomdb = 'pt02_Jose_Gomez';     //Nom de la base de dades
$user = 'root';                 // Username (Per defecte a xampp es root)
$pswd = '';                     //Contrasenya 

try {

    //Instanciem la PDO
    $conex = new PDO("mysql:host=$host;dbname=$nomdb;charset=utf8", $user, $pswd); //Conexió a la bd 


} catch (PDOException $e) {
    // En cas d'error en la conexió
    echo "Error en la conexió: " . $e->getMessage();
}
?>