<?php
    session_start();
    require_once 'bdd.php';

    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    $sql = "SELECT * FROM utilisateur";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // savoir si la requete est correct
    if($result)
    {
        foreach ($result as $row)
        {
            $pseudo = $row->pseudo;
            $mdp2 = $row->mdp;
            
            if($pseudo == $login && $mdp2 == $mdp)
            {
                // Création de la session
                $_SESSION['pseudo'] = $pseudo;
                header("location:../admin.php");
            }
            else 
            {
                // Si le mot de passe ou le nom d'utilisateur est incorrect !
                header("location:../accueil.php");
            }
        }
    }
?>