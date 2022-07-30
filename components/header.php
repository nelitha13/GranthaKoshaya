<?php
include_once('src/conn.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<style>
@keyframes example {
    from {
        margin: 0% auto;
    }

    to {
        margin: 5% auto;
    }
}

.add_product {
    width: 50%;
    margin: 0 auto;
}

.add_product_input {
    background-color: #ffe7e7;
    width: 100%;
    height: 30px;
    margin-top: 30px;
    border-radius: 4px;
    border: none;
    border-bottom: 1px solid black;

}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}


.modal-content {
    border-radius: 10px;
    background-color: #ffe7e7 !important;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;

    animation-name: example;
    animation-duration: 0.5s;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}





.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<div class="navbar">
    <div class="logo">
        <a href="index.php">
            <img src="images/Logo.png" alt="" width="150px" /></a>
    </div>
    <nav>
        <form method="post" action="src/server.php">
            <input type="text" style="display:inline-block;height:25px;width: 200px;" placeholder="Type Here to Search"
                name="search" />
            <input type="submit" style="display:inline-block;height:25px;width: 75px;" value="Search" />
        </form><br />

        <ul id="MenuItems">
            <li><a href="index.php">Home</a></li>
            <li>
                <div class="dropdown">
                    <a href="products.php" class="dropbtn">Books</a>
                    <div class="dropdown-content">
                        <a href="products.php?cat=innovation">Innovation</a>
                        <a href="products.php?cat=crafts">Crafts</a>
                    </div>
                </div>
            </li>
            <li><a href="authors.php">Authors</a></li>
            <?php if (isset($_SESSION['user_email'])) { ?>

            <?php if($_SESSION['is_admin']) { ?>

            <li><a href="adminproducts.php">My Books</a></li>
            <li id="myBtn"><img src="images/add.png" alt="" width="30px" height="30px" /></li>

            <?php } ?>

            <li><a href="src/server.php?logout=1">Logout</a></li>

            <?php  } else { ?>

            <li><a href="account.php">Login/Register</a></li>

            <?php  } ?>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="aboutus.php">About Us</a></li>


            <!-- TODo: 22:20 -->
        </ul>

        <?php if (isset($_SESSION['user_email'])) { ?>

        <?php if (!$_SESSION['is_admin']) { ?>

        <a href="cart.php"><img src="images/cart.png" alt="" width="30px" height="30px" /></a>

        <?php } ?>

        <?php } ?>

    </nav>




    <img src="images/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
</div>




<!--Modal-->

<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>

        <form id="form" class="add_product" method="post" enctype="multipart/form-data">
        <div class="small-container">
        <h2 class="title">ADD BOOKS</h2>

    </div>
            <input type="text" class="add_product_input" name="name" placeholder="Name" id="add_product_name_id" /><br>
            <input type="text" class="add_product_input" name="description" placeholder="Description"
                id="add_product_description_id" /><br>
            <select class="add_product_input" name="category" id="add_product_category_id">
                <option value="Innovation">Innovation</option>
                <option value="Crafts">Crafts</option>

            </select>
            <input type="number" min="1" class="add_product_input" name="price" placeholder="Price"
                id="add_product_price_id" /><br>
            <input type="number" min="0" class="add_product_input" name="offer" placeholder="Offer"
                id="add_product_offer_id" /><br>
            <input type="number" min="1" class="add_product_input" name="iqty" placeholder="Initial Quantity"
                id="add_product_iqty_id" /><br>
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

</div>


<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
$(document).ready(function() {

    $("#form").on('submit', (function(e) {
        e.preventDefault();

        let name = $('#add_product_name_id')[0].value;
        let description = $('#add_product_description_id')[0].value;
        let category = $('#add_product_category_id')[0].value;
        let price = $('#add_product_price_id')[0].value;
        let offer = $('#add_product_offer_id')[0].value;
        let iqty = $('#add_product_iqty_id')[0].value;
        let img = $('#add_product_img_id')[0].files;

        // Check file selected or not
        if (
            name != "" &&
            description != "" &&
            category != "" &&
            price != "" &&
            offer != "" &&
            iqty != "" &&
            img.length > 0
        ) {

            $.ajax({
                url: 'src/server.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        alert(response);
                        $("#form")[0].reset();
                    } else {
                        alert('file not uploaded');
                        $("#form")[0].reset();
                    }
                },
            });
        } else {
            alert("Please Fill all the Fields");
        }
    }));

});
</script>