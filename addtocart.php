<?php 
// connect to database
try {
	$dsn = "mysql:host=courses;dbname=z1809120";
				$pdo = new PDO($dsn, "z1809120", "1998Jun01");
}
catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
}

//print_r($_POST);
//exit;

// pull user id and put into a variable. who are we talking to.
	if(isset($_POST["userid"]))
	{
		$userID=$_POST["userid"];

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
	if(isset($_POST["itemid"]))
	{
		$itemID=$_POST["itemid"];

		//pull from database look up to make sure it's valid
		$prepared3=$pdo->prepare("SELECT ITEM.*, TQTY FROM ITEM INNER JOIN (SELECT SUM(QTY) AS TQTY, IID FROM STORE	
										GROUP BY IID) SELECT2 ON ITEM.IID=SELECT2.IID WHERE ITEM.IID=?");
				 					
		
		try {
			$prepared3->execute(array($itemID));
			$row3=$prepared3->fetch(PDO::FETCH_BOTH);
				if(!$row3)
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
	
	if(isset($_POST["quantity"]))
	{
		$quantity=$_POST["quantity"];

				 					
	
		if(!is_numeric($quantity) or $quantity==0 or $quantity >$row3["TQTY"])
		{
			//die($quantity . "///" . $row3["TQTY"]);
			$quantity="";
		}
		
	}	
	
	else
	{
		$quantity = "";
	}
	if($quantity=="")
	{
		header("Location:detail.php?userid=$userID&itemid=$itemID");
		exit;
	}
	
	try{
		
		$prepared4=$pdo->prepare("INSERT INTO CART(UID, IID, SELEQTY) VALUES(?,?,?)");
		$prepared4->execute(array($userID, $itemID, $quantity));
		}
		catch(PDOexception $e){
			//send them back
			header("Location:detail.php?userid=$userID&itemid=$itemID");
			//die($e);
			//exit;
		}
		// send them to cart
		header("Location:cart.php?userid=$userID");
			
?>