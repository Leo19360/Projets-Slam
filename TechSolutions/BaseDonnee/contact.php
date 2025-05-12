<?php
    require_once 'bdd.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $com = $_POST['commentaire'];

    $sql = "INSERT INTO contact (prenom,nom,commentaire) VALUES ('$prenom','$nom','$com')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    header("location:../accueil.php");
?>