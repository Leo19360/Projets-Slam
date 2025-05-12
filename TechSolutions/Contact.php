<?php
    session_start();
    
    require_once 'BaseDonnee/bdd.php';
    include "accueil.php";
?>

<h1>Nous contacter</h1>
<form method ="POST" action = "BaseDonnee/contact.php">
    <label for="recherche">Nom</label>
    <input type ="text" value="" name="nom" placeholder="Entrez votre nom" required>
    </br>
    <label for="recherche">Prenom</label>
    <input type ="text" value="" name="prenom" placeholder="Entrez votre prenom" required>
    </br>
    <label for="recherche">Commentaire</label>
    <textarea type ="text" value="" name="commentaire" placeholder="Entrez un commentaire" required></textarea>
    </br>
    <button type="submit" name="envoyer">Envoyer le commentaire</button>
</form>
  