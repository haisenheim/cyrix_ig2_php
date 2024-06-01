<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Administration des auteurs | Modification</title>
</head>
<body>
    <?php include('../includes/menu.php') ?>
    <?php
        $rq = $_REQUEST;
        $p = $rq['id'];
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tds4_db;charset=utf8', 'root', '');
            
            $rq = $_POST;
            
            if(!empty($rq)){
                //var_dump($rq);
               // die();
                $string = "update auteurs set nom = :n, prenom = :p, telephone= :t, nationalite= :nt where id = :i";
                $nom = isset($rq['nom'])?$rq['nom']:null ;
                $prenom = isset($rq['prenom'])?$rq['prenom']:null;
                $tel = isset($rq['telephone'])?$rq['telephone']:null;
                $nt = isset($rq['nationalite'])?$rq['nationalite']:null;
                $requete2 = $conn->prepare($string);
               
                $requete2->execute([
                    'n'=>$nom,
                    'p'=>$prenom,
                    't'=>$tel,
                    'i'=>$p,
                    'nt'=>$nt,
                ]);
            };

            $string2 = "select a.nom, a.prenom, a.telephone, p.nom origine from auteurs a JOIN pays p ON (a.nationalite = p.id) where a.id =:i";
            $requete = $conn->prepare($string2);
            $requete->execute([
                'i'=>$p
            ]);
            $auteur = $requete->fetchObject();
            //var_dump($auteur);
           // die();
            $string = "select * from pays";
            $requete = $conn->prepare($string);
            $requete->execute();
            $pays = $requete->fetchAll();  
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
                    <h1 class="">MODIFICATION DE :  <?= $auteur->nom ?></h1>
                </div>
                <div class="card-body">
                <form action="" method="post">
                        <div class="form-group">
                            <label for="">NOM</label>
                            <input class="form-control" name="nom" value="<?= $auteur->nom ?>" type="text" placeholder="Saisir le nom ici ...">
                        </div>
                        <div class="form-group">
                            <label for="">PRENOM</label>
                            <input class="form-control" name="prenom" value="<?= $auteur->prenom ?>" type="text" placeholder="Saisir le prenom">
                        </div>
                        <div class="form-group">
                            <label for="">TELEPHONE</label>
                            <input class="form-control" name="telephone" value=<?= $auteur->telephone ?> type="text" placeholder="Telephone">
                        </div>
                        <div class="form-group">
                            <label for="">NATIONALITE</label>
                            <input class="form-control" disabled value=<?= $auteur->origine ?> type="text" placeholder="Telephone">
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
 
</body>

<script src="../assets/js/bootstrap.bundle.js"></script>
</html>