<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

?>

<?php
function get_category()
{
    global $db;
    $cat = [];
    $query = "SELECT cat_id,cat_name FROM category";
    $results = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($results)) {
        ($cat[$row['cat_id']] = $row['cat_name']);
    }

    return $cat;
}
?>

<?php
function get_author()
{
    global $db;
    $author = [];
    $query = "SELECT author_id,author FROM author";
    $results = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($results)) {
        ($author[$row['author_id']] = $row['author']);
    }

    return $author;
}
?>


<!--  Get All Items -->
<?php

function getAllProducts()
{

    global $db;

    $query = "SELECT * FROM product ORDER BY id DESC LIMIT 12";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="col-4">
            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>
            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
        </div>

<?php

    }
}
?>


<?php function invalidCategory()
{ ?>

    <center>
        <h1>Invalid Category Type 😔</h1>
    </center>

<?php } ?>


<?php

function getAllInnovationProducts()
{

    global $db;

    $query = "SELECT * FROM product WHERE category='Innovation' ORDER BY id DESC LIMIT 12";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="col-4">
            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>
            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
        </div>

<?php

    }
}
?>

<?php

function getAllCraftsProducts()
{

    global $db;

    $query = "SELECT * FROM product WHERE category='Crafts' ORDER BY id DESC LIMIT 12";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="col-4">
            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>
            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
        </div>

<?php

    }
}
?>


<?php

function getProductsBySearch($keyword)
{

    global $db;
    $query = "SELECT * FROM product WHERE name LIKE '%" . $keyword . "%' OR description LIKE '%" . $keyword . "%' OR category LIKE '%" . $keyword . "%' ORDER BY id DESC LIMIT 12";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="col-4">
            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>
            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
        </div>

<?php

    }
}
?>



<!--  Get Item By Id -->

<?php

function getProductById($id)
{

    global $db;

    $iqtyQuery = "SELECT iqty FROM product where id=" . $id;
    $iqtyResult = mysqli_query($db, $iqtyQuery);

    $saleQuery = "SELECT COALESCE(SUM(qty),0) FROM customer_product where product_id=" . $id;
    $saleResult = mysqli_query($db, $saleQuery);

    $query = "SELECT * FROM product where id=" . $id;
    $result = mysqli_query($db, $query);

    $iqty = mysqli_fetch_assoc($iqtyResult)['iqty'];
    $sales = mysqli_fetch_assoc($saleResult)['COALESCE(SUM(qty),0)'];

    $stock = $iqty - $sales;

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="row">
            <div class="col-2">

                <img src="<?php echo "images" . $back_path[1] ?>" width="100%" id="ProductImg" alt="image" style="
                height:500px;
                object-fit: cover;
                " />
            </div>

            <div class="col-2">
                <input id="addtocart_id" value="<?php echo $row["id"]; ?>" hidden></p>
                <p><?php echo $row["category"]; ?></p>
                <h2><?php echo $row["name"]; ?></h2>

                <?php if ($stock <= 0) { ?>

                    <p style="color:red;">OUT OF STOCK</p>

                <?php } else { ?>

                    <p style="color:green;">IN STOCK : <?php echo $stock ?></p>

                    <?php

                    if (isset($_SESSION['user_email'])) {
                        if (!$_SESSION['is_admin']) {

                    ?>

                            <input type="number" value="0" id="addtocart_qty" max="<?php echo $stock ?>" min="0" />
                            <span><a href="cart.php" id="addtocart_btn" class="btn">Add to Cart</a></span>
                            <a href="ebook-view.php" target="_blank" class="btn">Read Book (Free)</a>

                <?php
                        }
                    }
                }
                ?>

                <h4>Rs.<?php echo $row["price"]; ?></h4>
                <h3>Author:</h3>
                <p><?php echo $row["Author"]; ?></p>
                <br>
                <h3>Category:</h3>
                <p><?php echo $row["category"]; ?></p>
                <br>
                <h3>Book Details<i class="fa fa-indent"></i></h3>
                <p><?php echo $row["description"]; ?></p>
            </div>
        </div>
<?php

    }
}
?>



<!--  Get Related Books -->

<?php

function getRelatedProducts($id)
{

    global $db;

    $query = "SELECT category FROM product where id=" . $id;
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $category = $row["category"];

    $query = "SELECT * FROM product where category='" . $category . "' AND id<>" . $id . " ORDER bY id DESC LIMIT 4";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);


?>

        <div class="col-4">
            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>
            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
        </div>

<?php

    }
}
?>



<!--  Get Cart Items -->

<?php

function getCartItems()
{

    global $db;

    foreach ($_SESSION['cart'] as $key => $value) {

        $query = "SELECT * FROM product where id=" . $key;
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $back_path = explode("images", $row["img"]);

        $total = $row["price"] * $_SESSION['cart'][$key];

?>

        <tr>
            <td>
                <div class="cart-info">
                    <img src="<?php echo "images" . $back_path[1] ?>" alt="image" />
                    <div>
                        <p><?php echo $row["name"]; ?></p>
                        <small>Price: Rs.<span class="addtocart_price" id="<?php echo $row["id"]; ?>"><?php echo $row["price"]; ?></span></small>
                        <br />
                        <a id="<?php echo $row["id"]; ?>" class="remove_btn">Remove</a>
                    </div>
                </div>
            </td>

            <td>
                <h4> <?php echo $_SESSION['cart'][$key] ?> </h4>
            </td>

            <td>Rs.<span class="subtotals" id="<?php echo $row["id"]; ?>"><?php echo $total; ?></span></td>
        </tr>

<?php

    }
}
?>





<?php

function getMostFamousProducts()
{

    global $db;

    $query = "SELECT *,SUM(qty),product_id FROM customer_product JOIN product on product.id =customer_product.product_id   GROUP BY product_id ORDER BY SUM(qty) DESC LIMIT 12";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);
?>


        <div class="col-4">

            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>

            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
            <p>Total sales : <?php echo $row["SUM(qty)"]; ?></p>
        </div>


<?php

    }
}
?>



<!--  Get All Items -->
<?php

function getMostFamousOne()
{

    global $db;

    $query = "SELECT *,SUM(qty),product_id FROM customer_product JOIN product on product.id =customer_product.product_id   GROUP BY product_id ORDER BY SUM(qty) DESC LIMIT 1";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);
?>


        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo "images" . $back_path[1] ?>" class="offer-img" alt="image" style="
                width:400px;
                height:320px;
                object-fit: cover;
                " />
                    </div>
                    <div class="col-2">
                        <p>Exclusively available on GranthaKoshaya </p>
                        <h1><?php echo $row["name"]; ?></h1>
                        <small><?php echo $row["description"]; ?></><br />
                            <a href="product-details.php?id=<?php echo $row["id"]; ?>" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}
?>




<!--  Get All Items -->
<?php

function getLatestProducts()
{

    global $db;

    $query = "SELECT * FROM product GROUP BY category ORDER BY id DESC";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $back_path = explode("images", $row["img"]);
?>


        <div class="col-4">

            <a href="product-details.php?id=<?php echo $row["id"]; ?>">
                <img src="<?php echo "images" . $back_path[1] ?>" alt="image" style="
                height:320px;
                object-fit: cover;
                " />
            </a>

            <h4><?php echo $row["name"]; ?></h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rs.<?php echo $row["price"]; ?></p>
            <p><?php echo $row["category"]; ?></p>
        </div>


<?php

    }
}
?>


<!-- Get All authors -->
<?php

function getAuthorDetails()
{

    global $db;

    $query = "SELECT * FROM author";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $img = './images/author images/' . $row['author_img'];
?>
        <a href="author-details.php?author=<?php echo $row['Author']; ?>">

            <div style="
    border:1px solid;
    margin: 15px;
    padding:0;
    height: 250px;
    width: 20%;
    position: relative;
    background-image: url('<?php echo $img; ?>');
    background-size: contain;
    display: inline-block;
    text-align: center;
    border-radius: 10px;
    box-shadow: 1px 1px 5px 3px #000000;
    ">

                <div style="
        display: inline-block;
        position: absolute;
        top : 150px;
        left: 10%; 
        width: 80%;
        height: 100px;
        color: #555;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        ">
                    <?php echo $row['Author']; ?>

                    <div class="title" style="margin-top: 5px;"></div>

                </div>



            </div>


    <?php

    }
}
    ?>


    <!-- Get All categories -->
    <?php

    function getCategories()
    {

        global $db;

        $query = "SELECT * FROM category";
        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $img = './images/category images/' . $row['cat_img'];
    ?>

            <a href="category-details.php?category=<?php echo $row['cat_name']; ?>">
                <div style="
    border:1px solid;
    margin: 35px;
    padding: 4px;
    height: 300px;
    width: 25%;
    position: relative;
    background-image: url('<?php echo $img; ?>');
    background-size: contain;
    display: inline-block;
    text-align: center;
    border-radius: 10px;
    box-shadow: 1px 1px 5px 3px #000000;
    ">

                    <div style="
        display: inline-block;
        position: absolute;
        top : 150px;
        left: 10%; 
        width: 80%;
        height: 100px;
        color: #555;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        ">
                        <?php echo $row['cat_name']; ?>

                        <div class="title" style="margin-top: 5px;"></div>

                    </div>



                </div>
            </a>

    <?php

        }
    }
    ?>


    <!-- Get Famous Author -->
    <?php function getMostFamousAuthor()
    {
        global $db;
        $query = "SELECT DISTINCT a.Author,a.author_img
FROM author a, product p
WHERE p.Author_ID=a.Author_ID AND p.id IN
(SELECT product_id FROM customer_product GROUP BY product_id ORDER BY COUNT(product_id) DESC)
LIMIT 4;";
        $results = mysqli_query($db, $query);
        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                $img = './images/author images/' . $row['author_img'];
    ?>

                <div style="
    border:1px solid;
    margin: 15px;
    padding:0;
    height: 250px;
    width: 20%;
    position: relative;
    background-image: url('<?php echo $img; ?>');
    background-size: contain;
    display: inline-block;
    text-align: center;
    border-radius: 10px;
    box-shadow: 1px 1px 5px 3px #000000;
    ">

                    <div style="
        display: inline-block;
        position: absolute;
        top : 150px;
        left: 10%; 
        width: 80%;
        height: 100px;
        color: #555;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        ">
                        <?php echo $row['Author']; ?>

                        <div class="title" style="margin-top: 5px;"></div>

                    </div>



                </div>
    <?php
            }
        }
    }
    ?>


    <!-- Get Famous Category -->
    <?php function getMostFamousCategory()
    {
        global $db;
        $query = "SELECT DISTINCT c.cat_name, c.cat_img
FROM category c, product p
WHERE p.cat_id=c.cat_id AND p.id IN
(SELECT product_id FROM customer_product GROUP BY product_id ORDER BY COUNT(product_id) DESC)
LIMIT 4;";
        $results = mysqli_query($db, $query);
        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                $img = './images/category images/' . $row['cat_img'];
    ?>

                <div style="
    border:1px solid;
    margin: 15px;
    padding:0;
    height: 250px;
    width: 20%;
    position: relative;
    background-image: url('<?php echo $img; ?>');
    background-size: contain;
    display: inline-block;
    text-align: center;
    border-radius: 10px;
    box-shadow: 1px 1px 5px 3px #000000;
    ">

                    <div style="
        display: inline-block;
        position: absolute;
        top : 150px;
        left: 10%; 
        width: 80%;
        height: 100px;
        color: #555;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        ">
                        <?php echo $row['cat_name']; ?>

                        <div class="title" style="margin-top: 5px;"></div>

                    </div>



                </div>
    <?php
            }
        }
    }
    ?>


    <!-- Get All Feedbacks -->
    <?php function getAllFeedbacks()
    {
        global $db;
        $sql = "select * from feedbacks";
        $results = mysqli_query($db, $sql);
        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                echo '
                <div class="feedback">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>

                    <h4>
                        '.$row['feedback'].'
                    </h4>
                    <div class="rating">';
                    for($i=1;$i<=(int)$row['rating'];$i++){
                        echo'<i class="fa fa-star"></i>';
                    }
                    echo'</div>
                    <h2>'.$row['name'].'</h2>
                </div>
            </div>
        </div>
    </div>';
            }
        }
    }
    ?>

    <!--  Get All Items -->
    <?php

    function getAdminProducts()
    {



        global $db;

        $company_id = $_SESSION['id'];

        // $query = "SELECT *,SUM(qty),product_id FROM customer_product JOIN product on product.id =customer_product.product_id GROUP BY product_id ";
        $query = "SELECT * FROM product WHERE company_id = " . $company_id;
        $adminProducts = mysqli_query($db, $query);


        while ($row = mysqli_fetch_assoc($adminProducts)) {

            $iqtyQuery = "SELECT iqty FROM product where id=" . $row["id"];
            $iqtyResult = mysqli_query($db, $iqtyQuery);

            $saleQuery = "SELECT COALESCE(SUM(qty),0) FROM customer_product where product_id=" . $row["id"];
            $saleResult = mysqli_query($db, $saleQuery);

            $iqty = mysqli_fetch_assoc($iqtyResult)['iqty'];
            $sales = mysqli_fetch_assoc($saleResult)['COALESCE(SUM(qty),0)'];

            $query = "SELECT SUM(qty) FROM customer_product WHERE product_id=" . $row['id'] . " AND is_shipped = 0";
            $pendingorders = mysqli_query($db, $query);
            $pendingordersData = mysqli_fetch_assoc($pendingorders);

            $query = "SELECT SUM(qty) FROM customer_product WHERE product_id=" . $row['id'];
            $totalsale = mysqli_query($db, $query);
            $totalsaleData = mysqli_fetch_assoc($totalsale);

            $stock = $iqty - $sales;

            $back_path = explode("images", $row["img"]);
    ?>


            <tr class="<?php if ($pendingordersData['SUM(qty)'] > 0) {
                            echo "pendingorder ";
                        } else if ($stock <= 0) {
                            echo "outofstock ";
                        } ?>">
                <td>
                    <div class="cart-info">
                        <img src="<?php echo "images" . $back_path[1] ?>" alt="image" />
                        <div>
                            <p><?php echo $row["name"]; ?></p>
                            <small>Price: Rs.<span class="addtocart_price" id="<?php echo $row["id"]; ?>"><?php echo $row["price"]; ?></span></small>
                            <br />
                        </div>
                    </div>
                </td>

                <td><?php echo $row["category"]; ?></td>
                <td><input type="number" id="edititem_value<?php echo $row["id"] ?>" style="width:70px;" value="<?php echo $stock ?>" disabled min="0" />
                </td>
                <td><?php echo $pendingordersData['SUM(qty)'] == 0 ? 0 : $pendingordersData['SUM(qty)'] ?></td>
                <td><?php echo $totalsaleData['SUM(qty)'] == 0 ? 0 : $totalsaleData['SUM(qty)'] ?></td>
                <td>

                    <?php if ($pendingordersData['SUM(qty)'] != 0) { ?>

                        <i id="<?php echo $row["id"]; ?>" class="fas fa-shipping-fast shiporder_btn"></i>

                    <?php } else { ?>

                        <i id="<?php echo $row["id"]; ?>" class="far fa-edit edititem_btn edititem_btn<?php echo $row["id"]; ?>"></i>
                        <span hidden><i id="<?php echo $row["id"]; ?>" class="fas fa-save saveitem_btn saveitem_btn<?php echo $row["id"]; ?>"></i></span>
                        <i id="<?php echo $row["id"]; ?>" class="far fa-trash-alt removeitem_btn"></i>

                    <?php } ?>
                </td>


            </tr>


    <?php



        }
    }
    ?>