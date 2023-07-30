<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $name;
    public $email;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	// read users
	function read(){
	 
		// select all query
		$query = "SELECT p.name, p.id, p.email, p.permision FROM " . $this->table_name . " p";
		// var_dump($query);die;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	// read user by id
	// used when filling up the update user form
	function readOne(){
	 
		// query to read single record
		$query =  "SELECT p.name, p.id, p.email, p.permision FROM " . $this->table_name . " p WHERE p.id = ?";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of user to be updated
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->email = $row['email'];
		$this->name = $row['name'];
		$this->permision = $row['permision'];
	}
	// create user
	function create(){
	 
		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					name=:name, email=:email, permision=:permision";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->permision=htmlspecialchars(strip_tags($this->permision));
	 
		// bind values
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":permision", $this->permision);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	// update
	// update the user
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . " 
				SET
					name = :name,
					permision = :permision
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->permision=htmlspecialchars(strip_tags($this->permision));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":permision", $this->permision);
		$stmt->bindParam(":id", $this->id);
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
}