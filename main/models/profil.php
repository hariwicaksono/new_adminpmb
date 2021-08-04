<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Profil extends Model
{
	var $data;
	var $msg;
	var $db_adak;
	
	function Profil(){
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
	 * untuk mengambil profil PT
	 * @return 
	 */
	function getProfilPT(){
		$this->db_adak->select('KODE,NAMA,ALAMAT1,KOTA,KODE_POS,TELEPON,NIK_REKTOR');
		$this->db_adak->from('PROFIL_PT');
		$hasil=$this->db_adak->get();
		return $hasil->row_array();
	}
	
	/**
	 * 
	 * @param object $data [optional]
	 * $data=array(
	 * 		'NAMA'=>$data['NAMA'],
	 * 		'ALAMAT1'=>$data['ALAMAT'],
	 * 		'KOTA'=>$data['KOTA'],
	 * 		'KODE_POS'=>$data['KODE_POS'],
	 * 		'TELEPON'=>$data['TELEPON'],
	 * 		'NIK_REKTOR'=>data['NIK_REKTOR']
	 * )
	 * @return 
	 */
	function updateProfilPT($data=array()){
	 	$data=array(
	 		'NAMA'=>$data['NAMA'],
	  		'ALAMAT1'=>$data['ALAMAT'],
	  		'KOTA'=>$data['KOTA'],
	 		'KODE_POS'=>$data['KODE_POS'],
	  		'TELEPON'=>$data['TELEPON'],
	  		'NIK_REKTOR'=>$data['NIK_REKTOR']
	  	);
		
		if($this->db_adak->update('PROFIL_PT',$data)){
			$this->setMesg('Profil Perguruan Tinggi berhasil diubah');
			return TRUE;
		}else{
			$this->setMesg('Profil Perguruan Tinggi gagal diubah');
			return FALSE;
		}
	}
} 
?>