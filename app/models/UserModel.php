<?php
class UserModel extends AModel{

	function __construct(){
		parent::__construct();
	}

	public function userList($table){
		$sql  = "SELECT * FROM $table";
		return $this->db->select($sql);
	}

	public function userById($table, $id){
		$sql  = "SELECT * FROM $table WHERE id=:id";
		$data = array(":id" => $id);
		return $this->db->select($sql, $data);
	}

	public function userInsert($table, $data){
		return $this->db->insert($table, $data);
	}

	public function userUpdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}

	public function userDelete($table, $cond){
		return $this->db->delete($table, $cond);
	}

	
}
?>