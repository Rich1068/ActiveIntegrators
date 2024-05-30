<?php
require_once ("inc/header.php");
require_once ('inc/Database.php');
require_once ('inc/dynamic_elements.php');


// create instance of Database class
$database = new Database();


if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        if (in_array($_POST['product_id'], array_keys($_SESSION['cart']))) {
            $_SESSION['cart'][$_POST['product_id']] += 1;
        } else {
            $_SESSION['cart'][$_POST['product_id']] = 1;
        }
    } else {
        $_SESSION['cart'][$_POST['product_id']] = 1;
    }

    // Redirect to the same page
    header('Location: ' . $_SERVER['PHP_SELF']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scholar's Secret</title>
    <link rel="stylesheet" href="style.css">
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
 
    <!-- Custom Styles -->

    <style>
        
        body {
            background-color: #2c2c2c;
            color: #ffffff;
            font-family: "Times New Roman", Times, serif;


        }

        .header-text {
            padding-top: 30px;
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        .header-text2 {
            padding-top: 40px;
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em;
            font-style: italic;
            color: #f0e68c;
            padding-bottom: 40px;
        }




        .quote {
            text-align: center;
            margin: 20px 0;
            font-size: 1.5em;
            color: #f0e68c;
            font-style: italic;
      
        }


.shop-container {
    background-color: #1a1a1a;

    padding: 40px;

}



        .shop-items {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-container {
            border: 2px solid #f0e68c;;
            background-color: #4f4f4f; 
            border-radius: 13px;
            padding: 18px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.5);
            color: #ffffff;
            height: 575px; 
            width: 300px;
            position: relative;
            text-align: left;
            transition: transform 0.3s;
        }

        .product-container h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .product-container p {
            font-size: 14px;
        }

        .product-image {
            max-width: 100%;
            max-height: 200px;
            height: auto;

            margin: 0 auto 10px;
            border-radius: 10px
        }

        .add-to-cart-btn {
            padding-top: 10px;
            background-color: #FFFF00;
            border: none;
            color: #000000;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: auto;
            cursor: pointer;
            border-radius: 60px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
           
        }

        .add-to-cart-btn:hover {
            background-color: #000000;
            color: YELLOW;
        }

        .description-divider {
            padding-top: 50px;
            width: 100%;
            border-bottom: 2px solid #f0e68c;
            margin-bottom: 10px;
            position: relative;
        }

        .fas {
            margin-right: 5px;
        }




.banner-container {
    background-color: #1a1a1a; 
    padding: 200px; 
    margin-bottom: 80px; 
    max-width: 1600px;
    margin: 0 auto;
    position: relative;
    box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.5); 
    border-radius: 20px; 
    overflow: hidden; 
    margin-top:100px;
}

.banner-image {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 20%; /* Covering the whole right side */
    background-image: url('upload/Banner1.JPG'); /* Image URL from the upload folder */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center right 20%; /* Adjust background position */
    border-top-right-radius: 20px; /* Apply border-radius */
}

.banner-text {
    color: #ffff99; /* Light yellow color */
    font-size: 80px; /* Increase font size */
    font-family: "Times New Roman", Times, serif; 
    text-transform: uppercase; 
    letter-spacing: 2px; 
    line-height: 1.2; 
    position: absolute;
    top: 50%;
    left: 10%; /* Adjust left position */
    transform: translateY(-50%);
}

.banner-text h1 {
    color: white; /* Change h1 color to white */
    margin-top: 0;
}

.banner-text p {
    color: #ffff99;
    font-size: 24px;
    font-style: italic;
}



.banner-image2 {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 20%; 
    background-image: url('upload/Banner2.JPG'); /* Image URL from the upload folder */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center left 20%; /* Adjust background position */
    border-top-right-radius: 0px; /* Apply border-radius */
}

.banner-text2 {

    color: #ffff99; /* Light yellow color */
    font-size: 80px; /* Increase font size */
    font-family: "Times New Roman", Times, serif; /* Apply font family */
    text-transform: uppercase; /* Convert text to uppercase */
    letter-spacing: 2px; /* Add letter spacing */
    line-height: 1.2; /* Adjust line height */
    position: absolute;
    top: 50%;
    right: 30%; /* Adjust left position */
    transform: translateY(-50%);
}

.banner-text2 h1 {
    color: white; /* Change h1 color to white */
    margin-top: 0;
}

.banner-text2 p {
    color: #ffff99;
    font-size: 24px;
    font-style: italic;
}


.banner-line-text2 {

    padding: 30px 0; 

}
.banner-line-text {

padding: 20px 0; 

}



.banner-line-text .fas {
    font-size: 24px; 
    color: #f0e68c;
}
.bannerbottom {
    background-image: url('upload/BottomBanner1.png');
    background-size: contain; 
    background-position: center;
    background-repeat: no-repeat;
    width: 100%; 
    height: 500px; 
}

.contact-us {
            font-size: 20px;
            color: white; 
            background-color: black; 
            padding: 10px; 
        
        }
        .contact-us .email {
            color: yellow; /* Light yellow color for the email */
        }
    </style>
</head>
<body>
<div class="banner-line-text2">
 
 <span></span></div>

<div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 <span></span></div>
<div class="header-text">Welcome to Scholar's Secret</div>
<div class="quote">"Fuel your learning experience with the best resources."</div>

<div class="banner-container banner-container-1">
    <div class="banner-image2"></div>
    <div class="banner-text2">
        <h1>Explore Scholar's Secrets</h1>
        <p>Unlock the knowledge you seek with us.</p>
    </div>
</div>
<div class="banner-line-text">
 
    <span></span>
 
</div>


<div class="banner-container">
    <div class="banner-text">
        <h1>Boost Your Creativity</h1>
        <p>Discover the best resources for your learning journey.</p>
    </div>
    <div class="banner-image"></div>
</div>
<div class="header-text2">Shop Now Here At Scholar's Secret!</div>



<!-- Shop Items Container -->
<div class="shop-container">
    <div class="shop-items">
        <?php
        $result = $database->getData();
        if($result){
            while ($row = $result->fetch_assoc()){
                ?>
                <div class="product-container">
                    <img src="<?php echo $row['img_path']; ?>" alt="<?php echo $row['name']; ?>" class="product-image">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <div class="description-divider"></div>
                    <p>Price: ₱<?php echo $row['current_price']; ?></p>
                    <form method="post" onsubmit="return storeScrollPosition()">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="add-to-cart-btn" name="add">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </form>
                    <script>
                        function storeScrollPosition() {
                            window.sessionStorage.scrollPos = window.scrollY;
                            return true; // Allow form submission to proceed
                        }
                    </script>
                </div>
                <?php
            }
        } else {
            echo "<h4 class='text-center'>No Product Listed Yet</h4>";
        }
        ?>
    </div>
</div>

<div class="description-divider"></div>
    </div>
    <div class="banner-line-text2">
 
    <span></span></div>
    <div class="bannerbottom"></div>
</div>

<div class="contact-us">
        Contact Us At <span class="email">skolarsekrets@gmail.com</span>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<script>
    window.onload = function() {
        var scrollPos = window.sessionStorage.getItem('scrollPos');
        if (scrollPos) {
            window.scrollTo(0, scrollPos);
            window.sessionStorage.removeItem('scrollPos');
        }
    }
</script>

