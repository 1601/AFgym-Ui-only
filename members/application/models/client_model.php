<?php

class Client_model extends MY_Model{

    public function get_clients($config, $filters, $like, $match){ //($config, $filters, $like, $match)
		$query = $this->db->select('clients.*', FALSE)
					  ->from('clients')
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
			$ret['num_rows'] = $this->get_count('clients', $filters, $like, $match); // ('clients', $filters, $like, $match)
			$ret['rows'] = $query->result();
		}

		$ret['showing'] = $num_rows;
		return $ret;
    }

	public function get_client($id){ // get client by id
		return $this->db->select('clients.*', FALSE) // , CONCAT(UserList.FirstName," ",UserList.LastName) as Name
						->from("clients")
						->where('client_id', $id)
						//->join('UserList', 'UserList.UserID = clientList.CreatedBy')
						->get()->result();
	}
}