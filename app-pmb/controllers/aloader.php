<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Aloader extends Controller{
	
	function Aloader(){
		parent::Controller();
		$this->load->model('department');
		$this->load->model('manager');
	}
	
	function delfakultas(){		
		$id=$this->uri->segment(3);
		$name=$this->uri->segment(4);
		$this->department->deleteFakultas($id,$name);		
	}
	
	function getdepartment(){		
		$id=$this->uri->segment(3);
		$data=$this->department->getDepartment($id);					
	}
	
	function deldepartment(){
		$id=$this->uri->segment(3);
		$name=$this->uri->segment(4);
		$this->department->deleteDepartment($id,$name);	
	}
	
	function jurusan(){		
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->data['nonjurusan']=$this->department->getNonJurusan();
		$this->data['jurusan']=$this->department->getJurusan();
		$this->load->view('adm/jurusan',$this->data);
	}
	
	function settahun(){
		$this->load->model('tahun');
		$id=$this->uri->segment(3);
		$this->tahun->setThaAktif($id);
	}
	
	function tglkrs(){
		$this->load->model('krs');
		$kode=$this->input->post('jurusan');
		$this->data['infokrs']=$this->krs->infoKrsPerJur($kode);
		$this->data['kode']=$kode;
		$this->load->view('adm/listjadwal',$this->data);
	}
	
	function genjadwalkrs(){
		$this->load->model('krs');		
		$kode=$this->uri->segment(3);
		$this->krs->addInfo($kode);
		$this->data['infokrs']=$this->krs->infoKrsPerJur($kode);
		$this->load->view('adm/listjadwal',$this->data);
	}
	
	function setkrs(){
		$this->load->model('krs');
		$kode=$this->input->post('jurusan');
		$id=$this->input->post('mycode');
		$tgawal=$this->input->post('tgla1');
		$tgakhir=$this->input->post('tgla2');
		$this->krs->editInfo($id,$kode,'','',$tgawal,$tgakhir);
		$this->data['infokrs']=$this->krs->infoKrsPerJur($kode);		
		$this->load->view('adm/listjadwal',$this->data);
	}
	
	function listaccount(){
		$this->load->model('mhsbaru');
		$this->load->helper('form');
		$mode=$this->input->post('findby');
		$katakunci=$this->input->post('katakunci');		
		$this->data['daftar']=$this->mhsbaru->getlistacc($mode,$katakunci);			
		$this->load->view('adm/listaccount',$this->data);
	}
	
	function loedjur(){		
		$lo=$this->uri->segment(3);
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->data['alljurusan']=$this->department->getJurusanSimple();
		$this->data['jurusan']=$this->department->getJurusanToEd($lo);
		$this->load->view('adm/jurusaned',$this->data);
	}
	
	function listmk(){
		$this->data['title']='List MK';
		$key=$this->input->post('nama');
		$prodi=$this->input->post('tujuan');
		//$key=$this->uri->segment(4);
		//$prodi=$this->uri->segment(3);
		$this->data['mk']=$this->department->getlistmk($prodi,$key);		
		$this->load->view('adm/listmk',$this->data);
	}
	
	function getmksy(){
		$kode=$this->uri->segment(3);
		$this->data['kodejur']=$kode;		
		$this->data['daftarmk']=$this->department->getlistmkto($kode);
		$this->data['daftarnilai']=$this->department->getnilaistandart();
		$this->data['adanilai']=$this->department->getnilaihaveset($kode);
		$this->load->view('adm/listsysk',$this->data);
	}
	
	function setskripsi(){
		$this->department->setnilaiminsk($_POST['kode'],$_POST['nilai'],$_POST['status'],$_POST['kdjur']);
		$kode=$_POST['kdjur'];
		redirect('adm/jur/'.$kode.'/');		
	}
	
	function userman(){				
		$this->data['listuser']=$this->manager->getuserDB();		
		$this->load->view('adm/opuser',$this->data);
	}
	
	function faddprevac(){		
		$this->data['roledb']=$this->manager->listroleDB();
		$this->load->view('adm/faddprev',$this->data);
	}
	
	function pfaddprevac(){
		$loginname=$this->input->post('loginname');
		$passwd=$this->input->post('passkey');
		$grpname=$this->input->post('grup');
		$kelompok=$this->input->post('klpstat');		
		$this->manager->tambahuser($loginname,$passwd,$grpname,$kelompok);		
		$this->userman();								
		//redirect('adm/userapp');
	}
	
	function fchpp(){
		$this->data['nama']=$this->uri->segment(3);		
		$this->load->view('adm/fchpp',$this->data);
	}
	
	function pfchpp(){
		$nama=$this->input->post('loginname');
		$old=$this->input->post('oldpasskey');
		$new=$this->input->post('newpasskey');
		$this->manager->chPassTbl($nama,$old,$new);		
		$this->userman();
	}
	
	function delak(){
		$nama=$this->uri->segment(3);
		$this->manager->deluserToTbl($nama);		
		$this->userman();
	}
	
	function userprodi(){
		$this->data['userprodi']=$this->manager->listUserProdi();				
		$this->load->view('adm/opprodi',$this->data);
	}
	
	function faddprou(){
		$this->data['userprodi']=$this->manager->userProdi();
		$this->data['fakultas']=$this->department->getFakultasSimple();
		$this->load->view('adm/adduprou',$this->data);
	}
	
	function paddprou(){
		$namauser=$this->input->post('uprodi');
		$kdjur=$this->input->post('prodi');
		$this->manager->manageUserProdi($namauser,$kdjur,$namauser,$kdjur);
		$this->userprodi();
	}
	
	function delprodi(){
		$kode=$this->uri->segment(3);
		$nama=$this->uri->segment(4);
		$this->manager->hapusUserProdi($nama,$kode);
		$this->userprodi();
	}
	
}
?>