<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkrs extends CI_Model{
var $table_name="krs";
function tambah($data=array()){
 $this->db->insert($this->table_name,$data);
}
function cari($data=array()){
return $this->db->get_where($this->table_name,$data);
}
function hapus($data=array()){
$this->db->delete($this->table_name,$data);
}
function update($data1=array(),$data2=array()){
$this->db->update($this->table_name,$data1,$data2);
}
function ambilke($data=array()){
$this->db->from($this->table_name);
$this->db->where($data);
return $this->db->count_all_results();
}
function cari_makul($thn_ajaran='',$sem=0,$kdjur='',$jenis=''){
$query="select * from krs where thn_ajaran='$thn_ajaran' and semester=$sem and kode in(select kode from kuliah where kd_jur='$kdjur' and mkl='$jenis')";
return $this->db->query($query);
}
function join_mhs($kuliah_t=0){
$this->db->select('krs.npm,nama');
$this->db->from('krs');
$this->db->join('mhs','krs.npm=mhs.npm');
$this->db->where('kelas_t',$kuliah_t);
$this->db->or_where('kelas_p',$kuliah_t);
$this->db->order_by('krs.npm','asc');
return $this->db->get();
}
}
?>