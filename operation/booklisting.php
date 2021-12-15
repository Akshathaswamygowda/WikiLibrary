<?php
// required headers
include_once '../includes/config.php';
include_once '../class/books.php';

$database = new Database();
$db = $database->getConnection(); 

$books = new Books($db);

$stmt = $books->readLatest();
$genrelist = $books->readGenre();

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
	<div class="card-body">
		<form method="post" name="search" action="" onsubmit="">
			<div class="form-group row">
				<input type="text" id='name' name="name" placeholder="Search by book" >
			</div>
			<div class="form-group row">
				<select id="genre" name="genre">
        			<option>Search by genre</option>
        			<?php 
        			while ($row = $genrelist->fetch(PDO::FETCH_ASSOC)) {
        				?>
        				<option value="<?php echo "$row[genre]";?>">
                        <?php echo "$row[genre]";?>
                        </option>
        				<?php
        			}
        			?>
        		</select>
			</div>
			<div class="form-group row">
			<button>
			<!-- '&genre='+document.getElementById('genre').value -->
			<a type="button" href="search-book.php" onclick="window.location=this.href+'?name='+document.getElementById('name').value+'&genre='+document.getElementById('genre').value;return false;">Search</a>	
			</button>
			</div>
		</form>
	</div>
	</div>
	<div class="container">
	<h4>Recently Added</h4>
	<hr/>
	<table>
	<?php 
	$i = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
		if($i % 2 == 0){
			echo "<tr><td><a href='book-view.php?id=$row[id]'>$row[name]</a> <br> $row[genre]</td>";
		}
		else{
			echo "<td><a href='book-view.php?id=$row[id]'>$row[name]</a> <br> $row[genre]</td>";
			// echo "<tbody><div class='container'><div class='row'><div class='col'><tr><td><a href='>$row[name]</a> <br> <label>$row[genre]</label></td></tr></div></div></div></tbody>";
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
</div>
</body>
</html>