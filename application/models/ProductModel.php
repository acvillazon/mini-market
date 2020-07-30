<?php
class ProductModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function list(){
		$query = $this->db->query('
			SELECT * FROM product AS p 
			INNER JOIN type_product AS t ON p.type_id = t.id_type 
			WHERE state_product=1');
		return $query->result();
	}
	
	public function getProduct($id){
		$query = $this->db->query('
			SELECT * FROM  product AS p 
			INNER JOIN  type_product AS t ON p.type_id = t.id_type 
			WHERE state_product=1 AND id_product='.$id);
		return $query->row();
	}

	public function getTypes(){
		$query = $this->db->query('
			SELECT * FROM type_product');
		return $query->result();
	}
	
	public function store_product(){
	    
		$data = array(
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'type_id' => $this->input->post('type_id'),
			'name_product' => $this->input->post('name'),
			'historical' => $this->input->post('quantity'),
		);
		
		try {
			$response = $this->db->insert('product',$data);
			if(!$response){ return $this->db->error(); }
			return $response;
		} catch (Exception $e) {
			return false;
		}
	}

	public function update_product($id){
		$query = $this->db->query('SELECT * FROM product WHERE id_product='.$id);
		$result = $query->row();

		if($result){

			$data = array(
				'price' => $this->input->post('price'),
				'quantity' => (int)$this->input->post('quantity')+(int)$result->quantity,
				'historical' => (int)$this->input->post('quantity')+(int)$result->historical,
				'type_id' => $this->input->post('type_id'),
				'name_product' => $this->input->post('name'),
			);
			
			try {
				$this->db->where('id_product', $id);
				$response = $this->db->update('product',$data);
	
				if(!$response){ return $this->db->error(); }
				return $response;
			} catch (Exception $e) {
				return false;
			}

		}else{
			return false;
		}
	}
	
	public function delete_product($id){		
		try {
			$this->db->where('id_product', $id);
			$response = $this->db->delete('product');
			$rows_affected = $this->db->affected_rows();

			if(!$response){ return $this->db->error(); }

			return [$response,$rows_affected];
		} catch (Exception $e) {
			return false;
		}
	}
}
