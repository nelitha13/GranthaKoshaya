<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ග්‍රන්ථකෝෂය | GranthaKoshaya</title>
    <link rel="icon" type="image/x-icon" href="images\Logo.png">
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>

    <div class="header">
        <div class="container">

            <?php include_once("components/header.php");?>
            <?php include_once("src/functions.php");?>

            <div class="row">
                <div class="col-2">
                    <h1>
                        ග්‍රන්ථකෝෂය | GranthaKoshaya<br />
 
                    </h1>
                    <p>
                        <b>Sri Lanka's Premium eLibrary</b> 
                    </p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image0 (2).jpeg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!----- Featurd Categories--------->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images\book_collection.png" alt="" />
                </div>
                <div class="col-3">
                    <img src="images\digital library.jpg" alt="" />
                </div>
                <div class="col-3">
                    <img src="images\periodical.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!----- Featurd Books--------->
    <div class="small-container">
        <h2 class="title">Featured Books</h2>
        <div class="row">

            <?php getMostFamousProducts() ?>

        </div>
        <h2 class="title">Latest Books</h2>
        <div class="row">

            <?php getLatestProducts() ?>

        </div>
    </div>

    <!-------- Offer --------->

    <?php getMostFamousOne() ?>

    <!------ Testimonial  ------>
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>

                    <p>
                    A room without books is like a body without a soul.
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img style="width:80px;" src="images/Logo.png" alt="" />
                    <h3>GranthaKoshaya | ග්‍රන්ථකෝෂය</h3>
                </div>
            </div>
        </div>
    </div>

        <!-- Footer -->

    <?php include_once("components/footer.php");?>

    <!-- JS for Toggle menu -->
    <script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
    </script>
</body>

</html>