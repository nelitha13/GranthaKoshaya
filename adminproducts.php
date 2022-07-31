<?php session_start();

    if (isset($_SESSION['user_email'])) {
        if (!$_SESSION['is_admin']) {
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Books - GranthaKoshaya</title>
    <link rel="stylesheet" href="style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/2676e383a1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="images\Logo.png">
    <style>
    .fa-trash-alt {
        font-size: 20px;
        color: #d54e4a;
    }

    .fa-shipping-fast {
        font-size: 30px;
        color: #d54e4a;
    }

    .fa-save {
        font-size: 20px;
        color: #56af55;
    }

    .fa-edit {
        font-size: 20px;
        color: #ec9923;
    }

    .fa-trash-alt:hover {
        font-size: 25px;
    }

    .fa-shipping-fast:hover {
        font-size: 35px;
    }

    .fa-save:hover {
        font-size: 25px;
    }

    .fa-edit:hover {
        font-size: 25px;
    }

    .pendingorder {
        background-color: #f9e3e3;
    }

    .outofstock * {
        background-color: #d54e4a;
        color: #f9e3e3;
    }
    </style>
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

    <div class="small-container">
            <h1 class="title">My Books 
                    <?php if($_SESSION['is_admin']) { ?>
                        <id="myBtn"><img src="images/add.png" alt="" width="30px" height="30px" />
                    <?php } ?>
            </h1>

    <!-- Cart Items Details -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</i></th>
                <th>Category</th>
                <th>Available QTY</th>
                <th>Pending Orders (QTY)</th>
                <th>Total Sale (QTY)</th>
                <th></th>

            </tr>

            <?php getAdminProducts() ?>

        </table>

    </div>
    <!-- Footer -->
    <div style="height:500px !important;"></div>
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





<script>
$(document).ready(function() {

    let current_edititem_value = 0;
    let final_edititem_value = 0;

    function calculateTotal() {
        let total = 0;
        var inputs = $(".subtotals");

        for (var i = 0; i < inputs.length; i++) {
            total += parseFloat(inputs[i].innerHTML);
        }

        $("#totalValueTag").html(total);

    }

    calculateTotal();


    $(".removeitem_btn").click(function(e) {

        let pid = e.target.attributes.id.value;

        var formData = new FormData();

        formData.append('removeitem_btn', 'set');
        formData.append('pid', pid);

        $.ajax({
            url: 'src/server.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    alert(response);
                    location.reload();
                } else {
                    alert('Error on deleting');
                    location.reload();
                }
            },
        });

    });

    $(".shiporder_btn").click(function(e) {

        let pid = e.target.attributes.id.value;

        var formData = new FormData();

        formData.append('shiporder_btn', 'set');
        formData.append('pid', pid);

        $.ajax({
            url: 'src/server.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    alert(response);
                    location.reload();
                } else {
                    alert('Error on deleting');
                    location.reload();
                }
            },
        });

    });

    $(".edititem_btn").click(function(e) {

        let pid = e.target.attributes.id.value;

        $("#edititem_value" + pid).prop("disabled", false);
        $(".edititem_btn" + pid).hide();
        $(".saveitem_btn" + pid).parent().show();

        current_edititem_value = $("#edititem_value" + pid).val();
    });

    $(".saveitem_btn").click(function(e) {

        let pid = e.target.attributes.id.value;

        $("#edititem_value" + pid).prop("disabled", true);
        $(".saveitem_btn" + pid).parent().hide();
        $(".edititem_btn" + pid).show();

        final_edititem_value = $("#edititem_value" + pid).val();
        let dif = final_edititem_value - current_edititem_value;

        var formData = new FormData();
        formData.append('saveitem_btn', 'set');
        formData.append('pid', pid);
        formData.append('dif', dif);

        $.ajax({
            url: 'src/server.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    alert(response);
                    location.reload();
                } else {
                    alert('Error on deleting');
                    location.reload();
                }
            },
        });


    });



});

</script>