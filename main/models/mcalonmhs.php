<?php
class Mcalonmhs extends Model{
var $nama_tabel='registrasi_pmb';

function tambah($data=array()){
$this->db->insert($this->nama_tabel,$data);
}
function update($data=array(),$data2=array()){
$this->db->update($this->nama_tabel,$data(),$data2());
}
function hapus($data=array()){
$this->db->delete($this->nama_tabel,$data);
}
function cari($data=array()){
return $this->db->get_where($this->nama_tabel,$data);
}

}
 ?>