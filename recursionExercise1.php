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
			
				$usrAns1 = $_POST['usrAns1'];
				$ans1 = 6;
				
				$usrAns2 = $_POST['usrAns2'];
				$ans2 = 3;
				
				$usrAns3 = $_POST['usrAns3'];
				$ans3 = 2;
				
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
				
				if($score == 3) {
					echo "<script type='text/javascript'>setTimeout(function(){alert('Well Done! You got full marks!')}, 100);</script>";
				}
				
				if ($username && $userid) {
					require("./connect.php");
				
					mysql_query("INSERT INTO marks VALUES('$userid', '$username', 'Recursion', '1', '$score')");
				}
				
			}
		
		
			$form = "<form action='./recursionExercise1.php' method='post'>
					<table>
						<tr>
							<td>
								<font size = 5 color = \"$q1Colour\">
								<pre>
1. What would value this class return if the interger parameter was 3?

public int mystery(int integer) {
	if( integer == 1) {
    	return 1;
    }
	else {
    	return(integer*(mystery(integer-1)));
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
2. What would value this class return if the parameter n was 4?

public int fib(int n) {
	if(n <= 1) {
    	return n;
    } 
    else {
        return fib(n - 1) + fib(n - 2);
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
3. How many times would the method doSomething(int n) be called recursively 
   if it were passed the number 4 as a parameter?

public int doSomething(int n) {
	if(n < 1) {
		System.out.println(n);
	   	return n;
    } 
    else {
    	System.out.println(n);
        return doSomething(n - 2);
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