<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkepangkatan extends CI_Model{
var $table_name="kepangkatan";
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
function get_all(){
return $this->db->get($this->table_name);
}
}
?>