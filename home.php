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

?>

<section id="homepagebook" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center ">
<div class = "content-inner">

<?php 

echo "<h2>Välkommen " . $_SESSION["uname"] . "</h2>";
echo "<br>";
echo "<h3>Nu kan du skapa en ny bok</h3>";
echo "<button class='bubbly-button'><a href='createbook.php'>Create new book</a></button><br>
"


?>

</div>

			
			</div>	
		</div>	
	</div>
</section>


<section id="fiftyfifty">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-6 py-5 text-white text-center">
				<div class="text-container">
				
					<h2>Kontaktuppgifter</h2><br>
					<p><i class="fa fa-volume-control-phone" style="font-size:24px"></i> tel. 040 587 55 66</p>
					<p><i class="fa fa-envelope-o" style="font-size:20px"></i> info@boksystem.fi</p>
					<p><i class="fa fa-map-marker" style="font-size:26px"></i> 10600 Ekenäs Björknäsgatan 13a</p>
					
				</div>
				
			</div>
			
		
			<!-- Vi blev här 16.12.2021 och fortsätter sedan -->
			<div class="col-md-6">
				<img src="images/image.png" alt="Map" class="img-fluid">
			</div>
		</div>
	</div>
</section>

<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>