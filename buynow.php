<?php
$uid=$_POST['id'];
$pid=$_POST['pid'];
$cost=$_POST['cost'];
$bal=$_POST['balance'];

$remain=$bal-$cost;
$conn =new mysqli("localhost","root","root@123","BuyAndSell");
$q="UPDATE user SET wallet_balance = '$remain' WHERE uid = '$uid'";
$t="DELETE FROM product WHERE pid='$pid'";
$qry=mysqli_query($conn,$t);
$query=mysqli_query($conn,$q);

echo "ITEM BOUGHT YOUR BALANCE   "; echo $remain;
echo "REDIRECTING..  ";
header( "refresh:2;url=buyer.php" );

?>
