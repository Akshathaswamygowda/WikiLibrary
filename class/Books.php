<?php
class Books{
	//connection instance
	private $connection;
	//table name
	private $table_name = "bookslist";

	//columns name
	public $id;
	public $name;
	public $description;
	public $genre;
	public $added_on;

	public function __construct($connection){
		$this->connection = $connection;
	}

	public function readLatest(){
		$query = "SELECT id, name, genre, added_on from " . $this->table_name . " ORDER BY added_on DESC LIMIT 0,4";
		// prepare query statement
    	$stmt = $this->connection->prepare($query);
  
    	// execute query
    	$stmt->execute();
  
    	return $stmt;
	}

	public function searchBook(){
		if($this->name AND $this->genre)
		{
			$query = "SELECT id, name, genre from " . $this->table_name . " WHERE name LIKE '%$this->name%' OR genre LIKE '%$this->genre%' LIMIT 0, 6";
		}
		elseif ($this->genre AND !$this->name) {
			# code...
			$query = "SELECT id, name, genre from " . $this->table_name . " WHERE genre LIKE '%$this->genre%' LIMIT 0, 6";
		}

		$stmt = $this->connection->prepare( $query );
	  
	    // bind id of product to be updated
	    $stmt->bindParam(":name", $this->name);
	    $stmt->bindParam(":genre", $this->genre);

	  
	    // execute query
	    $stmt->execute();
	    return $stmt;
	}

	public function readGenre(){
		$query = "SELECT genre from genrelist";
		$stmt = $this->connection->prepare($query);
  
    	// execute query
    	$stmt->execute();
  
    	return $stmt;
	}

	public function readOne(){
		$query = "SELECT name, description, genre, added_on from ". $this->table_name ." WHERE id = ?";
		// prepare query statement
	    $stmt = $this->connection->prepare( $query );
	  
	    // bind id of product to be updated
	    $stmt->bindParam(1, $this->id);
	  
	    // execute query
	    $stmt->execute();
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	public function create(){
		$query = "INSERT INTO " . $this->table_name . "(name, description, genre, added_on) VALUES (:name,:description,:genre,:added_on);";
		$query .= "INSERT INTO genrelist (genre) VALUES (:genre)";
		$stmt = $this->connection->prepare($query);
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->description = htmlspecialchars(strip_tags($this->description));
		$this->genre = htmlspecialchars(strip_tags($this->genre));
		$this->added_on = htmlspecialchars(strip_tags($this->added_on));
		
		//bind values
		$stmt->bindParam(":name", $this->name);
    	$stmt->bindParam(":description", $this->description);
    	$stmt->bindParam(":genre", $this->genre);
    	$stmt->bindParam(":added_on", $this->added_on);
		if($stmt->execute()){
			return true;			
		}

		return false;		 
	}
}
?>