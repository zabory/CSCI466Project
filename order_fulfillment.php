<html>
<!--
 An order fulfillment page that allows store employees to see details on individual orders, and mark
them as shipped, add notes, contact the user, etc
-->
<head>
	<title>Employee order fulfillment</title>
</head>
<body>
<h1> Employee order fulfillment page </h1>

<!-- update status of order -->
<?php
	if(array_key_exists("UID", $_GET)){
		try{
			$dsn = "mysql:host=courses;dbname=z1809120";
			$pdo = new PDO($dsn, "z1809120", "1998Jun01");

			$UID = $_GET["UID"];
			
			$sql = "UPDATE ORDERSTATUS SET STATUS = \"Shipping\" WHERE UID = ?";
			$prepared = $pdo->prepare($sql);
			$success = $prepared->execute(array($UID));
		} catch(PDOexception $e) {
			echo "connection to DB failed: " . $e->getMessage();
		}
	}
?>
<!-- show orders -->
<?php
	function draw_table($rows){
		echo "<table border=1 cellspacing=1>";
		echo "<tr>";
		foreach($rows[0] as $key => $item){
			echo "<th>$key</th>";
		}
		echo "</tr>";
		foreach($rows as $row){
			echo "<tr>";
			foreach($row as $key => $item){
				echo "<td>$item</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	try{
		$dsn = "mysql:host=courses;dbname=z1809120";
		$pdo = new PDO($dsn, "z1809120", "1998Jun01");

		$sql = "SELECT UID FROM ORDERSTATUS WHERE STATUS = \"Pending\"";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array());
		if($success){
			$arrays = $prepared->fetchAll(PDO::FETCH_ASSOC);
			foreach($arrays as $record){
				$UID = $record["UID"];
				
				$sql = "SELECT FNAME FROM HUMAN WHERE ID = ?";
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array($UID));
				if($success){
					$name = $prepared->fetchAll(PDO::FETCH_ASSOC)[0]["FNAME"];
					echo "<h2>Order for $name</h2>";
				}
				
				$orderSQL = "SELECT ITEM.IID, ITEM.INAME AS Item, SELEQTY AS Quantity FROM CART INNER JOIN ITEM ON CART.IID=ITEM.IID WHERE UID = ?";
				$orderPrepared = $pdo->prepare($orderSQL);
				$orderSuccess = $orderPrepared->execute(array($UID));
				if($orderSuccess){
					draw_table($orderPrepared->fetchAll(PDO::FETCH_ASSOC));
				}
				echo "<form action=\"http://students.cs.niu.edu/~z1809120/order_fulfillment.php\" method=\"GET\">";
				echo "<input type=\"hidden\" id= \"UID\" name=\"UID\" value=\"$UID\"/>";
				echo "<input type=\"submit\" value=\"Ship order\">";
				echo "</form>";
			}
		}
		
		} catch(PDOexception $e) {
			echo "connection to DB failed: " . $e->getMessage();
		}
?>
</body>
</html>