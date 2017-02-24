<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_model extends CI_Model {


	public function stock_in($stock)
	{
		$this->db->insert('stock',$stock);
	}
	public function report_sale($input)
	{
		$this->db->where('stock.stock_type',"out");
		$this->db->where('stock.stock_date >=',$input['date_start']);
		$this->db->where('stock.stock_date <=',$input['date_end']);

		if($input['shop']!=""){
			$this->db->where('stock.stock_shop',$input['shop']);
		}
		$this->db->join('product','product.product_code = stock.stock_product');
		$this->db->join('shop','shop.shop_id = stock.stock_shop');
		$query = $this->db->get('stock');
		return $query->result_array();
	}

}
