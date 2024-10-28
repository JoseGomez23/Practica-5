<?php
//JOSE GOMEZ

function verificarConsultar($titolarticle){

    global $conex;

    try{

        //Consulta per buscar l'article amb el nom que hem introduit
        $sql = "SELECT titol FROM articles WHERE titol = :titol";
        $stmt = $conex->prepare($sql);
        $stmt->execute([":titol"=>$titolarticle]);

        $boolean = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($boolean != null){
            llegirBD($titolarticle); //Crida de la funcio
        } else {
            echo "ERROR!, no hi ha cap article amb aquest titol. ";
        }
    } catch(PDOException $e){
        echo "Error al conectar-se a la BD". $e->getMessage();
    }

}

function llegirBD($titolarticle){
    global $conex;

    try {

        //LLegir la bd y mostrar per pantalla l'article trobat
        $sql = "SELECT * FROM articles WHERE titol = :titol";
        $stmt = $conex->prepare($sql);

        $stmt->execute([":titol"=>$titolarticle]);
        $article = "";
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($article){

            echo "<b>Titol:</b>".
            $article["titol"] ."<br>". 
            "<b>Cos:</b>".
            $article["cos"];
            
        }
    } catch (Exception $e) {
        echo "Error al obtenir les dades";
    }
}
?>