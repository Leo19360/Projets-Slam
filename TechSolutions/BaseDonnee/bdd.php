<?php
    $connexion = "localhost";
    $base = "site";
    $utilisateur = "root";
    $mdp = "";

    $dsn = "mysql:dbname=$base;host=$connexion";

    try {
        $pdo = new PDO($dsn, $utilisateur, $mdp);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // echo"connecté";

    } catch (PDOException $e) {
        // echo 'Erreur : ' . $e->getMessage();
    }
?>
