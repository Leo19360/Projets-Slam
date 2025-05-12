<?php
    session_start();
    
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
            <li><a href="Actu.php">Actualités</a></li>
            <li><a href="Contact.php">Nous contacter</a></li>
            <li style="float:right">
                <a class="active" href="connexion.php">Connexion</a>
            </li>
        </ul>
        </br>
        <table class="table-center">
            <tr>
                <th>Image</th>
                <th>Description de l'actualité</th>
            </tr>

            <?php
                $sql = "SELECT * FROM actu";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                // savoir si la requete est correct
                if($result)
                {
                    foreach ($result as $row)
                    {
                        $image = $row->image;
                        $texte = $row->texte;
                        ?>
                        <tr>
                            <td><?php echo $image; ?></td>
                            <td><?php echo $texte; ?></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </body>
</html>