<?php
	error_reporting (E_ALL ^ E_NOTICE);
	error_reporting(0);
	session_start();
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	
?>

<html>
<!-- author: Sean Kennedy -->
<!-- class: CS408 -->

	<script>
		//var num1 = Math.floor((Math.random() * 5) + 1);
		//var num2 = Math.floor((Math.random() * 4) + 1);
	</script>
	<head>
    	<title>Exercise 1</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" type="text/css" href="Exercises.css">
        <script src="NestedIfQuestions1.js"></script>
	</head>

	<body>
		<header id="header"><h1>Exercise 1</h1></header>
		<?php
			//setting initial colours
			$q1Colour = 'white';
			
			
			if ($_POST['completeExercise']) {
				$score = 0;
			
				$usrAns1 = $_POST['usrAns1'];
				$ans1 = 2;
				
				if ($usrAns1 == $ans1) {
					$q1Colour = 'green';
					$score += 1;
				}
				else {
					$q1Colour = 'red';
				}
				
				if ($username && $userid) {
					require("./connect.php");
				
					mysql_query("INSERT INTO marks VALUES('$userid', '$username', 'Nested Loops', '2', '$score')");
				}
				
			}
		
		
			$form = "<form action='./nestedLoopsExercise2.php' method='post'>
					<table>
						<tr>
							<td>
							<font size = 4 color = \"$q1Colour\">
							<pre>
What value must x be set to in order to print the word \"hello\" 8 times?

x = ?

for (int i = 0; i < x; i++) {
	for(int j = 0; j < 4; j++) {
		System.out.println(\"hello\");
	}
}
							</pre>
							</font>
							</td>
						</tr>
						<tr>
							<td><input type='text' name='usrAns1' value='$usrAns1'</td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='completeExercise' value='complete'</td>
						</tr>
					</table>
				</form>";
			
				echo $form;
			?>
	</body>
</html>