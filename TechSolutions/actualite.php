<?php
    session_start();

    // Savoir si je me suis connecté
    if(!isset($_SESSION['pseudo'])) {
        echo "Vous n'avez pas accès à cette page !";
        exit();
    }
    
    require_once 'BaseDonnee/bdd.php';

    if(isset($_POST['ajouter'])) {
        $desc = $_POST['desc'];
        $lien = $_POST['lien'];

        $sql = "INSERT INTO actu (image,texte) VALUES ('$lien','$desc')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }

    $descri = "";
    $liendesc = "";
    $idt = "";
    if(isset($_POST['mod'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM actu WHERE id='$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row)
        {
            $description = $row->texte;
            $lien = $row->image;
            $id2 = $row->id;
            
            $idt = $id2;
            $descri = $description;
            $liendesc = $lien;
        }
    }

    if(isset($_POST['mod2'])) {
        $id3 = $_POST['id2'];
        $image = $_POST['lien2'];
        $texte = $_POST['desc2'];

        $sql = "UPDATE actu SET image='$image',texte='$texte' WHERE id='$id3'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }

    if(isset($_POST['sup'])) {
        $ids = $_POST['ids'];

        $sql = "DELETE FROM actu WHERE id='$ids'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
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
        <div>
            <a class="Titre">Les actualités</a>
        </div>
        </br>
        <div>
            <a>Formulaire d'ajout</a>
            <form method="POST" action="">
                <div>
                    <label for="message" class="form-label">Descritpion : </label>
                    <input type="text" id="desc" class="form-control" name="desc" value="" placeholder="Entrez la description" required>
                </div>
                <div>
                    <label for="lien" class="form-label">Lien de l'image : </label>
                    <input type="text" id="lien" class="form-control" name="lien" value="" placeholder="Entrez le lien de l'image" required>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3" name="ajouter" value="">Ajouter l'actualité</button>
            </form>
            </br>
            </br>
            <a>Formulaire de modification</a>
            <form method="POST" action="">
                <input type="text" id="desc" class="form-control" name="id" value="" placeholder="Identifiant" required>
                <button type="submit" class="btn btn-primary mt-3" name="mod" value="">Rechercher</button>
            </form>
            <form method="POST" action="">
                <div style="display:none;">
                    <label for="id2" class="form-label">Descritpion : </label>
                    <input type="text" id="desc" class="form-control" name="id2" value="<?php echo $idt; ?>" placeholder="" required>
                </div>
                <div>
                    <label for="message" class="form-label">Descritpion : </label>
                    <input type="text" id="desc" class="form-control" name="desc2" value="<?php echo $descri; ?>" placeholder="Entrez la description" required>
                </div>
                <div>
                    <label for="lien" class="form-label">Lien de l'image : </label>
                    <input type="text" id="lien" class="form-control" name="lien2" value="<?php echo $liendesc; ?>" placeholder="Entrez le lien de l'image" required>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3" name="mod2" value="">Modifier l'actualité</button>
            </form>
            </br>
            </br>
            <a>Formulaire de suppression</a>
            <form method="POST" action="">
                <input type="text" id="ids" class="form-control" name="ids" value="" placeholder="Identifiant" required>
                <button type="submit" class="btn btn-primary mt-3" name="sup" value="">Supprimer l'actualité</button>
            </form>
            </br>
            </br>
            <table class="table-center">
                <tr>
                    <th>Identifiant</th>
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
                            $id = $row->id;
                            $texte = $row->texte;
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $texte; ?></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </body>
</html>