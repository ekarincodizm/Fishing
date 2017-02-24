<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class warehouse_model extends CI_Model {

	public function warehouse_list()
	{
		$this->db->order_by('warehouse_date','desc');
		$query = $this->db->get('warehouse');
		return $query->result_array();
	}
	public function warehouse_in($warehouse)
	{
		$this->db->insert('warehouse',$warehouse);
	}
	public function warehouse_out($warehouse)
	{
		$this->db->insert('warehouse',$warehouse);
	}
}
