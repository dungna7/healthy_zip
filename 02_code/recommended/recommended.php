<?php
class Recommended {
 
    // database connection and table name
    private $conn;
    private $table_name = "recommended";
 
    // object properties
    public $id;
    public $type;
    public $title;
    public $image_path;
    public $content;
    public $created;
    public $is_delete;
    public $hash_tag;
    public $limit;
    public $offset;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	// read users
	function read(){
		// select all query
		$query = "SELECT r.id, r.type, r.title, r.image_path, r.content, r.created, r.is_delete, GROUP_CONCAT(t.tag_name separator ', ') as hash_tag FROM " . $this->table_name . " r "
					. "left join recommended_tag rt on r.id = rt.recommended_id "
					. "left join m_hashtag t on rt.tag_id = t.id "
					. "GROUP BY r.id "
					. "LIMIT :limit OFFSET :offset";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		
		// bind id of user to be updated
		$stmt->bindValue(':limit', (int) $this->limit,  PDO::PARAM_INT);
		$stmt->bindValue(':offset', (int) $this->offset,  PDO::PARAM_INT);
		
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	// read user by id
	// used when filling up the update user form
	function readOne(){
	 
		// query to read single record
		$query =  "SELECT r.id, r.type, r.title, r.image_path, r.content, r.created, r.is_delete FROM " . $this->table_name . " r WHERE r.id = ?";
	 
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of user to be updated
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->id = $row['id'];
		$this->type = $row['type'];
		$this->title = $row['title'];
		$this->image_path = $row['image_path'];
		$this->content = $row['content'];
		$this->created = $row['created'];
	}
	// create user
	function create(){
	}
	// update
	// update the user
	function update(){
	}
}