<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkekurangan_pembayaran extends CI_Model{
var $table_name="keuangan_kekurangan_pembayaran_mhs";
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
function sum_kekurangan_pembayaran($data=array()){
$this->db->select('nominal_umum+nominal_sarana+nominal_pendukung as total');
$this->db->from($this->table_name);
$this->db->where($data);
$total=$this->db->get()->row_array();
return $total['total'];
}
}
?>