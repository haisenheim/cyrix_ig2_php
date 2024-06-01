<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Administration des auteurs</title>
</head>
<body>
    <?php include('../includes/menu.php') ?>
    <?php
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            //$string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date,a.actif from articles a, categories c,auteurs au where a.category_id = c.id AND a.auteur_id = au.id";
            $string = "select a.id,a.nom,a.prenom,a.telephone,p.nom origine from auteurs a join pays p on (a.nationalite = p.id)";
            $requete = $conn->prepare($string);
            $requete->execute();
            $auteurs = $requete->fetchAll();
            //var_dump($auteurs);
            //die();
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h1 class="">GESTION DES AUTEURS</h1>
                <div>
                <a class="btn btn-success mt-2" href="/cyrix/admin/auteurs/create.php">Ajouter un auteur</a>
                </div>
            </div>
            <div>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>TELEPHONE</th>
                            <th>PAYS</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($auteurs as $item): ?>
                            <tr>
                                <td><?= $item['nom'] ?></td>
                                <td><?= $item['prenom'] ?></td>
                                <td><?= $item['telephone'] ?></td>
                                <td><?= $item['origine'] ?></td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a class="btn btn-warning btn-sm" href="/cyrix/admin/auteurs/edit.php?id=<?= $item['id'] ?>">Modifier</a>
                                        </li>
                                    </ul>
                                </td>
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