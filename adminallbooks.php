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
include "includes/fileupload.php";


$selectedAge = fetchAge ($conn);
$selectedAuthor = fetchAuthor ($conn);
$selectedLanguage = fetchLanguage ($conn);
$selectedCategory = fetchCategory ($conn);
$selectedGenre = fetchGenre ($conn);
$selectedIllustrator = fetchIllustrator ($conn);

?>



<?php 

include "includes/config1.php";

$selectedBooks = selectBooks($conn, 20);

?>




<section id="allbooks" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center text-center">

<?php 
echo "<div class='row justify-content-center'>";
foreach ($selectedBooks as $row){
	
	echo "
	<div class='card m-3 col-md-3'> 
		<img src='uploads/{$row['book_picture']}' class='card-img-top' alt='...'>
		<div class='card-body'>
			<h5 class='card-title'>{$row['book_title']} <br> {$row['author_firstname']} {$row['author_lastname']}</h5>
		</div>
		<ul class='list-group list-group-flush'>
		<li class='list-group-item'>Kategori: {$row['category_name']}</li>
		<li class='list-group-item'>Genre: {$row['genre_name']}</li>
		<li class='list-group-item'>Illustratör: {$row['illustrator_firstname']} {$row['illustrator_lastname']}</li>
		<li class='list-group-item'>Utgiven: {$row['book_year']}</li>
		<li class='list-group-item'>Åldersrekommendationer: {$row['age_interval']}</li>
		<li class='list-group-item'>Språk: {$row['language_name']}</li>
		<li class='list-group-item'>Pris: {$row['book_price']}</li>
		<li class='list-group-item'>Antal sidor: {$row['book_page']}</li>
		</ul><br>
		<button class='bubbly-button'><a href='singlebook.php?book_id={$row['book_id']}'>View info</a></button><br>
		<button class='bubbly-button'><a href='editbook.php?book_id={$row['book_id']}'>Edit book</a></button><br>
		<button class='bubbly-button'><a href='deletebook.php?book_id={$row['book_id']}'>Delete book</a></button><br>                                
	</div>"
	;	
}
?>
		</div>
	</div>
</div>
</section>

<!-- Här slutar sidans allbookss -->





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
				<img src="images/image.png" alt="Map" class="img-fluid">
			</div>
		</div>
	</div>
</section>

<!-- Här slutar sidans 50/50 sektion -->








<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>