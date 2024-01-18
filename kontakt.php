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


?>



<!-- People börjar -->

<div id="people-kontakt">
  <div class="container">
  <h2>KONTAKTA OSS</h2><br>
    <div class="row">
      <div class="col-4">
        <img src="images/photo-1573497019418-b400bb3ab074@2x.jpg" alt="" class="img-fluid">
        <h3>Jessie Williams</h3>
		<p>Promoted to chief of staff</p>
        <p>tel. 040 587 55 67</p>
      </div>
      <div class="col-4">
        <img src="images/pexels-photo-3777952@2x.jpg" alt="" class="img-fluid">
        <h3>Peter Ryan</h3>
        <p>Promoted to head of human resourcesk</p>
        <p>tel. 040 587 55 68</p>
      </div>
      <div class="col-4">
        <img src="images/pexels-photo-762020@2x.jpg" alt="" class="img-fluid">
        <h3>Rachel Stevens</h3>
         <p>Promoted to VP of sales</p>
        <p>tel. 040 587 55 69</p>
      </div>
    </div>
  </div>
</div>

<!-- People slutar -->




<!-- Här börjar sidans information -->


<section id="kartainfo" class="py-5">
	<div class="container">
		<div class="row vh-50 justify-content-center">
			<div class="col align-self-center text-center ">
				<img src="images/image.png" alt="Map" class="img-fluid">
		</div>	
	</div>
</section>	
	
<section id="kontaktinfo" class="py-5">	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col align-self-center text-center ">	
					<p><i class="fa fa-volume-control-phone" style="font-size:24px"></i> tel. 040 587 55 66</p>
					<p><i class="fa fa-envelope-o" style="font-size:20px"></i> info@boksystem.fi</p>
					<p><i class="fa fa-map-marker" style="font-size:26px"></i> 10600 Ekenäs Björknäsgatan 13a</p>
		</div>			
	</div>
</section>



<!-- Här slutar sidans information -->






<?php include "footer.php";?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>