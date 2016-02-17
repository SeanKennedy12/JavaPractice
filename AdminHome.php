<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$signIn = "Sign In";
?>

<html>
<!-- author: Sean Kennedy -->
<!-- class: CS408 -->
	<head>
    	<title>Java Practice</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" type="text/css" href="JavaPractice.css">
	</head>

	<body>
		<header id="header"><h1>Java Practice</h1></header>
		<div id="mainDiv">
			<?php if ($username && $userid) {
				echo "<p class=\"mainDivItem\" id=\"signOut\">Sign Out</p>";
			}
			else {
				echo "<p class=\"mainDivItem\" id=\"signIn\">Sign In</p>";
			}
			?>
			<p class="mainDivItem" id="exercises"">Exercises<p>
			<p class="mainDivItem" id="progress">Class Progress<p>
			<p class="mainDivItem" id="admin">Admin</p>
			<p class="mainDivItem" id="about">About</p>
		</div>
		<script src="JavaPracticeModel.js"></script>
    	<script src="JavaPracticeView.js"></script>
    	<script src="JavaPracticeController.js"></script>
    	
	</body>
</html>