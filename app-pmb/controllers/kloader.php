<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Kloader extends Controller{
	
	function Kloader(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('mhsbaru');
		$this->load->model('gelombang');
		$this->load->library('form_validation');
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
		$this->load->view('laporan/lapkeupendaftar',$this->data);		
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
		$this->load->view('laporan/lapkeululustest',$this->data);
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
		$this->load->view('laporan/lapkeuherregistrasi',$this->data);
	}
	
	function getDataMhs($kodegel){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		if(!empty($katakunci)){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'',$katakunci);
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'','',$tgl1,$tgl2);
		}else
		if($kodegel=='none'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun);
		}else{
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,$kodegel);	
		}		
		$this->load->view('laporan/lapkeucallpendaftar',$this->data);		
	}
	
	
	function getDataLulus($kodegel){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		if(!empty($katakunci)){
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,'',$katakunci);
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,'','',$tgl1,$tgl2);
		}else
		if($kodegel=='none'){
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun);
		}else{
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,$kodegel);	
		}
		$this->load->view('laporan/lapkeucalllulustest',$this->data);
	}
	
	function getDataHer($kodegel){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		if(!empty($katakunci)){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,'',$katakunci);
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,'','',$tgl1,$tgl2);
		}else
		if($kodegel=='none'){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun);
		}else{
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,$kodegel);	
		}
		$this->load->view('laporan/lapkeucallherregistrasi',$this->data);
	}
} 
?>