<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sale extends CI_Controller {

	public function sale_list()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$data['page'] = "sale/sale_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	public function sale_list_delete()
	{
		@session_start();
		if(@$_SESSION['employees_id']!=""){
			$product_key = $this->uri->segment(3);
			for($i=0;$i<30;$i++){
				if(@$_SESSION['product'][$i]['product_key']==$product_key){
					unset($_SESSION['product'][$i]);
				}
			}
			$data['page'] = "sale/sale_list";
			$this->load->view('head',$data);
		}else{
			redirect('login/index');
		}
	}
	
}
