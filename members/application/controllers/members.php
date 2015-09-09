<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('member_model');
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
		$data["title"] = "Members";
		$data["page_header"] = "Members Management";
		$data["member_ids"] = $this->member_model->get_dropdown('member_id', 'member_id', 'members', array('is_active' => 1));
		$data["lastnames"] =  $this->member_model->get_dropdown('member_id', 'LastName', 'members', array('is_active' => 1));
		$data['count_all'] = $this->member_model->get_count('members', array('is_active' => 1));
		
		//$can_access = $this->session->memberdata('functionalities');
		//$data['showadd'] = array_key_exists(20, $can_access);
		//$data['showdeactivate'] = array_key_exists(20, $can_access);

		$this->load->view("header", $data);
		$this->load->view("members/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'member_id', $sort_order = 'asc', $limit = 40){
		if (!empty($_GET['search_string'])){
			$like = 'membername';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'member_id' => 'member ID',
			'LastName' => 'Last name',
			'FirstName' => 'First name',
			'Username' => 'Username',
			'Date_Started' => 'Date Started',
			'Address' => 'Home Address',
			'ContactNumber' => 'Contact Number'

		);
		
		$data['sort_columns'] = array('member_id', 'FirstName', 'LastName');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'lastname';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array("is_active" => 1);
		
		$results = $this->member_model->get_members($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "List of members";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("members/main", $data);
	}
	
	public function add_members(){
	    $insert= array(
	    	"Username" => $this->input->post("Username"),
	     	"Password" => MD5($this->input->post("Password")),
	     	"FirstName" => $this->input->post("FirstName"),
	     	"LastName" => $this->input->post("LastName"),
	      	"Address" => $this->input->post("Address"),
			"ContactNumber" => $this->input->post("ContactNumber"),
			"Date_Started" => date("Y-m-d H:i:s"),
			//"Position" => $this->input->post("type"),
			"is_active" => 1
	    );
		$member_id = 1 + $this->member_model->get_last_id('member_id', 'members');
		$this->member_model->insert_row($insert, 'members');
		$this->session->set_flashdata('message', 'Successfully Created member ' . $member_id);
		redirect("members");	
	}
	
	public function add_function($function, $role){
		$insert= array(
	    	"membername" => $function,
	     	"Password" => $role,
	     	"Status" => 1
		);
		$this->member_model->insert_row($insert, 'RoleFunc');
		$this->session->set_flashdata('message', 'Successfully Edited Functionality' . $this->member_model->get_roleDescription($role));
		redirect("members");	
	}

	public function add(){
		$data = '';
		$this->load->view('members/add', $data);
	}
	
	public function edit_member($id){
			$password = $this->input->post("Password");
			if ($password==""){
				$insert= array(
			     	"firstname" => $this->input->post("FirstName"),
			     	"lastname" => $this->input->post("LastName"),
			     	"Username" => $this->input->post("Username"),
			     	//"Password" => $password,
		    	);
			}
			else {
				$insert= array(
			     	"firstname" => $this->input->post("FirstName"),
			     	"lastname" => $this->input->post("LastName"),
			     	"Username" => $this->input->post("Username"),
			     	"Password" => MD5($password),
		    	);
			}
			$this->member_model->update_row($insert, 'member', array('membername' => $id));
			$this->session->set_flashdata('message', 'Successfully Edited member ' .$id);
		redirect("members");
	}
	
	public function deactivate_member($ID = "null"){
		if ($ID == "null")
			$ID = $this->input->post("member_id");
			$data["is_active"] = 0;
			$this->member_model->update_row($data, 'members', array('member_id' => $ID));
			$this->session->set_flashdata('message', 'Successfully Deactivated member '.$ID);
			redirect("members");	
	}
	
	public function payroll($id){
		$data = array(
			"member_id" => $id,
			"Salary" => $this->input->post('Salary'),
			"Deduction" => $this->input->post('Deduction'),
			"date_released" => date("Y-m-d H:i:s")
		);
		$this->member_model->insert_row($data, 'payroll');
		$this->session->set_flashdata('message', 'Payroll Released for member #000'. $id);
		redirect("members");
	}
	
	public function view_member(){
		$id = $this->input->post('id');
		$data["id"] = $id;
		$data["member"] = $this->member_model->get_member($id);
		$this->load->view("members/view", $data);
	}

	public function pr($offset = 0, $sort_by = 'payroll_id', $sort_order = 'desc', $limit = 40){
		
		if (!empty($_GET['search_string'])){
			$like = 'payroll_id';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'payroll_id' => 'Payroll',
			'member_id' => 'member_id',
			'salary' => 'Salary',
			'deduction' => 'Deduction',
			'date_released' => 'Date Released'

		);
		
		$data['sort_columns'] = array('payroll_id', 'member_id', 'date_released');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'lastname';
		$data['sort_order'] = $sort_order == 'asc' ? 'asc' : 'desc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array();
		
		$results = $this->member_model->get_payrolls($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Payroll";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->load->view("members/payroll", $data);
	}

}
	

	