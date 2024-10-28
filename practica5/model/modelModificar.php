<?php

//JOSE GOMEZ

require_once "../conexio.php";


function verificarModificar($titol,$cos,$titolnou){

    global $conex;
    $correu = $_SESSION['correu'];
    //Verificador de existencia de l'article

    //Preparar i executar la consulta
    $sql = "SELECT * FROM articles WHERE titol = :titol AND correu = :correu";
    $stmt = $conex->prepare($sql);
    $stmt->execute([":titol"=>$titol, ":correu"=>$correu]);

    $boolean = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($boolean != null){
        
        nomRepetit($titol,$cos,$titolnou,$correu); //Crida de la funcio
    } else {
        echo "ERROR!, no hi ha un article amb aquest titol a la base de dades.";
    }

}

function nomRepetit($titol,$cos,$titolnou,$correu){

    global $conex;
    //Verificador per que dos noms no coincideixin

    //Preparar i executar la consulta
    $sql = "SELECT * FROM articles WHERE titol = :titol AND correu = :correu";
    $stmt = $conex->prepare($sql);
    $stmt->execute([":titol"=>$titolnou, ":correu"=>$correu]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if($article != null){
        echo "El nom de l'article que vols modificar es igual al d'un altre, canvia'l.";
    } else {

        modificarArticleModel($titol,$cos,$titolnou); //Crida de la funcio
    }


}

function modificarArticleModel($titol,$cos,$titolnou){

    global $conex;
    //Funcio que modifica el nom i cos

    try {
    //Preparar i executar la consulta
        $sql = "UPDATE articles SET titol = :titol, cos = :cos WHERE titol = :titol2";
        $stmt = $conex->prepare($sql);

        $stmt->execute([":titol"=>$titolnou, ":cos"=>$cos, ":titol2"=> $titol]);
        $article = "";
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //Echos del resultat
        if($article == null){

            echo "Article amb el titol<b> $titol </b>modificat correctament!";
            
        } else {

            echo "ERROR!, no s'ha modificat l'article";
        }
    } catch (Exception $e) {
        echo "Error al modificar l'article";
    }
}

?>