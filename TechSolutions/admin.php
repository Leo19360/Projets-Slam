<?php
    session_start();

    // Savoir si je me suis connecté
    if(!isset($_SESSION['pseudo'])) {
        echo "Vous n'avez pas accès à cette page !";
        exit();
    }
    
    require_once 'BaseDonnee/bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Internet</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <ul>
            <li><a href="actualite.php">Les actualités</a></li>
            <li><a href="commentaire.php">Visualiser les commentaires</a></li>
            <li style="float:right">
                <a class="active" href="deconnexion.php">Déconnexion</a>
            </li>
        </ul>
        <div class="div-center">
            <a class="Titre">PAGE ADMINISTRATEUR</a>
        </div>
    </body>
</html>