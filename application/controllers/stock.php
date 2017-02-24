<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {

	public function stock_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "stock/stock_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function stock_list_shop()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['employees_shop'] = @$this->input->post('employees_shop');
			$data['shop'] = $this->shop_model->shop_list();
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "stock/stock_list_shop";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function stock_in()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "stock/stock_in";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

}
