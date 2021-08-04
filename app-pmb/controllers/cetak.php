<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Cetak extends Controller
{
			
	function Cetak(){
		parent::Controller();		
		$this->load->model('tahun');
		$this->load->model('gelombang');
		$this->load->model('mhsbaru');
		$this->load->model('department');	
		$this->load->model('umum');
		$this->load->model('propinsi');
		$this->load->model('kabupaten');
		$this->load->model('biayamhs');
		$this->load->model('statistik');
		$this->load->model('profil');
		$this->load->model('model_crud');
		$this->load->library('form_validation');	
		//$this->output->enable_profiler(TRUE);			
	}
	
	function dokumen(){
		if (empty($this->session->userdata['pengguna'])) redirect(base_url());
		$this->load->view('pmb/cetak');
	}
	
	
	
	
				
}
?>