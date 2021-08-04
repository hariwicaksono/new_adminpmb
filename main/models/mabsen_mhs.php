<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mabsen_mhs extends CI_Model{
var $table_name="absen_mhs";
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
function jumlah_kehadiran($data=array()){
$this->db->from($this->table_name);
$this->db->where($data);
return $this->db->count_all_results();
}
function join_mhs($data=array()){
$this->db->select('absen_mhs.*,nama');
$this->db->from($this->table_name);
$this->db->join('mhs','absen_mhs.npm=mhs.npm');
$this->db->order_by('absen_mhs.npm','asc');
$this->db->where($data);
return $this->db->get();
}
function update_absen($id_presensi_mhs="",$jam="00:00:00"){
$query="exec proses_absen '$id_presensi_mhs','$jam'";
$this->db->query($query);
}
}
?>