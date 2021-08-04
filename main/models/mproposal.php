<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mproposal extends CI_Model{
var $table_name="propinsi";
var $table_name2="kabupaten";
function propinsi_tambah($data=array()){
 $this->db->insert($this->table_name,$data);
}
function propinsi_tampil($data=array()){
return $this->db->get_where($this->table_name,$data);
}
function propinsi_hapus($data=array()){
$this->db->delete($this->table_name,$data);
}
function propinsi_update($data1=array(),$data2=array()){
$this->db->update($this->table_name,$data1,$data2);
}
function kabupaten_tambah($data=array()){
 $this->db->insert($this->table_name2,$data);
}
function kabupaten_tampil($data=array()){
return $this->db->get_where($this->table_name2,$data);
}
function kabupten_hapus($data=array()){
$this->db->delete($this->table_name2,$data);
}
function kabupaten_update($data1=array(),$data2=array()){
$this->db->update($this->table_name2,$data1,$data2);
}
}
?>