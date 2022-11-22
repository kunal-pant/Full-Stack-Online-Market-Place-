<?php

$conn =new mysqli("localhost","root","root@123","BuyAndSell");


// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
session_start();
$sid=$_SESSION['id'];

$query = "SELECT COUNT(*) FROM user";
$result = mysqli_query($conn,$query);
$rows = mysqli_fetch_row($result);

$name=$_POST['name'];
$ca=$_POST['category'];
$pri=$_POST['price'];
$desc=$_POST['description'];
$filename=$_FILES["image"]["name"];
$tempname=$_FILES["image"]["tmp_name"];
$folder="images/".$filename;
move_uploaded_file($tempname,$folder);

$sql="INSERT INTO product(pid,seller_id,pname,price,description,category,img) VALUES($rows[0]+1,'$sid','$name','$pri','$desc','$ca','$folder')";
$conn->query($sql);
echo "ITEMS ADDED SUCCESSFULLY";
header("Location: my_items.html");
?>
