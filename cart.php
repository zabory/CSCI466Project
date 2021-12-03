<html>
	<head>
		<title>Cart Page</title>
	</head>
	<body>
	<!-- update quantities in cart --> 
	<?php
		$dsn = "mysql:host=courses;dbname=z1809120";
		$pdo = new PDO($dsn, "z1809120", "1998Jun01");
		foreach($_GET as $key => $item){
			if(strpos($key, 'item') !== false){
				if($item != 0){
					$sql = "UPDATE CART SET SELEQTY = ? WHERE UID = ? AND IID = ?";
					$itemID = str_replace('item', '', $key);
					$prepared = $pdo->prepare($sql);
					$success = $prepared->execute(array($item, $_GET["userid"], $itemID));
				} else {
					$sql = "DELETE FROM CART WHERE UID = ? AND IID = ?";
					$itemID = str_replace('item', '', $key);
					$prepared = $pdo->prepare($sql);
					$success = $prepared->execute(array($_GET["userid"], $itemID));
				}
			}
		}
	?>
	
	<!-- retrieve quantities in cart --> 
	<?php
		function draw_table($rows){
			echo "<form action=\"http://students.cs.niu.edu/~z1809120/cart.php\" method=\"GET\">";
			echo "<table border=1 cellspacing=1>";
			echo "<tr>";
			foreach(array_slice($rows[0], 1) as $key => $item){
				echo "<th>$key</th>";
			}
			echo "</tr>";
			foreach($rows as $row){
				echo "<tr>";
				foreach(array_slice($row, 1) as $key => $item){
					if($key=="Quantity"){
						$iid = $row["IID"];
						echo "<td><input type=\"number\" name=\"item$iid\" id=\"item:$iid\" value=\"$item\" min=\"0\"></td>";
					} else {
						echo "<td>$item</td>";
					}
				}
				echo "</tr>";
			}
			echo "</table>";
			$id = $_GET["userid"];
			echo "<input type=\"hidden\" name=\"userid\" value=\"$id\"/>";
			echo "<input type=\"submit\" value=\"Update Quantity\">";
			echo "</form>";
		}
		try{
			if(array_key_exists("userid", $_GET)){
				$dsn = "mysql:host=courses;dbname=z1809120";
				$pdo = new PDO($dsn, "z1809120", "1998Jun01");
				
				$id = $_GET["userid"];
				
				$sql = "SELECT FNAME FROM HUMAN WHERE ID = ?";
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array($id));
				if($success){
					$name = $prepared->fetchAll(PDO::FETCH_ASSOC)[0]["FNAME"];
					echo "<h1>Cart page for $name</h1>";
				}
				
				$sql = "SELECT ITEM.IID, ITEM.INAME AS Item, SELEQTY AS Quantity FROM CART INNER JOIN ITEM ON CART.IID=ITEM.IID WHERE UID = ?";
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array($id));
				if($success){
					draw_table($prepared->fetchAll(PDO::FETCH_ASSOC));
				}
			}
		} catch(PDOexception $e) {
			echo "connection to DB failed: " . $e->getMessage();
		}
		?>
		</br>
		<form action="http://students.cs.niu.edu/~z1809120/checkout.php" method="GET">
			<?php
			$UID = $_GET["userid"];
				echo "<input type=\"hidden\" name=\"userid\" value=\"$UID\"/>";
			?>
			<input type="submit" value="Checkout">
		</form>
		</body>
</html>