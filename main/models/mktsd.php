<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mktsd extends CI_Model{
function get_kuliah_ditawarkan($kode='',$jur='',$sem=0,$tha='',$status='',$angkatan=''){
$q1="SELECT `m`.`kode`, `mkl`, `sks`, `k`.`sem1`,semester FROM (`mktsd` m) JOIN `kuliah` k ON `m`.`kode`=`k`.`kode` WHERE 
    `m`.`jur` = '$jur' AND `semester` = $sem AND `tha` = '$tha' 
	AND 'angkatan'<=$angkatan ORDER BY `k`.`sem1` desc";
return $this->db->query($q1);
/*
 $this->db->select('m.kode,mkl,sks,k.sem1,semester');
 $this->db->from('mktsd m');
 $this->db->join('kuliah k','m.kode=k.kode');
 $this->db->order_by('k.sem1','desc');
 if(!empty($kode)) $this->db->where('m.kode',$kode);
 if(!empty($jur)) $this->db->where('m.jur',$jur);
 if($sem!=0) $this->db->where('semester',$sem);
 if(!empty($tha)) $this->db->where('tha',$tha);
 if(!empty($status)&& $status=='1') {
    	$this->db->where('angkatan <= ',$angkatan); 
	}
 return $this->db->get();
 */
}

}
?>