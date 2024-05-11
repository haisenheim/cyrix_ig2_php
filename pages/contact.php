<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="stylesheet" href="../assets/css/custom/style.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
    </head>
    <body>
        <?php include('../includes/menu.php') ?>
        <div class="container">
            <h1 class="text-center mt-4">CONTACT</h1>
            <div class="d-flex justify-content-center mt-5">
            <div style="width: 600px;" class="card bg-light">
                <div class="card-header">
                    <h5>LAISSEZ-NOUS VOTRE MESSAGE</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="">NOM</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">PRENOM</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">TELEPHONE</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">EMAIL</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Message</label>
                                <textarea placeholder="Saisir votre message ici ..." class="form-control" name="message" id=""></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger">ENVOYER</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        
        </div>

        <?php
            $data = $_POST;
            //var_dump($data);
            foreach($data as $k=>$v){
                echo $k .' : '.$v .'<br/>';
            }
        
        ?>

    <style>
        .form-group{
            margin-top: 10px;
        }
    </style>
    </body>
</html>

