<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*LOGIN CONTROLLER*/


class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->is_logged_in();
	}
	public function is_logged_in(){
		if (!$this->session->userdata('is_logged_in')){
			// redirect("cPanel/");
			// die();
		}
	}
	public function index(){
		$this->view_login();
	}
	
	public function view_login($error = ""){
		$data["title"] = "Log in";
		$data["error"] = $error;
		$this->load->view("login", $data);
	}

	public function validate_credentials(){
		$username = $this->input->post('username');
		$password = MD5($this->input->post ('password'));
		
		if ($this->user_model->can_log_in($username, $password)){ // checks if user is active
			$user_id =  $this->user_model->get_id($username,$password);
			$user_name =  $this->user_model->get_value('username', 'userlist', array('username' => $username));
			//$user_type =  $this->user_model->get_value('UserType', 'userlist', array('username' => $username));
			$user_fname = $this->user_model->get_value('firstname', 'userlist', array('username' => $username));
			$user_lname = $this->user_model->get_value('lastname', 'userlist', array('username' => $username));
			$data = array(
				'is_logged_in' => TRUE,
				'user_id' => $user_id,
				'user_name' => $user_name,
				'first_name' => $user_fname,
				'last_name' => $user_lname
				//'functionalities' => $array_available
			);
			
			$this->session->set_userdata($data);
			//print_r($this->session->userdata('functionalities'));
			redirect("users/");
		}
		else{
			$this->view_login("Incorrect Username or Password");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login/');
	}
}