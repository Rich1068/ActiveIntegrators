<?php
    require_once ("inc/dynamic_elements.php");
    require_once ('inc/header.php');
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #0d0d0d; /* Darker background */
            font-family: 'Times New Roman', Times, serif; /* Set font */
            color: #fff; /* White text color */
        }

        .container {
            max-width: 800px; /* Increased container width */
            margin: 150px auto; /* Increased margin for centering */
            text-align: center;
            padding: 60px 30px; /* Adjusted padding */
            background-color: #1a1a1a; /* Dark container background color */
            color: #fff; /* White text color */
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5); /* Darker box shadow */
            position: relative; /* Added position for outline */
        }

        h1 {
            font-size: 48px; /* Increased heading font size */
            margin-bottom: 30px; /* Increased margin bottom */
        }

        p {
            font-size: 20px; /* Increased paragraph font size */
            line-height: 1.6; /* Increased line height */
            margin-bottom: 40px; /* Increased margin bottom */
        }

        .divider {
            margin-bottom: 40px; /* Space between sections */
            border-bottom: 2px solid #fff; /* White divider */
        }



    </style>
</head>
<body>
<div class="container">

    <h1>Thank you for purchasing!</h1>
    <p>We appreciate your support for education and our mission to promote learning for all. Your contribution helps us make a difference in the lives of many.</p>
    <div class="divider"></div>
    <div class="main-shop-container container-right" onclick="window.location.href='index.php'">
    <div class="main-shop-container container-right" style="display: flex; align-items: center; justify-content: center;">
    <div class="main-shop-container container-right" style="display: flex; align-items: center; justify-content: center;">
    <div class="main-shop-container container-right" style="display: flex; align-items: center; justify-content: center;">
    <button style="border: 2px solid #ffd700; border-radius: 5px; background-color: transparent; padding: 10px; display: flex; align-items: center;">
    <span class="main-shop-text" style="font-size: 24px; font-weight: bold; color: #fff; margin-right: 10px;">Back To Shop</span>
    <div class="main-shop-icon" style="color: #fff;">
        <i class="fas fa-store" style="font-size: 24px;"></i>
    </div>
</button>

</div>

</div>

</div>

</div>
</body>
</html>
