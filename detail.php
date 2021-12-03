<?php 
// connect to database
try {
	$dsn = "mysql:host=courses;dbname=z1809120";
	$pdo = new PDO($dsn, "z1809120", "1998Jun01");
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
					$userID="";
					
				}
			}
			catch(PDOexception $e) {
				$userID = "";
			}
	}	
	
	else
	{
		$userID = "";
	}
	if($userID=="")
	{
		header("Location:index.php?userid=$userID");
		exit;
	}
	if(isset($_REQUEST["itemid"]))
	{
		$itemID=$_REQUEST["itemid"];

		//pull from database look up to make sure it's valid
		$prepared3=$pdo->prepare("SELECT ITEM.*, QTY, EMPID FROM ITEM INNER JOIN STORE	
										   ON ITEM.IID=STORE.IID WHERE ITEM.IID=?");
				 					
		
		try {
			$prepared3->execute(array($itemID));
			$row3=$prepared3->fetchAll();
				if(count($row3)==0)
				{
					$itemID="";
					
				}
			}
			catch(PDOexception $e) {
				$itemID = "";
			}
	}	
	
	else
	{
		$itemID = "";
	}
	if($itemID=="")
	{
		header("Location:inventory.php?userid=$userID");
		exit;
	}
?> 						

		<html>
		<head>
		<title>Webbased Store Product Detail</title>
		</head>
		<body>
			<h1><center>Product Detail</center></h1><br><br>
			User ID: 
		
<?php	
		//output user info	
		echo $userID . " " . $row["FNAME"] . " " . $row["LNAME"] . "<br>";
		$item=$row3[0];		
?>		<h3>Item Detail</h3><br>
		<table border="1">

		<tr><th>Item ID</th><th>Item Name</th><th>Price</th><th>Edition</th>
			<th>Condition</th></tr>

					<tr><td><?php echo $item["IID"]; ?></td>
					<td><?php echo $item["INAME"]; ?></td>
					<td><?php echo $item["PRICE"]; ?></td>
					<td><?php echo $item["IEDITION"]; ?></td>
					<td><?php echo $item["ICONDITION"]; ?></td>
				</tr><tr><td colspan="6"><?php echo $item["IDETAIL"]; ?></td></tr></table>
				<table border="1"><tr><th>Store ID</th><th>Quantity</th></tr>
<?php
			foreach($row3 as $item)
			{
?>				<tr><td><?php echo $item["EMPID"]; ?></td>
					<td><?php echo $item["QTY"]; ?></td>
				</tr>
<?php			}		
			echo "</table>";	
		
	

?>
<form action="addtocart.php" method="POST">
	Quantity to Buy <input type="text" name="quantity" />
	<input type="hidden" name="userid" value="<?php echo $userID; ?>" />
	<input type="hidden" name="itemid" value="<?php echo $itemID; ?>" />
	<input type="submit" value="Add to Cart" /></form>
<a href="index.php?userid=<?php echo $userID; ?>">Back to Index</a><br>
<a href="inventory.php?userid=<?php echo $userID; ?>">Back to Inventory</a>
</body>
</html>
	

