<?php session_start();
    if (!isset($_SESSION['user_email'])) {
        header('location: account.php');
    } 
    
include_once('src/conn.php'); 

global $db;
$query = "SELECT ebook FROM product WHERE id='".$_GET['product_id']."'";
$results=mysqli_query($db,$query);
$row=mysqli_fetch_array($results,MYSQLI_ASSOC);
$path=$row['ebook'];

// Store the file name into variable
$file = $path;
$filename = $path;

// Header content type
header('Content-type: application/pdf');

header('Content-Disposition: inline; filename="' . $filename . '"');

header('Content-Transfer-Encoding: binary');

header('Accept-Ranges: bytes');

// Read the file
@readfile($file);
