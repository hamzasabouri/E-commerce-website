<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST['signup'])){
	// Get form data
	$email = htmlspecialchars($_POST['email']);
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['error'] = "Invalid email address";
	} else {
		$username = htmlspecialchars($_POST['Name']);
		$password = htmlspecialchars($_POST['pwd']);

		// Connect to MySQL database
		$conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');

		// Check if connection was successful
		if (!$conn) {
			die('Connection failed: ' . mysqli_connect_error());
		}

		// Prepare SQL statement to insert user into database
		$password = md5($password);
		$sql = "INSERT INTO users (email, username, password, type) VALUES ('$email', '$username', '$password', 'user')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			// Error occurred while executing SQL statement
			$_SESSION['error'] = 'Invalid Informations.';
			// Execute SQL statement
		} else {
			if ($result) {
				$_SESSION['message'] = "User registered successfully";
			} else {
				$_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}	
		mysqli_close($conn);
	}}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Login / Register</title>
	<link rel="icon" type="image/png" href="logo.png">


</head>
<body>
<a href="../index/index.php" class="logo">
        <img src="logo.png" width="160" height="50" alt="ajichri logo">
      </a>
	  <?php
					if (isset($_SESSION['message'])) {
						echo "<div class='alert alert-primary' role='alert'>". $_SESSION['message'] ."</div>";
				unset($_SESSION['message']);

					}
					elseif (isset($_SESSION['error'])) {
						echo "<div class='alert alert-primary' role='alert'>". $_SESSION['error'] ."</div>";
				unset($_SESSION['message']);

					}elseif (isset($_SESSION['error2'])) {
						echo "<div class='alert alert-primary' role='alert'>". $_SESSION['error2'] ."</div>";
				unset($_SESSION['message']);

						
					}


					
				?>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="POST">
			<h1>Create Account</h1>

			<input type="text" name="Name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="pwd" placeholder="Password" />
			<button type="submit" name="signup">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1>

			
			<input type="text"  name="name" placeholder="Name" />
			<input type="password" name="pwd" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="submit" name="signin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<script src="j.js"></script>

    
</body>
</html>
<?php

		// Check if form is submitted
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if(isset($_POST['signin'])){
			// Get username and password from form
			$username = $_POST['name'];
			$password = $_POST['pwd'];

			// Connect to MySQL database
			$conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');

			// Check if connection was successful
			if (!$conn) {
				die('Connection failed: ' . mysqli_connect_error());
			}

			// Prepare SQL statement to select user from database
			$password = md5($password);
			$sql = "SELECT id,type,username FROM users WHERE username = '$username' AND password = '$password'";

			// Execute SQL statement
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				// Error occurred while executing SQL statement
				$_SESSION['error2'] = 'Invalid username or password.';
			}else {
				// Check if user was found in database
				if (mysqli_num_rows($result) === 1) {
					// User is authenticated, set session variables
					$user = mysqli_fetch_assoc($result);
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['user_type'] = $user['type'];
					$_SESSION['username'] = $user['username'];

					// Redirect user to appropriate page based on user type
					if ($user['type'] === 'admin') {
						$_SESSION['username'] = $user['username'];
						$_SESSION['type'] = $user['type'];
						header('Location: ../admin/index.php');
					} else {
						$_SESSION['username'] = $user['username'];
						$_SESSION['type'] = $user['type'];
						header('Location: ../produits/index.php');
					}
				} else {
					// Authentication failed, display error message
					$_SESSION['error2'] = 'Invalid username or password.';
				}
			}
			// Close database connection
			mysqli_close($conn);	}
		}
	?>	