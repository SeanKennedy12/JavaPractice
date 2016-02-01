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
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" type="text/css" href="SignOut.css">
	</head>
	
	<body>
		<?php
			if ($username && $userid) {
				session_destroy();
				echo "You have been logged out. <a href='./index.php'>Homepage</a>";
			}
			else {
				echo "You are not logged in.";
			}
		?>
	
	</body>
	
</html>