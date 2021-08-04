<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mview extends CI_Model{
function getAbsenOtomatis($jam1='',$jam2='',$tahun_aktif=0,$hari='',$nik=''){
$query="select  ktp.nik from jadwalperkuliahan jp inner join jam j on jp.JAM=j.idJam inner join kuliahtp ktp
on ktp.IDKULIAH=jp.IDKULIAH where jam1>='$jam1' and jam2<='$jam2' and TAHUN_AKTIF=$tahun_aktif and HARI='$hari'
AND NIK='$nik'";
return $this->db->query($query);
}


function get_jadwalkuliah($data=array()){
$this->db->select('hari,jam1,jam2,ruang');
$this->db->from('jadwalperkuliahan jp');
$this->db->join('jam j','jp.jam=j.idjam');
$this->db->where($data);
return $this->db->get();
}
function get_dosenPa(){
$this->db->select('a.pa, b.nama');
$this->db->from('mhs a');
$this->db->join('dosen b','a.pa=b.nik1');
return $this->db->get();
}
function get_Kaprodi($kdjur=''){
$this->db->select('a.nik, b.nama,paraf');
$this->db->from('akademik_kaprodi a');
$this->db->join('dosen b','a.nik=b.nik1');
$this->db->where('a.kd_jur',$kdjur);
return $this->db->get();
}
function pembayaran_mhs_join_master_bank($data=array()){
$this->db->select('distinct(c.no_referensi) as no_referensi, nama_bank,nominal_dibayar,c.tgl_bayar,no_kwitansi');
$this->db->from('keuangan_pembayaran a');
$this->db->join('keuangan_master_bank b','a.kode_bank=b.id_bank');
$this->db->join('keuangan_pembayaran_mhs c','a.no_referensi=c.no_referensi');
$this->db->order_by('tgl_bayar','desc');
$this->db->where($data);
return $this->db->get();
}
function detail_pembayaran($data=array()){
$this->db->select('distinct(jenis_pembayaran) as jenis_pembayaran, tahun_akademik,semester,jenis_biaya');
$this->db->from('keuangan_pembayaran_mhs a');
$this->db->join('keuangan_master_biaya b','a.jenis_pembayaran=b.id_biaya');
$this->db->where($data);
return $this->db->get();
}
function get_jadwal_ujian($data=array()){
$this->db->select('j.npm,nama,j.kode_mk,mkl,tgl_ujian,ruang,jam_ujian,kelas,no_identifi');
$this->db->from('jadwal_ujian j');
$this->db->join('mhs m','j.npm=m.npm');
$this->db->join('kuliah k','j.kode_mk=k.kode');
$this->db->where($data);
return $this->db->get();
}

}
?>