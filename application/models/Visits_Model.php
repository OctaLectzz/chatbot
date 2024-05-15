<?php
class Visits_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_visit_count()
	{
		$query = $this->db->get('visits');
		return $query->row_array();
	}

	public function increase_visit_count()
	{
		$this->db->set('visit_count', 'visit_count+1', FALSE);
		$this->db->update('visits');
	}

	public function create_visit_record()
	{
		$data = array('visit_count' => 1);
		return $this->db->insert('visits', $data);
	}
}
