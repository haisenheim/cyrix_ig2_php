<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cyrix | Qui sommes nous?</title>
</head>
<body>
    <?php include('includes/menu.php') ?>
    <?php require_once('./data/serivices.php') ?>
    <div class="text-white text-center entete" style="height: 30vh; background-image: url('assets/img/slide1.jpg');">
        <h1>A PROPOS DE NOUS</h1>
        <h3>Nous sommes une bande de Geeks qui vous veut du bien!</h3>
    </div>
    <div class="section container">
        <div class="section-title text-center mt-4">
            <h2>NOS SERVICES</h2>
        </div>
        <div class="section-body">
            <ul>
                <?php foreach($services as $service): ?>
                    <div class="card section-item service-item mt-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-start gap-4">
                                <div class="photo-div">
                                    <img class="photo" src="./assets/img/<?= $service['photo'] ?>" alt="Photo">
                                </div>
                                <div class="service-text">
                                    <div class="">
                                        <h5><?= $service['nom'] ?></h5>
                                    </div>
                                    <div class="">
                                        <p><?= $service['description'] ?></p>
                                    </div>
                                    <div class="text-center">
                                        <a class="btn btn-secondary" title="Plus de details sur ce service" href="./pages/service.php?id=<?= $service['id'] ?>">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>    
            </ul>
        </div>
    </div>
    
</body>
<script src="assets/js/bootstrap.bundle.js"></script>
</html>