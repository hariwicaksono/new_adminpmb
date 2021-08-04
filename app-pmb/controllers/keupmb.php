<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Keupmb extends Controller{
	
	function Keupmb(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('gelombang');
		$this->load->model('mhsbaru');
		$this->load->model('biayamhs');
		$this->load->model('department');
		$this->load->model('profil');
		$this->load->model('mcalonmhs');
		$this->load->library('form_validation');	
	}
	
	function index(){
		$pengguna=$this->session->userdata('pengguna');
		$gol=$this->session->userdata('gol');
		if(!empty($pengguna) && $gol==3){
			$this->data['tahunpmb']=$this->tahun->getThaPmb();	
			define('TAHUN', $this->data['tahunpmb']);
			$this->data['profil']=$this->profil->getProfilPT();		
			$this->data['userlogin']=strtoupper($pengguna);
			$this->data['messageproc']=$this->session->flashdata('messageproc');
			$menucs=array(
					'keupmb/home'=>'HOME',
					'keupmb/datamhs'=>'DATA MHS BARU',
					'keupmb/herregistrasi'=>'HER-REGISTRASI',
					'keupmb/laporan'=>'LAPORAN PMB',
					//'keupmb/calonmhs'=>'DATA CALON MHS',
					'keupmb/logout'=>'LOGOUT'					
					);
			$this->data['menu']=$menucs;
			$this->data['webcontent']='';		
			$uriSegment=$this->uri->segment(2);			
			if(in_array($uriSegment,array('main','index','home',''))){				
		 			$this->home();
		 	} else if(method_exists($this,$uriSegment)){	 			
		 			$this-> $uriSegment ();
		 	} 
		 	else {
		 			$this->nopage();
			}				
			
			/*
			 * Tahun PMB
			 */			
			 		
			$this->load->view('main',$this->data);	
		}else{
			redirect('login/index');
		}
	}
	
	function home(){
		$this->load->model('statistik');
		$this->data['content_title']='STATISTIK MAHASISWA BARU';		
		$this->data['stat']=$this->statistik->statperkab(1,TAHUN);		
		$this->data['webcontent']='pmb/statistik';
	}
	
	function datamhs(){						
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');	
		$this->data['content_title']='DAFTAR MAHASISWA BARU';
		$this->data['kodegel']=$this->uri->segment(4);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsBaru($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));				
		
		$this->data['webcontent']='keupmb/daftarpendaftar';		
	}
	
	function biodata(){
		$this->data['content_title']='BIODATA MAHASISWA BARU';
		$this->data['nodaf']=$this->uri->segment(3);
		$this->data['biodata']=$this->mhsbaru->getMhsBaruLengkap($this->data['nodaf']);
		$this->data['webcontent']='keupmb/biodata';
	}
	
	function herregistrasi(){
		$this->data['content_title']='HER-REGISTRASI';	
		$this->form_validation->set_rules('nodaf', '<b>NOMOR PENDAFTARAN</b>', 'trim|required|alpha_numeric|xss_clean');
		if($this->form_validation->run()==FALSE){			
			$this->data['webcontent']='keupmb/herregis';
		}else{
			$nodaf=$this->input->post('nodaf');			
			if($this->mhsbaru->is_mhslulus($nodaf)){
				$this->data['biaya']=$this->biayamhs->getBiayaPerMHS($nodaf,TAHUN);
				if(empty($this->data['biaya'])){
					$this->session->set_flashdata('messageproc','Nodaf tidak ditemukan');
					$this->data['webcontent']='keupmb/herregis';
				}else{
					$this->data['namabiaya']=$this->biayamhs->getJenisBiaya();				
					$this->data['totalbayar']=$this->biayamhs->getTotalBayar($nodaf);
					$this->data['bayarawal']=$this->biayamhs->getBayarAwal($nodaf);
					$this->data['sdhbayar']=$this->biayamhs->getSudahDibayar($nodaf);
					$this->data['tgldata']=date('d-m-Y');	
					$this->data['webcontent']='keupmb/registrasifrm';
				}									
			}else{							
				$this->data['message']=$this->mhsbaru->getMesg();				
			$this->data['webcontent']='keupmb/herregis';
			}			
		}
									
	}
	
	
	function herregistrasi_baru(){
	$this->form_validation->set_rules('nodaf', '<b>NOMOR PENDAFTARAN</b>', 'trim|required|alpha_numeric|xss_clean');
		if($this->form_validation->run()==FALSE){			
			$this->data['webcontent']='keupmb/herregis_baru';
		}else{
			$nodaf=$this->input->post('nodaf');			
			if($this->mhsbaru->is_mhslulus($nodaf)){
				$this->data['biaya']=$this->biayamhs->getBiayaPerMHS($nodaf,TAHUN);
				if(empty($this->data['biaya'])){
					$this->session->set_flashdata('messageproc','Nodaf tidak ditemukan');
					$this->data['webcontent']='keupmb/herregis';
				}else{
					$this->data['namabiaya']=$this->biayamhs->getJenisBiaya();				
					$this->data['totalbayar']=$this->biayamhs->getTotalBayar($nodaf);
					$this->data['bayarawal']=$this->biayamhs->getBayarAwal($nodaf);
					$this->data['sdhbayar']=$this->biayamhs->getSudahDibayar($nodaf);
					$this->data['tgldata']=date('d-m-Y');	
					$this->data['webcontent']='keupmb/registrasifrm';
				}									
			}else{							
				$this->data['message']=$this->mhsbaru->getMesg();				
			$this->data['webcontent']='keupmb/herregis_baru';
			}			
		}
	}
	
	function registrasi(){				
		$this->data['content_title']='HER-REGISTRASI';			
		$nodaf=$this->input->post('nodaf');	
		$nama=$this->input->post('nama');
		$noref=$this->input->post('noref');
		$tgl_bayar=$this->input->post('tglbayar');
		$bayarawal=$this->input->post('bayarawal');
		$jumlah=$this->input->post('bayarsekarang');
		$beban_biaya=$this->input->post('totalbayar');
		$ThaPmb=$this->data['tahunpmb'];
		//print_r($nodaf,$nama,$noref,$tgl_bayar,$bayarawal,$jumlah,$beban_biaya,$ThaPmb);
		//break;
		// $biaya_pengakuan_sks=$this->data['biaya_pengakuan_sks'];
		if($this->biayamhs->getpertamakalibayar($nodaf,$bayarawal,$jumlah)){
			$this->session->set_flashdata('messageproc',$this->biayamhs->getMesg());
			redirect('keupmb/buktiher/'.$nodaf.'/'.$noref.'/'.url_title($nama).'/');
		}else{			
			if($this->mhsbaru->doHerMhs($nama,$noref,$tgl_bayar,$jumlah,$beban_biaya,$ThaPmb)){			
				//$this->session->set_flashdata('messageproc',$this->mhsbaru->getMesg());
				redirect('keupmb/buktiher/'.$nodaf.'/'.$noref.'/'.url_title($nama).'/');
			}else{
				$this->session->set_flashdata('messageproc',$this->mhsbaru->getMesg());
				redirect('herregistrasi');
			}
		}								
	}
	
	function buktiher(){
		$this->data['content_title']='CETAK BUKTI HER-REGISTRASI';
		$daf=$this->uri->segment(3);
		$ref=$this->uri->segment(4);
		$name=$this->uri->segment(5);
		$this->data['tocard']['info']=$this->biayamhs->getBiayaPerMHS($daf,TAHUN);
		$this->data['tocard']['totalbayar']=$this->biayamhs->getTotalBayar($daf);		
		$this->data['tocard']['sdhbayar']=$this->biayamhs->getSudahDibayar($daf);
		$this->data['tocard']['namabiaya']=$this->biayamhs->getJenisBiaya();		
		$this->data['tocard']['tglcetak']=date('d-m-Y');		
		$this->data['webcontent']='keupmb/herregiscard';
	}
	
	function calonmhs(){
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');	
		$this->data['kodegel']=$this->uri->segment(4);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['calonmhs']=$this->mcalonmhs->cari();
		$this->data['content_title']='DATA PENDAFTAR CALON MAHASISWA';			
		$this->data['webcontent']='keupmb/calonmhs';
	}
	
	function laporan(){
		$this->data['content_title']='LAPORAN PENERIMAAN MAHASISWA BARU';
		$this->data['menulaporan']=array(
									'lapdaftar'=>"PENDAFTARAN",
									'laplulus'=>"LULUS TEST",
									'lapherregistrasi'=>"HER-REGISTRASI",
									);
		$this->data['webcontent']='keupmb/laporan';
	}		
	
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	function nopage(){		
		$this->data['webcontent']='none';
	}
}
?>