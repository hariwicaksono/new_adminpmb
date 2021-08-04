<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengajuan extends CI_Model{
var $table_name="pengajuan";
function tambah($data=array()){
 $this->db->insert($this->table_name,$data);
}
function cari($data=array()){
$this->db->order_by('tgl','desc');
return $this->db->get_where($this->table_name,$data);
}
function hapus($data=array()){
$this->db->delete($this->table_name,$data);
}
function update($data1=array(),$data2=array()){
$this->db->update($this->table_name,$data1,$data2);
}
function tampil(){
return $this->db->get($this->table_name);
}
function view_pengajuan($data=array()){
$this->db->select('p.npm,nama,tha,sem,nama_dept,alamatmhs,telpmhs,keperluan,kd_jur');
$this->db->from('pengajuan p');
$this->db->join('mhs','p.npm=mhs.npm');
$this->db->join('department d','mhs.kd_jur=d.kd_dept');
$this->db->where($data);
return $this->db->get();
}
}
?>