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
?> 			
		<html>
		<head>
		<title>Webbased Store Inventory</title>
		</head>
		<body>
			<h1><center>Video Game Store Inventory</center></h1><br><br>
			User ID: 
		
<?php	
		//output user info	
		echo $userID . " " . $row["FNAME"] . " " . $row["LNAME"] . "<br>";
		
		//is user a store owner
		$prepared2=$pdo->prepare("SELECT STORE.QTY, ITEM.* FROM STORE INNER JOIN ITEM ON STORE.IID=ITEM.IID 									WHERE EMPID=?");
		$prepared2->execute(array($userID));
		$row2=$prepared2->fetchAll();
		if(count($row2)>0)
		{
?>		<h3>My Store</h3><br>
		<table border="1">
		<tr><th>Item ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Edition</th>
			<th>Condition</th></tr>
<?php   	foreach($row2 as $item)
			{
?>				<tr><td><?php echo $item["IID"]; ?></td>
					<td><?php echo $item["INAME"]; ?></td>
					<td><?php echo $item["QTY"]; ?></td>
					<td><?php echo $item["PRICE"]; ?></td>
					<td><?php echo $item["IEDITION"]; ?></td>
					<td><?php echo $item["ICONDITION"]; ?></td>
				</tr>
<?php			}		
			echo "</table>";	
		}
		//is user a store owner
		$prepared3=$pdo->prepare("SELECT ITEM.*, TQTY FROM ITEM INNER JOIN (SELECT SUM(QTY) AS TQTY, IID FROM STORE	
										GROUP BY IID) SELECT2 ON ITEM.IID=SELECT2.IID ORDER BY ITEM.IID");
				 					
		$prepared3->execute();
		$row3=$prepared3->fetchAll();
		
?>		<h3>Product Showcase</h3><br>
		Click item button to go to detail <br>
		<table border="1">
		<tr><th>Item ID</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Edition</th>
			<th>Condition</th></tr>
<?php   	foreach($row3 as $item)
			{
				$IID=$item["IID"];
?>				<tr><td><button 
					onclick="location.href='detail.php?userid=<?php echo $userID; ?>&itemid=<?php echo $IID; ?>';">
						<?php echo $IID; ?></button></td>
					<td><?php echo $item["INAME"]; ?></td>
					<td><?php echo $item["TQTY"]; ?></td>
					<td><?php echo $item["PRICE"]; ?></td>
					<td><?php echo $item["IEDITION"]; ?></td>
					<td><?php echo $item["ICONDITION"]; ?></td>
				</tr>
<?php			}		
			echo "</table>";	
		
	

?>
<a href="index.php?userid=<?php echo $userID; ?>">Back to Index</a>
</body>
</html>
	

