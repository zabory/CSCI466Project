<html>
<head>
	<title>Order Submitted</title>
</head>
<body>
<?php
	try{
		$dsn = "mysql:host=courses;dbname=z1809120";
		$pdo = new PDO($dsn, "z1809120", "1998Jun01");
		
		$UID = $_GET["UID"];
		
		$address = $_GET["Address"];
		$optional = $_GET["Optional"];
		$city = $_GET["City"];
		$state = $_GET["State"];
		$zipcode = $_GET["Zipcode"];
		$country = $_GET["Country"];
		$contact = $_GET["Contact"];
		
		$sql = "INSERT INTO BILLINGINFO(UID,ADDRESS,OPTLINE,CITY,STATE,ZIPCODE,COUNTRY,CONTACT) VALUE (?,?,?,?,?,?,?,?)";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array($UID, $address, $optional, $city, $state, $zipcode, $country, $contact));
		
		$cardnum = $_GET["Cardnum"];
		$expmon = $_GET["Expmon"];
		$expyear = $_GET["Expyear"];
		$cvn = $_GET["CVN"];
		$fname = $_GET["CFNAME"];
		$lname = $_GET["CLNAME"];
		
		$sql = "INSERT INTO PAYMENT(UID,CARDNUM,EXPMON,EXPYEAR,CVN,CFNAME,CLNAME) VALUE (?,?,?,?,?,?,?)";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array($UID, $cardnum, $expmon, $expyear, $cvn, $fname, $lname));
		
		$notes = $_GET["Notes"];
		
		$sql = "INSERT INTO ORDERSTATUS(UID,IID,EMPID,STATUS,NOTE) VALUE (?,?,?,?,?)";
		$prepared = $pdo->prepare($sql);
		$success = $prepared->execute(array($UID, 1, 1, "Pending", $notes));
		
		} catch(PDOexception $e) {
			echo "connection to DB failed: " . $e->getMessage();
		}
?>
<h1> Order Submitted </h1>
</body>
</html>