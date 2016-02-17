<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	
	//check that user level is equal to 2 so students cant tye in adressbar and change
?>

<html>

	<head>
		<title>Arrays/Arraylists Progress</title>
		<link rel="stylesheet" type="text/css" href="Progress.css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	</head>
	
	<body>
		<header><h1>Arrays/Arraylists Progress</h1></header>
		<?php
			require("./connect.php");
			
			$classAvgEx1 = mysql_query("SELECT AVG(mark) FROM marks WHERE `exercise name`='Arrays' && `exercise num`=1");
			$classAvgEx1Val = mysql_result($classAvgEx1, 0);
			
			echo "
					<table>
						<tr>
							<td>Exercise 1 Class Average - </td>
							<td>$classAvgEx1Val / 3</td>
						</tr>
					</table>"
		?>
	</body>
	
</html>