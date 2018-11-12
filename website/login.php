<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare a set of variables to hold the username and password for the user
$username = "";
$password = "";

// Declare an empty array of error messages
$errors = array();

// If someone has clicked their email validation link, then process the request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET['id'])) {
		
		$success = $app->processEmailValidation($_GET['id'], $errors);
		if ($success) {
			$message = "Email address validated. You may login.";
		}

	}

}

// If someone is attempting to login, process their request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Pull the username and password from the <form> POST
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Attempt to login the user and capture the result flag
	$result = $app->login($username, $password, $errors);
	
	/*
	//Get the userid
	if (!isset($_GET['userid'])) {
		$userid = $loggedinuserid;
	} else {
		$userid = $_GET['userid'];
	}
	
	//Attempt to obtain the user information
	$user = $app->getUser($userid, $$errors);
	
	if ($user !=NULL) {
		$username =  $user['username'];
		$email = $user['email'];
		$isadminFlag = ($user['isadmin'] == "1");
		$password = "";
	}
	
	//Send an OTP in an email upon login 
	$otp = bin2hex(random_bytes(3));
	$message = urlencode("otp number.".$otp);
	$to = $email;
	$subject = "One Time Password";
	$txt = "Your OTP is: .".$otp"";
	$headers = "From: Hannah's IT 5236 Project";
	mail($to, $subject, $txt, $headers);
	if(isset($_POST['login'])) {
		$username;
		$password;
	}
	*/
	// Check to see if the login attempt succeeded
	if ($result == TRUE) {

		// Redirect the user to the otp page on success
		header("Location: otp.php");
		exit();

	}

}

if (isset($_GET['register']) && $_GET['register']== 'success') {
	$message = "Registration successful. Please check your email. A message has been sent to validate your address.";
}

?>

<script>
function doSubmit() {
	var saveLocal = document.getElementById("saveLocal").checked;
	if (saveLocal) {
		console.log("Saving username to local storage");
		var username = document.getElementById("username").value;
		localStorage.setItem("username",username);
		sessionStorage.removeItem("username");
	}
}

function doPageLoad() {
	console.log("Reading username from local/session storage");
	var usernameLocal = localStorage.getItem("username");
	if (usernameLocal) {
		document.getElementById("saveLocal").checked = true;
		document.getElementById("username").value = usernameLocal;
	}
}
</script>

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

<!--1. Display Errors if any exists 
	2. Display Login form (sticky):  Username and Password -->

<body class="text-center">
	<?php include 'include/header.php'; ?>

	<h2>Login</h2>

	<?php include('include/messages.php'); ?>
	
	<div>
		<form method="post" action="login.php">
			
			<input type="text" name="username" id="username" onclick="doPageLoad()" placeholder="Username" value="<?php echo $username; ?>" />
			<br/>

			<input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
			<br/>
			&nbsp;
			<input type="checkbox" name="rememberUsername" id="saveLocal" onclick="doSubmit()">Remember Username<br/ >

			<input class="btn btn-primary" type="submit" value="Login" name="login" />
		</form>
	</div>
	<a href="register.php">Need to create an account?</a>
	<br/>
	<a href="reset.php">Forgot your password?</a>
	<?php include 'include/footer.php'; ?>
	<script src="js/site.js"></script>
</body>
</html>
