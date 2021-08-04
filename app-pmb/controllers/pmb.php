<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Pmb extends Controller
{
	var $data;	
	var $temp;		
	function Pmb(){
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

	
	function index(){
		//pr($this->session->all_userdata());		
		$pengguna=$this->session->userdata('pengguna');
		$gol=$this->session->userdata('gol');
		if(!empty($pengguna) && $gol==2){			
			$this->data['tahunpmb']=$this->tahun->getThaPmb();	
			define('TAHUN', $this->data['tahunpmb']);
			$this->data['profil']=$this->profil->getProfilPT();		
			$this->data['userlogin']=strtoupper($pengguna);
			$this->data['messageproc']=$this->session->flashdata('messageproc');
			
			$menucs=array('datamhs'=>'Data Mahasiswa','kelulusan'=>'Kelulusan','laporan'=>'Laporan','pengaturan'=>'Pengaturan');
			
			$submenucs = array(
						'datamhs'=>array('datamhs'=>'DATA MHS BARU','datamhs_online'=>'DATA MHS VIA ONLINE','dataregister_online' => 'DATA AKUN PMB ONLINE','dataujiancbt'=>'NILAI UJIAN CBT',),
						'kelulusan'=>array('kelulusan'=>'KELULUSAN'),
						'laporan'=>array('laporan'=>'LAPORAN PMB'),
						'pengaturan'=>array('jadwal'=>'JADWAL PMB'),		
				);

			$this->data['menu']= $menucs;
			$this->data['sub_menu']= $submenucs;
			$this->data['webcontent']='';		
			$uriSegment=$this->uri->segment(1);			
			if(in_array($uriSegment,array('main','index','home',''))){				
		 			$this->statistik();
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
	
	/*function home(){		 
		 //print_r($this->statistik->statperkab());
		 $this->data['webcontent']='pmb/home';
	}*/		
	
	function mhsbaru(){
		$is_nodaf=$this->uri->segment(2);
		
		$this->data['daftarvia']=$this->mhsbaru->daftarVia();
		$this->data['jenismhs']=$this->mhsbaru->getJenisMhs();
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->data['agama']=$this->umum->getAgama();
		$this->data['infodari']=$this->umum->infoDari();
		$this->data['jursma']=$this->umum->jurusanSMA();
		$this->data['jas']=$this->umum->ukuranJas();
		$this->data['registrasi']=$this->umum->statusReg();
		$this->data['relasi']=$this->mhsbaru->relasiMhs();
		$this->data['propinsi']=$this->propinsi->getPropinsi();
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);
		$this->data['tgldaftar']=date('d-m-Y');
		$this->data['tgllahir']=date('d-m-Y');
		$this->data['gelactive']=$this->gelombang->getGelActive();
		
		$this->form_validation->set_rules('jenismhs', '<b>Jenis Mahasiswa</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('namalengkap', '<b>NAMA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nikktp','<b>NIK KTP</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('sekolahasal', '<b>SEKOLAH ASAL</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('propinsi1', '<b>PROPINSI MAHASISWA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kabupaten1', '<b>KABUPATEN MAHASISWA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('propinsi2', '<b>PROPINSI ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kabupaten2', '<b>KABUPATEN ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tempatlahir','<b>TEMPAT LAHIR</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('tgllahir','<b>TANGGAL LAHIR</b>','trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', '<b>ALAMAT</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pil1', '<b>PILIHAN 1</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pil2', '<b>PILIHAN 2</b>', 'trim|required|xss_clean');	
		
		$this->form_validation->set_rules('nem1', '<b>RATA-RATA NEM </b>', 'trim|required|is_natural|xss_clean');
		$this->form_validation->set_rules('nem2', '<b>RATA-RATA NEM</b>', 'trim|required|is_natural|xss_clean');	
		
		$this->form_validation->set_rules('kecamatan', '<b>KECAMATAN</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rt', '<b>RT</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rw', '<b>RW</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kelurahan', '<b>KELURAHAN</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kodepos', '<b>KODEPOS</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('telp', '<b>NO.TELP</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('no_wa', '<b>NO.WA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', '<b>EMAIL</b>', 'trim|required|valid_email|xss_clean');
		
		$this->form_validation->set_rules('namaortu', '<b>NAMA ORANGTUA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rt_ortu', '<b>RT ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rw_ortu', '<b>RW ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamatortu', '<b>ALAMAT ORANGTUA</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kelurahanortu', '<b>KELURAHAN ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kecamatanortu', '<b>KECAMATAN ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kodeposortu', '<b>KODEPOS ORTU</b>', 'trim|required|xss_clean');
		$this->form_validation->set_rules('telportu', '<b>NO.TELP ORTU</b>', 'trim|xss_clean');

		$this->form_validation->set_rules('pil3', '<b>PILIHAN 3 </b>', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('no_kuitansi', '<b>NO. KUITANSI</b>', 'trim|required|xss_clean');

		if($this->form_validation->run()==FALSE){
			//$this->index();
		}else{						
			$mhsbr=array();						
			$mhsbr['nem']=$this->input->post('nem1').'.'.$this->input->post('nem2');
			$mhsbr['nama']=$this->input->post('namalengkap');
			$mhsbr['nik']=$this->input->post('nikktp');
			$mhsbr['jk']=$this->input->post('jk');
			$mhsbr['sekolah']=$this->input->post('sekolahasal');
			$mhsbr['jurusan']=$this->input->post('jurslta');
			$mhsbr['alamat']=$this->input->post('alamat');
			$mhsbr['propinsi']=$this->input->post('propinsi1');
			$mhsbr['kabupaten']=$this->input->post('kabupaten1');
			$mhsbr['kodepos']=$this->input->post('kodepos');
			$mhsbr['telepon']=$this->input->post('telp');
			$mhsbr['email']=$this->input->post('email');
			$mhsbr['tgldaftar']=$this->input->post('tgldaftar');
			$mhsbr['gelombang']=$this->input->post('gelombang');
			$mhsbr['pilihan1']=$this->input->post('pil1');
			$mhsbr['pilihan2']=$this->input->post('pil2');
			$mhsbr['tmp']=$this->input->post('tempatlahir');
			$mhsbr['tglahir']=$this->input->post('tgllahir');
			$mhsbr['kelurahan']=$this->input->post('kelurahan');
			$mhsbr['rt']=$this->input->post('rt');
			$mhsbr['rw']=$this->input->post('rw');
			$mhsbr['kecamatan']=$this->input->post('kecamatan');
			$mhsbr['tahun_lulus']=$this->input->post('tahun_lulus');
			//biaya tanggungan mhs baru selain biaya pendaftaran 
			//akan di isikan setelah mhs tersebut lulus dan dinyatakan masuk
			/*if(empty($is_nodaf)){
				$mhsbr['beasarana']='0';
				$mhsbr['beasiswa']='0';
				$mhsbr['biaya_pendukung']='0';
				$mhsbr['biaya_pindahan']='0';
				$mhsbr['spptetap']='0';
				$mhsbr['sppvariabel']='0';
			}*/													
			//
			$mhsbr['BIAYA_PENDAFTARAN']=$this->input->post('biayadaftar');
			$mhsbr['komentar']=$this->input->post('infodari');
			$mhsbr['syarat1']=$this->input->post('syarat1');
			$mhsbr['syarat2']=$this->input->post('syarat2');
			$mhsbr['AGAMA']=$this->input->post('agama');				
			$mhsbr['THN_AKADEMIK']=$this->data['tahunpmb'];	
			$mhsbr['TGL_TES']=$this->input->post('tgltes');
			$mhsbr['NAMA_ORTU']=$this->input->post('namaortu');
			$mhsbr['RT_ORTU']=$this->input->post('rt_ortu');
			$mhsbr['RW_ORTU']=$this->input->post('rw_ortu');
			$mhsbr['KELURAHAN_ORTU']=$this->input->post('kelurahanortu');
			$mhsbr['KECAMATAN_ORTU']=$this->input->post('kecamatanortu');
			$mhsbr['KABUPATEN_ORTU']=$this->input->post('kabupaten2');
			$mhsbr['PROPINSI_ORTU']=$this->input->post('propinsi2');
			$mhsbr['KODEPOS_ORTU']=$this->input->post('kodeposortu');
			$mhsbr['TELP_ORTU']=$this->input->post('telportu');
			$mhsbr['ALAMATORTU']=$this->input->post('alamatortu');	
			$mhsbr['NAMA_CS']='ADMINTEST';
			$mhsbr['KODE_KERJASAMA']='1';
			$mhsbr['JENIS_MHS']=substr($this->input->post('jenismhs'),1,2);
			$mhsbr['ID_RELASI']=$this->input->post('relasi');
			$mhsbr['ID_JENISMHS']=substr($this->input->post('jenismhs'),0,1);
			$mhsbr['KELAS']=$this->input->post('kelas');
			$mhsbr['nama_ayah']=$this->input->post('nama_ayah');
			$mhsbr['status_registrasi']=$this->input->post('status_registrasi');
			$mhsbr['pekerjaan_ortu']=$this->input->post('pekerjaan_ortu');
			$mhsbr['pekerjaan_ayah']=$this->input->post('pekerjaan_ayah');
			$mhsbr['TELP_AYAH']= $this->input->post('telpayah');
			$mhsbr['no_wa']= $this->input->post('no_wa');
			$mhsbr['ukuran_jas']= $this->input->post('ukuran_jas');
			$mhsbr['no_kipk']= $this->input->post('no_kipk');
			$mhsbr['pilihan3']=$this->input->post('pil3');
			$mhsbr['status_pernikahan']=$this->input->post('status_menikah');
			$mhsbr['RELASI']=$this->input->post('relasitxt');
			$mhsbr['no_kuitansi']=$this->input->post('no_kuitansi');
			if(!empty($is_nodaf)){
				$mhsbr['nodaf']=$this->input->post('nodaf');
				$mhsbr['noref']=$this->input->post('noref');
				if($this->mhsbaru->editMhsbr($mhsbr,$mhsbr['nodaf'])){
					$this->data['message']=$this->mhsbaru->getMesg();
					$this->data['nodafakhir']=$this->input->post('nodaf');				
					redirect('biodata/'.$this->data['nodafakhir'],'refresh');																
				}else{
					$this->data['message']=$this->mhsbaru->getMesg();
				}
			}else{
				if($this->mhsbaru->addMhsbr($mhsbr,0,$this->input->post('daftarvia'))){
					$this->data['message']=$this->mhsbaru->getMesg();
					$this->data['nodafakhir']=$this->mhsbaru->getResult();				
					redirect('biodata/'.$this->data['nodafakhir'],'refresh');																
				}else{
					$this->data['message']=$this->mhsbaru->getMesg();
				}
			}
									
		}	
		
		if(!empty($is_nodaf)){
			$this->data['content_title']='UBAH DATA MAHASISWA BARU';
			$this->data['biodata']=$this->mhsbaru->getMhsBaruLengkap($is_nodaf);
			if(strlen($is_nodaf)==8){
				$this->data['biodata']['via']=substr($is_nodaf,6,2);	
			}elseif(strlen($is_nodaf)==10){
				$this->data['biodata']['via']=substr($is_nodaf,8,2);
			}else{
				$this->data['biodata']['via']='AO';
			}
			$this->data['kabbupaten']=$this->kabupaten->getKab($this->data['biodata']['propinsi']);
			
			
			$selected1=$this->department->getSelectedJurusan($this->data['biodata']['pilihan1']);
			$this->data['biodata']['fakselected1']=$selected1['KD_FAK'];
			$this->data['jurpilihan1']=$this->department->getJurusanByFak($selected1['KD_FAK']);
							
			$selected2=$this->department->getSelectedJurusan($this->data['biodata']['pilihan2']);
			$this->data['biodata']['fakselected2']=$selected2['KD_FAK'];
			$this->data['jurpilihan2']=$this->department->getJurusanByFak($selected2['KD_FAK']);	
			
			$selected3=$this->department->getSelectedJurusan($this->data['biodata']['pilihan3']);
			$this->data['biodata']['fakselected3']=$selected3['KD_FAK'];
			$this->data['jurpilihan3']=$this->department->getJurusanByFak($selected3['KD_FAK']);
			
			$this->data['kabbupaten2']=$this->kabupaten->getKab($this->data['biodata']['PROPINSI_ORTU']);					
			$this->data['webcontent']='pmb/ubahdata';
		}else{
			$this->data['content_title']='FORM INPUT DATA MAHASISWA BARU';			
			$this->data['webcontent']='pmb/inputdata';												
		}					
	}		
	
	function infomhs(){
		$this->data['nodaf']=$this->uri->segment(2);
		$this->data['webcontent']='pmb/infomhs';
	}
	
	function datamhs(){		
				
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');	
		$this->data['content_title']='DAFTAR MAHASISWA BARU';
		$this->data['kodegel']=$this->uri->segment(3);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsBaru($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));				
		
		$this->data['webcontent']='pmb/daftarpendaftar';		
	}
	
	function datamhs_online(){
	if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
	
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');	
		$this->data['content_title']='DAFTAR MAHASISWA BARU ONLINE';
		$this->data['kodegel']=$this->uri->segment(3);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsBaru_online($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));
		$this->data['webcontent']='pmb/datamhs_online';
	}
	
	function detailmhs_online(){
	if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
	
		$this->data['content_title']='DOKUMEN MAHASISWA BARU ONLINE';
		$this->data['webcontent']='pmb/detailmhs_online';	
		
	}
	
	function kelulusan(){
		$this->data['content_title']='KELULUSAN PMB';
		$this->data['message']='* baris dengan background merah menunjukkan <br />bahwa calon mahasiswa tersebut belum melengkapi persyaratan pendaftaran';		
		$this->form_validation->set_rules('nodaf1', '<b>NODAF1 untuk pencarian data</b>', 'trim|required|alpha_dash|min_length[8]|xss_clean');
		$this->form_validation->set_rules('nodaf2', '<b>NODAF2 untuk pencarian data</b>', 'trim|required|alpha_dash|min_length[8]|xss_clean');
		if($this->form_validation->run()==FALSE){
			
		}else{
			if($_POST){
				$nodaf1=$this->input->post('nodaf1');
				$nodaf2=$this->input->post('nodaf2');
				$this->data['cmhslulus']=$this->mhsbaru->getKelulusanPmb($nodaf1,$nodaf2,$this->data['tahunpmb']);	
			}	
		}				
					
		$this->data['webcontent']='pmb/kelulusan';
	}
	
	function luluskan(){
		$tahunpmb=$this->tahun->getThaPmb();
		$lendata=sizeof($_POST['nodaf']);
		$mydata['kelulusan']['nodaf']=$_POST['nodaf'];
		$mydata['kelulusan']['setlulus']=$_POST['setlulus'];
		$mydata['kelulusan']['jurpil']=$_POST['jurpil'];
		$mydata['kelulusan']['beasiswa']=$_POST['beasiswa'];
		$mydata['kelulusan']['SPI']=$_POST['SPI'];
        $mydata['kelulusan']['biaya_pengakuan_sks']=$_POST['biaya_pengakuan_sks'];
		$mydata['kelulusan']['penghasilan_ortu']=$_POST['penghasilan_ortu'];
		
		$success=0;
		for($i=0;$i<$lendata;$i++){
			if(isset($mydata['kelulusan']['jurpil'][$i])){$jurlulus=$mydata['kelulusan']['jurpil'][$i];}else{$jurlulus=null;}
			if(isset($mydata['kelulusan']['beasiswa'][$i])){$beasiswa=num_rep($mydata['kelulusan']['beasiswa'][$i]);}else{$beasiswa=null;}
			if(isset($mydata['kelulusan']['setlulus'][$i])){$islulus=$mydata['kelulusan']['setlulus'][$i];}else{$islulus=null;}
			if(isset($mydata['kelulusan']['nodaf'][$i])){$nodaf=$mydata['kelulusan']['nodaf'][$i];}else{$nodaf=null;}
			if(isset($mydata['kelulusan']['SPI'][$i])){$SPI=num_rep($mydata['kelulusan']['SPI'][$i]);}else{$SPI=null;}
			if(isset($mydata['kelulusan']['biaya_pengakuan_sks'][$i])){$biaya_pengakuan_sks=num_rep($mydata['kelulusan']['biaya_pengakuan_sks'][$i]);}else{$biaya_pengakuan_sks=null;}
			if(isset($mydata['kelulusan']['penghasilan_ortu'][$i])){$penghasilan_ortu=$mydata['kelulusan']['penghasilan_ortu'][$i];}else{$penghasilan_ortu=null;}
			if($this->mhsbaru->setKelulusan($tahunpmb,$jurlulus,$beasiswa,$SPI,$islulus,$nodaf,$biaya_pengakuan_sks,$penghasilan_ortu)){
				$success++;
			}							
		}
				
		if($success>0){
			$this->session->set_flashdata('messageproc','Kelulusan berhasil di proses');			
		}else{
			$this->session->set_flashdata('messageproc','Kelulusan gagal di proses '.$success.' panjang data '.$lendata);
		}		
		redirect('kelulusan');		
	}
	
	function daftarkelulusan(){
		$this->data['webcontent']='pmb/daftarkelulusan';
	}
	
	function jadwal(){
		$this->data['content_title']='JADWAL PENERIMAAN MAHASISWA BARU';
		$this->data['jadwal']=$this->gelombang->getGelombang($this->data['tahunpmb']);		
		$this->data['webcontent']='pmb/jadwalpmb';
	}	
			
	function laporan(){
		$this->data['content_title']='LAPORAN PENERIMAAN MAHASISWA BARU';
		$this->data['menulaporan']=array(
									'lapdaftar'=>"PENDAFTARAN",
									'laplulus'=>"LULUS TEST",
									'lapherregistrasi'=>"HER-REGISTRASI",
									);
		$this->data['webcontent']='pmb/laporan';
	}
	
	function lapdaftar(){		
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
		$this->data['tgl1']=date('d-m-Y');
		$this->data['tgl2']=date('d-m-Y');
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');				
		
		$this->data['kodegel']=$this->uri->segment(3);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsBaru($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));
		$this->load->view('laporan/lappendaftar',$this->data);
	}
	
	function laplulus(){		
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
		$this->data['tgl1']=date('d-m-Y');
		$this->data['tgl2']=date('d-m-Y');
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');				
		
		$this->data['kodegel']=$this->uri->segment(3);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));
		$this->load->view('laporan/laplulustest',$this->data);
	}
	
	function lapherregistrasi(){		
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
		$this->data['tgl1']=date('d-m-Y');
		$this->data['tgl2']=date('d-m-Y');
		$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
		$this->form_validation->run();	
		$this->data['searchkey']=$this->input->post('katakunci');				
		
		$this->data['kodegel']=$this->uri->segment(3);	
		$this->data['glmb']=$this->gelombang->getNmKdGel($this->data['tahunpmb']);						
		$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($this->data['tahunpmb'],$this->data['kodegel'],strtoupper($this->data['searchkey']));		
		$this->load->view('laporan/lapherregistrasi',$this->data);
	}
	
	function printkartupendaftaran(){
		$this->data['webcontent']='pmb/laporan';
	}		
	
	function statistik(){
		$this->data['content_title']='STATISTIK MAHASISWA BARU';		
		$this->data['stat']=$this->statistik->statperkab(1,TAHUN);		
		$this->data['webcontent']='pmb/statistik';			
	}		
		
	function biodata(){
		$this->data['content_title']='BIODATA MAHASISWA BARU';
		$this->data['nodaf']=$this->uri->segment(2);
		$this->data['biodata']=$this->mhsbaru->getMhsBaruLengkap($this->data['nodaf']);
		$this->data['webcontent']='pmb/biodata';
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	function nopage(){		
		$this->data['webcontent']='none';
	}

	function dataregister_online(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		
			$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
			$this->form_validation->run();	
			$this->data['searchkey']=$this->input->post('katakunci');	
			$this->data['content_title']='Daftar Akun PMB Online';					
			$this->data['datamhs']=$this->mhsbaru->getRegisterAkun_online(strtoupper($this->data['searchkey']));
			$this->data['webcontent']='pmb/dataregister_online';
	}

	function dataujiancbt(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		
			$this->form_validation->set_rules('katakunci', '<b>Kata kunci untuk pencarian</b>', 'required|alpha_dash|xss_clean');
			$this->form_validation->run();	
			$this->data['searchkey']=$this->input->post('katakunci');	
			$this->data['content_title']='DATA UJIAN COMPUTER BASED TEST';					
			$this->data['datamhs']=$this->mhsbaru->getDataUjianCBT(strtoupper($this->data['searchkey']));
			$this->data['webcontent']='pmb/data_ujiancbt';
	}

	function hapus_dataujiancbt($iduser = null){		
		if(!empty($iduser)){			
			if($this->mhsbaru->delDataUjianCBT($iduser)){
				$this->session->set_flashdata('message','Data ujian berhasil dihapus');
			}else{
				$this->session->set_flashdata('message','Data ujian gagal dihapus');
			}			
		}
		redirect('dataujiancbt');	
	}
				
}
?>