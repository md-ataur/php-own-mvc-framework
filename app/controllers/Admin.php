<?php
	class Admin extends AController{
		public function __construct(){
			parent::__construct();
			Session::checkSession();
		}

		public function Index(){
			$this->home();
		}

		public function home(){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

			$data['user'] = array(
				"username" => Session::get('username')
			);

			$this->load->view('admin/home', $data);
			$this->load->view('admin/footer');

		}

		/* Category Add */
		public function addCat(){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');
			$this->load->view("admin/addcategory");
			$this->load->view('admin/footer');
		}

		public function insertCategory(){
			$this->load->view("admin/header");
			$table = 'category';
			$name  = $_POST['name'];
			$title = $_POST['title'];

			$data = array(
				'name'  => $name,
				'title' => $title
			);
			$catModel = $this->load->model("CatModel");
			$result = $catModel->catInsert($table, $data);
			//echo $result;
			//exit();

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color: green; font-size: 17px; margin: 0 0 7px; display: block;'>Category Successfully Added </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Category Not Added </span>";
			}
			
			$url = BASE_URL."/Admin/categorylist?msg=".urlencode(serialize($msdata));
			header("Location: $url");
		}


		/* All Category show */
		public function categoryList(){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

			$table = 'category';
			$data = array();
			$catModel = $this->load->model("CatModel");
			$data['cat'] = $catModel->catList($table);

			$this->load->view("admin/categorylist", $data);
			$this->load->view('admin/footer');

		}

		/* Category fetch and show  */
		public function editCategory($id=NULL){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

			$table = 'category';
			$data = array();
			$catModel = $this->load->model("CatModel");
			$data['getCatData'] = $catModel->catById($table, $id);
			$result = $this->load->view("admin/editcategory", $data);

			$this->load->view('admin/footer');

		}

		/* Category update */
		public function updateCategory($id=NULL){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

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
				$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>Category Updated Successfully </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Category Not Updated ! </span>";
			}
			$url = BASE_URL."/Admin/categorylist?msg=".urlencode(serialize($msdata));
			header("Location: $url");

			$this->load->view('admin/footer');
		}


		/* Delete Category */
		public function deleteCategory($id=NULL){
			$table = "category";
			$cond  = "id = $id";

			$catModel = $this->load->model("CatModel");
			$result = $catModel->catDelete($table, $cond);
			//echo $result;
			//exit();

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>Category Deleted Successfully </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Category Not Deleted ! </span>";
			}
			$url = BASE_URL."/Admin/categorylist?msg=".urlencode(serialize($msdata));
			header("Location: $url");
		}


		/* Post Add */
		public function addArticle(){
			$tableCat  = "category";	

			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');
					
			$catModel = $this->load->model("CatModel");
			$data['catlist'] = $catModel->catList($tableCat);
			$this->load->view("admin/addpost", $data);

			$this->load->view('admin/footer');
		}
		
		public function addPost(){
			if(!($_POST)){
				header("Location: ".BASE_URL."/Admin/addArticle");
			}
			$input = $this->load->validation("AForm");
			$table = 'post';
			
			$input->post('title')
				  ->isEmpty()
				  ->length(10, 200);

			$input->post('content')
				  ->isEmpty();
				  
			$input->post('cat')
				  ->isCatEmpty();	  

			if ($input->submit()) {
				$title    = $input->values['title'];
				$content  = $input->values['content'];
				$cat      = $input->values['cat'];

				$data = array(
					'title'    => $title,
					'content'  => $content,
					'cat'      => $cat
				);
				$postModel = $this->load->model("PostModel");
				$result = $postModel->insertPost($table, $data);
				//echo $result;
				//exit();

				$msdata = array();
				if ($result == 1) {
					$msdata['msg'] = "<span style='color: green; font-size: 17px; margin: 0 0 7px; display: block;'>Post Successfully Added </span>";
				}else{
					$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'>Post Not Added </span>";
				}
				
				$url = BASE_URL."/Admin/articlelist?msg=".urlencode(serialize($msdata));
				header("Location: $url");
			
			} else {
				$data["postErrors"] = $input->errors;
				$tableCat  = "category";
				$this->load->view("admin/header");
				$this->load->view('admin/sidebar');
				$catModel = $this->load->model("CatModel");
				$data['catlist'] = $catModel->catList($tableCat);
				$this->load->view("admin/addpost", $data);
				$this->load->view('admin/footer');
			}
		}

		/* Post list */
		public function articleList(){
			$tableCat  = "category";
			$tablePost = "post";

			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

			$postModel = $this->load->model("PostModel");
			$data['getallpost'] = $postModel->getPostList($tablePost);

			$catModel = $this->load->model("CatModel");
			$data['catlist'] = $catModel->catList($tableCat);
			$this->load->view("admin/articlelist", $data);

			$this->load->view('admin/footer');
		}

		/* edit post and update */
		public function editArticle($id=NULL){
			$tableCat  = "category";
			$tablePost = "post";

			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');

			$postModel = $this->load->model("PostModel");
			$data['postbyid'] = $postModel->PostById($tablePost, $id);

			$catModel = $this->load->model("CatModel");
			$data['catlist'] = $catModel->catList($tableCat);
			$this->load->view("admin/editpost", $data);

			$this->load->view('admin/footer');
		}

		public function updatePost($id=NULL){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');
			$input = $this->load->validation("AForm");
			$table = 'post';
			
			$input->post('title');
			$input->post('content');
			$input->post('cat');
			
			$cond = "id = $id";
			$title    = $input->values['title'];
			$content  = $input->values['content'];
			$cat      = $input->values['cat'];

			$data = array(
				'title'    => $title,
				'content'  => $content,
				'cat'      => $cat
			);

			$postModel = $this->load->model("PostModel");
			$result = $postModel->postUpdate($table, $data, $cond);

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>Post Updated Successfully </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Post Not Updated ! </span>";
			}
			$url = BASE_URL."/Admin/articlelist?msg=".urlencode(serialize($msdata));
			header("Location: $url");

			$this->load->view('admin/footer');
		}


		public function deleteArticle($id=NULL){
			$tablepost = "post";
			$cond  	   = "id = $id";

			$postModel = $this->load->model("PostModel");
			$result = $postModel->postDelete($tablepost, $cond);
			//echo $result;
			//exit();

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>Post Deleted Successfully </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Post Not Deleted ! </span>";
			}
			$url = BASE_URL."/Admin/articlelist?msg=".urlencode(serialize($msdata));
			header("Location: $url");
		}



		/* UI Option */
		public function uioption(){
			$tableUi = 'ui';
			$uiModel = $this->load->model("UIModel");
			$data['bgcolor'] = $uiModel->getColor($tableUi);

			$this->load->view("admin/header", $data);
			$this->load->view('admin/sidebar');
			$this->load->view("admin/uioption", $data);
			$this->load->view('admin/footer');
		}

		public function updateUI(){
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');
			$input  = $this->load->validation("AForm");
			$tableUi = 'ui';
			$input->post('color');

			$id = 1;
			$cond     = "id = $id";
			$color    = $input->values['color'];
			
			$data = array(
				'color'    => $color
			);

			$uiModel = $this->load->model("UIModel");
			$result = $uiModel->uiUpdate($tableUi, $data, $cond);

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>Color Updated Successfully </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> Color Not Updated ! </span>";
			}
			$url = BASE_URL."/Admin/uioption?msg=".urlencode(serialize($msdata));
			header("Location: $url");

			$this->load->view('admin/footer');
		}

	}
?>