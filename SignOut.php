<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
?>

<html>

	<head>
		<title>Log Out</title>
	</head>
	
	<body>
		<?php
			if ($username && $userid) {
				session_destroy();
				echo "You have been logged out. <a href='./member.php'>Member</a>";
			}
			else {
				echo "You are not logged in.";
			}
		?>
	
	</body>
	
</html>