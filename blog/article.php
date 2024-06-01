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
        $rq = $_REQUEST;
        $p = $rq['id'];
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            //$string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date from articles a, categories c,auteurs au where a.category_id = c.id AND a.auteur_id = au.id AND a.id =:v";
            $string = "select a.id,titre,au.nom auteur,c.nom categorie,a.corps,publie_a date,a.actif from articles a LEFT JOIN categories c ON (a.category_id = c.id) LEFT JOIN auteurs au ON (au.id = a.auteur_id) where a.id =:v";
            $requete = $conn->prepare($string);
            $requete->execute([
                'v'=>$p
            ]);
            $article = $requete->fetchObject();
            
            //var_dump($rq['id']);
            //UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id
            //var_dump($article);
            //die();
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
        <div class="bg-light">
            <div class="container mt-5">
                <h1 class="text-center"><?= $article->titre ?></h1>

                <p>
                    <?= $article->corps ?>
                </p>
            </div>  
        </div>
</body>
<script src="../assets/js/bootstrap.bundle.js"></script>
</html>