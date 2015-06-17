<html>
	<head>
	<title>Secured Login Page</title>
	<?php
		session_start();
		if (isset($_SESSION['FirstName'])) 
		{
			echo "Hello Mr. <b>".$_SESSION["FirstName"]."</b> You're already logged in";
		}
		else
		{
	?>
	<form method="post">
	<input type ='text' name="UserName">
	<input type ='text' name="Password">
	<input type ='submit' name="submit">
	</form>
	</head>
	<body>
	<?php
		if (isset($_POST['submit'])) 
		{
			$Connection = new PDO("mysql:host=localhost;dbname=test",'root','');
			$UserName = $_POST["UserName"];
			$Password = $_POST["Password"];
			$Query = "SELECT * FROM users WHERE Username = ? AND Password  = ?";
			$Statement = $Connection->prepare($Query);
			$Statement->execute(array($UserName,$Password));
			$count = $Statement->rowCount();
		if ($count==1) 
		{
			$Statement->setFetchMode(PDO::FETCH_BOTH);
		while($Result = $Statement->fetch())
		{
			$_SESSION["FirstName"]  = $Result['FirstName'];
			header("Refresh:0");
		}
		}
		else   
		{
			echo 'Invalid Username / Password';
		}
		}
		}
	?>
	</body>
</html>
