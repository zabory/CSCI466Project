<html>
<head>
	<title>Employee order status</title>
</head>
<body>
<h1> Outstanding orders page </h1>
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
				$dsn = "mysql:host=courses;dbname=z1909183";
				$pdo = new PDO($dsn, "z1909183", "2000Nov03");

				$sql = "SELECT UID FROM ORDERSTATUS";
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
						
						$orderSQL = "SELECT ITEM.IID, ITEM.INAME AS Item, STATUS FROM ORDERSTATUS INNER JOIN ITEM ON ORDERSTATUS.IID=ITEM.IID WHERE UID = ?";
						$orderPrepared = $pdo->prepare($orderSQL);
						$orderSuccess = $orderPrepared->execute(array($UID));
						if($orderSuccess){
							draw_table($orderPrepared->fetchAll(PDO::FETCH_ASSOC));
						}
					}
				}
				
				} catch(PDOexception $e) {
					echo "connection to DB failed: " . $e->getMessage();
				}
?>
</body>
</html>
