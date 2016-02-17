<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
?>

<html>

	<head>
		<title>Nested Loops Progress</title>
		<link rel="stylesheet" type="text/css" href="Progress.css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	</head>
	
	<body>
		<header><h1>Nested Loops Progress</h1></header>
		<?php
			require("./connect.php");
			
			
			//Exercise 1
			$result = mysql_query("SELECT `mark` FROM marks WHERE `exercise name`='Arrays' && `exercise num`=1 && `username`='$username'");
			$lineNo = 1;
			
			echo "<table>";
			echo"<tr>Exercise 1</tr>";
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    	echo "<tr>";
		    	foreach ($line as $col_value) {
	        		echo "<td>Attempt $lineNo - $col_value / 3</td>";
	        		$lineNo += 1;
 		   		}
    			echo "</tr>";
			}
			echo "</table>";
		?>
	</body>
	
</html>