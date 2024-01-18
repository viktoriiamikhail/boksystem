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

include "includes/config1.php";
include "includes/fileupload.php";

include "functions.php";
include "navigeringen.php";

?>

<section id="singlebook" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center ">
				

<?php 
  $errorMessage  = "";
   if (isset($_GET['book_id'])) {
	$currentBook= $_GET['book_id'];
	$bookData=selectSingleBook($conn, $currentBook);
   }
   else{
	   $errorMessage = "No book has been chosen.";
   }

?>



<p class="error-message">
<?php 
if($errorMessage !=""){
	echo $errorMessage;
	} 

	
		echo "
		<div class='single-book'>
	<div class='card m-12 col-sm-12'> 
		<br><img src='uploads/{$bookData ['book_picture']}' class='card-img-top' alt='...'>
		<div class='card-body'>
		    <h5 class='card-title'>{$bookData ['book_title']} <br> {$bookData ['author_firstname']} {$bookData ['author_lastname']}</h5>
			<p class='card-text'>Bokbeskrivning: {$bookData ['book_description']}</p>
		</div>
		<ul class='list-group list-group-flush'>
		<li class='list-group-item'>Kategori: {$bookData['category_name']}</li>
		<li class='list-group-item'>Genre: {$bookData['genre_name']}</li>
		<li class='list-group-item'>Illustratör: {$bookData['illustrator_firstname']} {$bookData['illustrator_lastname']}</li>
		<li class='list-group-item'>Utgiven: {$bookData['book_year']}</li>
		<li class='list-group-item'>Åldersrekommendationer: {$bookData['age_interval']}</li>
		<li class='list-group-item'>Språk: {$bookData['language_name']}</li>
		<li class='list-group-item'>Pris: {$bookData['book_price']}</li>
		<li class='list-group-item'>Antal sidor: {$bookData['book_page']}</li>
		</ul>
	</div>
	</div>
	<br>"
	;
?>

<div id="reviews">

<?php 
  if (isset($_POST['send'])) {
	createRaitingMark($conn, $_GET['book_id'], $_POST["raiting"]);
}
		
?>

<h1>Leave a review about the product</h1>
 
   <form method="post" action="">
     
   <label for="raiting">Your mark:</label><br />
				<select type="text" id="raiting" placeholder="raiting" name="raiting"><br />
               
				<option value ="1">Mark «1»</option>
				<option value ="2">Mark «2»</option>
				<option value ="3">Mark «3»</option>
				<option value ="4">Mark «4»</option>
				<option value ="5">Mark «5»</option>
				</select><br />
				<br>
	<button type="submit" name="send">Estimate</button><br />
		<br>
    </form>
 </div> 

          </div> 
		</div>
	</div>
</section>

<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

