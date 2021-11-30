<html>
<!-- 
The checkout page should allow the user to enter a shipping address, and billing information (see the note
below). It will show them, at a minimum, the total value of the items in their cart, and allow them to finish
submitting an order.
-->
<head>
	<title>Cart</title>
</head>
<body>
<h1>Cart</h1>
<?php 
	function draw_table($rows){
		echo "<table border=1 cellspacing=1>";
		echo "<tr>";
		$total = 0;
		foreach(array_slice($rows[0], 1) as $key => $item){
			echo "<th>$key</th>";
		}
		echo "</tr>";
		foreach($rows as $row){
			echo "<tr>";
			$IID = $row["IID"];
			$quan = $row["Quantity"];
			try {
				$dsn = "mysql:host=courses;dbname=z1809120";
				$pdo = new PDO($dsn, "z1809120", "1998Jun01");
				
				$sql = "SELECT PRICE FROM ITEM WHERE IID = ?";
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array($IID));
				if($success){
					$cost = $prepared->fetchAll(PDO::FETCH_ASSOC)[0]["PRICE"];
					$total += $cost * $quan;
				}
			
			} catch(PHOexception $e){
				echo "connection to DB failed: " . $e->getMessage();
			}
			foreach(array_slice($row, 1) as $key => $item){
				echo "<td>$item</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<p>Total cost:$total</p>";
	}
	$UID = $_GET["UID"];
	
	try {
		$dsn = "mysql:host=courses;dbname=z1809120";
		$pdo = new PDO($dsn, "z1809120", "1998Jun01");
		
		$sql = "SELECT ITEM.IID, ITEM.INAME AS Item, SELEQTY AS Quantity FROM CART INNER JOIN ITEM ON CART.IID=ITEM.IID WHERE UID = ?";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array($UID));
		if($success){
			draw_table($prepared->fetchAll(PDO::FETCH_ASSOC));
		}
	} catch(PHOexception $e){
		echo "connection to DB failed: " . $e->getMessage();
	}

?>

<h2>Information</h2>
		<form action="http://students.cs.niu.edu/~z1809120/submit_order.php" method="GET">
		
		<label for="Address">Address:</label>
		<input type="text" id="Address" name="Address" required><br>
		
		<label for="Optional">Optional:</label>
		<input type="text" id="Optional" name="Optional"><br>
		
		<label for="City">City:</label>
		<input type="text" id="City" name="City" required><br>
		
		<label for="State">State:</label>
		<input type="text" id="State" name="State" required><br>
		
		<label for="Zipcode">Zipcode:</label>
		<input type="text" id="Zipcode" name="Zipcode" required><br>
		
		<label for="Country">Country:</label>
		<input type="text" id="Country" name="Country" required><br>
		
		<label for="Contact">Contact:</label>
		<input type="text" id="Contact" name="Contact" required><br>
		
		</br>
		
		<label for="Cardnum">Card number:</label>
		<input type="text" id="Cardnum" name="Cardnum" required><br>
		
		<label for="Expmon">Expiration month:</label>
		<input type="text" id="Expmon" name="Expmon" required><br>
		
		<label for="Expyear">Expiration year:</label>
		<input type="text" id="Expyear" name="Expyear" required><br>
		
		<label for="CVN">CVN:</label>
		<input type="text" id="CVN" name="CVN" required><br>
		
		<label for="CFNAME">First name:</label>
		<input type="text" id="CFNAME" name="CFNAME" required><br>
		
		<label for="CLNAME">Last name:</label>
		<input type="text" id="CLNAME" name="CLNAME" required><br>
		
		</br>
		
		<label for="Notes">Notes:</label>
		<input type="text" id="Notes" name="Notes"><br>
		<?php 
			$UID = $_GET["UID"];
			echo "<input type=\"hidden\" id=\"UID\" name=\"UID\" value=\"$UID\"/>"
		?>
		</br>
		<input type="submit" value="Submit order">
		</form>


</body>
</html>