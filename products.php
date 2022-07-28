<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Books - GranthaKoshaya</title>
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" type="image/x-icon" href="images\Logo.png">
</head>

<body>

    <div class="header">
        <div class="container">

            <?php include_once("components/header.php");?>

        </div>
    </div>
    <div class="container">
        <?php include_once("src/functions.php");?>

    </div>

    <br>

    <div class="small-container">
        <h1 class="title">All Books</h1>
        <div class="row">
    </div>

        <div class="row">

            <?php 
            if(isset($_SESSION['search'])){
                getProductsBySearch($_SESSION['search']);
                unset($_SESSION['search']);
            }else{
                if(isset($_GET['cat'])){
                    if($_GET['cat'] == 'innovation'){
                        getAllInnovationProducts();
                    }else if($_GET['cat'] == 'crafts'){
                        getAllCraftsProducts();
                    }else{
                        invalidCategory();
                    }
                }else{
                    getAllProducts();
                }      
            }
             ?>

        </div>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>

    <!-- Footer -->
    <div style="height:300px !important;"></div>
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