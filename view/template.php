<!--***************************** BASE DE L'ENSEMBLE DES VUES ***************************-->
<!-- on déclare le DOCTYPE, les links css et les links JS une seule fois ICI -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $titre ?></title>
    </head>

    <body>

    <nav></nav>

    <div id="wrapper" class="uk-container uk-container-expand"></div>
        <div id="contenu">
            <h1> PDO Cinema </h1>
            <h2> <?= $titre_secondaire ?> </h2>
            <?= $contenu ?>
    </div>

    <div>
   
    </div>
        
    </body>
</html>


