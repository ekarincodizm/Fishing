<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public function product_list()
	{
		$this->db->order_by('product.product_id','desc');
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function product_insert($product)
	{
		$this->db->insert('product',$product);
	}
	public function product_details($product_id)
	{
		$this->db->where('product.product_id',$product_id);
		$this->db->join('category','category.category_id = product.product_category');
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function product_update($product)
	{
		$this->db->where('product_id',$product['product_id']);
		$this->db->update('product',$product);
	}
	public function product_delete($product_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->delete('product');
	}
}
