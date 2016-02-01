<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
?>

<html>

	<head>
		<title>Sign In</title>
		<link rel="stylesheet" type="text/css" href="SignIn.css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	</head>

	<body>
		<header id="header"><h1>Sign In</h1></header>
		<?php
			if ($username && $userid) {
				echo "You are already logged in as <b>$username</b>. <a href='./index.php'>Click here</a> to go to homepage.";
			}
			else {
				$form = "<form action='./SignIn.php' method='post'>
				<table>
					<tr>
						<td>Username:</td>
						<td><input type='text' name='user' /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type='password' name='password' /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='loginbtn' value='Login'/></td>
					</tr>
					<tr>
						<td><a href='./register.php'>Register</a></td>
						<td><a href='./forgotPassword.php'>Forgot Password?</a></td>
					</tr>
				</table>
				</form>";
				
				if ($_POST['loginbtn']) {
					$user = $_POST['user'];
					$password = $_POST['password'];
					
					if ($user) {
						if($password) {
							
							require("connect.php");
							
							$password = md5(md5("kjhdksahd".$password."Fks56sad"));
							//check login info is correct
							$query = mysql_query("SELECT * FROM `users` WHERE `username` = '$user'");						
							$numrows = mysql_num_rows($query);
							
							
							if ($numrows == 1) {
								$row = mysql_fetch_assoc($query);
								$dbid = $row['id'];
								$dbuser = $row['username'];
								$dbpass = $row['password'];

								if ($password == $dbpass) {
									
										//set session info
										$_SESSION['userid'] = $dbid;
										$_SESSION['username'] = $dbuser;
									
										echo "You are logged in as <b>$dbuser</b>. <a href='./index.php'>Click here</a> to go to homepage";
								}
								else {
									echo "You did not enter the correct password. $form";
								}
							}
							else {
								echo "Username not found. $form";
							}
							
							mysql_close();
						
						}
						else {
						 echo "You must enter your password. $form";
						}
					
					}
					else {
						echo "You must enter your username. $form";
					}
				}
				else {
					echo $form;
				}
			}
		?>
	</body>
	
</html>