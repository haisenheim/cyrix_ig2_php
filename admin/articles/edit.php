<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Administration des posts | Nouveau Post</title>
</head>
<body>
    <?php include('../includes/menu.php') ?>
    <?php
        $rq = $_REQUEST;
        $p = $rq['id'];
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            $string = "update articles set titre = :t, corps = :c where id = :i";
            $rq = $_POST;
            if(!empty($rq)){
                $titre = isset($rq['titre'])?$rq['titre']:null ;
                $corps = isset($rq['corps'])?$rq['corps']:null;
                //$dt = date('Y/m/d');
                $requete = $conn->prepare($string);
                $requete->execute([
                    't'=>$titre,
                    'c'=>$corps,
                    'i'=>$p,
                ]);
            };

            $string = "select * from articles where id =:i";
            $requete = $conn->prepare($string);
            $requete->execute([
                'i'=>$p
            ]);
            $article = $requete->fetchObject();
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div style="width: 700px;" class="card bg-info-subtle">
                <div class="card-header">
                    <h1 class=""><?= $article->titre ?></h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">TITRE</label>
                            <input class="form-control" name="titre" type="text" value="<?= $article->titre ?>" placeholder="Saisir le titre ici ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">CORPS</label>
                           <textarea rows="5" name="corps" placeholder="Contenu du post ..." class="form-control" cols="3"><?= $article->corps ?></textarea>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-warning" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
                <div>
                </div>
            </div>
            
            <div>  
            </div>
        </div>
    </div>
 
</body>

<script src="../assets/js/bootstrap.bundle.js"></script>
</html>