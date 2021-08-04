<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Kabupaten extends Model
{
	function Kabupaten(){
		parent::Model();
	}
	
	function getKab($KdProp=''){
		$this->db->select('KdKab,NamaKab');
		$this->db->from('Kabupaten');
		$this->db->where('Kdprop',$KdProp);
		$data=$this->db->get()->result_array();
		if(empty($KdProp)){
			$data='';	
		}
		return $data;
	}
	
	function addKabupaten(){
		
	}
	
	function editKabupaten(){
		
	}
	
	function delKabupaten(){
		
	}
}
?>