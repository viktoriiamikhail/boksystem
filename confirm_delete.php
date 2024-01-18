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



if(!$user->checkLoginStatus()){
	$user->redirect("login.php");
}



if(isset($_GET['userToEdit'])){
		$userToEdit=$_GET['userToEdit'];
}

else {
$errorMessage = "No user has been chosen";	
}

if(isset($_POST['confirm_user_delete'])){
		$deleteUserReturn= $user->deleteUser($userToEdit);
		
		if ($deleteUserReturn == "success"){
			$feedback = "The account has been successfully deleted";
		}
		else{
			$errorMessage = $deleteUserreturn;
		}	
		
}

?>
<div id="cotent">
<div class="error-section"
<?php 


	if(isset($errorMessage)){
			echo $errorMessage;
		}

?>

</div>
<div class="content-inner">

<?php 

	if(isset($errorMessage)){
			echo $errorMessage;
		}
		
	if(isset($_POST['submit_user_delete']) && isset($userToEdit)){
		?>
		<h2>Are you sure you want to delete this account and all of its content?</h2>
		<form method="POST" action="">
		  <input type="submit" name="confirm_user_delete" value="Delete this account">
		</form>
		<?php 
	}

	else{
		echo "Nothing to delete, back to <a href='home.php'>Home</a>";
	}
	
	if(isset($errorMessage)){
			echo $errorMessage;
		}

?>

</div>
</div>


<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>