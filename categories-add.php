<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Author - GranthaKoshaya</title>
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

        <form id="form" class="add_product" method="post" enctype="multipart/form-data">
        <div class="small-container">
        <h2 class="title">Add New Category</h2>
            <input type="text" class="add_product_input" name="name" placeholder="Category Name" id="add_product_name_id" /><br>
            <input type="file" class="add_product_input" name="image" placeholder="Image" id="add_product_img_id" /><br>
            <input type="text" hidden name="product_add" value="set" /><br>
            <input type="submit" name="product_add" style="
                width:100%;
                margin-top:20px;
                background-color:#04aa6d;
                height:50px;
                border-radius:10px;
                color:white;
                font-weight: bold;
                font-size: 20px;
            " value="ADD" />
        </form>
            

    </div>

    <br>



























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