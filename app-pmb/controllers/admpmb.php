<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Admpmb extends Controller
{
var $db_public;
	function Admpmb(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('biayamhs');
		$this->load->model('gelombang');
		$this->load->model('department');
		$this->load->model('profil');
		$this->load->library('form_validation');	
		//$this->output->enable_profiler(TRUE);
	}
	
	function index(){
		$pengguna=$this->session->userdata('pengguna');
		$gol=$this->session->userdata('gol');
		if(!empty($pengguna) && $gol==1){
			$this->data['tahunpmb']=$this->tahun->getThaPmb();
			define('TAHUN', $this->data['tahunpmb']);
			$this->data['profil']=$this->profil->getProfilPT();
			$this->data['userlogin']=strtoupper($pengguna);
			$this->data['message']=$this->session->flashdata('message');
			$menucs=array(
					'admpmb/home'=>'HOME',
					'admpmb/thn'=>'TAHUN PMB',
					'admpmb/biayadaftar'=>'BIAYA DAFTAR',													
					'admpmb/setpmb'=>'GELOMBANG PMB',
					'admpmb/sarana'=>'BIAYA SARANA',
                  
					'admpmb/logout'=>'LOGOUT'
					);
			$this->data['menu']=$menucs;
			$this->data['webcontent']='';
			$uriSegment=$this->uri->segment(2);			
			if(in_array($uriSegment,array('index','home',''))){				
		 			$this->home();
		 	} else if(method_exists($this,$uriSegment)){	 			
		 			$this-> $uriSegment ();
		 	} 
		 	else {
		 			$this->nopage();
			}	
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
		//$this->data['webcontent']='pmb/home';
	}
	
	function thn(){
		$this->data['content_title']='TAHUN PMB';
		$this->data['listtahun']=$this->tahun->getListThnAkademik();
		if($_POST){
			if($this->tahun->setThaPMB($this->input->post('tahunpmb'))){
				$this->session->set_flashdata('message','Tahun PMB berhasil di ubah');
				redirect('admpmb/thn');	
			}else{
				$this->session->set_flashdata('message','Tahun PMB berhasil di ubah');
			}		
		}
		$this->data['webcontent']='admpmb/thnpmb';
	}
	
	function biayadaftar(){	
		$this->form_validation->set_rules('biayadaftar[]', '<b>BIAYA PENDAFTARAN </b>', 'trim|required|is_natural|xss_clean');
		$this->form_validation->set_rules('biayadukung[]', '<b>BIAYA PENDUKUNG </b>', 'trim|required|is_natural|xss_clean');
		$this->data['content_title']='BIAYA PENDAFTARAN PMB';
		$this->data['biayadaftar']=$this->biayamhs->getBiayaDaftarDukung();
		if($this->form_validation->run()==FALSE){
				
		}else{
			if($_POST){						
						$lendata=sizeof($_POST['idtoproc']);
						$success=0;
						if($lendata > 0){				
							for($i=0;$i<$lendata;$i++) 
							{
								$biaya=array(
									'BIAYA_DAFTAR'=>$_POST['biayadaftar'][$i],
									'BIAYA_PENDUKUNG'=>$_POST['biayadukung'][$i],
									'ID_JENISMHS'=>$_POST['idtoproc'][$i]						
								);
								if($this->biayamhs->setBiayaDaftarDukung($biaya)){
									$success++;	
								}
							}
							//print('Sukses bro :'.$success);
							if($success > 0){
								$this->session->set_flashdata('message','Ubah biaya pendaftaran dan biaya pendukung berhasil');
								redirect('admpmb/biayadaftar');
							}else{
								$this->data['message']='Ubah biaya pendaftaran dan biaya pendukung gagal';
							}				
						}						
			}
		}
		$this->data['webcontent']='admpmb/biayapmb';
	}
	
	
	function setpmb(){
		$this->data['content_title']='GELOMBANG PENDAFTARAN PMB';	
		$this->data['jadwal']=$this->gelombang->getGelombang($this->data['tahunpmb']);
		$kode=trim($this->uri->segment(3));		
		if(!empty($kode)){
			if(is_numeric($kode) && ($kode!='tambah' || $kode!='hapus')){
				$this->data['namegel']=$this->uri->segment(4);
				$this->data['jadwaled']=$this->gelombang->getGelombang($this->data['tahunpmb'],$kode);			
				$this->data['pageload']='admpmb/editgel';			
			}elseif($kode=='tambah'){
				$this->data['admode']="tambah";
				$this->data['pageload']='admpmb/editgel';
			}elseif($kode=='hapus'){
				$this->data['admode']="hapus";	
				$kodehapus=$this->uri->segment(4);					
				$this->data['namegel']=$this->uri->segment(5);			
				$this->data['jadwaled']=$this->gelombang->getGelombang($this->data['tahunpmb'],$kodehapus);
				$this->data['pageload']='admpmb/editgel';
			}
		}					
		$this->data['webcontent']='admpmb/gelombang';		
	}
	
	function tambahgel(){				
		$namagel=$this->input->post('nama');
		$tgl_awal=$this->input->post('tglmulai');
		$tgl_akhir=$this->input->post('tglselesai');
		
		
		
		if(strtotime($tgl_awal)>strtotime($tgl_akhir)){
				$this->session->set_flashdata('message','tanggal awal '.$namagel.' melebihi tanggal akhir '.$namagel.'<br />inputan harap diperiksa kembali<br />');
		}else{			
			if($this->gelombang->addGelombang($namagel,$tgl_awal,$tgl_akhir,$this->data['tahunpmb'])){
				$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' gagal ditambahkan');
			}
		}
		redirect('admpmb/setpmb');				
	}
	
	function editgel(){		
		$kode=$this->input->post('kode');
		$namagel=$this->input->post('nama');
		$tgl_awal=$this->input->post('tglmulai');
		$tgl_akhir=$this->input->post('tglselesai');				
		if(!empty($kode)){			
			if(strtotime($tgl_awal)>strtotime($tgl_akhir)){
				$this->session->set_flashdata('message','tanggal awal '.$namagel.' melebihi tanggal akhir '.$namagel.'<br />inputan harap diperiksa kembali<br />');
			}else{
				if($this->gelombang->editGelombang($namagel,$tgl_awal,$tgl_akhir,$this->data['tahunpmb'],$kode)){
					$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' berhasil diubah');
				}else{
					$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' gagal diubah');
				}
			}										
		}		
		redirect('admpmb/setpmb');		
	}
	
	function hapusgel(){
		$kode=$this->input->post('kode');
		$namagel=$this->input->post('nama');				
		if(!empty($kode)){			
			if($this->gelombang->delGelombang($kode)){
				$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' berhasil dihapus');
			}else{
				$this->session->set_flashdata('message',''.$namagel.' tahun PMB '.$this->data['tahunpmb'].' gagal dihapus');
			}			
		}
		redirect('admpmb/setpmb');						
	}
	
	
	function sarana(){
		$this->data['content_title']='BIAYA SARANA';
		$this->data['namagel']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);
		$jurusan=$this->department->getKdNamaDept();		
		$this->data['showbiaya']=array();
		$x=0;
		foreach($jurusan as $data=>$item){							
			$this->data['showbiaya'][$x]['nama']=$item['NAMA_DEPT'];
			$biayasrn=$this->biayamhs->getSumbanganPerJurPerTh($this->data['tahunpmb'],$item['KD_DEPT']);			
			$i=0;
			foreach($biayasrn as $mini=>$itemmini){								
				$this->data['showbiaya'][$x]['biaya'][$i]=$itemmini['biaya'];
				$i++;	
			}
			$x++;						
		}
		$status=$this->uri->segment(4);
		
		if($status=='edit'){
			$this->data['kode']=$this->uri->segment(3);
			$this->data['namaglb']=$this->uri->segment(5);
			$this->data['biaya']=$this->biayamhs->getSumbanganPerGlb($this->data['kode']);
			
			$this->data['pageload']='admpmb/editsarana';
		}
										
		$this->data['webcontent']='admpmb/biayasarana';
	}
	
	function editsarana(){		
		$lendata=sizeof($_POST['kodejur']);
		$kode=$_POST['kodegel'];
		$nama=$_POST['namagel'];
		$success=0;
		for($i=0;$i<$lendata;$i++){
			if(is_digits($_POST['biayabr'][$i])){
				if($this->biayamhs->editSumbangan($kode,$_POST['kodejur'][$i],$_POST['biayabr'][$i])){
					$success++;	
				}
			}			
		}
		if($success==$lendata){
			$this->session->set_flashdata('message','Ubah biaya sarana berhasil untuk '.$nama);			
		}else{
			$this->session->set_flashdata('message','Ubah biaya sarana gagal untuk '.$nama);
		}
		
		redirect('admpmb/sarana');
	}
	
	function statistik(){
		$this->load->model('statistik');
		$this->data['content_title']='STATISTIK MAHASISWA BARU';		
		$this->data['stat']=$this->statistik->statperkab(1,TAHUN);		
		$this->data['webcontent']='pmb/statistik';			
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	function nopage(){
		$this->data['webcontent']='none';
	}
	// Develop setelah tanggal 11 02 2013
	function sinkronisasi(){
	$ThnPmb=$this->tahun->getThaPmb();
	$this->load->model('mhsbaru');
	$this->data['getDataMhsBru']=$this->mhsbaru->getMhsBaru($ThnPmb)->result_array();
	$this->db_public=$this->load->database('db_public');
	
	}
	
}
?>