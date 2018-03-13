<?php
/**
* Category controller
*/
class Category extends AController{

	function __construct(){
		parent::__construct();
	}

	
	/* All Category show */
	public function categoryList(){
		$this->load->view("header");
		$table = 'category';
		$data = array();
		$catModel = $this->load->model("CatModel");
		$data['cat'] = $catModel->catList($table);
		$this->load->view("category", $data);

	}

	/* Category show by id */
	public function catById(){
		$this->load->view("header");
		$table = 'category';
		$id = 3;
		$data = array();
		$catModel = $this->load->model("CatModel");
		$data['catById'] = $catModel->catById($table, $id);
		$this->load->view("catbyid", $data);

	}

	/* Category add */
	public function addCat(){
		$this->load->view("header");
		$this->load->view("addcategory");
	}	

	public function insertCategory(){
		$this->load->view("header");
		$table = 'category';
		$name  = $_POST['name'];
		$title = $_POST['title'];

		$data = array(
			'name'  => $name,
			'title' => $title
		);
		$catModel = $this->load->model("CatModel");
		$result = $catModel->catInsert($table, $data);

		$msdata = array();
		if ($result == 1) {
			$msdata['msg'] = "<span style='color:green; font-size:15px;'>Category Successfully Added </span>";
		}else{
			$msdata['msg'] = "<span style='color:red; font-size:15px;'> Category Not Added </span>";
		}
		$this->load->view("addcategory", $msdata);
	}

	
	/* Category update */
	public function updateCat(){
		$this->load->view("header");
		$table = 'category';
		$id    = $_POST['id'];
		$name  = $_POST['name'];
		$title = $_POST['title'];

		$cond = "id = $id";
		$data = array(
			'name'  => $name,
			'title' => $title
		);

		$catModel = $this->load->model("CatModel");
		$result = $catModel->catUpdate($table, $data, $cond);

		$msdata = array();
		if ($result == 1) {
			$msdata['msg'] = "<span style='color:green; font-size:15px;'>Category Updated Successfully </span>";
		}else{
			$msdata['msg'] = "<span style='color:red; font-size:15px;'> Category Not Updated ! </span>";
		}
		$this->load->view("catupdate", $msdata);
	}


	/* Category fetch and show  */
	public function updateCategory(){
		$this->load->view("header");
		$table = 'category';
		$id = 1;
		$data = array();
		$catModel = $this->load->model("CatModel");
		$data['getCatData'] = $catModel->catById($table, $id);
		$result = $this->load->view("catupdate", $data);

	}

	/* Delete Category */
	public function deleteCatById(){
		$this->load->view("header");
		$table = 'category';
		$cond  = "id = 3";
		$catModel = $this->load->model("CatModel");
		$catModel->catDelete($table, $cond);
	}

	
}

?>