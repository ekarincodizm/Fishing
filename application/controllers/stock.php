<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {

	public function stock_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			@$shop_id = $_SESSION['employees_shop'];
			$data['product'] = $this->product_model->product_list_by_shop($shop_id);
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
			@$shop_id = $_POST['employees_shop'];
			$data['product'] = $this->product_model->product_list_by_shop($shop_id);
			$data['page'] = "stock/stock_list_shop";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function stock_shop_option()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['employees_shop'] = @$this->input->post('employees_shop');
			$data['shop'] = $this->shop_model->shop_list();
			$data['product'] = $this->product_model->product_list_by_shop($_SESSION['employees_shop']);
			$data['page'] = "stock/stock_shop_option";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}

	public function stock_update()
	{
		@session_start();
			$product_id = $this->uri->segment(3);
			$input = $this->input->post();
			$up = $this->db->where('product_limit_product_id',$product_id)
			->where('product_limit_shop_id',$_SESSION['employees_shop'])
			->update('product_limit',$input);
			redirect('stock/stock_shop_option');
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