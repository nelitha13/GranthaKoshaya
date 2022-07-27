<?php session_start(); 
    if (isset($_SESSION['user_email'])) {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account - GranthaKoshaya</title>
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

        </div>
    </div>
    <!-- Navigation ends here -->
    <!-- Account Page -->

    <div class="account-page">
        <div class="container" align="center">
            <div class="form-container">

                <?php include("error.php"); ?>


                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <span onclick="register()">Register</span>
                    <hr id="indicator" />
                </div>

                <form action="src/server.php" id="LoginForm" method="post">

                    <input type="email" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="password" />

                    <input type="submit" class="btn" name="user_login" value="Login">
                    <a href="">Forgot Password</a>

                </form>

                <form action="src/server.php" id="RegForm" method="post">

                    <input type="text" placeholder="Username" name="name" />
                    <input type="email" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="password" />
                    <input type="password" placeholder="Confirm Password" name="cpassword" />
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <input type="text" placeholder="Address" name="address" />
                    <input type="submit" class="btn" name="user_reg" value="Register" />

                </form>

            </div>
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
    <!-- 
js for toggle form -->
    <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var indicator = document.getElementById("indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(0px)";
    }

    login();
    </script>
</body>

</html>