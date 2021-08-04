<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mkeuangan_kewajiban_biaya extends CI_Model{
var $nama_tabel="keuangan_kewajiban_biaya";
function tambah($data=array()){
$this->db->insert($this->nama_tabel,$data);
}
function hapus($data=array()){
$this->db->delete($this->nama_tabel,$data);
}
function cari($data=array()){
return $this->db->get_where($this->nama_tabel,$data);
}
function ubah($data1=array(),$data2=array()){
return $this->db->update($this->nama_tabel,$data1,$data2);
}
}
?>