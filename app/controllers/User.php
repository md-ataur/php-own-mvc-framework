<?php
/**
* User controller
*/
class User extends AController{

	function __construct(){
		parent::__construct();
		Session::init();
	}

	/* add user */
	public function addUser(){

		$this->load->view("admin/header");
		$this->load->view('admin/sidebar');
		$this->load->view("admin/adduser");
		$this->load->view('admin/footer');
	}


	public function insertUser(){
		if (!($_POST)) {
			header("Location: ".BASE_URL."User/adduser");
		} 

		$input = $this->load->validation("AForm");
		$tableUser = 'user';
		
		$input->post('username')
			  ->isEmpty();

		$input->post('password')
			  ->isEmpty()
			  ->length(4, 15);
			  
		$input->post('level')
			  ->isCatEmpty();	  

		if ($input->submit()) {
			$username  = $input->values['username'];
			$password  = md5($input->values['password']);
			$level     = $input->values['level'];

			$data = array(
				'username'  => $username,
				'password'  => $password,
				'level'     => $level
			);
			$userModel = $this->load->model("UserModel");
			$result    = $userModel->userInsert($tableUser, $data);
			//echo $result;
			//exit();

			$msdata = array();
			if ($result == 1) {
				$msdata['msg'] = "<span style='color: green; font-size: 17px; margin: 0 0 7px; display: block;'>User Successfully Added </span>";
			}else{
				$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'>User Not Added </span>";
			}
			
			$url = BASE_URL."/User/userlist?msg=".urlencode(serialize($msdata));
			header("Location: $url");
		
		}else {
			$data["userErrors"] = $input->errors;
			$this->load->view("admin/header");
			$this->load->view('admin/sidebar');
			$this->load->view("admin/adduser", $data);
			$this->load->view('admin/footer');
		}
	}


	/* user list */
	public function userList(){
		$this->load->view("admin/header");
		$this->load->view('admin/sidebar');
		$tableUser = 'user';
		$data = array();
		$userModel = $this->load->model("UserModel");
		$data['userlist'] = $userModel->userList($tableUser);
		$this->load->view("admin/userlist", $data);
		$this->load->view('admin/footer');
	}

	/* Delete user */
	public function deleteUser($id=NULL){
		$tableUser = "user";
		$cond  	   = "id = $id";

		$userModel = $this->load->model("UserModel");
		$result    = $userModel->userDelete($tableUser, $cond);
		//echo $result;
		//exit();

		$msdata = array();
		if ($result == 1) {
			$msdata['msg'] = "<span style='color:green; font-size: 17px; margin: 0 0 7px; display: block;'>User Deleted Successfully </span>";
		}else{
			$msdata['msg'] = "<span style='color:red; font-size: 17px; margin: 0 0 7px; display: block;'> User Not Deleted ! </span>";
		}
		$url = BASE_URL."/User/userlist?msg=".urlencode(serialize($msdata));
		header("Location: $url");
	}


}	