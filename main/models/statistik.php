<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Statistik extends Model{
	function Statistik(){
		parent::Model();
	}
	
	function statperkab($kdprop,$tahun=''){
		$this->db->select('namakab,count(kabupaten) as jml');
		$this->db->from('calonsiswa c');
		$this->db->join('kabupaten k','k.KdKab=c.kabupaten','right');
		$this->db->where('kdprop',$kdprop);
		if(!empty($tahun)){
			$this->db->where('THN_AKADEMIK',$tahun);	
		}		
		$this->db->group_by('namakab');
		$this->db->order_by('namakab','asc');
		$hasil=$this->db->get()->result_array();
		//print($this->db->last_query());		
		return $hasil;
	}
}
?>