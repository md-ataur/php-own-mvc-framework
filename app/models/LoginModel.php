<?php
class LoginModel extends AModel{

	function __construct(){
		parent::__construct();
	}

	public function userControl($table, $username, $password){
		$sql = "SELECT * FROM $table WHERE username =? AND password =?";
		return $this->db->affectRows($sql, $username, $password);
	}

	public function getUserData($table, $username, $password){
		$sql = "SELECT * FROM $table WHERE username =? AND password =?";
		return $this->db->selectUser($sql, $username, $password);
	}
}
?>