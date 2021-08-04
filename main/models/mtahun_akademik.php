<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtahun_akademik extends CI_Model{
function get_id_tahun(){
$r=$this->db->get('tahun_aktif')->row_array();
return $r['ID_TAHUN'];
}
function get_tahun_akademik($id_tahun=0,$tahun_akademik='',$semester=0){
 if($id_tahun==0 && $tahun_akademik=='' && $semester==0){
    $id_th=$this->get_id_tahun();
    $sql="select * from tahun_akademik where id_tahun=$id_th";
 }
 return $this->db->query($sql);
}
function get_tahunakademik_all(){
$this->db->select('distinct(thn_akademik) as thn_akademik');
$this->db->from('tahun_akademik');
$this->db->order_by('thn_akademik','desc');
return $this->db->get();
}
function get_prodi($data=array()){
$this->db->select('nidn,nama,nik1');
$this->db->from('akademik_jabatan_prodi');
$this->db->join('dosen','nidn=nik');
$this->db->where($data);
return $this->db->get();
}
}
?>