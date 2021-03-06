<?php
class ApiModel extends CI_Model
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

	////API
	public function update_product_api($product){
		$query = $this->db->query('SELECT * FROM product WHERE id_product='.$product->id_product);
		$result = $query->row();

		if($result){

			$data = array(
				'price' => (int)$product->price,
				'quantity' => $product->quantity+(int)$result->quantity,
				'historical' => $product->quantity+(int)$result->historical,
				'type_id' => $product->type_id,
				'name_product' => $product->name_product,
			);

			try {
				//INSERT -> devuelve true or false;
				$this->db->where('id_product', $product->id_product);
				return $this->db->update('product',$data);
			} catch (Exception $e) {
				return false;
			}

		}else{
			return false;
		}
	}

	public function create_product_api($product){
	
		$data = array(
			'price' => (int)$product->price,
			'quantity' => $product->quantity,
			'historical' => $product->quantity,
			'type_id' => $product->type_id,
			'name_product' => $product->name,
		);

		try {
			//INSERT -> devuelve true or false;
			return $this->db->insert('product',$data);
		} catch (Exception $e) {
			return false;
		}
	}
}
