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
    <title>Add New Book - GranthaKoshaya</title>
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

        <h2 class="title">Add New Book</h2>


        <form class="add_product" method="post" action="src/server.php" enctype="multipart/form-data">
            <h3>Book Name:</h3>
            <input type="text" class="add_product_input" name="name" placeholder="Name" id="add_product_name_id"
                required /><br>
            <br>
            <h3>Book Description:</h3>
            <input type="text" class="add_product_input" name="description" placeholder="Description"
                id="add_product_description_id" /><br>
            <br>
            <h3>Book Category:</h3>
            <select class="add_product_input" name="category" id="add_product_category_id" required>
                <option value="select_cat">+ Select Category</option>
                <?php $cat=get_category();
                foreach($cat as $key => $value){
                    $arr=["id"=>$key,"name"=>$value];
                    echo('<option value="'.htmlspecialchars(json_encode($arr)).'">'.$value.'</option>');}
                ?>
            </select><br>

            <br>
            <h3>Author:</h3>
            <select class="add_product_input" name="author" id="add_product_category_id" required>
                <option value="select_author">+ Select Author</option>
                <?php $cat=get_author();
                foreach($cat as $key => $value){
                    $arr=["id"=>$key,"name"=>$value];
                    echo('<option value="'.htmlspecialchars(json_encode($arr)).'">'.$value.'</option>');}
                ?>
            </select><br>

            <br>
            <h3>Price:</h3>
            <input type="number" min="1" class="add_product_input" name="price" placeholder="Price"
                id="add_product_price_id" required /><br>
            <br>
            <h3>Quantity:</h3>
            <input type="number" min="1" class="add_product_input" name="iqty" placeholder="Initial Quantity"
                id="add_product_iqty_id" required /><br>
            <br>
            <h3>Cover Image:</h3>
            <input type="file" class="add_product_input" name="image" placeholder="Image" id="add_product_img_id"
                required /><br>
            <br>
            <h3>Soft Copy of Book(free):</h3>
            <input type="file" class="add_product_input" name="pdf" placeholder="PDF File" id="add_product_img_id"
                required /><br>
            <input type="text" hidden name="product_add" value="set" /><br>
            <input type="submit" style="
                width:100%;
                margin-top:20px;
                background-color:#04aa6d;
                height:50px;
                border-radius:10px;
                color:white;
                font-weight: bold;
                font-size: 20px;
                cursor:pointer;" name="add-product" value="ADD" />
        </form>












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