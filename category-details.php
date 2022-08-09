<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category - GranthaKoshaya</title>
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

    </div>
    <br>
    <div class="title">
        <h1><?php echo $_GET['category'];?></h1>
    </div>


    <?php

global $db;

$query = "SELECT p.id,p.img,p.name,p.stars,p.price FROM category c,product p where c.cat_id=p.cat_id AND c.cat_name='".$_GET['category']."'";
$result = mysqli_query($db,$query);

$count=0;
echo'<div class="row">';

while($row = mysqli_fetch_assoc($result)){
    $back_path = explode("images",$row["img"]);
    $pid=$row["id"];
    echo'
    
    <div class="col-4" style="padding-left: 30px;">
    <a href="product-details.php?productid='.$pid.'">
        <img src="images' . $back_path[1].'" alt="image" style="
                height:320px;
                object-fit: cover;
                width:250px;
                "/>
    </a>
    <h4>'.$row['name'].'</h4>
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
    </div>
    <p>Rs.'.$row['price'].'</p>
</div>';
$count++;
if (
    $count % 4==0
)
{
    echo'</div><div class="row">';
}

}
echo'</div>';
?>





























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