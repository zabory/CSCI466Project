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
				$dsn = "mysql:host=courses;dbname=z1909185";
				$pdo = new PDO($dsn, "z1909185", "2001Dec04");

				$sql = <<<SQL
                SELECT *
                FROM ORDERSTATUS
                INNER JOIN HUMAN ON HUMAN.ID = ORDERSTATUS.UID;
SQL;				
				$prepared = $pdo->prepare($sql);
				$success = $prepared->execute(array());
				if($success){
					$arrays = $prepared->fetchAll(PDO::FETCH_ASSOC);
					foreach($arrays as $record){
						$OID = $record["OID"];
                        $UID = $record["UID"];
						$DATE = $record["ORDTIME"];			
						$STATUS = $record["STATUS"];
						$sql = "SELECT FNAME FROM HUMAN WHERE ID = ?";
						$prepared = $pdo->prepare($sql);
						$success = $prepared->execute(array($UID));
						if($success){
							$name = $prepared->fetchAll(PDO::FETCH_ASSOC)[0]["FNAME"];
							echo "<h2>Order for $name - $DATE -$STATUS</h2>";
						}
						
						$orderSQL = <<<SQL
                        SELECT IID, INAME AS Item, PRICE
                        FROM ORDERS_ITEMS
                        INNER JOIN ORDERSTATUS USING (OID)
                        INNER JOIN ITEM USING (IID)
                        WHERE OID = ?;
SQL;
						$orderPrepared = $pdo->prepare($orderSQL);
						$orderSuccess = $orderPrepared->execute(array($OID));
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
