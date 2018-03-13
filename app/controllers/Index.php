<?php
/**
* Default controller
*/
class Index extends AController{
	
	function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->home();
	}

	public function home(){
		$data 	  = array();
		$table    = "post";
		$tableCat = 'category';
		
		$this->load->view("header");

		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		$this->load->view("search", $data);

		/* All post show */
		$postModel = $this->load->model("PostModel");
		$data['allpost'] = $postModel->getAllPost($table);
		$this->load->view("content", $data);

		/* sidebar category name and latest post title */
		#$catModel = $this->load->model("CatModel");
		#$data['catlist'] = $catModel->catList($tableCat);
		$data['latestpost'] = $postModel->getLatestPost($table);
		$this->load->view("sidebar", $data);

	}


	public function postDetails($id=NULL){
		$data      = array();
		$tablePost = "post";
		$tableCat  = "category";

		$this->load->view("header");

		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		$this->load->view("search", $data);

		/* Post Details show */
		$postModel = $this->load->model("PostModel");
		$data['postbyid'] = $postModel->getPostById($tablePost, $tableCat, $id);
		$this->load->view("details", $data);

		/* sidebar category name and latest post title */
		#$catModel = $this->load->model("CatModel");
		#$data['catlist'] = $catModel->catList($tableCat);
		$data['latestpost'] = $postModel->getLatestPost($tablePost);
		$this->load->view("sidebar", $data);
	
	}

	public function postByCat($catid=NULL){
		$data 	   = array();
		$tablePost = "post";
		$tableCat  = "category";

		$this->load->view("header");

		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		$this->load->view("search", $data);

		/* Category Post show */
		$postModel = $this->load->model("PostModel");
		$data['postbycat'] = $postModel->getPostByCat($tablePost, $tableCat, $catid);
		$this->load->view("postbycat", $data);

		/* sidebar category name and latest post title */
		#$catModel = $this->load->model("CatModel");
		#$data['catlist'] = $catModel->catList($tableCat);
		$data['latestpost'] = $postModel->getLatestPost($tablePost);
		$this->load->view("sidebar", $data);
	
	}

	public function search(){
		$this->load->view("header");

		$data 	   = array();
		$keyword   = $_REQUEST['keyword'];
		$cat       = $_REQUEST['cat'];

		$tablePost = "post";
		$tableCat  = "category";

		$catModel = $this->load->model("CatModel");
		$data['catlist'] = $catModel->catList($tableCat);
		$this->load->view("search", $data);

		/* search post show */
		$postModel = $this->load->model("PostModel");
		$data['postbysearch'] = $postModel->getPostBySearch($tablePost, $keyword, $cat);
		$this->load->view("searchresult", $data);

		/* sidebar category name and latest post title */
		#$catModel = $this->load->model("CatModel");
		#$data['catlist'] = $catModel->catList($tableCat);
		$data['latestpost'] = $postModel->getLatestPost($tablePost);
		$this->load->view("sidebar", $data);
	}
}
?>