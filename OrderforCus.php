<html>
<head>
	<title>Employee order status</title>
</head>
<body>
<h1> Outstanding orders page </h1>
<?php
try{
	$dsn = "mysql:host=courses;dbname=z1909185";
	$pdo = new PDO($dsn, "z1909185", "2001Dec04");
}
catch(PDOexception $e){
    die("Couldn't connect to the database. Error: " . $e->getMessage());
}
$sql = <<<SQL
SELECT *
FROM ORDERSTATUS
INNER JOIN HUMAN ON HUMAN.ID = ORDERSTATUS.UID
INNER JOIN ITEM USING(IID);
SQL;
try {
    $result = $pdo->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOexception $e) {
    die("Couldn't query order status from database. Error: " . $e->getMessage());
}
foreach($rows as $row) {
    echo <<<HTML
    <h2>Order for ${row['FNAME']} ${row['LNAME']}</h2>
    <!-- item details go here -->
    <table>
        <tr>
            <th>Item Name</th><td>${row['INAME']}</td>
        </tr>
        <tr>
            <th>Price</th><td>${row['PRICE']}</td>
        </tr>
    </table>
HTML;
}
?>
</body>
</html>