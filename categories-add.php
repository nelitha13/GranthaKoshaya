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
    <title>Add New Category - GranthaKoshaya</title>
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

        <h2 class="title">Create New Category</h2>

        <form method="post" class="add_product" action="src/server.php" enctype="multipart/form-data">
            <h3>Category Name:</h3>
            <input type="text" placeholder="Category Name" name="category" required />
            <h3>Category Image:</h3>
            <input type="file" name="image" required />
            <input type="submit" style="
                width:100%;
                margin-top:20px;
                background-color:#ff523b;
                height:50px;
                border-radius:10px;
                color:white;
                font-weight: bold;
                font-size: 20px;
                cursor:pointer;" name="create-category" value="Create" />
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