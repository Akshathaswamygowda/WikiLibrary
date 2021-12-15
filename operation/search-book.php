<?php
include_once '../includes/config.php';
include_once '../class/books.php';

$database = new Database();
$db = $database->getConnection(); 

$books = new Books($db);

$books->name = isset($_GET['name']) ? $_GET['name'] : die();
$books->genre = isset($_GET['genre']) ? $_GET['genre'] : die();
$stmt = $books->searchBook();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wiki Library</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
	<div class="container">
	<div class="form-group row">
		<a href="booklisting.php" class="col-4 col-form-label">Back to listing</a>	
	</div>
	<table>
	<tr></tr>
	<?php 
	echo "<table width='70%'>";
	$i = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
		if($i % 2 == 0){
			echo "<tr><td><a href='book-view.php?id=$row[id]'>$row[name]</a> <br> $row[genre]</td>";
		}
		else{
			echo "<td><a href='book-view.php?id=$row[id]'>$row[name]</a> <br> $row[genre]</td>";
		}
		$i++;
		}
  	?>
  	</table>
	</div>	
	</div>
	</div>
	</div>
	
</div>	
</body>