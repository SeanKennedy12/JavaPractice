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
    	<title>Exercise 3</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    	<meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" type="text/css" href="Exercises.css">
	</head>

	<body>
		<header id="header"><h1>Exercise 3</h1></header>
		<?php
			//setting initial colours
			$q1Colour = 'white';
			$q2Colour = 'white';
			$q3Colour = 'white';
			
			
			if ($_POST['completeExercise']) {
				$score = 0;
			
				$usrAns1 = $_POST['usrAns1'];
				$ans1 = "11, 8, 5, 11, 8, 5";
				
				$usrAns2 = $_POST['usrAns2'];
				$ans2 = 244;
				
				$usrAns3 = $_POST['usrAns3'];
				$ans3 = 64;
				
				if ($usrAns1 == $ans1) {
					$q1Colour = 'green';
					$score += 1;
				}
				else {
					$q1Colour = 'red';
				}
				
				if ($usrAns2 == $ans2) {
					$q2Colour = 'green';
					$score += 1;
				}
				else {
					$q2Colour = 'red';
				}
				
				if ($usrAns3 == $ans3) {
					$q3Colour = 'green';
					$score += 1;
				}
				else {
					$q3Colour = 'red';
				}
				
				if ($username && $userid) {
					require("./connect.php");
				
					mysql_query("INSERT INTO marks VALUES('$userid', '$username', 'Nested Loops', '3', '$score')");
				}
				
			}
		
		
			$form = "<form action='./nestedLoopsExercise3.php' method='post'>
					<table>
						<tr>
							<td>
								<font size = 5 color = \"$q1Colour\">
								<pre>
1. What would be the output of the following code fragment?

for (int x = 6; x <= 5; x--) {
	for (int y = 10; y < 2; j-4) {
		j++;
		System.out.print(j + \", \");
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
							<td>
							<font size = 5 color = \"$q2Colour\">
							<pre>
2. How many times would the number 1 be printed when the following code fragment is executed?

int loopNumber = 0;

for (int i = 2; i > -2; i = i - 4) {
	for (int j = 0; j < 2; j++) {
		loopNumber++;
		
		if (loopNumber >= 4) {
			break;
		}
		else { 
			System.out.println(i);
			i = i * 2;
	}
}
							</pre>
							</font>
							</td>
							
						</tr>
						<tr>
							<td><input type='text' name='usrAns2' value='$usrAns2'</td>
						</tr>

						<tr>
							<td>
							<font size = 5 color = \"$q3Colour\">
							<pre>
3. What is the minimum value x must be assigned for the code fragment to print \"Henry\" 5 times?

int x = ?

for (int i = 64; i >= 4; i = i / 2) {
	for (int j = 5; j > 0; j = (j % 2) - 1) {
		System.out.println(\"Henry\");
	}
}
							</pre>
							</font>
							</td>
							
						</tr>
						<tr>
							<td><input type='text' name='usrAns3' value='$usrAns3'</td>
						</tr>
						<div class=\"wrapper\">
							<tr>
								<td><input type='submit' class=\"submit\" name='completeExercise' value='complete'</td>
							</tr>
						</div>
					</table>
				</form>";
			
				echo $form;
			?>
	</body>
</html>