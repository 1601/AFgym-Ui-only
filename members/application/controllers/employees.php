<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('employee_model');
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
		$data["title"] = "Employee";
		$data["page_header"] = "Employees Management";
		$data["employee_ids"] = $this->employee_model->get_dropdown('employee_id', 'employee_id', 'employees', array('isActive' => 1));
		$data["lastnames"] =  $this->employee_model->get_dropdown('employee_id', 'LastName', 'employees', array('isActive' => 1));
		$data['count_all'] = $this->employee_model->get_count('employees', array('isActive' => 1));
		
		//$can_access = $this->session->employeedata('functionalities');
		//$data['showadd'] = array_key_exists(20, $can_access);
		//$data['showdeactivate'] = array_key_exists(20, $can_access);

		$this->load->view("header", $data);
		$this->load->view("employees/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'employee_id', $sort_order = 'asc', $limit = 40){
		if (!empty($_GET['search_string'])){
			$like = 'employeename';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'employee_id' => 'Employee ID',
			'LastName' => 'Last name',
			'FirstName' => 'First name',
			'Username' => 'Username',
			'DateStarted' => 'Date Started',
			'Address' => 'Home Address',
			'ContactNumber' => 'Contact Number'

		);
		
		$data['sort_columns'] = array('employee_id', 'FirstName', 'LastName');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'lastname';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array("isActive" => 1);
		
		$results = $this->employee_model->get_employees($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "List of Employees";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("employees/main", $data);
	}
	
	public function add_employees(){
	    $insert= array(
	    	"Username" => $this->input->post("Username"),
	     	"Password" => MD5($this->input->post("Password")),
	     	"FirstName" => $this->input->post("FirstName"),
	     	"LastName" => $this->input->post("LastName"),
	      	"Address" => $this->input->post("Address"),
			"ContactNumber" => $this->input->post("ContactNumber"),
			"DateStarted" => date("Y-m-d H:i:s"),
			//"Position" => $this->input->post("type"),
			"isActive" => 1
	    );
		$employee_id = 1 + $this->employee_model->get_last_id('employee_id', 'employees');
		$this->employee_model->insert_row($insert, 'employees');
		$this->session->set_flashdata('message', 'Successfully Created Employee ' . $employee_id);
		redirect("employees");	
	}
	
	public function add_function($function, $role){
		$insert= array(
	    	"employeename" => $function,
	     	"Password" => $role,
	     	"Status" => 1
		);
		$this->employee_model->insert_row($insert, 'RoleFunc');
		$this->session->set_flashdata('message', 'Successfully Edited Functionality' . $this->employee_model->get_roleDescription($role));
		redirect("employees");	
	}

	public function add(){
		$data = '';
		$this->load->view('employees/add', $data);
	}
	
	public function edit_employee($id){
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
			$this->employee_model->update_row($insert, 'employee', array('employeename' => $id));
			$this->session->set_flashdata('message', 'Successfully Edited employee ' .$id);
		redirect("employees");
	}
	
	public function deactivate_employee($ID = "null"){
		if ($ID == "null")
			$ID = $this->input->post("employee_id");
			$data["isActive"] = 0;
			$this->employee_model->update_row($data, 'employees', array('employee_id' => $ID));
			$this->session->set_flashdata('message', 'Successfully Deactivated Employee '.$ID);
			redirect("employees");	
	}
	
	public function payroll($id){
		$data = array(
			"employee_id" => $id,
			"Salary" => $this->input->post('Salary'),
			"Deduction" => $this->input->post('Deduction'),
			"date_released" => date("Y-m-d H:i:s")
		);
		$this->employee_model->insert_row($data, 'payroll');
		$this->session->set_flashdata('message', 'Payroll Released for Employee #000'. $id);
		redirect("employees");
	}
	
	public function view_employee(){
		$id = $this->input->post('id');
		$data["id"] = $id;
		$data["employee"] = $this->employee_model->get_employee($id);
		$this->load->view("employees/view", $data);
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
			'employee_id' => 'employee_id',
			'salary' => 'Salary',
			'deduction' => 'Deduction',
			'date_released' => 'Date Released'

		);
		
		$data['sort_columns'] = array('payroll_id', 'employee_id', 'date_released');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'lastname';
		$data['sort_order'] = $sort_order == 'asc' ? 'asc' : 'desc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array();
		
		$results = $this->employee_model->get_payrolls($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Payroll";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->load->view("employees/payroll", $data);
	}

}
	