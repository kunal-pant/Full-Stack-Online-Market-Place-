<?php
$conn =new mysqli("localhost","root","root@123","BuyAndSell");


// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "ACCOUNT CREATED REDIRECTING...";


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$email=$_POST['email'];
$occupation=$_POST['occupation'];
$address=$_POST['address'];
$number=$_POST['number'];

$query = "SELECT COUNT(*) FROM user";
$result = mysqli_query($conn,$query);
$rows = mysqli_fetch_row($result);

$sql="INSERT INTO user(uid,name_fname,name_lname,email,password,contact_no,occupation,address) VALUES($rows[0]+1,'$fname','$lname','$email','$password','$number','$occupation','$address')";

$conn->query($sql);

header( "refresh:2;url=home.html" );




?>
