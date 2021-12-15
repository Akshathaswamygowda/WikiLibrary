<?php
include_once '../includes/config.php';
include_once '../class/books.php';

$database = new Database();
$db = $database->getConnection(); 

$books = new Books($db);

$books->id = isset($_GET['id']) ? $_GET['id'] : die();

$row=$books->readOne();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wiki Library</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
<div class="col-md-9">
	<div class="card">
	<div class="card-body">
	<div class="row">
		<div class="col-md-12">
		    <h4>Wiki Library</h4>
		</div>
	</div>	
	<div class="row">
	<div class="col-md-12">
	<div class="tab">
		<div class="form-group row">
		<label class="col-4 col-form-label" style="width: 70%"><?php echo "$row[name]";?></label>	
		</div>	
		<div class="form-group row">
		<label class="col-4 col-form-label"><?php echo "$row[genre]";?></label>	
		</div>	
		<div class="form-group row">
		  <label for="Added_on" class="col-4 col-form-label">Added on <?php echo "$row[added_on]";?></label> 
        </div>
		</div>
		<div class="form-group row">
		<a href="booklisting.php" class="col-4 col-form-label">Back to listing</a>	
		</div>	
		<div id="description" class="readable stacked">
		<span><?php echo "$row[description]";?></span>
        </div>
	</div>	
	</div>
	</div>
	</div>
	</div>
	
</div>	
</body>
</html>