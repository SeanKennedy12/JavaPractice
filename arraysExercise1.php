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
	</head>

	<body>
		<header id="header"><h1>Exercise 1</h1></header>
		<?php
			//setting initial colours
			$q1Colour = 'white';
			$q2Colour = 'white';
			$q3Colour = 'white';
			
			
			if ($_POST['completeExercise']) {
				$score = 0;
			
				$usrAns1_1 = $_POST['usrAns1_1'];
				$usrAns1_2 = $_POST['usrAns1_2'];
				$usrAns1_3 = $_POST['usrAns1_3'];
				$ans1_1 = 1;
				$ans1_2 = 2;
				$ans1_3 = 4;
				
				$usrAns2 = $_POST['usrAns2'];
				$ans2 = size;
				
				$usrAns3_1 = $_POST['usrAns3_1'];
				$usrAns3_2 = $_POST['usrAns3_2'];
				$usrAns3_3 = $_POST['usrAns3_3'];
				$usrAns3_4 = $_POST['usrAns3_4'];
				$ans3_1 = 2;
				$ans3_2 = 4;
				$ans3_3 = 6;
				$ans3_4 = 8;
				
				if ($usrAns1_1 == $ans1_1 && $usrAns1_2 == $ans1_2 && $usrAns1_3 == $ans1_3) {
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
				
				if ($usrAns3_1 == $ans3_1 && $usrAns3_2 == $ans3_2 && $usrAns3_3 == $ans3_3 && $usrAns3_4 == $ans3_4) {
					$q3Colour = 'green';
					$score += 1;
				}
				else {
					$q3Colour = 'red';
				}
				
				if($score == 3) {
					echo "<script type='text/javascript'>setTimeout(function(){alert('Well Done! You got full marks!')}, 100);</script>";
				}
				
				if ($username && $userid) {
					require("./connect.php");
				
					mysql_query("INSERT INTO marks VALUES('$userid', '$username', 'Arrays', '1', '$score')");
				}
				
			}
		
		
			$form = "<form action='./arraysExercise1.php' method='post'>
				<div>
					<table>
						<tr>
							<td>
								<font size = 5 color = \"$q1Colour\">
								<pre>
1. What will be the contents of the numbers array after the following code segment is executed?

int[] numbers = new int[3];

if (numbers.length < 3) {
	for (int i = 0; i < 2; i++) {
		numbers[i] = i+1;
	}
}
else if (numbers.length == 3) {
	members[2] = 4;
}
else if (numbers.length > 3) {
	numbers[0] = 0;
}
								</pre>
								</font>
							</td>
						</tr>					
						<tr>
							<td>[ <input type='text' name='usrAns1_1' value='$usrAns1_1'>, <input type='text' name='usrAns1_2' value='$usrAns1_2'> , <input type='text' name='usrAns1_3' value='$usrAns1_3'> ]</td>
						</tr>
					
						<tr>
							<td>
							<font size = 5 color = \"$q2Colour\">
2. Which of these method of ArrayList class is used to obtain present size of an object?
							<br />
  								<input type=\"radio\" name=\"usrAns2\" value=\"size\"> size()<br>
  								<input type=\"radio\" name=\"usrAns2\" value=\"length\"> length()<br>
  								<input type=\"radio\" name=\"usrAns2\" value=\"index\"> index()<br>
  								<input type=\"radio\" name=\"usrAns2\" value=\"capacity\"> capacity()<br>
							</font>
							</td>
							
						</tr>
						<br />
						<tr>
							<td>
							<font size = 5 color = \"$q3Colour\">
							<pre>
3. What will be the contents of the ArrayList after the following code segment is executed?

ArrayList<Integer> list = new ArrayList<Integer>();

for (int x = 1; x <= 8; x++) {
	if (x % 2 = 0) {
		list.add(x);
	}
}
							</pre>
							</font>
							</td>
							
						</tr>
						<tr>
							<td>[ <input type='text' name='usrAns3_1' value='$usrAns3_1'>, <input type='text' name='usrAns3_2' value='$usrAns3_2'> , <input type='text' name='usrAns3_3' value='$usrAns3_3'>, <input type='text' name='usrAns3_4' value='$usrAns3_4'> ]</td>
						</tr>
						<div class=\"wrapper\">
							<tr>
								<td><input type='submit' class=\"submit\" name='completeExercise' value='complete'></td>
							</tr>
						</div>
					</table>
				</form>";
			
				echo $form;
			?>
	</body>
</html>