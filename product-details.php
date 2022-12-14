<?php session_start();
//if(!isset($_REQUEST['id'])){
//header('location: products.php');
//}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book - GranthaKoshaya</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" type="image/x-icon" href="images\icon.png">
    <script src="resources\jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a.unableClick').click(function(e) {
                e.preventDefault();
                var div = document.getElementById('dvEmbedPdfviewer');
                //var URl = $(this).attr('href') + "#view=FitH&toolbar=0";
                var URl = $(this).attr('href') + "#toolbar=0&navpanes=0&scrollbar=0";
                console.log(URL);
                var EmbedHtml = "<embed id='embed' src='" + URl + "' height='600' width='1000' />"
                div.innerHTML = EmbedHtml;
            });
        });
    </script>
    <script>
        function view_pdf() {
            document.getElementById('dvEmbedPdfviewer').scrollIntoView(true);
            document.getElementById('dvEmbedPdfviewer').scrolltop -=200;
        }
    </script>
</head>

<body>
    <div class="header">
        <div class="container">

            <?php include_once("components/header.php"); ?>

        </div>
    </div>
    <div class="container">
        <?php include_once("src/functions.php"); ?>

    </div>

    <!-- Single Book Detail -->
    <div class="small-container single-product">

        <?php if (isset($_GET['productid']))
            getProductById($_GET['productid']);
        else
            getProductById($_REQUEST['id']);
        ?>
    </div>

    <!-- Title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Books</h2>
            <a href="products.php">View More</a>
        </div>
    </div>

    <!-- Similar Books -->

    <div class="small-container">
        <div class="row">
            <?php if (isset($_GET['productid']))
                getRelatedProducts($_GET['productid']);
            else
                getRelatedProducts($_REQUEST['id']);
            ?>
        </div>
    </div>

    <!-- Footer -->

    <?php include_once("components/footer.php"); ?>

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

    <!-- js for Book gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var smallImg = document.getElementsByClassName("small-img");
        smallImg[0].onclick = function() {
            ProductImg.src = smallImg[0].src;
        };
        smallImg[1].onclick = function() {
            ProductImg.src = smallImg[1].src;
        };
        smallImg[2].onclick = function() {
            ProductImg.src = smallImg[2].src;
        };
        smallImg[3].onclick = function() {
            ProductImg.src = smallImg[3].src;
        };
    </script>

    <script>
        $(document).ready(function() {

            $("#addtocart_btn").click(function() {

                let qty = $("#addtocart_qty").val();
                let max = $("#addtocart_qty").attr("max");
                let pid = $("#addtocart_id").val();

                var formData = new FormData();

                formData.append('addtocart', 'set');
                formData.append('pid', pid);
                formData.append('qty', qty);

                if (qty <= 0) {

                    alert("Quantity should be grater than 0");

                } else if (qty > parseFloat(max)) {

                    alert("Quantity should be lower than available quantity ");

                } else {
                    $.ajax({
                        url: 'src/server.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response != 0) {
                                console.log(response);
                                alert(response);
                                $("#addtocart_qty").val(0);

                            } else {
                                alert('Error on adding');
                            }
                        },
                    });
                }

            });


        });
    </script>

</body>

</html>