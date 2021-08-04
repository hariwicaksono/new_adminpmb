<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Adm extends Controller{
	
	function Adm(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('profil');
		$this->load->model('dosen');
		$this->load->model('department');
		
		$this->load->library('form_validation');
	}
	
	function index(){
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
		define('TAHUN', $this->data['tahunpmb']);
		$pengguna=$this->session->userdata('pengguna');		
		$gol=$this->session->userdata('gol');
		if(!empty($pengguna) && $gol==10){
			$this->data['userlogin']=strtoupper($pengguna);
			$this->data['profil']=$this->profil->getProfilPT();
			$this->data['messageproc']=$this->session->flashdata('pesan');
			$menucs=array(
					'adm/home'=>'PROFIL',
					'adm/fakultas'=>'FAKULTAS',
					'adm/department'=>'DEPARTEMEN',
					'adm/jurusan'=>'JURUSAN',
					'adm/tahunakademik'=>'TAHUN AKADEMIK',
					'adm/jadwalkrs'=>'JADWAL KRS',													
					'adm/userapp'=>'USER APLIKASI',
					'adm/usermhs'=>'LOGIN MHS',				
					'adm/logout'=>'LOGOUT'
					);
			$this->data['menu']=$menucs;
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
		$kode=$this->input->post('kodeprofil');		
		if(!empty($kode)){
			$data=array(
		 		'NAMA'=>$this->input->post('namapt'),
		  		'ALAMAT'=>$this->input->post('alamatpt'),
		  		'KOTA'=>$this->input->post('kotapt'),
		 		'KODE_POS'=>$this->input->post('kodepospt'),
		  		'TELEPON'=>$this->input->post('teleponpt'),
		  		'NIK_REKTOR'=>$this->input->post('nikrektor')
	  		);	
			$this->profil->updateProfilPT($data);
			$this->session->set_flashdata('pesan',$this->profil->getMesg());
			redirect('adm/home');
		}else{
			$this->data['profil']=$this->profil->getProfilPT();
			$this->data['listdosen']=$this->dosen->getListDosen();
		}				
		$this->data['webcontent']='adm/profil';
	}
	
	
	function fakultas(){
		$this->load->model('department');		
		$this->data['fakultas']=$this->department->getFakultas();		
		$this->data['listdosen']=$this->dosen->getListDosen();
		$this->data['webcontent']='adm/fakultas';
	}
	
	function opfakultas(){
		$this->form_validation->set_rules('kdfak', '<b>Kode Fakultas </b>', 'trim|required');
		$this->form_validation->set_rules('namafak', '<b>Nama Fakultas </b>', 'trim|required');
		if($this->form_validation->run()==FALSE){
			$this->fakultas();
		}else{
			$this->load->model('department');
			$mode=$this->input->post('mode');
			$kdfak=$this->input->post('kdfak');
			$namafak=$this->input->post('namafak');
			$nikdek=$this->input->post('namadek');
			if(empty($mode)){
				$this->department->addFakultas($kdfak,$namafak,$nikdek);
				$this->session->set_flashdata('pesan',$this->department->getMesg());			
			}else{
				$this->department->editFakultas($kdfak,$namafak,$nikdek);
				$this->session->set_flashdata('pesan',$this->department->getMesg());
			}
			redirect('adm/fakultas');	
		}		
	}
	
	function department(){
		$this->load->model('department');
		$this->data['kategori']=array('1'=>'Prodi','0'=>'Umum');
		$this->data['listdosen']=$this->dosen->getListDosen();
		$this->data['department']=$this->department->getDepartment();
		$this->data['webcontent']='adm/department';
	}
	
	function opdepartment(){		
		$namaprodid="";
		$namaproden="";
		$this->form_validation->set_rules('kddept', '<b>Kode Fakultas </b>', 'trim|required');
		$this->form_validation->set_rules('namadept', '<b>Nama Fakultas(id) </b>', 'trim|required');
		$this->form_validation->set_rules('namadepten', '<b>Nama Fakultas(en) </b>', 'trim|required');
		$kat=$this->input->post('kategori');
		if($kat==1){
			$this->form_validation->set_rules('namaprod', '<b>Nama Prodi(id) </b>', 'trim|required');
			$this->form_validation->set_rules('namaproden', '<b>Nama Prodi(en) </b>', 'trim|required');
			$namaprodid=$this->input->post('namaprod');
			$namaproden=$this->input->post('namaproden');
		}
		$mode=$this->input->post('mode');
		if(!empty($mode)){
			$this->form_validation->set_rules('mode', '<b>Set Mode Edit</b>', 'trim|required');	
		}		
				
		if($this->form_validation->run()==FALSE){
			$this->department();
		}else{						
			
			$kd=$this->input->post('kddept');
			$namaid=$this->input->post('namadept');
			$namaen=$this->input->post('namadepten');			
			$kabag=$this->input->post('namakabag');
			
			$dept=array(	
					'KD_DEPT'=>$this->input->post('kddept'),
					'NAMA_DEPT'=>$this->input->post('namadept'),
					'NIK'=>$this->input->post('namakabag'),
					'ENGLISH_NAME'=>$this->input->post('namadepten'),
					'IS_PRODI'=>$kat,
					'NAMA_PRODI'=>$namaprodid,
					'NAMA_PRODI_EN'=>$namaproden
			);
			
			if(empty($mode)){
				$this->department->addDepartment($dept);
				$this->session->set_flashdata('pesan',$this->department->getMesg());			
			}else{
				$this->department->editDepartment($dept);
				$this->session->set_flashdata('pesan',$this->department->getMesg());
			}
			redirect('adm/department');	
		}
	}	
	
	function jurusan(){
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->data['nonjurusan']=$this->department->getNonJurusan();
		$this->data['jurusan']=$this->department->getJurusan();
		$this->data['webcontent']='adm/jurusan';
	}
	
	function opjurusanad(){		
	  $jurusan=array(
	  		'KD_JUR'=>$this->input->post('prodi'),
	  		'MAX_BATASSTUDI'=>$this->input->post('maxstudi'),
	  		'KODE_MKL'=>$this->input->post('kdmk'),
	  		'KODE_KELAS'=>$this->input->post('kdkelas'),
	  		'SKS_SMT1'=>$this->input->post('skssmt1'),
	  		'MIN_SKS_SKRIPSI'=>$this->input->post('minsks'),
	  		'MAX_SKS_PERSEMESTER'=>$this->input->post('maxskssem'),
	  		'MAX_SKS_SP'=>$this->input->post('maxskssempen'),
	  		'KD_PRODI'=>$this->input->post('kdprod'),
	  		'KD_FAK'=>$this->input->post('fakultas'),
	  		'STATUS_AKREDITASI'=>$this->input->post('statsak'),	
	  		'TGL_AKREDITASI'=>$this->input->post('tglak'),
	  		'NO_IJIN'=>$this->input->post('noijin'),
	  		'GELAR'=>$this->input->post('gelar'),
	  		'SINGKATAN_GELAR'=>$this->input->post('singkgel'),
	  		'MIN_NILAI_SKRIPSI'=>$this->input->post('nilaiskripsi'),
	  		'MIN_SKS_LULUS'=>$this->input->post('minskslulus'),
	  		'MIN_NILAI_D'=>$this->input->post('maxd'),
	  		'MIN_IPK'=>$this->input->post('minipk')
	  );
	  
	  $this->department->addJurusan($jurusan,TAHUN);
	  $this->session->set_flashdata('pesan',$this->department->getMesg());
	  redirect('adm/jurusan');	
	}
	
	function opjurusaned(){
		//pr($_POST);
		$tanggal=date('Y-m-d',strtotime($this->input->post('tglak')));
		$jurusan=array(
	  		'KD_JUR'=>$this->input->post('kdjur'),
	  		'MAX_BATASSTUDI'=>$this->input->post('maxstudi'),
	  		'KODE_MKL'=>$this->input->post('kdmk'),
	  		'KODE_KELAS'=>$this->input->post('kdkelas'),
	  		'SKS_SMT1'=>$this->input->post('skssmt1'),
	  		'MIN_SKS_SKRIPSI'=>$this->input->post('minsks'),
	  		'MAX_SKS_PERSEMESTER'=>$this->input->post('maxskssem'),
	  		'MAX_SKS_SP'=>$this->input->post('maxskssempen'),
	  		'KD_PRODI'=>$this->input->post('kdprod'),
	  		'KD_FAK'=>$this->input->post('nmfak'),
	  		'STATUS_AKREDITASI'=>$this->input->post('statsak'),	
	  		'TGL_AKREDITASI'=>$tanggal,
	  		'NO_IJIN'=>$this->input->post('noijin'),
	  		'GELAR'=>$this->input->post('gelar'),
	  		'SINGKATAN_GELAR'=>$this->input->post('singkgel'),
	  		'MIN_NILAI_SKRIPSI'=>$this->input->post('nilaiskripsi'),
	  		'MIN_SKS_LULUS'=>$this->input->post('minskslulus'),
	  		'MIN_NILAI_D'=>$this->input->post('maxd'),
	  		'MIN_IPK'=>$this->input->post('minipk'),
			'KODE_TA'=>$this->input->post('kodeta')
	  );
	  //pr($jurusan);exit();
	   	$this->department->editJurusan($jurusan,$jurusan['KD_JUR']);
	 	$this->session->set_flashdata('pesan',$this->department->getMesg());
		redirect('adm/jurusan');
	}	
	
	function tahunakademik(){
		$this->data['thnaktif']=$this->tahun->getThaAktif();
		$this->data['daftartahun']=$this->tahun->listTahunAkademik();
		$this->data['webcontent']='adm/thnakademik';
	}						
	
	function optahun(){		
		$tahun=$this->input->post('th_aka_awal').'/'.$this->input->post('th_aka_akir');				
		$this->tahun->addThnAkademik($tahun);
		$this->session->set_flashdata('pesan',$this->tahun->getMesg());	
		redirect('adm/tahunakademik');
	}
	
	function jadwalkrs(){
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->data['webcontent']='adm/jadwalkrs';
	}
	
	function usermhs(){
		$this->data['webcontent']='adm/mhs';
	}
	
	function userapp(){
		$this->data['webcontent']='adm/manuser';
	}		
	
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	function nopage(){				
		$this->data['webcontent']='none';
	}
	
	function jur(){
		$this->data['kembali']=$this->uri->segment(3);
		$this->data['webcontent']='adm/tempback';
	}
}
?>