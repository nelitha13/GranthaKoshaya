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
            <img src="images\GranthakosyaTrans.png" alt="" width="200px" /></a>
    </div>
    <nav>
        <form method="post" action="src/server.php">
            <input type="text" style="display:inline-block;height:25px;width: 200px;" placeholder="Type Here to Search"
                name="search" />
            <input type="submit" style="display:inline-block;height:25px;width: 75px;" value="Search" />
        </form><br />

        <ul id="MenuItems">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php" class="dropbtn">Books</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="authors.php">Authors</a></li>
            <?php if (isset($_SESSION['user_email'])) { ?>

            <?php if($_SESSION['is_admin']) { ?>

            <li><a href="adminproducts.php">My Books</a></li>

            <span title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-award" viewBox="0 0 16 16">
                    <path
                        d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                </svg></span>

            <?php } ?>

            <li><a href="src/server.php?logout=1">Logout</a></li>

            <?php  } else { ?>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus"
                viewBox="0 0 16 16">
                <path
                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                <path fill-rule="evenodd"
                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <li><a href="account.php">Login/Register</a></li>

            <?php  } ?>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="aboutus.php">About Us</a></li>


        </ul>

        <?php if (isset($_SESSION['user_email'])) { ?>

        <?php if (!$_SESSION['is_admin']) { ?>

        <span title="My Cart"><a href="cart.php"><img src="images/cart.png" alt="" width="30px"
                    height="30px" /></a></span>

        <?php } ?>

        <?php } ?>

    </nav>




    <img src="images/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
</div>




<!--Modal-->

<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>

    </div>

</div>