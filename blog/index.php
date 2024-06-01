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
            $string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date,a.actif from articles a LEFT JOIN categories c ON (a.category_id = c.id) LEFT JOIN auteurs au ON (au.id = a.auteur_id)";
            $requete = $conn->prepare($string);
            $requete->execute();
            $articles = $requete->fetchAll();

            
            //UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id
            //var_dump($articles);
            //die();
            /* foreach($articles as $art){
                echo 'TITRE : '.$art['titre'].'<br>' ;
            } */
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <h1 class="text-center">ACTUALITE</h1>
            <div>
                <?php foreach($articles as $art):  ?>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3 class="title"><a href="/cyrix/blog/article.php?id=<?= $art['id']?>"><?= $art['titre'] ?></a></h3>
                            <div class="">
                                <small class="text-muted">publie le <strong><?= $art['date'] ?></strong></small>
                                <span>Par <strong><?= $art['auteur'] ?></strong></span> <br>
                                <span class="text-bold text-danger"><?= $art['categorie'] ?></span>

                                <p>
                                    <?= $art['corps'] ?>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>    
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/bootstrap.bundle.js"></script>
</html>