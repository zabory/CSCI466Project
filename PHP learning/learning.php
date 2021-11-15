<html>
	<head>
		<title>Ben Shabowski z1809120</title>
	</head>
	<body>
	<?php
	#incldue "PDO";
	$DSN = "mysql:host=courses;dbname=z1809120";
		// print("This is "."more text");
		// $i = 3;
		// $in_string_var = "i is equal to $i";
		// print($in_string_var);
		// print("(".gettype($i).")");
		
		// if($i == 15){
			// echo "i is 15";
		// }
		
		// $a[0] = 0;
		// $a[1] = 10;
		// $a[2] = 25;
		// $a[3] = 8;
		// $a[4] = "booty";
		// $a["reba"] = "booty";
		
		// for($i = 0; $i < 5; $i++) {
			// echo "a[$i] = ${a[$i]}\n";
		// }
		
		// foreach( $a as $key => $x ) {
			// echo $key;
		// }
		
		// print_r($a);
		
		// print_r($_GET);
		// print_r($_POST);
		echo "<table border=1>";
		foreach($_GET as $key => $val){
			echo "<tr>";
			echo "<td>$key</td><td>$val</td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
	</body>
</html>