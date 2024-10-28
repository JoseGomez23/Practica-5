<?php
//Jose Gomez

require_once "../conexio.php";

function verificarArticles(){

    global $conex;

    try {
        
    $sqlCount = "SELECT COUNT(*) as total FROM articles";
        $stmtCount = $conex->prepare($sqlCount);
        $stmtCount->execute();
        $resultat = $stmtCount->fetch(PDO::FETCH_ASSOC);
        $totalArticles = $resultat['total'];

        if($totalArticles == 0){
            header("Location: ../index.php");
        }


    } catch (Exception $e) {
        echo "Error al llegir la base de dades";
    }
    
}

function mostrarArticlesModel($pagina = 1, $limitArticles, $ordre){
    global $conex;
    try {
        
        if($limitArticles != ""){
            
        

            // offset = a partir de quin article s'ha de mostrar
            $offset = ($pagina - 1) * $limitArticles; //Exemple: (1-1) * 2 = comença per l'article 0
            // Comptar articles 
            $sqlCount = "SELECT COUNT(*) as total FROM articles";
            $stmtCount = $conex->prepare($sqlCount);
            $stmtCount->execute();
            $resultat = $stmtCount->fetch(PDO::FETCH_ASSOC);
            $totalArticles = $resultat['total'];

            // Calcular pagines a mostrar
            if($limitArticles != 0 ){
                $totalPagines = ceil($totalArticles / $limitArticles); //ceil() arrodoneix cap a dalt

                // Consulta que mostra els articles, limit es la quantitat mostrada i offset a partir de quin article s'ha de mostrar
                $sql = "SELECT * FROM articles ORDER BY titol $ordre LIMIT :limit OFFSET :offset ";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':limit', $limitArticles, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
                mostrarArticleDef($article,$totalPagines,$limitArticles);
            } else {
                echo "Introdueix un nombre valid";
            
            }
        } else {
            echo "Has d'introduir un numero";
        }

    
    } catch (PDOException $e) {
    
        echo $e->getMessage();
    } catch (Exception $e) {
        
        echo $e->getMessage();
    }
}

function mostrarArticleDef($article, $totalPagines, $limitArticles) {

    $ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'ASC';

    if (isset($_SESSION['correu'])) {
        foreach ($article as $art) {
            echo "<div>";
            echo "Títol: " . htmlspecialchars($art['titol']) . "<br>";
            echo "Cos: " . htmlspecialchars($art['cos']) . "<br>";
            echo "<a href=\"../vista/vistaModificar.php\">✏️</a>";
            echo "<a href=\"../vista/vistaEliminar.php\">🗑️</a>";
            echo "</div>";
            echo "-------------------------------------------------------------<br>";
        }
    } else {
        foreach ($article as $art) {
            echo "<div>";
            echo "Títol: " . htmlspecialchars($art['titol']) . "<br>";
            echo "Cos: " . htmlspecialchars($art['cos']) . "<br>";
            echo "</div>";
            echo "-------------------------------------------------------------<br>";
        }
    }

    echo "<div class='paginacio'>";

    // Numeros pagines
    for ($i = 1; $i <= $totalPagines; $i++) {
        echo "<a href='?pagina=$i&articlesperpag=$limitArticles&ordre=$ordre'>$i</a> ";
    }

    echo "<br><br>"; 

    
    $paginaActual = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

    //Boto per anar enrere
    if ($paginaActual > 1) {
        echo '<a href="?pagina=' . ($paginaActual - 1) . '&articlesperpag=' . $limitArticles . '&ordre=' . $ordre . '">ENRERE</a> ';
    } else {
        echo '<button disabled>ENRERE</button> ';
    }

    //Boto per anar endavant
    if ($paginaActual < $totalPagines) {
        echo '<a href="?pagina=' . ($paginaActual + 1) . '&articlesperpag=' . $limitArticles . '&ordre=' . $ordre . '">ENDAVANT</a>';
    } else {
        echo '<button disabled>ENDAVANT</button>';
    }

    echo "</div>";  
}


function mostrarArticlesModelUsuari($pagina,$limitArticles,$ordre){


    global $conex;
    try {
        
        if($limitArticles != ""){
            $correu = $_SESSION['correu'];
            

            // offset = a partir de quin article s'ha de mostrar
            $offset = ($pagina - 1) * $limitArticles; //Exemple: (1-1) * 2 = comença per l'article 0
            // Comptar articles 
            $sqlCount = "SELECT COUNT(*) as total FROM articles WHERE correu = :correu";
            $stmtCount = $conex->prepare($sqlCount);
            $stmtCount->execute([":correu"=>$correu]);
            $resultat = $stmtCount->fetch(PDO::FETCH_ASSOC);
            $totalArticles = $resultat['total'];

            
           

            // Calcular pagines a mostrar
            if($limitArticles != 0 ){
                $totalPagines = ceil($totalArticles / $limitArticles); //ceil() arrodoneix cap a dalt

                // Consulta que mostra els articles, limit es la quantitat mostrada i offset a partir de quin article s'ha de mostrar
                $sql = "SELECT * FROM articles WHERE correu=:correu  ORDER BY titol $ordre LIMIT :limit OFFSET :offset";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':limit', $limitArticles, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindParam(':correu', $correu, PDO::PARAM_STR);
                $stmt->execute();
                $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
                mostrarArticleDef($article,$totalPagines,$limitArticles);
            } else {
                echo "Introdueix un nombre valid";
            
            }
        } else {
            echo "Has d'introduir un numero";
        }

    
    } catch (PDOException $e) {
    
        echo "Error al obtenir els articles: ";
    } catch (Exception $e) {
        
        echo $e->getMessage();
    }
    
}


// Agafar el número de pàgina desde la URL, per defecte sera 1
$pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;





?>