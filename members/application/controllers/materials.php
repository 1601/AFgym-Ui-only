<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Materials extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('material_model');
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
		$data["title"] = "materials";
		$data["page_header"] = "materials";

		$data["material_ids"] = $this->material_model->get_dropdown('material_id', 'rm_itemCode', 'rawmaterials');
		$data["company_names"] =  $this->material_model->get_dropdown('material_id', 'rm_description', 'rawmaterials');
 		$data['count_all'] = $this->material_model->get_count('rawmaterials');
		
		$this->load->view("header", $data);
		$this->load->view("materials/aside", $data);
		$this->load->view($content, $data);
		$this->load->view("footer");
	}

	public function display($offset = 0, $sort_by = 'rm_itemCode', $sort_order = 'asc', $limit = 40){
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
			'material_id' => 'Material',
			'rm_itemCode' => 'Material Code',
			'rm_description' => 'Description',
			'rm_measurement' => 'Measurement',
		);
		
		$data['sort_columns'] = array('rm_itemCode', 'rm_description');
		$data['sort_by'] = in_array($sort_by, $data['sort_columns']) ? $sort_by : 'material_id';
		$data['sort_order'] = $sort_order == 'desc' ? 'desc' : 'asc';
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$filters = array();
		
		$results = $this->material_model->get_materials($data, $filters, $like, $string);
		
		$data['table'] = $results['rows'];
		$data['num_rows'] = $results['num_rows'];
		$data['showing'] = $results['showing'];

		$data['message'] = $this->session->flashdata('message');
		$data['num_pages'] = ceil($data['num_rows']/$limit);
		$data['function'] = "display";
		$data['table_head'] = "Materials";
		$data['match'] = $match;
		$data['string'] = $string;
		$this->template("materials/main", $data);
	}
	public function add_material(){
	    
	    //$this->session->userdata('user_id')
	    $insert= array(
	     	"rm_itemCode" => $this->input->post("code"),
	      	"rm_description" => $this->input->post("description"),
			"rm_measurement" => $this->input->post("measurement"),
	    );
	    
	    $this->material_model->insert_row($insert, 'rawmaterials');
		
		$material_id = $this->material_model->get_last_id('rm_itemCode', 'rawmaterials');
		
		$this->session->set_flashdata('message', 'Successfully Added Raw Materials ' . $material_id);
		redirect("materials");	
	}

	public function add(){
		//$data["material_types"] = $this->material_model->get_dropdown('materialType', 'materialType', 'materialTypes');
		//$data["location_ids"] = $this->material_model->get_dropdown('LocationID', 'LocationName', 'LocationList', array('isActive' => 1));
		$data = '';
		$this->load->view('materials/add', $data);
	}
	
	public function edit_material($id){
		$data = array(
	        "materialCode" => $this->input->post("code"),
	      	"name" => $this->input->post("name"),
			"description" => $this->input->post("description"),
			"contactDetails" => $this->input->post("contact_details")
		);
		$this->material_model->update_row($data, 'materials', array('material_id' => $id));
		$this->session->set_flashdata('message', 'Successfully Edited material ' .$id);
		redirect("materials");
	}
	
	public function deactivate_material($ID = "null"){
		if ($ID == "null") $ID = $this->input->post("material_id");
		$data["is_active"] = 0;
		$this->material_model->update_row($data, 'materials', array('material_id' => $ID));
		$this->session->set_flashdata('message', 'Successfully Deactivated material '.$ID);
		redirect("materials");	
	}
	
	public function view_material(){
		$id = $this->input->post('id');
		$data["id"] = $id;
		$data["material"] = $this->material_model->get_material($id);
		//$data["material_types"] = $this->material_model->get_dropdown('materialType', 'materialType', 'materialTypes');
		//$data["location_ids"] = $this->material_model->get_dropdown('LocationID', 'LocationName', 'LocationList', array('isActive' => 1));
		
		$this->load->view("materials/view", $data);
	}
	
}
	