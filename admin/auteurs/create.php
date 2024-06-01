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
         $string = "select * from pays";
         $requete = $conn->prepare($string);
        $requete->execute();
        $pays = $requete->fetchAll();       
    ?>
    <div class="bg-light">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div style="width: 700px;" class="card bg-info-subtle">
                <div class="card-header">
                    <h1 class="">NOUVEL AUTEUR</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">NOM</label>
                            <input class="form-control" name="nom" type="text" placeholder="Saisir le nom ici ...">
                        </div>
                        <div class="form-group">
                            <label for="">PRENOM</label>
                            <input class="form-control" name="prenom" type="text" placeholder="Saisir le prenom">
                        </div>
                        <div class="form-group">
                            <label for="">TELEPHONE</label>
                            <input class="form-control" name="telephone" type="text" placeholder="Telephone">
                        </div>
                        <div class="form-group mt-4">
                            <label for="">PAYS</label>
                            <select name="nationalite" class="form-control" id="">
                               <?php foreach($pays as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['nom'] ?></option>
                                <?php endforeach ?>
                            </select>
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
            $string = "insert into auteurs (nom,prenom,telephone,nationalite) values (:n,:p,:t,:nt)";
            $rq = $_POST;
            
            if(!empty($rq)){
                $nom = isset($rq['nom'])?$rq['nom']:null ;
                $prenom = isset($rq['prenom'])?$rq['prenom']:null;
                $tel = isset($rq['telephone'])?$rq['telephone']:null;
                $nat = isset($rq['nationalite'])?$rq['nationalite']:null;
                
                $requete = $conn->prepare($string);
                $requete->execute([
                    'n'=>$nom,
                    'p'=>$prenom,
                    't'=>$tel,
                    'nt'=>$nat,
                ]);
                echo "OK !" ; 
            };
        }
        catch(Exception $ex){
            echo "Erreur de connexion : ".$ex->getMessage();
        }
    ?>
</body>

<script src="../assets/js/bootstrap.bundle.js"></script>
</html>