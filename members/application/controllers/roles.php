<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('role_model');
	}

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if ( !isset($is_logged_in) || $is_logged_in != true){
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
		$data["title"] = "Roles";
		$data["page_header"] = "Roles";

		//$data["operator_ids"] = $this->role_model->get_dropdown('role_id', 'operator_id', 'Operators', array('is_active' => 1));
		//$data["operator_names"] =  $this->role_model->get_dropdown('operator_id', 'operator_name', 'Operators', array('is_active' => 1));

		$data['count_all'] = $this->role_model->get_count('Roles', array('is_active' => 1));

		$this->load->view("header", $data);
		$this->load->view("roles/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'role_id', $sort_order = 'asc', $limit = 40){
		if (!empty($_GET['search_string'])){
			$like = 'role_description';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'role_id' => 'Role ID',
			'role_description' => 'Description',
			'Date' => 'Date Modified',
			'created_by' => 'Modified By',
		);
		
		$data['sort_columns'] = array('role_id', 'role_description', 'Date');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'role_id';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array("is_active" => 1);
		
		$results = $this->role_model->get_roles($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Roles";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("roles/main", $data);
	}
	
	public function add_roles(){
	   
	}

	public function add(){
		$data = '';
		$this->load->view('operators/add', $data);	
	}
	
	public function edit_role($id){
			
		//print_r($id);
		//echo "<br>";
		$check = $this->input->post("operator_name");
		//print_r($check);
		//echo "<br>";
		$checked=array(""=>"");
		foreach ($check as $key => $value) {
			 $checked[$value]=$key;
		}
		//print_r($checked);
		//echo "<br>";
		$avail = $this->role_model->get_available($id);
		$array_available = array(""=>"");
		foreach ($avail as $row){
			$array_available[$row->Function] = $row->Status;
		}
		//print_r($array_available);
		//echo "<br>";
		
		$deactivated = $this->role_model->get_deactivated($id);
		$array_deactivated = array ("" => "");
		foreach ($deactivated as $row){
			$array_deactivated[$row->Function] = $row->Status;
		}
		//print_r($array_deactivated);
		
		$fun=0;
		for ($i=0; $i<$this->role_model->get_countfunction() ;$i++){
			//print_r($fun);
			$fun++;
			$insert= array(
		     	"Function" => $fun,
		      	"Description" => $this->role_model->get_functiondescription($fun),
				"Role" => $id,
				"Status" => 1
	    	);
	    	
			$update= array(
		     	"Function" => $fun,
		      	"Description" => $this->role_model->get_functiondescription($fun),
				"Role" => $id,
				"Status" => 0
	    	);
			//checked but not in the database
			if (!array_key_exists($fun, $array_available) &&  array_key_exists($fun,$checked) && !array_key_exists($fun,$array_deactivated)){
				$this->role_model->insert_row($insert, 'rolefunc');
			}
			//checked but deactivated in the database
			else if (!array_key_exists($fun, $array_available) && array_key_exists($fun, $checked) && array_key_exists($fun,$array_deactivated)){
				$this->role_model->update_row($insert, 'rolefunc', array('Role' => $id,'Function' => $fun));
			}
			//not checked but in the database
			else if (array_key_exists($fun, $array_available) && !array_key_exists($fun, $checked) && !array_key_exists($fun,$array_deactivated)){
				$this->role_model->update_row($update, 'rolefunc', array('Role' => $id,'Function' => $fun));
			}
		}
		$firstname = $this->session->userdata('first_name');
		$lastname = $this->session->userdata('last_name');
		$data = array(
	        "date_added" => date('Y-m-d H:i:s'),
			"created_by" => $firstname . " " . $lastname
		);
		$this->role_model->update_row($data, 'roles', array('role_id' => $id));
		
		$this->session->set_flashdata('message', 'Successfully Edited Role: ' .$this->role_model->get_roledescription($id));
		redirect("roles");
	}
	
	public function view_role(){
		$id = $this->input->post('id');
		$avail = $this->role_model->get_available($id);
		$array = array(""=>"");
		foreach ($avail as $row){
			$array[$row->Function] = $row->Status;
		}
		//print_r($array);
		$data['available'] = $array;
		$data["id"] = $id;
		$data["role"] = $this->role_model->get_role($id);
		$data["description"] = $this->role_model->get_roledescription($id);
		//echo "view role works!";
		$this->load->view("roles/view", $data);
	}
	
}
	