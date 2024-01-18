<!-- Här börjar navigeringen -->
<?php 

	include "class.user.php";
	include "includes/config.php";


	if(isset($_POST['logout-button'])){
			if($user->logout()) {
			   $user->redirect("login.php");
			}
	}

?>





<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="#">Boksystem</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Hem</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="allbooks.php">Böcker</a></li>

                <li class="nav-item"><a class="nav-link active" aria-current="page" href="createbook.php">Add Böcker</a></li>
			
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="omoss.php">Om oss</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="kontakt.php">Kontakt</a></li>
				
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Log in</a></li>
				<li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">Register</a></li>
			</ul>


		</div>


	</div>
</nav>









<div id="navigation">
<nav class="navbar navbar-light bg-dark">
<div class="container-fluid justify-content-start">
<?php 
if($user->checkLoginStatus()){
?>
<form method="POST" action="">
<input type="submit" name="logout-button" value="log out" class="btn btn-success me-2">
</form>
<?php 
if($user->checkUserRole(50)) {
	echo "<a href='admin.php'>Admin page</a>";
}

}?>
</nav>
</div>
</div>
<div class="clear"></div>