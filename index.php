    <?php

    session_start();

    require_once ('inc/Database.php');
    require_once ('inc/dynamic_elements.php');


    // create instance of Database class
    $database = new Database();

    if (isset($_POST['add'])){
        //print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){

            if(in_array($_POST['product_id'], array_keys($_SESSION['cart']))){
                $_SESSION['cart'][$_POST['product_id']] += 1;
                header("location: ./");
            }else{
                // Create new session variable
                $_SESSION['cart'][$_POST['product_id']] = 1;
                // print_r($_SESSION['cart']);
                header("location: ./");
            }

        }else{
            // Create new session variable
            $_SESSION['cart'][$_POST['product_id']] = 1;
            // print_r($_SESSION['cart']);
            header("location: ./");
        }
    }

    ?>

<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scholar's Secret</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-9Z5oVbpeVcMZ2j8KXM4MPfLWc/ga9K11ZnoL7vzKnHmhNebPTpx+ylJwJ0HGb8+6qWxM1lC9xJ46E1byIyH74w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    
    <!-- Custom Styles -->
    <style>
        

        
        body {
    background: linear-gradient(to bottom, #220132, #d305b2, #d305b2);
    position: relative;
    font-family: "Times New Roman", Times, serif;
}

.banner-container {
    position: fixed;
    top: 0;
    right: 200px;
    width: 40%;
    height: 100vh;
    padding: -10px;
    padding-top: 40px;
    text-align: center;
    align-items: right;
    z-index: -1;
}

.banner-text {
    position: fixed;
    padding-top: 450px;
    right: 550px;
    font-family: "Times New Roman", Times, serif;
    font-size: 70px;
    color: white;
    text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.banner-container img {
    width: 115%;
    height: AUTO;
    opacity: 0.9;
}

.container {
    max-width: none;
    text-align: center;
    align-items: center;
    padding-top: -;
}

.product-container {
    background-color: #ffffff;
    border-radius: 13px;
    padding: 18px;
    margin-bottom: 20px;
    right: -60px;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    color: #333;
    height: 400px;
    width: 400px;
    max-width: 100%;
    overflow: hidden;
    position: relative;
}

.product-container h3 {
    margin-top: 0;
    margin-bottom: 5px;
    font-size: 14px;
    font-weight: bold;
}

.product-container p {
    margin-bottom: 5px;
    max-height: calc(50% - 20px);
    overflow: hidden;
    font-size: 12px;
}

.product-image {
    max-width: 100%;
    max-height: calc(50% - 20px);
    height: auto;
    display: block;
    margin: 0 auto 10px;
}

.add-to-cart-btn {
    background-color: #301934;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: auto;
    cursor: pointer;
    border-radius: 8px;
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
}

.add-to-cart-btn:hover {
    background-color: #FFFF00;
    color: #000000;
}

.description-divider {
    width: 100%;
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
}

.fas {
    margin-right: 5px;
}
    </style>
</head>
<body>
<!-- Add banner container before header -->
<div class="banner-container">
    <img src="upload/GRADSTUDENT.png" alt="Banner Image">
</div>
<div class="banner-text">
    FUEL<br>
    YOUR<br>
    LEARNING<br>
    EXPERIENCE
</div>


<?php require_once ("inc/header.php"); ?>

<div class="container">
    <div class="row">
        <!-- Left Section -->
        <div class="col-md-5">
            <div class="container">
                <div class="row">
                    <?php
                    $result = $database->getData();
                    if($result){
                        while ($row = $result->fetch_assoc()){
                            ?>
                           <div class="col-md-6">
    <div class="product-container">
        <img src="<?php echo $row['img_path']; ?>" alt="<?php echo $row['name']; ?>" class="product-image">
        <h3><?php echo $row['name']; ?></h3> <!-- Product name added below the image -->
        <p><?php echo $row['description']; ?></p>
        <!-- Description Divider -->
        <div class="description-divider"></div>
        <p>Price: $<?php echo $row['current_price']; ?></p>
        <!-- Add to Cart button with form -->
        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="add-to-cart-btn" name="add">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </form>
    </div>
</div>
                            <?php
                        }
                    } else {
                        echo "<h4 class='text-center'>No Product Listed Yet</h4>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Right Section (Empty for now) -->
        <div class="col-md-4">
            <!-- Content for the right section -->
        </div>
    </div>
</div>


<!-- Font Awesome CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-YaK5xUqy+VYp15mTOqUHq5LTL7N0FifMhwHffZuG5DpzkF/n3MuzsEjmDhxj1gqvW3bB46WhuAqLhP0dFX3LOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
