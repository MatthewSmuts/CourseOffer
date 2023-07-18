<?php
require "config.php";

$products = $conn->query("SELECT * FROM products");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ); //fetch all products from the database as object
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--icon packs-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>CourseOffer</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container" style="margin-top: auto">
        <a class="navbar-brand  text-white" href="#">CourseOffer™</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </div>
</nav>

<div class="container">
    <div class="row mt-5">
        <?php foreach ($allProducts as $product): ?>
        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mt-3">
            <div class="card">
                <img height="213px" class="card-img-top" src="images/<?php echo $product->image; ?>">
                <div class="card-body">
                    <h5 class="d-inline"><b><?php echo $product->title; ?></b></h5>
                    <h5 class="d-inline">
                        <div class="text-muted d-inline">($<?php echo $product->price; ?>/item)</div>
                    </h5>
                    <p><?php echo $product->description; ?></p>
                    <a href="#" class="btn btn-primary w-100 rounded my-2">Buy <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<footer class="bg-dark text-white text-center text-lg-start" style="margin-top: 40px">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>

                <p>
                    Thank you for choosing CourseOffer™ for your online course Needs! We appreciate
                    your interest in expanding your skills and knowledge in these technologies.
                    (Please note that this is a demo project, and no real payments will be processed.)
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Online Profiles</h5>
                <div class="row">

                <a href="https://github.com/MatthewSmuts" class="text-white">
                    <i class="bi bi-github"></i>
                </a>
                <br>
                <a href="https://www.linkedin.com/in/matthew-smuts-886086203/" class="text-white">
                    <i class="bi bi-linkedin"></i>
                </a>
                <br>
                <a href="https://www.instagram.com/smuts_matz/" class="text-white">
                    <i class="bi bi-instagram"></i>
                </a>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Resources Used:</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://getbootstrap.com/" class="text-white" style="text-decoration: none"><i class="bi bi-bootstrap-fill"></i> Bootstrap 5</a>
                    </li>
                    <li>
                        <a href="https://icons.getbootstrap.com/" class="text-white" style="text-decoration: none"><i class="bi bi-bootstrap-fill"></i> Bootstrap icons</a>
                    </li>
                    <li>
                        <a href="https://mdbootstrap.com/" class="text-white" style="text-decoration: none"><i class="bi bi-pie-chart"></i> Material Design for Bootstrap</a>
                    </li>
                    <li>
                        <a href="https://fontawesome.com/" class="text-white" style="text-decoration: none"><i class="bi bi-file-font-fill"></i> Font Awesome</a>
                    </li>
                    <li>
                        <a href="https://popper.js.org/" class="text-white" style="text-decoration: none"><i class="bi bi-card-heading"></i> PopperJS</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright: CourseOffer™
        <!--            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>-->
    </div>
    <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity=""
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity=""
        crossorigin="anonymous"></script>
</body>

</html>