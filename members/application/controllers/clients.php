<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clients extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('client_model');
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
		$data["title"] = "clients";
		$data["page_header"] = "clients";

		$data["client_ids"] = $this->client_model->get_dropdown('client_id', 'clientCode', 'clients');
		$data["company_names"] =  $this->client_model->get_dropdown('client_id', 'name', 'clients');
 		$data['count_all'] = $this->client_model->get_count('clients');
		
		$this->load->view("header", $data);
		$this->load->view("clients/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'clientCode', $sort_order = 'asc', $limit = 40){
		if (!empty($_GET['search_string'])){
			$like = 'company_name';
			$string = $_GET['search_string'];
			$match = '?search_string=' . $string;
		}else{
			$like = '';
			$match = '';
			$string = '';
		}

		$data['fields'] = array(
			'client_id' => 'Client',
			'clientCode' => 'Client Code',
			'name' => 'Name',
			'description' => 'Description',
			'contactDetails' => 'Contact Information',
		);
		
		$data['sort_columns'] = array('clientCode', 'name');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'client_id';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array();
		
		$results = $this->client_model->get_clients($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Clients";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("clients/main", $data);
	}
	public function add_client(){
	    
	    //$this->session->userdata('user_id')
	    $insert= array(
	     	"clientCode" => $this->input->post("code"),
	      	"name" => $this->input->post("name"),
			"description" => $this->input->post("description"),
			"contactDetails" => $this->input->post("contact_details")
	    );
	    
	    $this->client_model->insert_row($insert, 'clients');
		
		$client_id = $this->client_model->get_last_id('clientCode', 'clients');
		
		$this->session->set_flashdata('message', 'Successfully Created a client ' . $client_id);
		redirect("clients");	
	}

	public function add(){
		//$data["client_types"] = $this->client_model->get_dropdown('clientType', 'clientType', 'clientTypes');
		//$data["location_ids"] = $this->client_model->get_dropdown('LocationID', 'LocationName', 'LocationList', array('isActive' => 1));
		$data = '';
		$this->load->view('clients/add', $data);	
	}
	
	public function edit_client($id){
		$data = array(
	        "clientCode" => $this->input->post("code"),
	      	"name" => $this->input->post("name"),
			"description" => $this->input->post("description"),
			"contactDetails" => $this->input->post("contact_details")
		);
		$this->client_model->update_row($data, 'clients', array('client_id' => $id));
		$this->session->set_flashdata('message', 'Successfully Edited client ' .$id);
		redirect("clients");
	}
	
	public function deactivate_client($ID = "null"){
		if ($ID == "null") $ID = $this->input->post("client_id");
		$data["is_active"] = 0;
		$this->client_model->update_row($data, 'clients', array('client_id' => $ID));
		$this->session->set_flashdata('message', 'Successfully Deactivated client '.$ID);
		redirect("clients");	
	}
	
	public function view_client(){
		$id = $this->input->post('id');
		$can_access = $this->session->userdata('functionalities');
		$data["id"] = $id;
		$data["client"] = $this->client_model->get_client($id);
		$data["locations"] = $this->client_model->get_locations($id);
		//$data["client_types"] = $this->client_model->get_dropdown('clientType', 'clientType', 'clientTypes');
		//$data["location_ids"] = $this->client_model->get_dropdown('LocationID', 'LocationName', 'LocationList', array('isActive' => 1));
		
		$this->load->view("clients/view", $data);
	}
	
}
	