<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Propinsi extends Model
{
	function Propinsi(){
		parent::Model();
	}
	
	function getPropinsi(){		
		$data=$this->db->get('Propinsi');
		return $data->result_array();
	}
	
	function addPropinsi(){
		
	}
	
	function editPropinsi(){
		
	}
	
	function delPropinsi(){
		
	}
}
?>