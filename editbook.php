<!DOCTYPE html>
<html>
<head>
<title>Boksystem</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body>

<?php 

include "includes/fileupload.php";
include "includes/config1.php";
include "functions.php";
include "navigeringen.php";

 if (isset($_GET['book_id'])) {
	$currentBook= $_GET['book_id'];
	$bookData=selectSingleBook($conn, $currentBook);
	//print_r ($bookData);
   }
   else{
	   $errorMessage = "No book has been chosen.";
   }


if (isset ($_POST['form-submit-book'])) {
updateCreator($conn, $_POST["creatorfirstname"], $_POST["creatorlastname"], $bookData["creator_fk"]);

	
updateBook($conn, $_POST["title"], $_POST["description"], $_POST["author"], $_POST["illustrator"], $_POST["category"], $_POST["genre"], $_POST["series"], $_POST["language"], $_POST["year"], $_POST["publisher"], $_POST["age"], $_POST["page"], $_POST["price"], $_FILES["cimage"]["name"], 1, 7, $bookData["book_id"]);


}	
	//echo $_POST['firstname'];
	//echo $_FILES['cimage']['name'];
	
?>


<section id="editbook" class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center ">

<form method="post" action="" enctype="multipart/form-data">

	
			<h3>Creator info</h3>
				<label for="creatorfirstname">Creator name:</label><br />
				<input type="text" id="creatorfirstname" placeholder="John" value="<?php if (isset($bookData['creator_firstname'])) {echo $bookData['creator_firstname'];} ?>" name="creatorfirstname"><br />
				<label for="creatorlastname">Creator surname:</label><br />
				<input type="text" id="creatorlastname" placeholder="Snow" value="<?php if (isset($bookData['creator_lastname'])) {echo $bookData['creator_lastname'];} ?>" name="creatorlastname"><br />
				<br>
			
			<h3>Book info</h3>
			    <label for="title">Book title:</label><br />
				<input type="text" id="title" placeholder="title" value="<?php if (isset($bookData['book_title'])) {echo $bookData['book_title'];} ?>" name="title"><br />
				
				<label for="description">Description:</label><br />
				<textarea name="description" id="description" value="<?php if (isset($bookData['book_description'])) {echo $bookData['book_description'];} ?>" ></textarea><br />
				
				<label for="author">Book author:</label><br />
				<select type="text" id="author" placeholder="author" name="author"><br />
				 <?php
				     $allAuthorTypes = fetchAuthor($conn);
				     foreach($allAuthorTypes as $row){ ?>
						<option value='<?php echo $row['author_id']; ?>'
						<?php if($row['author_id'] == $bookData['author_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['author_firstname']; $row['author_lastname']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
				
				<label for="illustrator">Book illustrator:</label><br />
				<select type="text" id="illustrator" placeholder="illustrator" name="illustrator"><br />
				 <?php
				     $allIllustratorTypes = fetchIllustrator($conn);
				     foreach($allIllustratorTypes as $row){ ?>
						<option value='<?php echo $row['illustrator_id']; ?>'
						<?php if($row['illustrator_id'] == $bookData['illustrator_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['illustrator_firstname']; $row['illustrator_lastname']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
			
				<label for="category">Book category:</label><br />
				<select type="text" id="category" placeholder="category" name="category"><br />
				<?php
				     $allCategoryTypes = fetchCategory($conn);
				     foreach($allCategoryTypes as $row){ ?>
						<option value='<?php echo $row['category_id']; ?>'
						<?php if($row['category_id'] == $bookData['category_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['category_name']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
					
				<label for="genre">Book genre:</label><br />
				<select type="text" id="genre" placeholder="genre" name="genre"><br />
				<?php
				     $allGenreTypes = fetchGenre($conn);
				     foreach($allGenreTypes as $row){ ?>
			            <option value='<?php echo $row['genre_id']; ?>'
						<?php if($row['genre_id'] == $bookData['genre_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['genre_name']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
						
				
				<label for="series">Book series:</label><br />
				<select type="text" id="series" placeholder="series" name="series"><br />
					<?php
				     $allSeriesTypes = fetchSeries($conn);
				     foreach($allSeriesTypes as $row){ ?>
						<option value='<?php echo $row['series_id']; ?>'
						<?php if($row['series_id'] == $bookData['series_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['series_name']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
				
				<label for="language">Book language:</label><br />
				<select type="text" id="language" placeholder="language" name="language"><br />
				<?php
				     $allLanguageTypes = fetchLanguage($conn);
				     foreach($allLanguageTypes as $row){ ?>
						<option value='<?php echo $row['language_id']; ?>'
						<?php if($row['language_id'] == $bookData['language_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['language_name']; ?>
						</option>";
						<?php } ?>
			    </select><br />
								
				
				<label for="year">Book year:</label><br />
				<input type="year" id="year" placeholder="year" value="<?php if (isset($bookData['book_year'])) {echo $bookData['book_year'];} ?>"  name="year"><br />
				
				<label for="publisher">Book publisher:</label><br />
				<select type="text" id="publisher" placeholder="publisher" name="publisher"><br />
				 <?php
				     $allPublisherTypes = fetchPublisher($conn);
				     foreach($allPublisherTypes as $row){ ?>
						<option value='<?php echo $row['publisher_id']; ?>'
						<?php if($row['publisher_id'] == $bookData['publisher_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['publisher_firstname']; $row['publisher_lastname']; ?>
						</option>";
						<?php } ?>
			    </select><br />
				
				
				<label for="age">Book age:</label><br />
				<select type="text" id="age" placeholder="age" name="age"><br />
				 <?php
				     $allAgeTypes = fetchAge($conn);
				     foreach($allAgeTypes as $row){ ?>
				<option value='<?php echo $row['age_id']; ?>'
						<?php if($row['age_id'] == $bookData['age_fk']) {echo "selected='selected'";} ?>
						>
						<?php echo $row['age_interval']; ?>
						</option>";
						<?php } ?>
			    </select><br />		
				
			
				
				
				<label for="page">Book page:</label><br />
				<input type="text" id="page" placeholder="page" value="<?php if (isset($bookData['book_page'])) {echo $bookData['book_page'];} ?>" name="page"><br />
				
			
				<label for="price">Book price:</label><br />
				<input type="text" id="price" placeholder="10000" value="<?php if (isset($bookData['book_price'])) {echo $bookData['book_price'];} ?>"  name="price"><br />
				
			
			<label for="cimage">Book image:</label><br />
			<input type="file" name ="cimage" id="cimage " value="<?php if (isset($bookData['book_picture'])) {echo $bookData['book_picture'];} ?>" ><br />
			<br>
			<input type="submit" name ="form-submit-book" value="Skicka"><br />
			</form>
				
			</div>	
		</div>	
	</div>
</section>



<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>