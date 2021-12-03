<html>
<head>
	<title>Employee order status</title>
</head>
<body>
<h1> User orders page </h1>
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

				$sql = "SELECT UID FROM ORDERSTATUS WHERE UID = ? AND STATUS = 'Pending'";
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array($_GET["userid"]));
				if($success){
					$arrays = $prepared->fetchAll(PDO::FETCH_ASSOC);
					foreach($arrays as $record){
						$UID = $record["UID"];
						
						$sql = "SELECT FNAME FROM HUMAN WHERE ID = ?";
						$prepared = $pdo->prepare($sql);
						$success = $prepared->execute(array($_GET["userid"]));
						if($success){
							$name = $prepared->fetchAll(PDO::FETCH_ASSOC)[0]["FNAME"];
							echo "<h2>Order for $name</h2>";
							$sql2 = "SELECT ITEM.IID, ITEM.INAME AS Item, SELEQTY AS Quantity FROM CART INNER JOIN ITEM ON CART.IID=ITEM.IID WHERE UID = ?";
							$prepared2 = $pdo->prepare($sql2);
							$success2 = $prepared2->execute(array($UID));
							if($success2){
								draw_table($prepared2->fetchAll(PDO::FETCH_ASSOC));
							}
						}
					}
				}
				
				} catch(PDOexception $e) {
					echo "connection to DB failed: " . $e->getMessage();
				}
?>
</body>
</html>
