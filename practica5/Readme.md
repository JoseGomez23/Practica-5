
# PRACTICA 3 PHP

Aquesta practica conté: 1 index, 5 vistes, 5 controladors, 5 models, 3 fulles d'estils i 1 conexió a la base de dades

L'index mostra 4 botons: Consultar, Inserir, Modificar i eliminar, cadascun fa una funcio diferent i les explicare a continuació.

## ------------------------*CONSULTAR*-------------------------

Funció principal: Consultar articles de la base de dades.

Funcionament: Trobarem l'article pel seu Titol, si no existeix, ens apareixera un error conforme aquell article no s'ha trobat a 
la base de dades.

## -------------------------*INSERIR*--------------------------

Funció principal:  Inserir articles a la base de dades.

Funcionament: L'usuari ha d'introduir un article amb títol i cos, els dos camps són obligatoris aixi que cap pot quedar buit, en 
cas de voler afegir un article amb el mateix títol d'un ja existent a la base de dades mostrarà un avís conforme ha de canviar
el títol de l'article per afegir-lo.

## ------------------------*MODIFICAR*-------------------------

Funció principal: Modificar articles existents a la base de dades.

Funcionament: Arran del títol d'un article existent a la base de dades el podem modificar, el canvi es possible tant al titol com 
al cos de l'article. Si es vol modificar un títol ùnic per un d'existent mostrara un avís conforme el nom pel que volem reemplaçar
ja existeix i per tant hem de canviar-lo.

## ------------------------*ELIMINAR*---------------------------

Funció principal: Eliminar articles de la base de dades.

Funcionament: Similar a la funcio consultar articles. Trobarem l'article a eliminar pel titol, si no existeix ens avisara, una vegada
hem premut eliminar demanarà una segona confirmació conforme estem d'acord que l'eliminarem permanentment de la base de dades, si 
aquest botó es premut, eliminara l'article de la base de dades.

## --------------------*MOSTRAR ARTICLES*-----------------------

Funció principal: Mostrar tots els elements dins de la taula articles de la base de dades.

Funcionament: Clicant el botó de mostrar articles desencadenarem unes comprovacions prèvies, verificarem si aquesta taula conté algun
tipus de article, si no en troba tornarem a l'index ja que no ha trobat cap, en cas contrari entrarem a la vista on es mostren tots 
els articles amb paginació. Aquí també tenim la opció a posar el nombre d'articles desitjat per pagina al requadre de dalt de la pàgina.
Ens podem moure entre pàgines prement el numero de la pagina o amb els botons de "ENRERE" i "ENDAVANT".

## ---------------------*Iniciar sessio*------------------------

Funció principal: Iniciar sessió al teu perfil de la pàgina web.

Funcionament: Arrau de un correu electrònic i una contrasenya podem iniciar sessió com a un usuari de l'aplicació, amb permisos per inserir,
modificar, eliminar i consultar articles. Alhora de editar modificar o eliminar només tenim la opció a fer canvis sobre els nostres 
propis articles, si intentem modificar altres que no són de la nostra propietat sortira un error.

## --------------------*Registrar-se*---------------------------

Funció principal: Registrar un usuari a la pàgina web.

Funcionament: Crearem un usuari amb correu, nom d'usuari i contrasenya per poder accedir a la pàgina web com a un usuari registrat, una 
vegada registrat no podrem tornar a fer-ho ja que ha tindrem un usuari existent a la pàgina web amb el correu corresponent.

## ------------------*Canvi contrasenya*------------------------

Funció principal: Canviar la contrasenya d'un usuari ja registrat.

Funcionament: Una vegada hem registrat un usuari i hem iniciat sessió tenim la opció a canviar-li la contrasenya. Necessitarem la seva
antiga contrasenya i una de nova, que haurem de confirmar a dos camps. (La contrasenya que reemplaçara a la nova ha de ser una contrasenya
segura, es a dir: 1 numero, 1 lletra minuscula, 1 lletra majuscula, 1 caracter especial i minim de longitud de 8 caracters.)

## --------------------*Tancar Sessió*--------------------------

Funció principal: Tancar una sessió activa a la pàgina web.

Funcionament: Una vegada logat, l'usuari te la opció de tancar la sessió mitjançant un botó a la part dreta de la barra de navegació, una
vegada clickada tindra la opcio de tancar sessió definitivament.

## ------------------*Mostrar Articles V2*-----------------------

Funció principal: Mostrar els articles del usuari amb el que t'has logat.

Funcionament: Arran de l'usuari personal creat a la web, tindrem la selecció exclusiva d'aquest usuari amb botons per modificar o eliminar
l'arxiu. 


-------------------------------------------------------------

# Estructura de carpetes

 - Practica 4
    - Vista
    - Controlador
    - Model
    - Estils

## Practica 4
    Carpeta mare, inclou totes les carpetes filles amb els seus fitxers corresponents.

## Vista
    Carpeta on allotjem totes les vistes del projecte, es la part visual amb la que interactua l'usuari.

## Controlador
    Carpeta que allotja tots els controladors, els controladors son els encarregats de recollir les dades.

## Model
    Carpeta on s'allotjen tots els models, son els encarregats de processar tota la informacio que hem recollit als controladors i comprovacions adicionals.

## Estils
    Carpeta que allotja totes les fulles d'estils, son les encarregades de donar color i forma a la vista per que sigui mes llegible.


-------------------------------------------------------------

Si vols provar amb la teva base de dades has d'anar al fixer "conexio.php" i canviar les variables d'usuari, nom de la base de dades
i contrasenya per les teves propies.


## Usuari per accedir
- Correu : x.martin@sapalomera.cat  - Contrasenya: Sa'palomera2024