<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
      parent::__construct();
	date_default_timezone_set('Asia/Manila'); 
    }

	public function get_meta($data){
		//$data["user_id"] = $this->session->userdata("user_id");
		//$data["user_type"] = $this->session->userdata("user_type");
		//$data["user_name"] = $this->user_model->get_user($this->session->userdata("user_id"));
		//$data["functions"] = $this->user_model->get_list("FunctionID", "RolesFunctionsLink", array("RoleID" => $data["user_type"]));
		
		$data['user_name'] = "Marciliano Chavez";
		$data["user_type"] = 7;
		return $data;
	}

	public function get_functions(){
		return $this->user_model->get_list("FunctionID", "RolesFunctionsLink", array("RoleID" => $this->session->userdata("user_type")));
	}

	public function download($query, $fields, $filename){
		$array =array(); 
		$stack = array();
		foreach ($fields as $head => $name) {
			array_push($stack, $name);
		}
		array_push($array, $stack);

		foreach ($query as $row) {
			$rows = array();
			foreach ($fields as $head => $value)
				array_push($rows, $row->$head);\
			array_push($array, $rows);
		}
		
		$this->load->helper('csv');
		array_to_csv($array, $filename);
	}
}