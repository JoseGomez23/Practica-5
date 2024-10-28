<?php
//JOSE GOMEZ
//Verificador que comprova si l'element cercat existeix a la BD

function verificarEliminar($titol){
    
    
    global $conex;
    $correu = $_SESSION['correu'];
    try {
        //Verificador per comprovar l'existencia de l'article
        $sql = "SELECT * FROM articles WHERE titol = :titol AND correu = :correu";
        $stmt = $conex->prepare($sql);
        $stmt->execute([":titol"=>$titol, ":correu"=>$correu]);

        $boolean = $stmt->fetch(PDO::FETCH_ASSOC);
            
        if($boolean != null){
            eliminarArticleModel($titol,$correu); //Crida de la funcio
        } else {
            echo "ERROR!, no hi ha un article amb aquest titol a la base de dades.";
        }
    } catch (Exception $e) {
        echo "Error al consultar la bd";
    }

}



function eliminarArticleModel($titol,$correu){


        global $conex;

        try {
            // Preparar i executar la consulta
            $sql = "DELETE FROM articles WHERE titol = :titol AND correu = :correu";
            $stmt = $conex->prepare($sql);
            $stmt->execute([":titol" => $titol, ":correu"=>$correu]);
            echo "Article eliminat correctament!";
        } catch (PDOException $e) {
            
            echo "Error al eliminar l'article: " . $e->getMessage();
        }
}



?>