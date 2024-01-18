<!DOCTYPE html>
<html>
<head>
<title>Loginsystem</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="js/javascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


<?php 

include "navigeringen.php";


// check if form has benn sent
if (isset($_POST['submit_register'])){
	//Function returns success or error message that is saved in $checkReturn
	$checkReturn = $user->checkUserRegisterInput();
	//If all checks are passed, run regidster-function
	if($checkReturn == "success"){
		//echo "GreatSuccess!!";
		$registerResult = $user->register();
			echo "<p class='bg-info text-white text-center'> {$registerResult}<br> <a href='login.php'>Log in</a></p>";
	}
	//If something does not mett requirements, echo out what went wrong
	else {
		echo "<p class='text-white bg-danger text-center'> {$checkReturn}</p>";
	}
	
}

?>
<div class = "formularregister">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<h3>Register</h3><br />
				<label for="username">Username:</label><br />
				<input type="text" id="username" placeholder="alex25" name="username" ><br />
				<label for="password">Password:</label><br />
				<input type="text" id="password" placeholder="xxxxx" name="password" ><br />
				<label for="password_again">Password again:</label><br />
				<input type="text" id="password_again" placeholder="xxxxx" name="password_again" ><br />
				<label for="firstname">First name:</label><br />
				<input type="text" id="firstname" placeholder="Alex" name="firstname" ><br />
				<label for="lastname">Last name:</label><br />
				<input type="text" id="lastname" placeholder="Snow" name="lastname" ><br />
				<label for="email-field">E-mail:</label><br />
				<input type="text" id="email-field" placeholder="alex25@gmail.com" name="email-field" ><br />	
				<br>
				<input type="submit" name="submit_register" value="Register"><br />
				<br>
				</form>
				<div class="">
				<span>Already a user?  </span><a class="" href="login.php">Login here!</a>
				</div>
				
				
				
</div>

<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
