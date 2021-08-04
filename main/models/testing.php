<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Testing extends Model_interface
{		
	function Testing(){		
	}
	
	function Data_Mhs(){
		$data=$this->db->get('PMB_X');
		return $data->result_array();
	}
}
?>