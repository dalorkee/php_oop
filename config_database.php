<?php
class database {
	// connection
	private $host = "localhost";
	private $db_name = "work_shop";
	private $username = "root";
	private $password = "megabyte";
	public $conn;
 
	// get the database connection
	public function getConnection(){
		$this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
		
		if ($this->conn) {
			$this->conn->set_charset("utf8");
		}
 
		return $this->conn;
	}
}
?>