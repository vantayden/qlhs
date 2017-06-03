<?php
include('config.php');

class db {
	public function __construct(){
		$this->conn = new mysqli(config::db_host, config::db_name, config::db_pass, config::db_name);
	}
	
	public function query($sql){
		return $this->conn->query($sql);
	}
}

?>
