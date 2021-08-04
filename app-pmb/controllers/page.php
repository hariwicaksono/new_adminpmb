<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
var $data;
function  __construct() {
parent::__construct();
date_default_timezone_set('Asia/Jakarta');
$this->load->model('mtahun_akademik');  
$this->load->model('mabsen_dosen');  
$this->load->model('mabsen_mhs');  
$this->load->model('apengguna');  
$this->load->model('mkonversi');  
$this->load->model('mkrs');  
$this->data['tahunakademik']=$this->mtahun_akademik->get_tahun_akademik(0,'',0)->row_array();	
$this->data['idtahun']=$this->mtahun_akademik->get_id_tahun();
if(empty($this->session->userdata['pengguna'])) $this->data['nik']=''; else $this->data['nik']=$this->session->userdata['pengguna'];
$this->data['idjam_aktif']=$this->mkonversi->jam_aktif();
$this->data['hari_aktif']=$this->mkonversi->HariIndonesia();
$this->data['nama']=$this->mabsen_dosen->cari_dosen(array('NIK'=>$this->data['nik']))->row_array();			
$this->data['cek_jadwalmengajar']=$this->mabsen_dosen->cek_jadwalmengajar(array('tahun_aktif'=>$this->data['idtahun'], 
	                                              'hari'=>$this->data['hari_aktif'], 
												  'jam'=>$this->data['idjam_aktif'][0], 
												  'nik'=>$this->data['nik']))->row_array();


$this->data['message']="";			
$this->data['linke']="";
$this->data['waktu_sekarang']=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
if(!empty($this->session->userdata['batas_akhir']) && !empty($this->session->userdata['batas_akhir']) > $this->data['waktu_sekarang'] ) redirect('page/keluar','refresh');
}
	public function index()
	{
	if(!empty($this->session->userdata['pengguna'])){
	
	$this->data['page']="home";
	}else{
	$this->data['page']="login";
	
	}
	$this->load->view('menu_utama',$this->data);
	}
	
	public function epresensi(){
	if(empty($this->session->userdata['pengguna'])) redirect('page','refresh');
	if(!empty($this->session->userdata['batas_akhir']) && !empty($this->session->userdata['batas_akhir']) > $this->data['waktu_sekarang'] ) redirect('page/keluar','refresh');
	
	$this->data['page']=$this->uri->segment(3);
	$this->data['idkuliah']=$this->uri->segment(4);
	$this->data['idjam']=$this->uri->segment(5);
	$this->data['aksi']=$this->uri->segment(6);
if( $this->data['page']=="otomatis"){
	$this->data['absen_dosen']=$this->mabsen_dosen->cari2(array('kuliah_tp_id'=>$this->data['idkuliah']));
	$this->data['absen_dosen2']=$this->mabsen_dosen->cari(array('kuliah_tp_id'=>$this->data['idkuliah']));
	$this->data['linke']="&nbsp;&#8250;&nbsp; <a href=".base_url()."page/epresensi/otomatis>ePresensi</a>";
	$id_presensi_dosen=$this->input->post('id_presensi_dosen');
$inputJudulMateri=$this->input->post('inputJudulMateri');
$IsiMateri=$this->input->post('IsiMateri');

if(!empty($inputJudulMateri) && !empty($IsiMateri)){
$this->mabsen_dosen->update(array('judul_materi'=>$inputJudulMateri,'isi_materi'=>$IsiMateri),array('id_presensi_dosen'=>$id_presensi_dosen));
$this->session->set_userdata('konten','konten');
}
	$radio_absen=$this->input->post('rabsen');
	$tamp_npm="";
    if(!empty($radio_absen)){
	   $count_radio=count($radio_absen);
	   for($x=0;$x<$count_radio;$x++){
	       if(($count_radio-$x)==1) 
		       {$tamp_npm=$tamp_npm.$radio_absen[$x]."";
			   }
			 else
			   {
			     $tamp_npm=$tamp_npm.$radio_absen[$x].", ";
			   }
	   }
	   $this->mabsen_mhs->update_absen($tamp_npm,date('h:m:s'));
	}
	
	$this->data['cek_jadwal']=$this->mabsen_dosen->cari(array('nidn_nupn'=>$this->data['nik'],
                                                                'tanggal'=>date('Y-m-d'),'id_jam'=>$this->data['idjam']))->row_array();
	
    if(empty($this->data['cek_jadwal'])){
	  $ambilke=$this->mabsen_dosen->ambilke(array('nidn_nupn'=>$this->data['nik'],'kuliah_tp_id'=>$this->data['idkuliah']));
	  $ambil=$ambilke+1;
	
	   $this->mabsen_dosen->tambah(array('nidn_nupn'=>$this->data['nik'],'tanggal'=>date('Y-m-d'),
	                               'jam'=>date('H:i:s'),'kuliah_tp_id'=>$this->data['idkuliah'],'pertemuan'=>$ambil,'id_jam'=>$this->data['idjam']));
	
	 
	}																
	$this->data['cek_jadwal_dosen']=$this->mabsen_dosen->join_kuliah(array('nidn_nupn'=>$this->data['nik'],
                                                                'tanggal'=>date('Y-m-d'),'id_jam'=>$this->data['idjam']))->row_array();						  																													
														
	} // akhir coding jika page otomatis
	else if($this->data['page']=="panduan_penggunaan"){
	
	} // akhir coding jika page panduan penggunaan
	$this->load->view('menu_utama',$this->data);
	}
	function toenter(){
	 $u=$this->input->post('username');
	 $p=$this->input->post('password');
	 $hasil=$this->apengguna->grantTo(trim($u),trim($p));
	 if(empty($hasil)) {
	 	$this->data['message']=$this->apengguna->getMesg();			
		$this->index();
	 }
	 else {
	   	$this->session->set_userdata('pengguna',$hasil['nik']);
		$this->session->set_userdata('batas_akhir',$this->data['idjam_aktif'][1]);
		redirect('page','refresh');
	 }
	}
function panduan_penggunaan(){
  $this->data['page']=$this->uri->segment(3);
  $this->load->view('menu_utama',$this->data);
}
function keluar(){
	$this->session->sess_destroy();
	redirect('page','refresh');
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */