<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @desc    This class provides database interaction for manipulating the shopping cart
 * 
 * @author  Tyler Bailey
 * 
 */

class Store_m extends MY_Model
{

	protected $_table_name = 'products';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;

	
	
	//retrieve all products from database table
	public function getProducts()
	{
		$query = $this->db->get('products');
		return $query->result_array();
	}
	
	
	//return total product count
	public function getProductCount()
	{
		$query = $this->db->get('products');
		return $query->num_rows();
	}
	
	
	//retrieve 3 most recent products
	public function getRecentProducts($limit)
	{
		
		$this->db->from('products')
				 ->order_by('id', 'desc')
				 ->limit($limit);
				 
		$query = $this->db->get();
				 
		return $query->result_array();
	}
	
	
	
	//get single product information
	public function getSingleProduct($id)
	{
		$this->db->from('products')
				 ->where('id', $id);
				 
		$query = $this->db->get();
		
		return $query->result_array();
	}
  
  
  
	//add a product to database
	public function insertProduct($photoData)
	{
		$data = array(
			'name' => $this->input->post('product_name'),
			'code' => $this->input->post('product_id'),
			'quantity' => $this->input->post('quantity'),
			'description' => $this->input->post('product_description'),
			'photo' => $photoData['file_name'],
			'price' => $this->input->post('product_price')
		);
		
		if($this->db->insert('products', $data)) {
			return true;
		} else {
			return false;
		}
	}
	
	
	
	//delete a product
	public function deleteProduct($id)
	{
		$this->db->where('id', $id);
		if(!$this->db->delete('products')) {
			return false;
		} else {
			return true;
		}
	}
	
	
	//edit a single product
	public function updateProduct($id)
	{
		$data = array(
			'name' => $this->input->post('product_name'),
			'code' => $this->input->post('product_id'),
			'quantity' => $this->input->post('quantity'),
			'description' => $this->input->post('product_description'),
			'price' => $this->input->post('product_price')
		);
		
		$this->db->where('id', $id);
		
		if($this->db->update('products', $data)) {
			return true;
		} else {
			return false;
		}
	}
	
}