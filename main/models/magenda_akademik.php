<?php
class Magenda_akademik extends CI_Model{
var $table_name='agenda_akademik';
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
function cek_daftar($data=array()){
$tamp=$this->db->get_where($this->table_name,$data)->row_array();
if(!empty($tamp)){
$waktu_sekarang=mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
$waktu_awal=mktime(date("H",strtotime($tamp['tanggal_mulai'])),date("i",strtotime($tamp['tanggal_mulai'])),date("s",strtotime($tamp['tanggal_mulai'])),date("m",strtotime($tamp['tanggal_mulai'])),date("d",strtotime($tamp['tanggal_mulai'])),date("Y",strtotime($tamp['tanggal_mulai'])));
$waktu_akhir=mktime(date("H",strtotime($tamp['tanggal_selesai'])),date("i",strtotime($tamp['tanggal_selesai'])),date("s",strtotime($tamp['tanggal_selesai'])),date("m",strtotime($tamp['tanggal_selesai'])),date("d",strtotime($tamp['tanggal_selesai'])),date("Y",strtotime($tamp['tanggal_selesai'])));
  if($waktu_sekarang >= $waktu_awal && $waktu_sekarang <= $waktu_akhir) return "1"; else return "0";
}
else {
return "0";
}
}
}
?>