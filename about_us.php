<?php
    session_start();
    require_once ('inc/Database.php');
    require_once ('inc/dynamic_elements.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Scholar's Secret</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <!-- Custom Styles -->
    <style>
    body {
        background-color: #2c2c2c;
        font-family: "Times New Roman", Times, serif;
        color: #fff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 35px;
        background-color: #1a1a1a;
        border-radius: 10px;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
        
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #FFFFFF; 
        font-family: 'Times New Roman', Times, serif;
    }

    .jumbotron {
        background-color: #5a5a5a;
    color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
    border: 2px solid #f0e68c; 
}

    h2 {
        margin-top: 0;
        color: #f0e68c; 
        font-family: 'Times New Roman', Times, serif;
    }

    p {
        margin-bottom: 0;
        color: #CCCCCC; 
        font-family: 'Times New Roman', Times, serif;
    }

    .fa {
        margin-right: 10px;
    }

    .quote {
        
        text-align: center;
        font-style: italic;
        margin-bottom: 20px;
        color: #f0e68c; 
        font-family: 'Times New Roman', Times, serif;
    }

    .info-section {
        background-color: #fff; 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
    }

    .info-section h3 {
        color: #000; 
        font-family: 'Times New Roman', Times, serif;
    }

    .info-section p {
        color: #333; 
        font-family: 'Times New Roman', Times, serif;
    }

    .team-container {
        background-color: #fff; 
        border-radius: 10px;
        text-align: left;
    }

    .team-image {
        margin-bottom: 20px; 
    }

    .team-image img {
        max-width: 600px; 
        height: auto; 
        display: block; 
        margin: 0 auto; 
    }

    .team-details {
        text-align: center; 
    }

    .description-divider {
    padding-top: 20px;
    width: 100%;
    border-bottom: 2px solid #f0e68c; /* Yellow color */
    margin-bottom: 30px; /* Added spacing below the divider line */
    position: relative;
}
.banner-line-text2 {

padding: 30px 0; 

}
    </style>
</head>

<body>

    <?php require_once("inc/header.php"); ?>
    <div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 <span></span></div>

 

    <!-- Main Content -->
    <div class="container">
        <h1>About Our Brand - Scholar's Secret</h1>
        <div class="quote">
            <i class="fas fa-quote-left"></i> Promoting high-quality learning items to fuel your learning experience. <i class="fas fa-quote-right"></i>
        </div>
        <div class="description-divider"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2>Welcome to Scholar's Secret</h2>
                    <p>Promoting high-quality learning items to fuel your learning experience. At Scholar's Secret, we believe in providing students and professionals with the best tools to enhance their education and career.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2>Our Mission</h2>
                    <p>Our mission is to empower learners by offering a wide range of top-notch educational products. We aim to be a trusted partner in your journey towards academic and professional success.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2>Our Vision</h2>
                    <p>Our vision is to create a world where access to high-quality learning resources is seamless. We strive to inspire a lifelong love for learning and provide tools that enable individuals to reach their full potential.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2>Why Choose Us</h2>
                    <p>At Scholar's Secret, we are committed to excellence in providing top-quality educational products. Our team is passionate about education and dedicated to ensuring that our customers receive exceptional service.</p>
                </div>
            </div>
        </div>

        <div class="description-divider"></div>
        <div class="info-section">
            <h3>Get in Touch</h3>
            <p>Have questions or suggestions? Feel free to contact us!</p>
            <p><i class="fas fa-envelope"></i> Email: skolarsekrets@gmail.com</p>
            <p><i class="fas fa-phone"></i> Phone: +1 (123) 456-7890</p>
        </div>
        <div class="info-section">
            <h3>Our Team</h3>
            <div class="team-container">
                <div class="team-image">
                    <img src="upload/members.png" alt="Our Team">
                </div>
                <div class="team-details">
                    <p>Meet the dedicated team behind Scholar's Secret.</p>
                    <p>Our team is committed to providing you with the best learning experience.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
