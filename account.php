<!DOCTYPE html>
<html>
<head>
<title>Car</title>
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

if($user->checkUserRole(50) && isset($_GET['userToEdit'])){
		$userToEdit = $_GET['userToEdit'];
	}
	
else {
	$userToEdit = $_SESSION['uid'];
}
	

if(isset($_POST['submit_edit'])){
	
	$checkReturn = $user->checkUserRegisterInput();
		
		//If all checks are passed, run register-fuction
		if($checkReturn == "success"){
			if($user->editUserInfo($userToEdit)){
			$feedback = "user info updated successfully";
			}
		}
		//If something does not meet requirements, echo out what went wrong.
		else {
			$feedback =$checkReturn;
		}	
}
		
		
if(isset($_POST['submit_role_status'])){
	if($_POST['update_status'] !=0){
	$statusUpdateReturn=$user->updateUserStatus($userToEdit);
		if($statusUpdateReturn == "success"){
		$feedback = "User status update successfully";
		}
		else{
		$feedback =$statusUpdateReturn;
		}
	}
	
else{
		$feedback = "No changes where made to user status";
	}	
		
	if($_POST['update_role'] !=0){
	$roleUpdateReturn=$user->updateUserRole($userToEdit);
		if($roleUpdateReturn == "success"){
		$feedback .= "User role update successfully";
		}
		else{
		$feedback =$roleUpdateReturn;
		}
	}
	
else{
		$feedback .= "No changes where made to user role";
	}	
	
}


$userInfo = $user->getUserInfo($userToEdit);
$roleInfo = $pdo->query("SELECT * FROM table_roles");
$statusInfo = $pdo->query("SELECT * FROM table_status");


?>
<div id="content">
<div class="feedback-section">

<?php 
if(isset($feedback)){
echo $feedback;
}
	
?>

</div>

<div class = "content-inner">

<?php 
echo "<h2>Välkommen " . $_SESSION["uname"] . "</h2>";


?>

<h2>Change account info</h2>
<form method="POST" action="">
				<label for="username">Username:</label><br />
				<input type="text" id="username" name="username" value="<?php echo $userInfo['user_name']; ?>" disabled><br />
				<label for="password">Password:</label><br />
				<input type="text" id="password" name="password"><br />
				<label for="password_again">Password (repeat):</label><br />
				<input type="text" id="password_again"  name="password_again"><br />
				<label for="firstname">First name:</label><br />
				<input type="text" id="firstname"  name="firstname" value="<?php echo $userInfo['user_firstname']; ?>"><br />
				<label for="lastname">Last name:</label><br />
				<input type="text" id="lastname"name="lastname" value="<?php echo $userInfo['user_lastname']; ?>"><br />
				<label for="email-field">E-mail:</label><br />
				<input type="text" id="email-field" name="email-field" value="<?php echo $userInfo['user_email']; ?>"><br />	
				<br>
				<input type="submit" name="submit_edit" value="Submit new info"><br />
				<br>
				</form>
		
<?php 
		if($user->checkUserRole(50)){
	?>
	
	<form method="POST" action="">
		<select name="update_status">
		<option value='0'>Change user status</option>
			<?php 
			foreach ($statusInfo as $row){
			echo "<option value='{$row['status_id']}'>{$row['status_name']}</option>" ;
			}
			?>
		</select>
		<select name="update_role">
		<option value='0'>Change user role</option>
			<?php foreach ($roleInfo as $row){
			echo "<option value='{$row['role_id']}'>{$row['role_name']}</option>" ;
			} ?>
		</select>
	  <input type="submit" name="submit_role_status" value="Update">
	</form>
	
	
	
	<form method="POST" action="confirm_delete.php?userToEdit=<?php echo $userToEdit; ?>">
	  <input type="submit" name="submit_user_delete" value="Delete this account">
	</form>
	
	
<?php } ?>
		
</div>

</div>


<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>