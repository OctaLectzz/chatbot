<?php
class Visits extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Visits_model');
		$this->load->library('session');
	}

	public function index()
	{
		if (!$this->session->has_userdata('visited')) {
			$this->session->set_userdata('visited', TRUE);

			if ($this->Visits_model->get_visit_count()) {
				$this->Visits_model->increase_visit_count();
			} else {
				$this->Visits_model->create_visit_record();
			}
		}

		$data['visit'] = $this->Visits_model->get_visit_count();
		$this->load->view('home/traffic', $data);
	}
}
