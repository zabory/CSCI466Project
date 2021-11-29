<html>
<head>
<title>Webbased Store</title>
</head>
<body>
	<h1><center>Video Game Store</center></h1><br><br>
	User ID: 
<?php 
// connect to database
try {
	$dsn = "mysql:host=courses;dbname=z1887865";   // -> what database are we using??
	$pdo = new PDO($dsn, "z1887865", "1987Mar02");
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}



// pull user id and put into a variable. who are we talking to.
	if(isset($_REQUEST["userid"]))
	{
		$userID=$_REQUEST["userid"];

		//pull from database look up to make sure it's valid
		$query = "SELECT * FROM HUMAN WHERE ID = ?";
		$prepared=$pdo->prepare($query);
		try {
			$prepared->execute(array($userID));
			// is there anything in there
			$row = $prepared->fetch(PDO::FETCH_BOTH);
				if(!$row)
				{
					echo "Invalid User <br>";
					$userID = ""; 
				}
			}
			catch(PDOexception $e) {
				echo "Could not read user $e";
				$userID = "";
			}
	}	
	
	else
	{
		$userID = "";
	}
	if($userID=="")
	{
?> 			<form action="index.php" type="POST" >
			<input type="TEXT" name="userid" />
			<input type="SUBMIT" value="Log In" /></form>
<?php
    }
	else
	{
		//output user info
		echo $userID . " " . $row["FNAME"] . " " . $row["LNAME"] . "<br>";
		echo "<button onclick=\"location.href='index.php';\">Log Out</button>";
		
		//is user a store owner
		$prepared2=$pdo->prepare("SELECT COUNT(*) AS ITEMCNT FROM STORE WHERE EMPID=?");
		$prepared2->execute(array($userID));
		$row2=$prepared2->fetch(PDO::FETCH_BOTH);
	
?>	<ul><li><a href ="inventory.php?userid=<?php echo $userID; ?>">Inventory</a> </li>
	<li><a href ="cart.php?userid=<?php echo $userID; ?>">Cart</a> </li>
	<li><a href ="checkout.php?userid=<?php echo $userID; ?>">Check Out</a> </li>
	<li><a href ="order_user.php?userid=<?php echo $userID; ?>">Track My Order</a> </li>
<?php 
	if($row2["ITEMCNT"]>0)
	{
?>  <li><a href ="order_emp.php?userid=<?php echo $userID; ?>">List of Orders</a> </li>
    <li><a href ="order_fullfillment.php?userid=<?php echo $userID; ?>">Order Fullfillment</a> </li>
	
<?php
	}
	echo "</ul>";	
	}
?>
</body>
</html>
	
