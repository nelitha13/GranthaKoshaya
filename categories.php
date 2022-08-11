<?php session_start();
if(isset($_SESSION['message'])){
    echo('<script>alert("'.$_SESSION['message'].'")</script>');
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categories - GranthaKoshaya</title>
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" type="image/x-icon" href="images\icon.png">
</head>

<body>

    <div class="header">
        <div class="container">

            <?php include_once("components/header.php");?>

        </div>
    </div>
    <div class="container">
        <?php include_once("src/functions.php");?>

        <div class="small-container">
            <h1 class="title">Categories
                <?php if(isset($_SESSION['is_admin'])) { ?>
                <span title="Add New Category"><a href="categories-add.php"><img src="images/add.png" alt="add"
                            width="30px" height="30px"></a></span>
                <?php } ?>
            </h1>


        </div>
        <div style="width: 80%; display: inline; text-align: center;">
            <?php getCategories(); ?>
        </div>


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