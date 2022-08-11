<?php session_start();
if (isset($_SESSION['message'])) {
    echo ('<script>alert("' . $_SESSION['message'] . '")</script>');
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ග්‍රන්ථකෝෂය | GranthaKoshaya</title>
    <link rel="icon" type="image/x-icon" href="images\icon.png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="resources/flickity.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="resources/flickity.pkgd.js"></script>
</head>

<body>

    <div class="header">
        <div class="container">

            <?php include_once("components/header.php"); ?>
            <?php include_once("src/functions.php"); ?>

            <div class="row">
                <div class="col-2">
                    <h1>
                        ග්‍රන්ථකෝෂය📖<br>GranthaKoshaya
                    </h1>
                    <p>
                        <b>Sri Lanka's Premium eLibrary</b>
                    </p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="./images/cover.png" alt="cover" />
                </div>
            </div>
        </div>
    </div>

    <!----- Featurd imgs--------->
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
        <h1 class="title">Featured Books</h1>
        <div class="row">

            <?php getMostFamousProducts() ?>

        </div>
        <h1 class="title">Latest Books</h1>
        <div class="row">

            <?php getLatestProducts() ?>

        </div>
    </div>

    <!-------- Offer --------->

    <?php getMostFamousOne() ?>

    <br>

    <!---------Authors--------->

    <div class="small-container">
        <h1 class="title">Authors</h1>
        <div class="row">

            <?php getMostFamousAuthor() ?>
            <a href="authors.php" class="btn">View All Authors <i class="fa fa-arrow-right"></i></a>
        </div>


        <!---------categories--------->
        <br><br>
        <div class="small-container">
            <h1 class="title">Categories</h1>
            <div class="row">

                <?php getMostFamousCategory() ?>
                <a href="categories.php" class="btn">View All Categories <i class="fa fa-arrow-right"></i></a>

            </div>
            <br><br>

            <!------ Feedbacks  ------>

            <h1 class="title">What People Think!</h1>
            <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
            <?php getAllFeedbacks() ?>
            </div>
            

            <br><br><br>

            <h1 class="title">Add Your Own Feedback</h1>
            <form method="post" class="add_product" action="src/server.php" enctype="multipart/form-data">
                <h3>Your Name</h3>
                <input type="text" placeholder="Name" name="customer" required />
                <h3>Your Feedback</h3>
                <input type="text" placeholder="Feedback" name="feedback" required /><br>
                <h3>Rating</h3>
                <select name="rating" required>
                    <option value="5">5 Star(s) ⭐⭐⭐⭐⭐</option>
                    <option value="4">4 Star(s) ⭐⭐⭐⭐</option>
                    <option value="3">3 Star(s) ⭐⭐⭐</option>
                    <option value="2">2 Star(s) ⭐⭐</option>
                    <option value="1">1 Star(s) ⭐</option>

                </select>
                <input type="submit" style="
                width:100%;
                margin-top:20px;
                background-color:#04aa6d;
                height:50px;
                border-radius:10px;
                color:white;
                font-weight: bold;
                font-size: 20px;
                cursor:pointer;" name="add-feedback" value="Add" />
            </form>

            <!-- Footer -->

            <?php include_once("components/footer.php"); ?>

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