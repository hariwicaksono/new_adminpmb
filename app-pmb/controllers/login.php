<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Login extends Controller{
	
	function Login(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('apengguna');
		$this->load->model('profil');
		//$this->output->enable_profiler(TRUE);		
	}
	
	function index(){
		$this->data['tahunpmb']=$this->tahun->getThaPmb();	
		$this->data['profil']=$this->profil->getProfilPT();													
		$this->load->view('akses',$this->data);			
	}
	
	function toenter(){			
		$u=$this->input->post('pengguna');
		$p=$this->input->post('passw');
		$hasil=$this->apengguna->grantTo(trim($u),trim($p));
		//pr($hasil);exit();
		$this->session->set_userdata('gol',$hasil['STATUS']);
		$this->session->set_userdata('pengguna',$hasil['N']);		
		if($hasil['STATUS']=='1'){			
			redirect('admpmb/index');	
			$this->session->set_flashdata('success', "Anda berhasil Login Sistem PMB"); 		
		}elseif($hasil['STATUS']=='2'){	
			$this->session->set_flashdata('success', "Anda berhasil Login Sistem PMB"); 					
			redirect('index');
		}elseif($hasil['STATUS']=='10'){
			$this->session->set_flashdata('success', "Anda berhasil Login Sistem PMB"); 
			redirect('adm/index');
		}elseif($hasil['STATUS']=='3'){
			$this->session->set_flashdata('success', "Anda berhasil Login Sistem PMB"); 
			redirect('keupmb/index');
		}else{
			$this->data['message']=$this->apengguna->getMesg();			
			$this->index();
		}		
	}
}

?>