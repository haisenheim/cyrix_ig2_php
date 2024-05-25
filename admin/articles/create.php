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
         $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
         $string = "select * from categories";
         $requete = $conn->prepare($string);
        $requete->execute();
        $cats = $requete->fetchAll();       
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div style="width: 700px;" class="card bg-info-subtle">
                <div class="card-header">
                    <h1 class="">NOUVEAU POST</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">TITRE</label>
                            <input class="form-control" name="titre" type="text" placeholder="Saisir le titre ici ...">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">CATEGORIE</label>
                            <select name="category_id" class="form-control" id="">
                               <?php foreach($cats as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">CORPS</label>
                           <textarea rows="5" name="corps" placeholder="Contenu du post ..." class="form-control" cols="3"></textarea>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success" type="submit">ENREGISTRER</button>
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
    <?php
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            $string = "insert into articles (titre,corps,publie_a) values (:t,:c,:d)";
            $rq = $_POST;
            
            if(!empty($rq)){
                $titre = isset($rq['titre'])?$rq['titre']:null ;
                $corps = isset($rq['corps'])?$rq['corps']:null;
                $dt = date('Y/m/d');
                $requete = $conn->prepare($string);
                $requete->execute([
                    't'=>$titre,
                    'c'=>$corps,
                    'd'=>$dt
                ]);
                echo "OK !" ; 
            };
                     
            //var_dump($rq);
            //die();
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
</body>

<script src="../assets/js/bootstrap.bundle.js"></script>
</html>