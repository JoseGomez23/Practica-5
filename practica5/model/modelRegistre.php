<?php

require_once "../conexio.php";

function verificarUsuari($correu, $psswd, $psswd2, $nomusuari){

    global $conex;

    try{

        //Consulta per buscar l'usuari amb el nom que hem introduit
        $sql = "SELECT * FROM usuaris WHERE correu =:correu";
        $stmt = $conex->prepare($sql);
        $stmt->execute([":correu"=>$correu]);

        $boolean = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($boolean != null){
            
            echo "Ja existeix aquest usuari, amb aquest correu.";
        } else {
            insertarUsuari($correu, $psswd, $psswd2,$nomusuari);
        }
    } catch(PDOException $e){
        echo "Error al conectar-se a la BD". $e->getMessage();
    }

}


function insertarUsuari($correu, $psswd1, $psswd2, $nomusuari){

    global $conex;

    try {
       

            if($psswd1 == $psswd2){
                $psswd1 = password_hash($psswd1, PASSWORD_BCRYPT);

                $sql = "INSERT INTO usuaris (correu, nomusuari, contrasenya) VALUES (:correu, :nomusuari, :contrasenya)";
                $stmt = $conex->prepare($sql);
                $stmt->execute([":correu"=>$correu , ":nomusuari"=>$nomusuari, ":contrasenya"=>$psswd1]);

                $boolean = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(!$boolean){
                    echo "Registrat correctament";
                } else {
                    echo "No s'ha pogut registrar";
                }

            } else {

                echo "Les contrasenyes no coincideixen";
            }

        } catch (Exception $e){

            echo $e->getMessage();

    }

}


?>