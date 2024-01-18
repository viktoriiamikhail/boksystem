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

include "includes/config1.php";
include "includes/fileupload.php";

include "functions.php";
include "navigeringen.php";

if (isset ($_POST['form-submit-book'])) {
	$lastInsertedCustomerId = createCreator($conn, $_POST["creatorfirstname"], $_POST["creatorlastname"]);

createBook($conn, $_POST["title"], $_POST["description"], $_POST["author"], $_POST["illustrator"], $_POST["category"], $_POST["genre"], $_POST["series"], $_POST["language"], $_POST["year"], $_POST["publisher"], $_POST["age"], $_POST["page"], $_POST["price"], $_FILES["cimage"]["name"], 1, 7, $lastInsertedCustomerId);

}	
	//echo $_POST['firstname'];
	//echo $_FILES['cimage']['name'];
	
	
	
if(isset($_POST['aform-submit'])) {		
createAuthor($conn, $_POST["afirstname"], $_POST["alastname"]);
}

if(isset($_POST['iform-submit'])) {
createIllustrator($conn, $_POST["ifirstname"], $_POST["ilastname"]);
}

if(isset($_POST['cform-submit'])) {
createCategory($conn, $_POST["cname"]);
}

if(isset($_POST['gform-submit'])) {
createGenre($conn, $_POST["gname"], $_POST["gform"]);
}

if(isset($_POST['sform-submit'])) {
createSeries($conn, $_POST["sname"], $_POST["snumber"]);
}

if(isset($_POST['lform-submit'])) {
createLanguage($conn, $_POST["lname"], $_POST["lgroup"]);
}

if(isset($_POST['pform-submit'])) {
createPublisher($conn, $_POST["pfirstname"], $_POST["plastname"]);
}

if(isset($_POST['ageform-submit'])) {
createAge($conn, $_POST["ageinterval"]);
}


?>



<section id="createbook">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-6 py-5 text-white text-center">
				<div class="text-container">


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	
			<h3>Creator info</h3>
				<label for="creatorfirstname">Creator name:</label><br />
				<input type="text" id="creatorfirstname" placeholder="John" name="creatorfirstname" required="required"><br />
				<label for="creatorlastname">Creator surname:</label><br />
				<input type="text" id="creatorlastname" placeholder="Snow" name="creatorlastname" required="required"><br />
				<br>
			
			<h3>Book info</h3>
			    <label for="title">Book title:</label><br />
				<input type="text" id="title" placeholder="title" name="title"><br />
				
				<label for="description">Description:</label><br />
				<textarea name="description" id="description"></textarea><br />
				
				<label for="author">Book author:</label><br />
				<select type="text" id="author" placeholder="author" name="author"><br />
				 <?php
				     $allAuthorTypes = fetchAuthor($conn);
				     foreach($allAuthorTypes as $row){
					    echo "<option value='{$row['author_id']}'>{$row['author_firstname']} {$row['author_lastname']}</option>";
					 }
				?>
			    </select><br />
				
				
				<label for="illustrator">Book illustrator:</label><br />
				<select type="text" id="illustrator" placeholder="illustrator" name="illustrator"><br />
				 <?php
				     $allIllustratorTypes = fetchIllustrator($conn);
				     foreach($allIllustratorTypes as $row){
					    echo "<option value='{$row['illustrator_id']}'>{$row['illustrator_firstname']} {$row['illustrator_lastname']}</option>";
					 }
				?>
			    </select><br />
				
				<label for="category">Book category:</label><br />
				<select type="text" id="category" placeholder="category" name="category"><br />
				<?php
				     $allCategoryTypes = fetchCategory($conn);
				     foreach($allCategoryTypes as $row){
					    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
					 }
				?>
			    </select><br />
				
				<label for="genre">Book genre:</label><br />
				<select type="text" id="genre" placeholder="genre" name="genre"><br />
				<?php
				     $allGenreTypes = fetchGenre($conn);
				     foreach($allGenreTypes as $row){
					    echo "<option value='{$row['genre_id']}'>{$row['genre_name']}</option>";
					 }
				?>
			    </select><br />
				
				
				
				<label for="series">Book series:</label><br />
				<select type="text" id="series" placeholder="series" name="series"><br />
					<?php
				     $allSeriesTypes = fetchSeries($conn);
				     foreach($allSeriesTypes as $row){
					    echo "<option value='{$row['series_id']}'>{$row['series_name']}</option>";
					 }
				?>
			    </select><br />
				
				<label for="language">Book language:</label><br />
				<select type="text" id="language" placeholder="language" name="language"><br />
				<?php
				     $allLanguageTypes = fetchLanguage($conn);
				     foreach($allLanguageTypes as $row){
					    echo "<option value='{$row['language_id']}'>{$row['language_name']}</option>";
					 }
				?>
			    </select><br />
				
				<label for="year">Book year:</label><br />
				<input type="year" id="year" placeholder="year" name="year"><br />
				
				<label for="publisher">Book publisher:</label><br />
				<select type="text" id="publisher" placeholder="publisher" name="publisher"><br />
				 <?php
				     $allPublisherTypes = fetchPublisher($conn);
				     foreach($allPublisherTypes as $row){
					     echo "<option value='{$row['publisher_id']}'>{$row['publisher_firstname']} {$row['publisher_lastname']}</option>";
					 }
				?>
			    </select><br />
				
				
				<label for="age">Book age:</label><br />
				<select type="text" id="age" placeholder="age" name="age"><br />
				 <?php
				     $allAgeTypes = fetchAge($conn);
				     foreach($allAgeTypes as $row){
					    echo "<option value='{$row['age_id']}'>{$row['age_interval']}</option>";
					 }
				?>
			    </select><br />
				
							
				<label for="page">Book page:</label><br />
				<input type="text" id="page" placeholder="page" name="page"><br />
				
			
				<label for="price">Book price:</label><br />
				<input type="text" id="price" placeholder="10000" name="price"><br />
				
			
			<label for="cimage">Book image:</label><br />
			<input type="file" name ="cimage" id="cimage"><br />
			<br>
			<input type="submit" name ="form-submit-book" value="Skicka"><br />
			</form>
				
		</div>	
	</div>
	
	<div class="col-md-6">
	
	
	<!-- Button trigger modal AUTHOR -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAuthor">
  Add new Author
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalAuthor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalAuthor">Create author</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post AUTHOR -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="afirstname">Author name:</label><br />
				<input type="text" id="afirstname" placeholder="afirstname" name="afirstname" required="required"><br />
				<label for="alastname">Author surname:</label><br />
				<input type="text" id="alastname" placeholder="alastname" name="alastname" required="required"><br />
				<br>
				<input type="submit" name="aform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />	
<br />	
<br />	

<!-- Button trigger modal ILLUSTRATOR -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalIllustrator">
  Add new Illustrator
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalIllustrator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalIllustrator">Create illustrator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post ILLUSTRATOR -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="ifirstname">Illustrator name:</label><br />
				<input type="text" id="ifirstname" placeholder="ifirstname" name="ifirstname" required="required"><br />
				<label for="ilastname">Illustrator surname:</label><br />
				<input type="text" id="ilastname" placeholder="ilastname" name="ilastname" required="required"><br />
				<br>
				<input type="submit" name="iform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />				
<br />			
<br />				
				
	<!-- Button trigger modal CATEGORY -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCategory">
  Add new Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCategory">Create category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post CATEGORY -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="cname">Category name:</label><br />
				<input type="text" id="cname" placeholder="cname" name="cname" required="required"><br />
				<br />
				<input type="submit" name="cform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />				
<br />		
<br />	
			
<!-- Button trigger modal GENRE -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalGenre">
  Add new Genre
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalGenre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalGenre">Create genre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post GENRE -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="gname">Genre name:</label><br />
				<input type="text" id="gname" placeholder="gname" name="gname" required="required"><br />
				<label for="gform">Genre name:</label><br />
				<input type="text" id="gform" placeholder="gform" name="gform" required="required"><br />
				<br />
				<input type="submit" name="gform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>	
<br />	
<br />
<br />						
					
<!-- Button trigger modal SERIES -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalSeries">
  Add new Series
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalSeries" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalSeries">Create series</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post SERIES -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="sname">Series name:</label><br />
				<input type="text" id="sname" placeholder="sname" name="sname" required="required"><br />
				<label for="snumber">Series number:</label><br />
				<input type="text" id="snumber" placeholder="snumber" name="snumber" required="required"><br />
				<br />
				<input type="submit" name="sform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />				
<br />	
<br />
<!-- Button trigger modal LANGUAGE -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLanguage">
  Add new Language
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLanguage">Create language</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post LANGUAGE -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="lname">Language name:</label><br />
				<input type="text" id="lname" placeholder="lname" name="lname" required="required"><br />
				<label for="lgroup">Language group:</label><br />
				<input type="text" id="lgroup" placeholder="lgroup" name="lgroup" required="required"><br />
				<br />
				<input type="submit" name="lform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />				
<br />
<br />
<!-- Button trigger modal PUBLISHER -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalPublisher">
  Add new Publisher
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalPublisher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPublisher">Create publisher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post PUBLISHER -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="pfirstname">Publisher name:</label><br />
				<input type="text" id="pfirstname" placeholder="pfirstname" name="pfirstname" required="required"><br />
				<label for="plastname">Publisher surname:</label><br />
				<input type="text" id="plastname" placeholder="plastname" name="plastname" required="required"><br />
				<br />
				<input type="submit" name="pform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />				
<br />
<br />

<!-- Button trigger modal AGE -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAge">
  Add new Age
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalAge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalAge">Create age</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- Post AGE -->		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                <label for="ageinterval">Age interval:</label><br />
				<input type="text" id="ageinterval" placeholder="ageinterval" name="ageinterval" required="required"><br />
				<br />
				<input type="submit" name="ageform-submit" value="Skicka">

			</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    </div>
  </div>
</div>
<br />							
<br />											
<br />							
	
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
</section>



<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>