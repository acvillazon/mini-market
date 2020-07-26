<?php
class UsuarioModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function list(){
		$query = $this->db->query('
			SELECT * FROM  user AS u INNER JOIN  role AS r ON u.role_id = r.id_role');
		return $query->result();
	}
	
	public function user($id){
		$query = $this->db->query('
			SELECT * FROM  user AS u 
			INNER JOIN  role AS r 
			ON u.role_id = r.id_role WHERE id_user='.$id." AND u.state=1");
		return $query->row();
	}
	
	public function store_user(){

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'age' => $this->input->post('age'),
			'address' => $this->input->post('address'),
			'password' => $this->input->post('password'),
			'country' => $this->input->post('country'),
			'city' => $this->input->post('city'),
		);
		
		try {
			$response = $this->db->insert('user',$data);
						
			if(!$response){
				return $this->db->error();
			}
			return $response;
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function edit_user($id){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'age' => $this->input->post('age'),
			'address' => $this->input->post('address'),
			'country' => $this->input->post('country'),
			'city' => $this->input->post('city'),
		);

		try{
			$this->db->where('id_user', $id);
			$response = $this->db->update('user',$data);

			if(!$response){
				return $this->db->error();
			}
			return $response;
		}catch(Exception $e){
			return false;
		}
	}
	
	public function delete_user($id){

		try {
			$this->db->where('id_user', $id);
			$response = $this->db->delete('user');
			return $response;
		} catch (Exception $e) {
			return false;
		}
	}
}
