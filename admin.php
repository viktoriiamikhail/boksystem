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


if ($user->checkLoginStatus()){
	if (!$user->checkUserRole(50)){
		$user->redirect("home.php");
	}
}
else{
	$user->redirect("login.php");
}


if(isset($_POST['searchuser_submit'])){
	$userList= $user->searchUsers();
}



?>
<div id="content">
<div class="error-section">
</div>

<div class = "admincontent-inner">

<?php 
echo "<h2>Välkommen " . $_SESSION["uname"] . "</h2><br>";
echo "<h3>Detta är din adminsida</h3>";
echo "<h3>Vad vill du göra?</h3><br>";






echo "
	<div> 
		<button class='bubbly-button'><a href='adminallbooks.php'>View all books</a></button>
	
		<button class='bubbly-button'><a href='createbook.php'>Create new book</a></button>
	
		<button class='bubbly-button'><a href='admineditbook.php'>Search and Edit/Delete book</a></button>
      
        <button class='bubbly-button'><a href='adminedituser.php'>Search and Edit/Delete user</a></button><br>
				
	</div>"
	;	


?>



</div>


<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>