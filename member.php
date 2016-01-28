<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
?>

<html>
	
	<head>
		<title>Member System - Members</title>
	</head>
	
	<body>
		
		<?php
			if ($username && $userid) {
			 echo "Welcome <b>$username</b>, <a href='./SignOut.php'>Sign Out</a>";
			}
			else {
				echo "please log in to access this page. <a href='./SignIn.php'>Sign in here</a>";
			}
		?>
	
	</body>
</html>