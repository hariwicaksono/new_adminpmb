<?php
class Mpengumuman extends CI_Model{
var $table1="pengumuman";
var $table2="pengumuman_link";
var $table="berita";
function daftar_link($data=array()){
return $this->db->get_where($this->table2,$data);
}
function get_where_pengumuman($array_where=array()){
$this->db->select('id_info,judul_info,isi_info,tanggal_info,jam,gambar,nama_lengkap,dilihat,p.username');
$this->db->from('pengumuman p');
$this->db->join('users u','p.username=u.username');
$this->db->where($array_where);
$this->db->order_by('tanggal_info','desc');
return $this->db->get();
}
function jumlah_pengumuman($data=array()){
$this->db->from('pengumuman p');
$this->db->join('users u','p.username=u.username');
$this->db->where($data);
return $this->db->count_all_results();
}
function update_pengumuman($data_field=array(),$kunci=array()){
$this->db->update('pengumuman',$data_field,$kunci);
}	
function get_lampiran($data_lampiran=array()){
return $this->db->get_where('lampiran',$data_lampiran);
}
function tampil_berita($array_where=array()){
$this->db->select('p.*,u.nama_lengkap');
$this->db->from('berita p');
$this->db->join('users u','p.username=u.username');
if(!empty($array_where)) $this->db->where($array_where);
$this->db->order_by('tanggal','desc');
return $this->db->get();
}
}
?>