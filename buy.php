<?php
session_start();
$conn =new mysqli("localhost","root","root@123","BuyAndSell");
$pid=$_POST['pid'];
$id=$_SESSION["id"];
$sql ="SELECT * FROM product WHERE pid='$pid'";
$query=mysqli_query($conn,$sql);

$q="SELECT wallet_balance FROM user WHERE uid='$id' ";
$y="SELECT price FROM product WHERE pid='$pid'";
$bal=mysqli_query($conn,$q);
$c=mysqli_query($conn,$y);
$cc=mysqli_fetch_array($c);
$b=mysqli_fetch_array($bal);
$balc=$b[0];
$cost=$cc[0];
//print_r($cost);
while($res=mysqli_fetch_array($query)){
	?>
	<div style="position:absolute; body font-family: sans-serif;background: #2c3e50; top:100px; left:300px;">
<table border="1" cellspacing="7">
<tr>
<td><?php echo $res['seller_id'];  ?></td>
<td><?php echo $res['pname'];  ?></td>
<td><?php echo $res['price'];  ?></td>
<td><?php echo $res['description'];  ?></td>
<td><?php echo $res['category'];  ?></td>
<td><?php echo '<img src="data:image/png;base64,'.base64_encode($res['img']).'" width="150" height="150"/>'; ?></td>
</tr>
</table>
</div>
<?php 	
}
if($cost>$balc){
?>	<div style="position:absolute;top:300px;left:300px;">
	NOT ENOUGH MONEY TO BUY
	YOU CURRENTLY HAVE <?php echo $balc; ?>
	</div>

<?php
}
else{
	?>
	<div style="position:absolute; body font-family: sans-serif;background: #2c3e50; top:300px; left:500px;">
	    <form action="buynow.php" method="POST">
	 <input type="hidden" name="id" value="<?=$id?>">
	 <input type="hidden" name="pid" value="<?=$pid?>">
	  <input type="hidden" name="cost" value="<?=$cost?>">
	   <input type="hidden" name="balance" value="<?=$balc?>">
	<button type="submit">buy !</button>
	</form>
	</div>
	<?php
}


?>
