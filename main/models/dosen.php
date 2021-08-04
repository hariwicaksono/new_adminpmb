<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Dosen extends Model{
	var $data;
	var $msg;
	var $db;
			
	function Dosen(){
		parent::Model();
		$this->db_adak=$this->load->database('db_adak',TRUE);
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	/**
	 * daftar dosen atau karyawan
	 * 
	 * @return 
	 */
	function getListDosen(){
		$this->db_adak->select('NIK,NAMA,GELARDEPAN,GELARBLKG');
		$this->db_adak->from('DOSEN');
		$this->db_adak->order_by('NAMA','asc');
		$this->data=$this->db_adak->get();
		return $this->data->result_array();
	}
	
	
}
?>