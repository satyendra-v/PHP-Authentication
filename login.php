<?php
	 session_start();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>LoginPage</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<?php 

		$conn = mysqli_connect('localhost','root','','assignment');
		if(! $conn ) {
	        die('Could not connect:  '.mysqli_error());
	    }

	    
	    if(isset($_POST['submit'])){
	    	$email = $_POST['email'];
	    	$passwd = $_POST['pswd'];
	    	$query = "SELECT * FROM data WHERE  Email  = '$email' AND Password = '$passwd'";
	    	$result = mysqli_query($conn,$query);
	    	if(mysqli_num_rows($result)>0){
	    		$_SESSION['email'] = $email;
	    		header('Location:home.php');
	    	}
	    	else{
	    		echo "<p class='error-msg'>Email and password incorrect!!</p>";
	    	}
		}
	 ?>
	<body>
		<h3>Login Page</h3>
		<form action="" method="POST">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" >
			<br>

			<label for="passwd">Password:</label>
			<input type="password" name="pswd" id="passwd" >
			<br>

			<input type="submit" name="submit" value="Login">
		</form>
	</body>
	
	<style>
		.error-msg{
			color:red;
		}
	</style>
</html>