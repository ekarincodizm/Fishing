<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class warehouse extends CI_Controller {

	public function warehouse_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "warehouse/warehouse_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function warehouse_in()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "warehouse/warehouse_in";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function warehouse_out()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['shop'] = $this->shop_model->shop_list();
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "warehouse/warehouse_out";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
}
