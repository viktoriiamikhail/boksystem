<!DOCTYPE html>
<html>
<head>
<title>Boksystem</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<script src="js/javascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>


<?php 

include "navigeringen.php";
include "functions.php";
include "includes/config1.php";



if(isset($_POST['searchbook_submit'])){
	$bookList= searchBooks($conn);
	}
	
?>





<!-- Här börjar sidans "hero" -->

<header id="page-hero">
	<div class="container">
		<div class="row vh-100 justify-content-center">
			<div class="col align-self-center text-center text-white">
				<h1 class="text-uppercase">Det största Boksystemet</h1>
				<h2 class="display-6">Har kan man hitta bara de mest intressanta böckerna!</h2>
				
				
				<button type="button" onclick="document.location='omoss.php'" class="btn bg-primary text-white p-3 mt-5 rounded-pill">Läs mera här</button>
			</div>
		</div>
	</div>
</header>

<!-- Här slutar sidans "hero" -->


<!-- Här börjar sidans seach -->

<section id="search" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center text-center">
				<h2>Sök en bok</h2>
			
			<form method="POST" action="">
				<label for="searchinput">Sök efter nödvändiga böcker:</label><br />
				<input type="text" id="search_bookname" name="search_bookname" placeholder="Enter name of the book"<><br />
				<br>
				<input type="submit" name="searchbook_submit" value="Search"><br />
				<br>
			</form>	
				
				<div class="booklist">
					<?php
					if(isset($bookList)){
						foreach ($bookList as $row){
							echo "<p>{$row['book_title']}<a href='singlebook.php?book_id={$row['book_id']}'> View book</a></p>";
						
						}
					}
					?>
				</div>

			</div>
		</div>
	</div>
</section>

<!-- Här slutar sidans seach -->

<!-- Här börjar sidans populära kategorier -->


<section id="bookcategory" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center text-center">
				<h2>Populära kategorier</h2>
			

<?php 

$selectedCategory = selectCategory($conn, 6);


echo "<div class='row justify-content-center'>";
foreach ($selectedCategory as $row){
	
	echo " 
	<div class='card m-3 col-md-3'> 
		
		<div class='card-body'>
			<h5 class='card-title'>{$row['category_name']}</h5>
		</div>
		
          <button class='bubbly-button'><a href='allbooks.php'>View books</a></button><br>
		                      
	</div>"
	;	
}
?>




				
			</div>
		</div>
	</div>
</section>

<!-- Här slutar sidans populära kategorier -->

<!-- Här börjar sidans nya böcker -->

<?php 

$selectedAge = fetchAge ($conn);
$selectedAuthor = fetchAuthor ($conn);
$selectedLanguage = fetchLanguage ($conn);
$selectedCategory = fetchCategory ($conn);
$selectedGenre = fetchGenre ($conn);
$selectedIllustrator = fetchIllustrator ($conn);

include "includes/config1.php";
$selectedLastBooks = selectLastBooks($conn);


?>

<section id="newbooks" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-center text-center">
			<h2>Nya böcker</h2>

<?php 
echo "<div class='row justify-content-center'>";
foreach ($selectedLastBooks as $row){
	
	echo "
	<div class='card m-3 col-md-3'> 
		<br><img src='uploads/{$row['book_picture']}' class='card-img-top' alt='...'>
		<div class='card-body'>
			<h5 class='card-title'>{$row['book_title']} <br> {$row['author_firstname']} {$row['author_lastname']}</h5>
		</div>
		<button class='bubbly-button'><a href='singlebook.php?book_id={$row['book_id']}'>View info</a></button><br>
                 
	</div>"
	;	
}
?>


		</div>
	</div>
</div>
</section>

<!-- Här slutar sidans nya böcker -->

<!-- Här börjar sidans rekommenderade böcker -->



<section id="featuredbooks" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center text-center">
				<h2>Rekommenderade böcker</h2>
			
				
			</div>
		</div>
	</div>
</section>

<!-- Här slutar sidans rekommenderade böcker -->


<!-- Här börjar sidans 40/60 sektion -->

<section id="fortysixty">
	<div class="container-fluid">
		<div class="row align-items-center">
			
			<div class="col-md-4">
				<img src="images/image2.jpg" alt="Seller" class="img-fluid">
			</div>
			
			
			
			
			<div class="col-md-8 py-5 text-center">
				<div class="text-container">
				
					<h4>Vi är bäst</h4><br>
					<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p></br>
					<h4>Vad säljer vi?</h4><br>
					<p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
				</div>
				
			</div>
			
			
			
			
			
		</div>
	</div>
</section>

<!-- Här slutar sidans 40/60 sektion -->


<!-- Här börjar sidans 50/50 sektion -->


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
				<img src="images/image.png" alt="Map" class="img-fluid"><br>
			</div>
		</div>
	</div>
</section>

<!-- Här slutar sidans 50/50 sektion -->








<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>