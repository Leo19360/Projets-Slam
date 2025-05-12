<?php
    session_start();
    
    require_once 'BaseDonnee/bdd.php';
    include "accueil.php";
?>

<h1>Se connecter</h1>
<form method="POST" action="BaseDonnee/utilisateur.php">
    <div>
        <label type="login" class="form-label">Login</label>
        <input type="text" id="login" class="form-control" name="login" value="" placeholder="Entrez votre login" required>
    </div>
    <div>
        <label for="motdepasse" class="form-label">Mot de passe : </label>
        <input type="password" id="mdp" class="form-control" name="mdp" value="" placeholder="Entrez votre mot de passe" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="connexion" value="">Connexion</button>
</form>