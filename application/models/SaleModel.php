<?php
class SaleModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function list(){
		$query = $this->db->query('
			SELECT * FROM  product AS p 
			INNER JOIN  type_product AS t ON p.type_id = t.id_type 
			WHERE state_product=1');
		return $query->result();
	}
	
	public function insert_register($data){

		$sell = array(
			'user_id' => $this->input->post('user_id'),
			'product_id' => $data->id_product,
			'quantity_sales' => $data->quantity,
			'total' => $data->total,
			'created_at' => date('Y-m-d H:i:s')
		);

		try {
			$stock = $this->updateStock($data);

			if($stock){
				//INSERT -> devuelve true or false;
				$response = $this->db->insert('sales',$sell);
				
				if(!$response){ return $this->db->error(); }
				return $response;

			}else{
				return false;
			}
		} catch (Exception $e) {
			return $e;
		}
		
	}

	public function updateStock($data){
		$query = $this->db->get_where('product', array('id_product' => $data->id_product));
		$result = $query->row();
		
		if(!$result){
			return false;
		}
		
		if((int)$data->quantity > (int)$result->quantity){
			return false;
		}

		$product = array(
			'quantity' => (int)$result->quantity - (int)$data->quantity,
		);

		$this->db->where('id_product', $data->id_product);
		$update = $this->db->update('product',$product);

		if(!$update){
			return false;
		}

		return true;
	}

	public function average_date(){
		$query = $this->db->query('
			SELECT AVG(total) as Average_income_date, created_at, SUM(quantity_sales) as total_product FROM  sales GROUP BY created_at
		');

		return $query->result();
	}
	
	public function average_total(){
		$query = $this->db->query('
			SELECT AVG(total) as Average_income_total, SUM(quantity_sales) as total_product FROM  sales
		');

		return $query->result();
	}

	public function best_selling(){
		$query = $this->db->query('
			SELECT name_type, SUM(quantity_sales) as total_units FROM  sales AS s 
			INNER JOIN  product as p
			ON s.product_id = p.id_product
			INNER JOIN  type_product as t
			ON p.type_id = t.id_type GROUP BY name_type
		');

		return $query->result();
	}
	
	public function best_selling_income(){
		$query = $this->db->query('
			SELECT name_type, SUM(total) as total FROM  sales AS s 
			INNER JOIN  product as p
			ON s.product_id = p.id_product
			INNER JOIN  type_product as t
			ON p.type_id = t.id_type GROUP BY name_type
		');

		return $query->result();
	}
}