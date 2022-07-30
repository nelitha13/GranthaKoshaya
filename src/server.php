<?php session_start();

	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	include_once('conn.php');

	$_SESSION['errors']  = array(); 

	//---------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {
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

	if (isset($_POST['product_add'])) 
	{
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
		$path = '../images/product/'; 

		$img = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];

		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

		$final_image = rand(1000,1000000).$img;
	
		if(in_array($ext, $valid_extensions)) 
		{ 
			$path = $path.strtolower($final_image); 
			
			if(move_uploaded_file($tmp,$path)) 
			{
				

				$name = $_POST['name'];
				$description = $_POST['description'];
				$category = $_POST['category'];
				$price = $_POST['price'];
				$offer = $_POST['offer'];
				$iqty = $_POST['iqty'];
				
				$company_id = $_SESSION['id'];
		
				$query = "INSERT into product (name,description,category,stars,price,offer,iqty,company_id,img) VALUES ('".$name."','".$description."','".$category."','0','".$price."','".$offer."','".$iqty."','".$company_id."','".$path."')";
				
				mysqli_query($db, $query);
				echo "Uploaded";
			
			}
		} 
		else 
		{
			echo 'invalid';
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


// //---------------------------------------------------------------------------------------------

//   if(isset($_POST['oid']))
//   {
//     $oid = $_POST['oid'];
//     $q = "DELETE FROM orders WHERE oid = $oid";

//     if (mysqli_query($db,$q)) {

//         	echo "Item Deleted Sucsessfully!!";
//         }    

//   }

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


?>