<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mnilai extends CI_Model{
function get_bobot($data=array()){
return $this->db->get_where('bobot',$data);
}
function get_nilai($data=array()){
$this->db->select("nilai.kode,nilaitb,mkl,sks");
$this->db->from('nilai');
$this->db->join('kuliah','nilai.kode=kuliah.kode');
$this->db->where($data);
return $this->db->get();
}
function get_where_khs($data=array()){
$this->db->select("krs.kode,nilai,ambilke,mkl,sks");
$this->db->from('krs');
$this->db->join('kuliah','krs.kode=kuliah.kode');
$this->db->where($data);
return $this->db->get();
}
function get_tahun_akademik($data=array()){
$this->db->select('distinct(thn_ajaran) as thn_akademik');
$this->db->from('krs');
$this->db->where($data);
return $this->db->get();
}
function sks_kum($npm=''){
$data=$this->db->query("select dbo.SKSkum('$npm') as sks_kum")->row_array();
if(!empty($data)) return $data['sks_kum']; else return '0';
}
function ipk_kum($npm=''){
$data=$this->db->query("select dbo.HitungIPK('$npm') as ipk")->row_array();
if(!empty($data)) return $data['ipk']; else return '0';
}
}
?>