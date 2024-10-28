<?php

require_once "../conexio.php";

function verificarUsuari5($correu, $psswd){

    global $conex;

    try{

        //Consulta per buscar l'usuari amb el nom que hem introduit
        $sql = "SELECT * FROM usuaris WHERE correu =:correu";
        $stmt = $conex->prepare($sql);
        $stmt->execute([":correu"=>$correu]);

        $boolean = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($boolean != null){
            
            decriptarPsswd($correu, $psswd);
        } else {
            echo "ERROR!, no hi ha cap usuari amb aquest correu, vols <a href=\"../vista/vistaRegistre.php\">Registrar-te?</a>. ";
        }
    } catch(PDOException $e){
        echo "Error al conectar-se a la BD". $e->getMessage();
    }

}

//Funcio per comparar la contrasenya introduida amb la guardada
function decriptarPsswd($correu, $psswd) {

    global $conex;
    
    try{

        //Obtenir contrasenya de la base de de dades
        $sql = "SELECT contrasenya FROM usuaris WHERE correu =:correu";
        $stmt = $conex->prepare($sql);

        $stmt->execute([":correu"=>$correu]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        

        //Verificar coincidencia contrasenyes
        if($result &&  password_verify($psswd,$result['contrasenya'])){
            
           començarSessio($correu);
        } else {
            echo "Contrasenya incorrecte";
        }

    } catch (Exception $e){

    }


}

//Funcio per iniciar sessio 
function començarSessio($correu){

    global $conex;

    try {
    $sql = "SELECT nomusuari FROM usuaris WHERE correu =:correu";
    $stmt = $conex->prepare($sql);

    
    $stmt->execute([":correu"=>$correu]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    ini_set('session.gc_maxlifetime', 40*60); 
 
    session_start();

    
    $_SESSION['usuari'] = $result['nomusuari'];
    $_SESSION['correu'] = $correu;
    echo "Sessió iniciada com a: " .$result['nomusuari'];

    header("Location: ../vista/vistaUsuariArticles.php");
    exit();
    } catch (Exception $e){
        echo $e->getMessage();
    }

}
?>