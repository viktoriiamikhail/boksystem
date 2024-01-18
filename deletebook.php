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
?>


<?php 
  
   $errorMessage  = "";
  
   if (isset($_GET['book_id'])) {;
	$currentBook= $_GET['book_id'];
	$bookData=selectSingleBook($conn, $currentBook);
   }
   else{
	   $errorMessage = "No book has been chosen.";
   }
	
   
	
	if (isset($_POST['deletebook'])) {
		if (deleteBook ($conn, $currentBook)) {
		header ('Location: allbooks.php?bookDeleted-1');
        }
    }
	
   if (isset($_POST['goback'])) {
		;
		header ('Location: adminallbooks.php');
		}
		
?>

<p class="error-message">
<?php 
if($errorMessage !=""){
	echo $errorMessage;
	} 
?>
</p>




<div class = "deletecontent-inner">
<div class="row">
<h2> Are you sure want to delete <?php echo "{$bookData ['book_title']}?"; ?> </h2>
</div>

<div class="row">
	<form method="POST" action="">
		<br><input type="submit" name="deletebook" value="Delete">
		<input type="submit" name="goback" value="Goback">	
	</form>
</div>
</div>
			
<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

