<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	
	//check that user level is equal to 2 so students cant tye in adressbar and change
?>

<html>

	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="Register.css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	</head>
	
	<body>
		<header>Admin</header>
		<?php
			if ($_POST['submitbtn']) {
				require("./connect.php");
			
				$newLevel = $_POST['level'];
				$getUser = $_POST['username'];
			
				$query = mysql_query("SELECT * FROM users WHERE username='$getUser'");
				$numrows = mysql_num_rows($query);
				
				if ($numrows > 0) {
					mysql_query("UPDATE users SET level='$newLevel' WHERE username='$getUser'");
					$errormsg = "Update Sucessful";
				}
				else {
					$errormsg = "No user with that username exists.";
				}
				
			}
			
			$form = "<form action='./admin.php' method='post'>
				<table>
					<tr>
						<td>$errormsg</td>
						<td></td>
					</tr>
					<tr>
						<td>Change account level:</td>
					</tr>
					<tr>
						<td>Account username </td>
						<td><input type='text' name='username' value='$getUser'></td>
					</tr>
					<tr>
						<td>Account Level </td>
						<td>
							<select name=\"level\">
								<option value='0'>Student</option>
  								<option value='1'>Lecturer</option>
  								<option value='2'>Administrator</option>
							</select>
						</td>
					</tr>
					<tr>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='submitbtn' value='submit'</td>
					</tr>
				</table>
			</form>";
			
			echo $form;
			
		?>
	</body>
	
</html>