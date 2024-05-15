<?php
class Visits extends CI_Controller
{
	public function index()
	{
		$ip = $this->input->ip_address(); // Mendapatkan IP user
		$date = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$waktu = time();
		$timeinsert = date("Y-m-d H:i:s");

		// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
		$s = $this->db->query("SELECT * FROM visitor WHERE ip = ? AND date = ?", array($ip, $date))->num_rows();
		$ss = isset($s) ? ($s) : 0;

		// Kalau belum ada, simpan data user tersebut ke database
		if ($ss == 0) {
			$this->db->query("INSERT INTO visitor (ip, date, hits, online, time) VALUES (?, ?, '1', ?, ?)", array($ip, $date, $waktu, $timeinsert));
		}
		// Jika sudah ada, update
		else {
			$this->db->query("UPDATE visitor SET hits = hits + 1, online = ? WHERE ip = ? AND date = ?", array($waktu, $ip, $date));
		}

		// Hitung jumlah pengunjung hari ini
		$pengunjunghariini = $this->db->query("SELECT COUNT(DISTINCT ip) as unique_visitors FROM visitor WHERE date = ?", array($date))->row()->unique_visitors;

		// Hitung total pengunjung
		$dbpengunjung = $this->db->query("SELECT SUM(hits) as total_hits FROM visitor")->row();
		$totalpengunjung = isset($dbpengunjung->total_hits) ? ($dbpengunjung->total_hits) : 0;

		// Hitung pengunjung online
		$bataswaktu = time() - 300;
		$pengunjungonline = $this->db->query("SELECT COUNT(DISTINCT ip) as online_visitors FROM visitor WHERE online > ?", array($bataswaktu))->row()->online_visitors;

		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung'] = $totalpengunjung;
		$data['pengunjungonline'] = $pengunjungonline;

		$this->load->view('home/traffic', $data);
	}
}
