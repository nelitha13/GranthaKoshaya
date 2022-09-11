<?php session_start();

	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	include_once('conn.php');

	$_SESSION['errors']  = array(); 

	//---------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {
		unset($_SESSION['is_admin']);
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		unset($_SESSION['user_email']);
		unset($_GET['logout']);
		header('location:../index.php');

	}

	//---------------------------------------------------------------------------------------------

	if (isset($_POST['user_reg'])) {

		$name = mysqli_real_escape_string($db, $_POST['name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $address = mysqli_real_escape_string($db, $_POST['address']);

		if ($password != $cpassword) {

			array_push($_SESSION['errors'] , "The two upasss do not match");
		}

			$query = "SELECT * FROM customer WHERE email='" . $email . "'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {

                    array_push($_SESSION['errors'], "Email already used!!");

			}else{

				$query = "SELECT * FROM company WHERE email='" . $email . "'";
				$results = mysqli_query($db, $query);

				if (mysqli_num_rows($results) > 0) {

                    array_push($_SESSION['errors'], "Email already used!!");

				}
			}

		    if (count($_SESSION['errors']) == 0) 
		    {

			    $query = "INSERT INTO customer (name, email, password,gender,address) 
					  VALUES('$name', '$email', '$password','$gender', '$address')";

			    mysqli_query($db, $query);

		    	header('location:../index.php');
		    }
		    else
		    {
		        header('location:../accounts.php');
		    }

	}

	//--------------------------------------------------------------------------------------------

	if (isset($_POST['user_login'])) 
	{
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) 
		{

			$arr = mysqli_fetch_assoc($results);
			$_SESSION['user_email'] = $email;
			$_SESSION['id'] = $arr['id'];
			$_SESSION['name'] = $arr['name'];
            $_SESSION['is_admin'] = false;

            
			header('location:../index.php');
		}
		else 
		{

            $query = "SELECT * FROM company WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
    
            if (mysqli_num_rows($results) == 1) 
            {

				$arr = mysqli_fetch_assoc($results);

                $_SESSION['user_email'] = $email;
				$_SESSION['id'] = $arr['id'];
				$_SESSION['name'] = $arr['name'];
                $_SESSION['is_admin'] = true;
				
         

                header('location:../index.php');
            }
            else 
            {
                array_push($_SESSION['errors'], "Wrong uname/upass combination");
                header('location: ../account.php');
            }

		}

	}




	if (isset($_POST['addtocart'])) 
	{
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];

		if (isset($_SESSION['cart'][$pid])) {
			$_SESSION['cart'][$pid] = $_SESSION['cart'][$pid] + $qty;
			echo "Added Successfully";
		}
		else{
			$_SESSION['cart'][$pid] = 0;
			$_SESSION['cart'][$pid] = $_SESSION['cart'][$pid] + $qty;
			echo "New Item Added Successfully";
		}


	}

	//Search Book-------------------------------
	if (isset($_POST['search'])) 
	{
		$keyword = $_POST['search'];
		$_SESSION['search'] = $keyword;
		header('location: ../search-results.php');
	}



	if (isset($_POST['removefromcart'])) 
	{
		$pid = $_POST['pid'];
		unset($_SESSION['cart'][$pid]);
		echo "Successfully Removed From Cart";

	}


	if (isset($_POST['removeitem_btn'])) 
	{
		$pid = $_POST['pid'];
		$query = "DELETE FROM customer_product WHERE product_id=" . $pid;
        $results = mysqli_query($db, $query);

		$query = "DELETE FROM product WHERE id=" . $pid;
        $results = mysqli_query($db, $query);

		echo "Successfully Removed";

	}

	if (isset($_POST['shiporder_btn'])) 
	{
		$pid = $_POST['pid'];
		$query = "UPDATE customer_product SET is_shipped = 1 WHERE product_id=" . $pid;
        $results = mysqli_query($db, $query);

		echo "Successfully Shipped";

	}

	if (isset($_POST['saveitem_btn'])) 
	{
		$pid = $_POST['pid'];
		$dif = $_POST['dif'];
		$query = "UPDATE product SET iqty = iqty + ".$dif." WHERE id=" . $pid;
        $results = mysqli_query($db, $query);

		echo "Stock Updated Successfully";

	}



if(isset($_POST['payment']))
{

	$user_id =  $_SESSION['id'];
	$query = "l";

	foreach($_SESSION['cart'] as $key=>$value){
		
		global $query;
		$date = new DateTime('NOW');
		$sdate =  $date->format('c');
		$sdate =  explode("+",$sdate);
		$sdate =  $sdate[0];
		

        $query = "INSERT INTO customer_product(customer_id,product_id,bill_date,qty,is_shipped,is_received)
		VALUES($user_id, $key, '$sdate' , $value,0,0)";
        $result = mysqli_query($db,$query);

		unset($_SESSION['cart'][$key]);
	}

   echo "Item Requested";

}

if (isset($_POST['create-category'])){

		$category=$_POST['category'];
		$file = $_FILES['image']['name'];
		$file_loc = $_FILES['image']['tmp_name'];
		$folder = "../images/category images/";
		$new_file_name = strtolower($file);
		$final_file = str_replace(' ', '-', $new_file_name);
		$final_file = rand() . "-" . $final_file; //add impure
		if(move_uploaded_file($file_loc, $folder . $final_file)) {
			$image = $final_file;
			$query = "insert into category(cat_name,cat_img) values ('".$category."', '".$image."')";
			$results=mysqli_query($db,$query);
			if($results){
				header('Location: ../categories.php');
				$_SESSION['message']='Category Created Successfully';
			}
			else{
				header('Location: ../categories.php');
				$_SESSION['message']=mysqli_error($db);
			}
		}
		else{
			header('Location: ../categories.php');
		}
	
}


if (isset($_POST['add-author'])){

	$author=$_POST['author'];
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder = "../images/author images/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);
	$final_file = rand() . "-" . $final_file; //add impure
	if(move_uploaded_file($file_loc, $folder . $final_file)) {
		$image = $final_file;
		$query = "insert into author(Author,author_img) values ('".$author."', '".$image."')";
		$results=mysqli_query($db,$query);
		if($results){
			$_SESSION['message']='Author Added Successfully';
			header('Location: ../authors.php');
		}
		else{
			$_SESSION['message']=mysqli_error($db);
			header('Location: ../authors.php');
		}
	}
	else{
		header('Location: ../authors.php');
	}

}



if (isset($_POST['add-product'])){

	$name=$_POST['name'];
	$description=$_POST['description'];
	$category=json_decode(($_POST['category']),true);
	$author=json_decode(($_POST['author']),true);
	$price=$_POST['price'];
	$iqty=$_POST['iqty'];
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder = "../images/product/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);
	$final_file = rand() . "-" . $final_file; //add impure

	$file_pdf = $_FILES['pdf']['name'];
	$file_loc_pdf = $_FILES['pdf']['tmp_name'];
	$folder_pdf = "../ebooks/";
	$new_file_name_pdf = strtolower($file_pdf);
	$final_file_pdf = str_replace(' ', '-', $new_file_name_pdf);
	$final_file_pdf = rand() . "-" . $final_file_pdf; //add impure

	if(move_uploaded_file($file_loc, $folder . $final_file) && move_uploaded_file($file_loc_pdf, $folder_pdf . $final_file_pdf)) {
		$image =$folder. $final_file;
		$pdf =$folder_pdf. $final_file_pdf;
		$query = "insert into product(name,description,category,cat_id,Author,Author_ID,price,iqty,company_id,img,ebook) values ('".$name."', '".$description."', '".$category["name"]."', '".$category["id"]."', '".$author["name"]."', '".$author["id"]."', '".$price."', '".$iqty."', '".$_SESSION['id']."', '".$image."', '".$final_file_pdf."')";
		$results=mysqli_query($db,$query);
		if($results){
			$_SESSION['message']='Product Added Successfully';
			header('Location: ../adminproducts.php');
		}
		else{
			$_SESSION['message']=mysqli_error($db);
			header('Location: ../adminproducts.php');
		}
	}
	else{
		$_SESSION['message']='File Upload Failed';
		header('Location: ../adminproducts.php');
	}

}

if(isset($_POST['add-feedback'])){
	$customer=$_POST['customer'];
	$feedback=$_POST['feedback'];
	$rating=$_POST['rating'];
	$query="insert into feedbacks(name, feedback, rating) values('".$customer."', '".$feedback."', '".$rating."')";
	if(mysqli_query($db,$query)){
		$_SESSION['message']='Feedback added successfully';
		header('location: ../index.php');
	}
	else{
		$_SESSION['message']='Feedback added failed';
		header('location: ../index.php');
	}
}

?>