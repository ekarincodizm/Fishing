<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale_manage extends CI_Controller {

	public function sale_list()
	{
		@session_start();
		$barcode = array('barcode' => $this->input->post('barcode'));
		$data = $this->sale_model->product_select($barcode);
		
		$num = count(@$_SESSION['product']);
		@$_SESSION['product'][$num]['product_key'] = date('YmdHis');
		@$_SESSION['product'][$num]['product_code'] = $data[0]['product_code'];
		@$_SESSION['product'][$num]['product_name'] = $data[0]['product_name'];
		@$_SESSION['product'][$num]['product_sale'] = $data[0]['product_sale'];

		redirect('sale/sale_list');
	}
	public function sale_clear()
	{
		@session_start();	
		unset($_SESSION['product']);	
		redirect('sale/sale_list');
	}
	public function sale_insert()
	{
		@session_start();
		for($i=0;$i<count(@$_POST['product_code']);$i++){
			$stock = array(
				'stock_product' => @$_POST['product_code'][$i],
				'stock_type' => "out",
				'stock_amount' => 1,
				'stock_date' => date('Y-m-d'),
				'stock_time' => date('H:i:s'),
				'stock_employees' => @$_SESSION['employees_id'],
				'stock_shop' => @$_SESSION['employees_shop']
			);
			$this->db->insert('stock',$stock);
		}
		@session_start();	
		unset($_SESSION['product']);	
		redirect('sale/sale_list');
	}
	
}
