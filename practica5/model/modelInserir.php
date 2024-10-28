<?php 
//JOSE GOMEZ

function verificarInserir($titol,$cos){

    global $conex;

    try {    
        //Verificar que l'article existeix

        //Preparar i executar la consulta
        $sql = "SELECT * FROM articles WHERE titol = :titol";
        $stmt = $conex->prepare($sql);
        $stmt->execute([":titol"=>$titol]);

        $boolean = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($boolean == null){
            insertarBD($titol,$cos);
        } else {
            echo "ERROR!, ja hi ha un article amb aquest titol a la base de dades.";
        }
    } catch(Exception $e) {
        echo "Error al consultar la bd";
    }
}


function insertarBD($titol, $cos) {
    global $conex;

    try {

        //Insertara l'article a la bd
        $correu = $_SESSION['correu'];
        //Preparar i executar consulta
        $sql = "INSERT INTO articles (titol, cos, correu) VALUES (:titol, :cos, :correu)";
        $stmt = $conex->prepare($sql);

        
        $stmt->execute([":titol" => $titol,":cos" => $cos,":correu"=>$correu]);

        
        if ($stmt->rowCount() > 0) {
            echo "L'article amb el <b>titol</b>: $titol s'ha inserit correctament.";
        } else {
            echo "No s'ha pogut inserir l'article.";
        }
    } catch (Exception $e){
        echo "Error al inserir l'article";
    }
}




?>