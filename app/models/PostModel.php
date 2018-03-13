<?php
class PostModel extends AModel{

	function __construct(){
		parent::__construct();
	}

	
	/* admin: show all post */
	public function getPostList($table){
		$sql  = "SELECT * FROM $table ORDER BY id DESC";
		return $this->db->select($sql);
	}

	/* admin: Insert post */
	public function insertPost($table, $data){
		return $this->db->insert($table, $data);
	}

	/* admin: get post */
	public function PostById($tablePost, $id){
		$sql  = "SELECT * FROM $tablePost WHERE id=$id";
		return $this->db->select($sql);
	}

	/* admin: post update */
	public function postUpdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}

	/* admin: post delete */
	public function postDelete($table, $cond){
		return $this->db->delete($table, $cond);
	}


	public function getAllPost($table){
		$sql  = "SELECT * FROM $table ORDER BY id DESC LIMIT 3";
		return $this->db->select($sql);
	}

	public function getPostById($tablePost, $tableCat, $id){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
				INNER JOIN $tableCat
				ON $tablePost.cat = $tableCat.id
				WHERE $tablePost.id = $id";
		return $this->db->select($sql);
	}

	public function getPostByCat($tablePost, $tableCat, $catid){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost
				INNER JOIN $tableCat
				ON $tablePost.cat = $tableCat.id
				WHERE $tableCat.id = $catid";
		return $this->db->select($sql);
	}

	public function getLatestPost($table){
		$sql  = "SELECT * FROM $table ORDER BY id DESC LIMIT 5";
		return $this->db->select($sql);
	}

	public function getPostBySearch($tablePost, $keyword, $cat){

		if (empty($keyword) && $cat == 0) {
			header("Location: ".BASE_URL."/Index/home");
		}

		if (isset($keyword) && !empty($keyword)) {
			$sql = "SELECT * FROM $tablePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		}elseif (isset($cat)) {
			$sql = "SELECT * FROM $tablePost WHERE cat = $cat";
		}

		return $this->db->select($sql);
	}
	
}
?>