
<!DOCTYPE html>
<html>
<head>
<style>

td,th,input {
  text-align: left;
}
nav {
	margin: 27px auto 0;

	position: relative;
	width: 590px;
	height: 50px;
	background-color: #34495e;
	border-radius: 8px;
	font-size: 0;
}
nav a {
	line-height: 50px;
	height: 100%;
	font-size: 15px;
	display: inline-block;
	text-transform: uppercase;
	text-align: left;
	color: white;
	cursor: pointer;
}

a:nth-child(1) {
	width: 100px;
}
a:nth-child(2) {
	width: 110px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 160px;
}
a:nth-child(5) {
	width: 120px;
}



body {
	
	font-family: sans-serif;
	background: #2c3e50;
}

.table{
	position:absolute;
	
	left:400px;
	top:200px;
	}
</style>	
</head>
<body>
	
	<nav>
	<a href="home.html">Home</a>
	<a href="add_money.html">add_money  </a>
	<a href="contact.php">contact cc</a>
	<a href="logout.php">logout</a>
</nav>
	
	
<div class="table">
<table border="1" cellspacing="7">
<tr>	
<th>product name</th>
<th>price</th>
<th>description</th>
<th>category</th>
<th>image</th>
<th>buy product</th>
</tr>

<?php

session_start();
$conn =new mysqli("localhost","root","root@123","BuyAndSell");
$all="select * from product";
$query=mysqli_query($conn,$all);
$num=mysqli_num_rows($query);

while($res=mysqli_fetch_array($query)){
	$p=$res['pid'];
	?>
<form action="buy.php" method="POST">

<tr>
<td><?php echo $res['pname'];  ?></td>
<td><?php echo $res['price'];  ?></td>
<td><?php echo $res['description'];  ?></td>
<td><?php echo $res['category'];  ?></td>
<td><?php echo '<img src="data:image/png;base64,'.base64_encode($res['img']).'" width="150" height="150"/>'; ?></td>
<td><input type="submit" name="pid" value=  "<?=$p?>" style="color:white"; ></td> 
</tr>
</form>	
<?php 	
}

?>







	

</table>	
</div>

</body>
</html>
