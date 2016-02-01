<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
?>

<html>

	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="Register.css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	</head>
	
	<body>
		<header>Register</header>
		<?php
			if ($_POST['registerbtn']) {
				$getUser = $_POST['user'];
				$getEmail = $_POST['email'];
				$getPass = $_POST['pass'];
				$getRepass = $_POST['repass'];
				
				if ($getUser) {
					if ($getEmail) {
						if ($getPass) {
							if ($getRepass) {
								if($getPass === $getRepass) {
									if (!filter_var($getEmail, FILTER_VALIDATE_EMAIL) === false) {
										
										require("./connect.php");
										
										$query = mysql_query("SELECT * FROM users WHERE username='$getUser'");
										$numrows = mysql_num_rows($query);
										
										if($numrows == 0) {
											$query = mysql_query("SELECT * FROM users WHERE email='$getEmail'");
											$numrows = mysql_num_rows($query);
											
											if(numrows == 0) {
											
												$password = md5(md5("kjhdksahd".$getPass."Fks56sad"));
												$date = date("F d, Y");
												$id = uniqid();
												
												//SET BACK TO 0 WHEN ACTIVATION IS WORKING!!!!
												mysql_query("INSERT INTO users VALUES(
													'$id', '$getUser', '$password', '$getEmail', '$date'
												)");
												
												$query = mysql_query("SELECT * FROM users WHERE username='$getUser'");
												$numRows = mysql_num_rows($query);
												if ($numRows == 1) {
													echo '<script type="text/javascript">', 'alert("Registration has been succesful!");', '</script>';
													echo '<script type="text/javascript">', 'location.href = \'./index.php\';', '</script>';
												}
												else {
													$errormsg = "An error has occured. Registration has not been successful.";
												}
											
											}
											else {
												$errormsg = "An account already exists with this email address";
											}
										
										}
										else {
											$errormsg = "Username already taken.";
										}
										
										mysql_close();
										
									}
									else {
										$errormsg = "You must enter a valid email address";
									}
								}
								else {
									$errormsg = "Passwords do not match";
								}
							}
							else {
							
							} 
						}
						else {
							$errormsg = "You must enter a password.";
						}
					}
					else {
						$errormsg = "You must enter an email address.";
					}
				
				}
				else {
					$errormsg = "You must enter a username.";
				}
			}
			
			$form = "<form action='./register.php' method='post'>
				<table>
					<tr>
						<td>$errormsg</td>
						<td></td>
					</tr>
					<tr>
						<td>Username: </td>
						<td><input type='text' name='user' value='$getUser'</td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type='text' name='email' value='$getEmail'</td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type='password' name='pass' value=''</td>
					</tr>
					<tr>
						<td>Re-enter Password: </td>
						<td><input type='password' name='repass' value=''</td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='registerbtn' value='register'</td>
					</tr>
				</table>
			</form>";
			
			echo $form;
			
		?>
	</body>
	
</html>