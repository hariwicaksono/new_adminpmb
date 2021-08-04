<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Testing extends Controller{
	function Testing(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('mhsbaru');
		$this->load->model('biayamhs');
		$this->load->model('profil');
		$this->load->model('model_crud');
		$this->load->model('mkonversi');
		$this->load->library('fpdf');
		$this->load->helper('tanggal');
		define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	}					
	
	/*
	function regcard(){
		$cs=$this->session->userdata('pengguna');
		$nodaf=$this->uri->segment(3);
		$data=$this->mhsbaru->forkartupendaftaran($nodaf);
		$this->fpdf->Open();
		$this->fpdf->AddPage();
		$this->fpdf->setY(30);
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->SetFillColor(27,92,176);
		$this->fpdf->Cell(180,5,'Telah diterima uang sebesar Rp. '.$data['BIAYA_PENDAFTARAN'].',- untuk biaya pendaftaran',0,0,'C',TRUE);
		$this->fpdf->SetFillColor(0,0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->Cell(60,5,'Gelombang',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,$data['gelombang'],0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Nomor Pendaftaran',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,$data['nodaf'],0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Nomor Referensi',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,$data['noref'],0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Nama Lengkap',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,$data['nama'],0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Jurusan SLTA/SMK',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,$data['jurusan'],0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Pilihan',0,0);
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(5,5,'1.',0,0,'C');
		$this->fpdf->Cell(100,5,$data['NAMAPIL1'],0,0,'L');
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'',0,0);
		$this->fpdf->Cell(5,5,'',0,0,'C');
		$this->fpdf->Cell(5,5,'2.',0,0,'C');
		$this->fpdf->Cell(100,5,$data['NAMAPIL2'],0,0,'L');		
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Rata - Rata NEM/UAN',0,0);		
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(20,5,$data['nem'],0,0);
		$this->fpdf->Cell(80,5,'('.$data['catatan'].')',0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(60,5,'Jadwal Test',0,0);		
		$this->fpdf->Cell(5,5,':',0,0,'C');
		$this->fpdf->Cell(100,5,date('d-m-Y',strtotime($data['TGL_TES'])),0,0);
		$this->fpdf->Ln(6);
		$this->fpdf->Cell(180,5,'Aceh : '.date('d-F-Y'),0,0,'R');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',7);
		$this->fpdf->Cell(45,5,'',0,0);
		$this->fpdf->Cell(50,30,'',0,0);
		$this->fpdf->Cell(45,5,'',0,0);
		$this->fpdf->Cell(40,5,'',0,0);		
		$this->fpdf->Ln();
		$this->fpdf->Cell(45,5,'Pendaftar',0,0,'C');
		$this->fpdf->Cell(50,5,'',0,0);
		$this->fpdf->Cell(45,5,'Petugas Pendaftaran',0,0,'C');
		$this->fpdf->Cell(40,5,'Pengawas Ujian',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(50,5,'',0,0,'C');
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(40,5,'',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(50,5,'Foto',0,0,'C');
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(40,5,'',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(50,5,'(3X4)',0,0,'C');
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(40,5,'',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(50,5,'',0,0,'C');
		$this->fpdf->Cell(45,5,'',0,0,'C');
		$this->fpdf->Cell(40,5,'',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial','I',7);
		$this->fpdf->Cell(45,5,$data['nama'],0,0,'C');
		$this->fpdf->Cell(50,5,'',0,0,'C');
		$this->fpdf->Cell(45,5,'('.$cs.')',0,0,'C');
		$this->fpdf->Cell(40,5,'(............................)',0,0,'C');
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','I',5);
		$this->fpdf->Cell(180,5,'Universitas Iskandar Muda',0,0,'C');
		$this->fpdf->Output('kartu_pendaftaran'.$data['nodaf'].'.pdf','D');	
	}
	*/
	
	function regcardhtml(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		$this->data['cs']=$this->session->userdata('pengguna');
		$nodaf=$this->uri->segment(3);
		$this->data['data']=$this->mhsbaru->forkartupendaftaran($nodaf);		
		$this->load->view('print/regcard',$this->data);
	}
	
	function heregcardhtml(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		$this->data['tahunpmb']=$this->tahun->getThaPmb();			
		$this->data['profil']=$this->profil->getProfilPT();
		$daf=$this->uri->segment(3);	
		$this->data['tocard']['info']=$this->biayamhs->getBiayaPerMHS($daf,$this->data['tahunpmb']);
		$this->data['tocard']['totalwajib']=$this->biayamhs->getTotalWajib($daf);
		$this->data['tocard']['totalbayar']=$this->biayamhs->getTotalBayar($daf);
		$this->data['tocard']['terakhirbayar']=$this->biayamhs->getbayarterakhir($daf);
		$this->data['tocard']['sdhbayar']=$this->biayamhs->getSudahDibayar($daf);
		$this->data['tocard']['sisatanggungan']=(($this->data['tocard']['totalbayar']['TOTALBIAYA'])-($this->data['tocard']['sdhbayar']));
		$this->data['tocard']['namabiaya']=$this->biayamhs->getJenisBiaya();
		$this->data['tocard']['keycode']=$this->mhsbaru->getlistacc('NPM',$this->data['tocard']['info']['npm']);		
		$this->data['tocard']['tglcetak']=date('d-M-Y');
		if(empty($this->data['tocard']['terakhirbayar'])){
			$this->data['tocard']['terakhirbayar']=0;
			$this->load->view('print/none');
		}else{
			$this->load->view('print/printhercard',$this->data);
		}						
	}	
	
	function card(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		$this->fpdf->Cell(40,10,'Bagian Header');
		$this->fpdf->Ln(10);		
		//$this->fpdf->Cell(40,10,'Bagian Content Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum');		
		$this->fpdf->Write(5,'Bagian Content Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum Lorem ipsum lorem ipsum');
		$this->fpdf->Ln(10);
		$this->fpdf->Cell(40,10,'Bagian Footer');
	}
	
	function cetak() {
	if (empty($this->session->userdata['pengguna'])) redirect(base_url());
		$this->load->view('pmb/cetak');
	}
	
	
	function coba(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
	$this->data['tahunpmb']=$this->tahun->getThaPmb();			
		$this->data['profil']=$this->profil->getProfilPT();
		$daf=$this->uri->segment(3);	
		$this->data['tocard']['info']=$this->biayamhs->getBiayaPerMHS($daf,$this->data['tahunpmb']);
		$this->data['tocard']['totalwajib']=$this->biayamhs->getTotalWajib($daf);
		$this->data['tocard']['totalbayar']=$this->biayamhs->getTotalBayar($daf);
		$this->data['tocard']['terakhirbayar']=$this->biayamhs->getbayarterakhir($daf);
		$this->data['tocard']['sdhbayar']=$this->biayamhs->getSudahDibayar($daf);
		$this->data['tocard']['sisatanggungan']=(($this->data['tocard']['totalbayar']['TOTALBIAYA'])-($this->data['tocard']['sdhbayar']));
		$this->data['tocard']['namabiaya']=$this->biayamhs->getJenisBiaya();
		$this->data['tocard']['keycode']=$this->mhsbaru->getlistacc('NPM',$this->data['tocard']['info']['npm']);		
		$this->data['tocard']['tglcetak']=date('d-M-Y');
		if(empty($this->data['tocard']['terakhirbayar'])){
			$this->data['tocard']['terakhirbayar']=0;
			$this->load->view('print/none');
		}else{
			$this->load->view('print/coba',$this->data);
		}						
	}

	function formulir(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		$this->data['cs']=$this->session->userdata('pengguna');
		$nodaf=$this->uri->segment(3);
		$this->data['foto']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'foto','nodaf'=>$nodaf))->row_array();
		$this->data['data']=$this->mhsbaru->formulirMhsOnline($nodaf);
		$this->load->view('print/formulir',$this->data);
	}

	function tooltip(){
		if (empty($this->session->userdata['pengguna'])) { redirect(base_url());}
		$this->data['cs']=$this->session->userdata('pengguna');
		$nodaf=$_POST['userid'];
		$this->data['biodata']=$this->model_crud->selectData('calonsiswa',array('nodaf'=>$nodaf))->row_array();
		$this->data['foto']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'foto','nodaf'=>$nodaf))->row_array();
		$this->data['ijazah']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ijazah','nodaf'=>$nodaf))->row_array();
		$this->data['skhu']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'skhu','nodaf'=>$nodaf))->row_array();
		$this->data['foto']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'foto','nodaf'=>$nodaf))->row_array();
		$this->data['ktp']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ktp','nodaf'=>$nodaf))->row_array();
		$this->data['bukti_bayar']=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'bukti_bayar','nodaf'=>$nodaf))->row_array();
		$this->load->view('print/tooltip',$this->data);
	}
}
?>