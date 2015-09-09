<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('user_model');
	}

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (false){//!isset($is_logged_in) || $is_logged_in != true){
			echo "<h1>Access Denied</h1>
        		  <p>You have no permission to access this page. <a href = '". base_url() ."login'>Login</a></p>";
			die();
		}
	}

	public function index(){
		$this->display();
	}
	
	public function template($content, $data = ''){
		$data = $this->get_meta($data);
		$data["title"] = "Admin";
		$data["page_header"] = "Administration Table";
		$data["user_ids"] = $this->user_model->get_dropdown('UserID', 'Lastname', 'userlist', array('isActive' => 1));
		$data["user_names"] =  $this->user_model->get_dropdown('UserID', 'UserID', 'userlist', array('isActive' => 1));
		$data['count_all'] = $this->user_model->get_count('userlist', array('isActive' => 1));
		
		//$can_access = $this->session->userdata('functionalities');
		//$data['showadd'] = array_key_exists(20, $can_access);
		//$data['showdeactivate'] = array_key_exists(20, $can_access);

		$this->load->view("header", $data);
		$this->load->view("users/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'Username', $sort_order = 'asc', $limit = 40){
		if (!empty($_GET['search_string'])){
			$like = 'Username';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'UserID' => 'User ID',
			'LastName' => 'Last name',
			'FirstName' => 'First name',
			'Username' => 'Username',
			'DateAdded' => 'Date Started',
			'Address' => 'Home Address'

		);
		
		$data['sort_columns'] = array('username', 'FirstName', 'LastName');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'lastname';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array("isActive" => 1);
		
		$results = $this->user_model->get_users($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Administration";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("users/main", $data);
	}
	
	public function add_users(){
	    $insert= array(
	    	"Username" => $this->input->post("Username"),
	     	"Password" => MD5($this->input->post("Password")),
	     	"FirstName" => $this->input->post("FirstName"),
	     	"LastName" => $this->input->post("LastName"),
	      	"Address" => $this->input->post("Address"),
			"ContactNumber" => $this->input->post("ContactNumber"),
			"DateAdded" => date("Y-m-d"),
			"isActive" => 1
	    );
		$user_id = 1 + $this->user_model->get_last_id('UserID', 'userlist');
		$this->user_model->insert_row($insert, 'userlist');
		$this->session->set_flashdata('message', 'Successfully Created User ' . $user_id . $this->input->post("Password"));
		redirect("users");	
	}
	
	public function add_function($function, $role){
		$insert= array(
	    	"Username" => $function,
	     	"Password" => $role,
	     	"Status" => 1
		);
		$this->user_model->insert_row($insert, 'RoleFunc');
		$this->session->set_flashdata('message', 'Successfully Edited Functionality' . $this->user_model->get_roleDescription($role));
		redirect("users");	
	}

	public function add(){
		$data = '';
		$this->load->view('users/add', $data);
	}
	
	public function edit_user($id){
			$password = $this->input->post("Password");
			if ($password==""){
				$insert= array(
			     	"firstname" => $this->input->post("FirstName"),
			     	"lastname" => $this->input->post("LastName"),
			     	"username" => $this->input->post("Username"),
			     	//"Password" => $password,
		    	);
			}
			else {
				$insert= array(
			     	"firstname" => $this->input->post("FirstName"),
			     	"lastname" => $this->input->post("LastName"),
			     	"Username" => $this->input->post("Username"),
			     	"password" => MD5($password),
		    	);
			}
			$this->user_model->update_row($insert, 'user', array('username' => $id));
			$this->session->set_flashdata('message', 'Successfully Edited User ' .$id);
		redirect("users");
	}
	
	public function deactivate_user($ID = "null"){
		if ($ID == "null") 
			$ID = $this->input->post("UserID");
		$data["isActive"] = 0;
		$this->user_model->update_row($data, 'user', array('UserID' => $ID));
		$this->session->set_flashdata('message', 'Successfully Deactivated User '.$ID);
		redirect("users");	
	}
	
	public function view_users(){
		$id = $this->input->post('id');
		$data["id"] = $id;
		$data["user"] = $this->user_model->get_user($id);
		$this->load->view("users/view", $data);
	}
}
	