<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	public function report_sale()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['shop'] = $this->shop_model->shop_list();
			$data['page'] = "report/report_sale";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function report_sale_search()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$input = array(
				'date_start' => $this->input->post('start'),
				'date_end' => $this->input->post('end'),
				'shop' => $this->input->post('shop')
			);
			$data['changes'] = $this->stock_model->report_sale($input);
			$data['shop'] = $this->shop_model->shop_list();
			$data['page'] = "report/report_sale";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function report_product()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "report/report_product";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function report_product_search()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data = array(
				'date_start' => $this->input->post('start'),
				'date_end' => $this->input->post('end')
			);
			$data['product'] = $this->product_model->product_list();
			$data['page'] = "report/report_product";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	
}
