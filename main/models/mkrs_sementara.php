<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkrs_sementara extends CI_Model{
function tambah_krs($data=array()){
$this->db->insert('krs',$data);
}
function update($data1=array(),$data2=array()){
$this->db->update('krs_sementara',$data1, $data2);
}
function update_isi_krs($data=array()){
$this->db->update('krs_sementara',array('isi_krs'=>1),$data);
}
function get_krs_teori($data=array()){
 $this->db->select('m.kode,mkl,sks,ambilke,kelas_t,kelas_p,nilai');
 $this->db->from('krs m');
 $this->db->join('kuliah k','m.kode=k.kode');
 $this->db->where($data);
 return $this->db->get();
}
function search_krs_sementara($data=array()){
 $this->db->select('m.kode,mkl,sks,id_krs');
 $this->db->from('krs_sementara m');
 $this->db->join('kuliah k','m.kode=k.kode');
 $this->db->where($data);
 return $this->db->get();
}
function jumlah_kelas_terisi($id_kelas=0){
$this->db->select('count(kelas) as jumlah');
$this->db->from('krs');
$this->db->where('kelas',$id_kelas);
$datane=$this->db->get()->row_array();
if(empty($datane)) return 0; else return $datane['jumlah'];
}
function ambilke($data=array()){
$this->db->select('count(kode)+1 as jumlah');
$this->db->from('krs');
$this->db->where($data);
$datane=$this->db->get()->row_array();
return $datane['jumlah'];
}
function get_kuliah_ditawarkan($thn_ajaran='',$semester=0,$npm=''){
 $this->db->select('m.kode,mkl,sks,k.sem1,semester,id_krs');
 $this->db->from('krs_sementara m');
 $this->db->join('kuliah k','m.kode=k.kode');
 $this->db->order_by('k.sem1','desc');
 $this->db->where('semester',$semester);
 $this->db->where('thn_ajaran',$thn_ajaran);
 $this->db->where('npm',$npm);
 $this->db->where('boleh',1);
 $this->db->where('diambil','0');
 return $this->db->get();
}
function get_ambil_mk($thn_ajaran='',$semester=0,$npm='',$ambil=0){
 $this->db->select('m.kode,mkl,sks,k.sem1,semester,id_krs,aktivasi');
 $this->db->from('krs_sementara m');
 $this->db->join('kuliah k','m.kode=k.kode');
 $this->db->order_by('k.sem1','desc');
 $this->db->where('semester',$semester);
 $this->db->where('thn_ajaran',$thn_ajaran);
 $this->db->where('npm',$npm);
 $this->db->where('diambil',$ambil);
// $this->db->where('aktivasi',$aktivasi);
 return $this->db->get();
}
function get_jumsks_diambil($thn_ajaran='',$semester=0,$npm=''){
$query="select sum(sks) as tot from krs_sementara ks join kuliah k on ks.kode=k.kode
        where thn_ajaran='$thn_ajaran' and semester=$semester and npm='$npm'
and diambil=1";
return $this->db->query($query);
}
function update_ambilkrs_sementara ($id_krs=0,$diambil=0){
$this->db->update("krs_sementara",array('diambil'=>$diambil),array('id_krs'=>$id_krs));
}
function update_ambilkrs_sementara1 ($thn_ajaran='',$semester=0,$kode='',$diambil=0){
$this->db->update("krs_sementara",array('diambil'=>$diambil),array('thn_ajaran'=>$thn_ajaran,'semester'=>$semester,'kode'=>$kode));
}
}
?>