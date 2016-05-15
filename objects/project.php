<?php 
class Project{ 
    // database connection and table name 
    private $conn; 
    private $table_name = "projects"; 
 
    // object properties 
    public $id; 
    public $number; 
    public $name; 
    public $notes;
    public $statusid;
    public $clientid; 
    public $created;
    public $modified; 
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
        }
    
    // read projects
	function readAll(){
	 
	    // select all query
	    $query = "SELECT 
	                id, number, name, notes, statusid, clientid, created, modified 
	            FROM 
	                " . $this->table_name . "
	            ORDER BY 
	                id DESC";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
	     
	    // execute query
	    $stmt->execute();
	     
	    return $stmt;
	}
}

// create project
function create(){
     
    // query to insert record
    $query = "INSERT INTO 
                " . $this->table_name . "
            SET
                id=:id, number=:number, name=:name, notes=:notes, statusid=:statusid, clientid=:clientid, created=:created, modified=:modified";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->number=htmlspecialchars(strip_tags($this->number));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->notes=htmlspecialchars(strip_tags($this->notes));
	$this->statusid=htmlspecialchars($this->statusid));
	$this->clientid=htmlspecialchars($this->clientid));
	$this->created=htmlspecialchars($this->created));
	$this->modified=htmlspecialchars($this->modified));
	 
    // bind values
    $stmt->bindParam(":number", $this->number);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":notes", $this->notes);
    $stmt->bindParam(":clientid", $this->clientid);
    $stmt->bindParam(":statusid", $this->statusid);
    $stmt->bindParam(":created", $this->created);
    $stmt->bindParam(":modified", $this->modified);
     
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
 
        return false;
    }
}

// used when filling up the update project form
function readOneProject(){
     
    // query to read single record
    $query = "SELECT 
                number, name, notes, clientid, statusid, created, modified  
            FROM 
                " . $this->table_name . "
            WHERE 
                id = ? 
            LIMIT 
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
     
    // bind id of project to be updated
    $stmt->bindParam(1, $this->id);
     
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // set values to object properties
    $this->number = $row['number'];
    $this->name = $row['name'];
    $this->notes = $row['notes'];
    $this->clientid = $row['clientid'];
    $this->statusid = $row['statusid'];
    $this->created = $row['created'];
    $this-modified = $row['modified'];
}

// update the project
function update(){
 
    // update query
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                number = :number, 
                name = :name,
                notes = :notes,
                clientid = :clientid;
                statusid = :statusid;
                created = :created;
                modified = :modified;  
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // posted values
	$this->number=htmlspecialchars(strip_tags($this->number));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->notes=htmlspecialchars(strip_tags($this->notes));
    $this->clientid=htmlspecialchars(strip_tags($this->clientid));
	$this->statusid=htmlspecialchars(strip_tags($this->statusid));
	$this->created=htmlspecialchars(strip_tags($this->created));
    $this->modified=htmlspecialchars(strip_tags($this->modified));
    
    
    // bind new values
    // bind values
    $stmt->bindParam(":number", $this->number);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":notes", $this->notes);
    $stmt->bindParam(":clientid", $this->clientid);
    $stmt->bindParam(":statusid", $this->statusid);
    $stmt->bindParam(":created", $this->created);
    $stmt->bindParam(":modified", $this->modified);
     
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// delete the project
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
     
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}



?>