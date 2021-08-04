<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Apengguna extends Model{
	var $mesg;
	function Apengguna(){
		parent::Model();		
	}
	
	function setMesg($pesan){
		$this->mesg=$pesan;
	}
	
	function getMesg(){
		return $this->mesg;
	}
	
	function grantTo($u='',$p=''){		
		$this->db->select('NAMA as N,PASS as P,STATUS');
		$this->db->from('PMB_X');
		$this->db->where('NAMA',trim($u));
		$this->db->where('PASS',trim($p));
		$ambil=$this->db->get();
		if($ambil->num_rows()>0){
			$data=$ambil->row_array();						
			return $data;
		}else{
			$this->setMesg("User tidak dikenali, Login di tolak");			
			return FALSE;
		}								
	}
	
	
}
?>