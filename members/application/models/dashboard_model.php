<?php
class Dashboard_model extends MY_Model{
	
    public function get_users($config, $filters, $like, $match){ //($config, $filters, $like, $match)
		$query = $this->db->select('userlist.*', FALSE)
					  ->from('userlist')
					  ->where($filters);
		if($like != '')$query = $this->db->like($like, $match);
		$query = $this->db->order_by($config['sort_by'], $config['sort_order'])
					  ->limit($config['limit'], $config['offset'])
					  ->get();
					  
		$num_rows = $query->num_rows();

		if ($num_rows == 0){
			$ret['num_rows'] = $num_rows;
			$ret['rows'] = 'No results Found';
		}else{
			$ret['num_rows'] = $this->get_count('userlist', $filters, $like, $match); // ('Operators', $filters, $like, $match)
			$ret['rows'] = $query->result();
		}

		$ret['showing'] = $num_rows;
		return $ret;
    }
	
	public function get_id($username, $password){
  		$q = $this->db->select("username")
					  ->where("Username", $username)
					  ->where("Password", $password)
					  ->get("userlist")->row();
				 
		$name = $q->username;
		return $name;
	}
	
	public function can_log_in($username, $password){
		$this -> db -> select('*');
   		$this -> db -> from('userlist');
		$this -> db -> where('isActive', 1);
   		$this -> db -> where('username', $username);
  		$this -> db -> where('password', $password);
		$query = $this -> db -> get();
		
		if ($query->num_rows() == 1){
			//$this->session->set_userdata('logged_in', $sess_array);
			return TRUE;
		}
		
		return FALSE;
	}

    public function get_name($user_id){
  		$q = $this->db->select("FirstName, LastName")
					  ->where("username", $user_id)
					  ->get("userlist")->row();
				 
		$name = $q->Firstname ." ". $q->Lastname;
		return $name;
	}
	
	public function get_userType($user_id){
  		$q = $this->db->select("UserType")
					  ->where("username", $user_id)
					  ->get("userlist")->row();
		
		return $q->UserType;
	}
	
	public function get_allfunctions(){ //get all function
		$rows = $this->db->select("FunctionID, Description")
						 ->from("Functions")
						 ->get()->result();
						 
		$function = array("" => "");
		foreach($rows as $row){
			$function[$row->FunctionID] = $row->Description;
		}
		return $function;
	}


	public function update_user($id, $data){//update customer
		$this->db->where("username", $id);		
		$this->db->update('userlist', $data);
	}

	public function get_password($id){
		$q = $this->db->select("Password, username")
										->from("userlist")
										->where("username", $id)
										->get()->row();
		return $q->Password;
	}

	public function update_status($id){
		$new = array("isActive" => 0);

		$this->db->where("username", $id);		
		$this->db->update('userlist', $new);
	}

	public function get_allroles(){	//get all usertype
		$rows = $this->db->select("role_id, role_description")
						 ->from("Roles")
						 ->get()->result();
						 
		$roles = array("" => "");
		foreach($rows as $row){
			$roles[$row->role_id] = $row->Description;
		}
		return $roles;
	}
	
	public function get_rolesAndFunctions(){
		$rows = $this->db->select("Role, Function")
						 ->from("rolefunc")
						 ->where("Status", 1)
						 ->get()->result();
		$available = array("" => "");
		foreach ($rows as $row) {
			$available[$row->Role] = $row->Function;
		}
		return $available;
	}
	
	
	
	public function get_roleFunctions($id){
		if($type > 0)
			$filters = array("is_active" => 1, "operator_type" => $type);
		else
			$filters = array("is_active" => 1);
		$query = $this->db->select('Operators.*, Date(date_added) as Date', FALSE)
					  ->from('Operators')
					  ->where($filters)
					  ->get();
					  
		$num_rows = $query->num_rows();

		if ($num_rows == 0){
			$ret['num_rows'] = $num_rows;
			$ret['rows'] = 'No results Found';
		}else{
			$ret['num_rows'] = $num_rows;
			$ret['rows'] = $query->result();
		}

		$ret['showing'] = $num_rows;
		return $ret;
		
	}
	
	public function get_user($id){ 
		return $this->db->select('userlist.*', FALSE) 
						->from("userlist")
						->where('username', $id)
						->get()->result();
	}
	
}