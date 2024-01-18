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
include "functions.php";
include "includes/config1.php";


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

if(isset($_POST['searchbook_submit'])){
	$bookList= searchBooks($conn);
}


?>
<div id="content">
<div class="error-section">
</div>

<div class = "admincontent-inner">

<?php 
echo "<h2>Välkommen " . $_SESSION["uname"] . "</h2>";

?>



<form method="POST" action="">
				<label for="searchinput">Search for book to edit:</label><br />
				<input type="text" id="search_bookname" name="search_bookname" placeholder="Enter name of the book"<><br />
				<br>
				<input type="submit" name="searchbook_submit" value="Search"><br />
				<br>
			</form>	
				
				<div class="booklist">
					<?php
					if(isset($bookList)){
						foreach ($bookList as $row){
							echo "<p>{$row['book_title']}<a href='adminsinglebook.php?book_id={$row['book_id']}'> View and Edit/Delete book</a></p>";
						
						}
					}
					?>
				</div>
	
	
</div>


</div>


<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>