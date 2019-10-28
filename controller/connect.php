<?php
include_once 'config.php';

class DB {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	public $table = 'tbook';

	public $link;

	public function __construct() {
		$this->connectDatabase();
	}

	public function connectDatabase() {
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if (!$this->link) {
			echo 'Connect Faild !!';
		}
		mysqli_set_charset($this->link, "utf8");
	}

	public function insert($query) {
		$insert = $this->link->query($query);
		if ($insert) {
			return $insert;
		} else {
			return false;
		}
	}

	public function update($query) {
		$update = $this->link->query($query);
		if ($update) {
			return $update;
		} else {
			return false;
		}
	}
	
	public function select($query) {
		$select = $this->link->query($query);
		if ($select->num_rows > 0) {
			return $select;
		} else {
			return false;
		}
	}

	public function delete($query) {
		$delete = $this->link->query($query);
		if ($delete) {
			return $delete;
		} else {
			return false;
		}
	}

	public function viewData($table) {

		$sql = "SELECT * FROM $table";
		$query = $this->select($sql);
		return $query;
	}

	public function viewDataEdit($table,$id) {

		$sql = "SELECT * FROM $table WHERE id = $id";
		$query = $this->select($sql);
		return $query;
	}

	public function fetchcode($texta) {
		$sql = "SELECT sub_name FROM tsubject where sub_code =  '" . $texta . "' ";
		$query = $this->select($sql);
		return $query;
	}

	public function fetchteacher($texta) {
		$sql = "SELECT tea_name FROM tteach where tea_name LIKE '%" . $texta . "%' ";
		$query = $this->select($sql);
		return $query;
	}

}

?>