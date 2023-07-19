<?php
require 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $conn->query("SELECT * FROM products WHERE id='$id'"); //Selects all records from the database
    $product->execute(); //Executes the query
    $singleProduct = $product->fetch(PDO::FETCH_OBJ); //Gets one record from the database
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Sweet Alerts-->
    <!-- Include SweetAlert library via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>CourseOffer™ - Payment</title>
</head>

<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand  text-white" href="#">CourseOffer™ - Payment Page</a>
            <!--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"-->
            <!--                        data-bs-target="#navbarSupportedContent"-->
            <!--                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
            <!--                    <span class="navbar-toggler-icon"></span>-->
            <!--                </button>-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
            <!--Cancel button-->
            <a style="width: 10%" href="index.php" class="btn btn-danger">Cancel Order</a>
        </div>
    </nav>
</div>

<!--Use the sandbox version of the client ID to pay

use https://www.sandbox.paypal.com and login to check the profile Details and balance

Example:
Personal: (Buyer)
    Username:sb-lyvfn26832295@personal.example.com
    Password: r<ru.xE9
Business: (Merchant)
    Username: sb-hrxey26180918@business.example.com
    Password: 3gj0|BE?
-->

<div class="container mt-4 d-flex justify-content-center">

    <div class="card" style="width: 40%; align-items: center; text-align: center">
        <div class="card-header" style="width: 100%">
            <h1>CourseOffer™</h1>
        </div>

        <h2>You Are Purchasing The Following Course:</h2>
        <h3>
            <?php echo $singleProduct->title?>
        </h3>
        <img src="images/<?php echo $singleProduct->image?>" class="card-img-top" alt="..." style="width: 10rem; height: 10rem">
        <div class="card-body p-0 pb-3">
            <h5 class="card-title">Price: $<?php echo $singleProduct->price?></h5>
        </div>

    </div>
</div>

<!--PayPal integration-->
<div class="container d-flex justify-content-center">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AbewM6PWfUJHs2xsnsoesZjceedpYSq_2yXYU-kST4E81xMJ09mEj2b8hqSeXd2za7KxWF-LnPIlc4Hs&currency=USD"></script>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="font-size: 10rem; width: 40%; text-align: center"></div>
</div>

<script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $singleProduct->price?>' //referances the price from the record saved in the singleProduct variable
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (orderData) {
                // Display SweetAlert
                Swal.fire({
                    title: "Thank You for your CourseOffer™ Purchase",
                    icon: "success",
                    confirmButtonText: "OK",
                    allowOutsideClick: false // Prevent closing the alert by clicking outside
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect when the 'OK' button is clicked
                        window.location.href = 'index.php';
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>
</html>
