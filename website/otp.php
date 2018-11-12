<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare a set of variables to hold the otp for the user
$otp = "";


// Declare an empty array of error messages
$errors = array();


// If someone is entering their otp, process their request
// If someone has clicked their email validation link, then process the request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET['id'])) {
		
		$success = $app->processOTP($_GET['id'], $errors);
		if ($success) {
			header("Location: list.php");
			//exit();
		}

	}

}

/* If OTP is not empty, redirect user to the list page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Pull the otp from the <form> POST
	$otp = $_POST['otp'];

	// Check to see if the login attempt succeeded
	if (!empty($otp)) {

		// Redirect the user to the topics page on success
		header("Location: list.php");
		exit();

	}
*/


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

	<h2>Enter Your One-Time Password</h2>

	<?php include('include/messages.php'); ?>
	
	<div>
		<form method="GET" action="otp.php">
			
			<input type="text" name="id" id="otp" placeholder="One Time Password" value="<?php echo $otp; ?>" />
			<br/>
			<input class="btn btn-primary" type="submit" value="Submit" name="otp" />
		</form>
	</div>
	
<?php include 'include/footer.php'; ?>
	<script src="js/site.js"></script>
</body>	
</html<>