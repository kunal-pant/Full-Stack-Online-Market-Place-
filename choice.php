<?php
$conn =new mysqli("localhost","root","root@123","BuyAndSell");
//print_r($_POST);
$id=$_POST['id'];

$pass = $_POST['pass'];

$c=$_POST['choice'];
$q="SELECT uid FROM user WHERE email='$id' AND password='$pass'";
$r=mysqli_query($conn, $q);
$row = mysqli_num_rows($r);
$res=mysqli_fetch_array($r);

if($res==0){
	echo("WRONG USERNAME OR PASSWORD...");
	header( "refresh:2;url=home.html" );

}
else{
session_start();
$_SESSION['id'] = $res[0];	

if($c==buyer){
header("Location: buyer.php");
}

elseif($c==seller){
	header("Location: seller.html");
}

elseif($c==admin){
}

elseif($c==customer_care){
}



	
	
	

}

?>
