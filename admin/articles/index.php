<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Administration des posts</title>
</head>
<body>
    <?php include('../includes/menu.php') ?>
    <?php
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            $string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date,a.actif from articles a, categories c,auteurs au where a.category_id = c.id AND a.auteur_id = au.id";
            $requete = $conn->prepare($string);
            $requete->execute();
            $articles = $requete->fetchAll();
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h1 class="">LISTE DES ARTICLES</h1>
                <div>
                <a class="btn btn-success mt-2" href="#">Ajouter un article</a>
                </div>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>TITRE</th>
                            <th>AUTEUR</th>
                            <th>CATEGORIE</th>
                            <th>DATE DE PUBLICATION</th>
                            <th>STATUT</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $item): ?>
                            <tr>
                                <td><?= $item['titre'] ?></td>
                                <td><?= $item['auteur'] ?></td>
                                <td><?= $item['categorie'] ?></td>
                                <td><?= $item['date'] ?></td>
                                <td><?= $item['actif']?'<span class="badge bg-success">actif</span>':'<span class="badge bg-danger" >archive</span>' ?></td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a class="btn btn-warning btn-sm" href="#">Modifier</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <?php if($item['actif']): ?>
                                                <a class="btn btn-danger btn-sm" href="#">Archiver</a>
                                            <?php else: ?>    
                                                <a class="btn btn-success btn-sm" href="#">Mettre en ligne</a>
                                            <?php endif ?>    
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