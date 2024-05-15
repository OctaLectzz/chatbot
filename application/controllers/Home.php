<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function chatbot()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$pesan = $this->input->post('isi_pesan', TRUE);

			$this->db->like('pertanyaan', $pesan);
			$query = $this->db->get('chatbot');

			if ($query->num_rows() > 0) {
				$data = $query->row();
				$balasan = $data->jawaban;
				echo $balasan;
			} else {
				echo 'Maaf, Saya belum menemukan jawaban yang kamu maksud, :(';
			}
		} else {
			show_404();
		}
	}
}
