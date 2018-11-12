<?php
	
// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare an empty array of error messages
$errors = array();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hannah's IT5236 Site</title>
	<meta name="description" content="Hannah Lansford's personal website for IT 5236">
	<meta name="author" content="Hannah Lansford">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
</head>
<body class="text-center">
	<?php include 'include/header.php'; ?>
	<h2>Mobile Web Infrastructure</h2>
	<a href="login.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login</a>
	<a href="register.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Register</a>
	<!--<p>
		This is a bare-bones "list-oriented" web application for use in IT 5236, to teach mobile web infrastructure concepts.
		Students currently registered for the course may <a href="login.php">create an account</a> or proceed directly to the 
		<a href="login.php">login page</a>.
	</p>-->
	<?php include 'include/footer.php'; ?>
	<script src="js/site.js"></script>
</body>
</html>
