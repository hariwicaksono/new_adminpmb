<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('welcome_message');
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
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */