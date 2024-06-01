<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Blog</title>
</head>
<body>
    <?php include('../includes/menu.php') ?>
    <?php
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            //$string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date from articles a, categories c,auteurs au where a.category_id = c.id AND a.auteur_id = au.id";
            $string = "select * from auteurs";
            $requete = $conn->prepare($string);
            $requete->execute();
            $auteurs = $requete->fetchAll();

        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <h1 class="text-center">LISTE DES AUTEURS</h1>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <th>NOM</th>
                        <th>PRENOM</th>
                    </thead>
                    <tbody>
                        <?php foreach($auteurs as $a): ?>
                            <tr>
                                <td><?= $a['nom'] ?></td>
                                <td><?= $a['prenom'] ?></td>
                            </tr>
                        <?php endforeach ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/bootstrap.bundle.js"></script>
</html>