<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
?>

<html>

	<head>
		<title>Register</title>
	</head>
	
	<body>
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
												$code = md5(rand());
												
												mysql_query("INSERT INTO users VALUES(
													'', '$getUser', '$password', '$getEmail', '0', '$code', '$date'
												)");
												
												$query = mysql_query("SELECT * FROM users WHERE username='$getUser'");
												$numRows = mysql_num_rows($query);
												if ($numRows == 1) {
												
													$site = "http://localhost/JavaPractice";
													$webmaster = "Java Practice <seank462@gmail.com>";
													$headers = "From: $webmaster";
													$subject = "Activate Your Account";
													$message = "Thank you for  registering. Click the link below to activate your account. \n";
													$message .= "$site/activate.php?user=$getUser&code=$code\n";
													$message .= "You must activate your account to log in.";
													
													if ( mail($getEmail, $subject, $message, $headers) ) {
														$errormsg = "You have been registered. You must activate your account using the code sent to <b>$getEmail</b>";
														$getUser = "";
														$getEmail = "";
													}
													else {
														$errormsg = "An error has occured. Your activation email was not sent.";
													}
												
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