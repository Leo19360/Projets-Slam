<?php
    // Suppression des variables sessions
    session_start();
    session_unset();

    header("location:accueil.php")
?>