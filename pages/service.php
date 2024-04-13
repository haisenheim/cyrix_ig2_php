<!DOCTYPE html>
<html lang="en">
<?php 
      require_once('../data/serivices.php');
      $request = $_REQUEST;
      $id = $request['id'];
      $service = null;
      foreach($services as $item){
        if($item['id'] == $id){
            $service = $item;
        }
      }

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Cyrix | <?= $service['nom'] ?></title>
</head>
<body>
   <?php include('../includes/menu.php') ?>
    <div class="text-white text-center entete" style="height: 40vh; background-image: url('../assets/img/<?= $service['photo'] ?>');">
        <h1 class=""><?= $service['nom'] ?></h1>
    </div>
    <div class="container mt-5">
        <p><?= $service['description'] ?></p>
    </div>
    
</body>
</html>