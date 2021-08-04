<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpembayaran_sementara extends CI_Model{
var $table_name="keuangan_pembayaran_mhs_sementara";

function pencarian($data=array()){
return $this->db->get_where("keuangan_pembayaran_mhs_sementara",$data);
}
function report_global($data=array()){
$this->db->select('DISTINCT(a.npm) as npm,nama, sum(nominal) as total_bayar, tgl_bayar, no_referensi');
$this->db->from('keuangan_pembayaran_mhs_sementara a');
$this->db->join('mhs b','a.npm=b.npm');
$this->db->where($data);
$this->db->order_by('tgl_bayar','desc');
$this->db->order_by('npm','asc');
$this->db->group_by(array('a.npm','tgl_bayar','no_referensi'));
return $this->db->get();
}
function update_aktivasi_keuangan($npm='',$nomor_kwitansi='',$kode_chek=array()){//terpakai
 if(!empty($kode_chek)){
  foreach($kode_chek as $r){
    $this->db->update('krs_sementara',array('aktivasi'=>1),array('id_krs'=>"$r"));
	$this->db->update('keuangan_pembayaran_mhs',array('proses'=>1,'no_referensi'=>"$nomor_kwitansi",
                  'kode_bank'=>$this->session->userdata['kode_cabang'],'tgl_bayar'=>date('Y-m-d')),
                  array('npm'=>$npm,'id_krs'=>"$r"));
  }
  
 }

$this->db->update('mhs',array('koda'=>'A'),array('npm'=>"$npm"));
}
function get_kewajiban_biaya1($tahun_akademik='',$semester=0,$angkatan=''){
 $this->db->select('b.jenis_biaya,a.nominal,a.jenis_biaya as kode_jenis');
 $this->db->from('keuangan_histori_kewajiban a');
 $this->db->join('keuangan_master_biaya b','a.jenis_biaya=b.id_biaya');
$this->db->where('a.tahun_akademik',$tahun_akademik);
$this->db->where('a.semester',$semester);
$this->db->where('a.angkatan',$angkatan);
return $this->db->get();
}
function get_kewajiban_biaya2($npm=''){ //terpakai
 $this->db->select('distinct(jenis_pembayaran) as kode_jenis,b.jenis_biaya,sum(a.nominal) as nominal');
 $this->db->from('keuangan_pembayaran_mhs a');
 $this->db->join('keuangan_master_biaya b','a.jenis_pembayaran=b.id_biaya');
$this->db->where('a.npm',$npm);
$this->db->where('proses',0);
$this->db->group_by('jenis_pembayaran');
$this->db->group_by('b.jenis_biaya');
return $this->db->get();
}
function get_sum_variabel($data=array()){//terpakai
 $this->db->select('sum(nominal) as tot');
 $this->db->from('keuangan_pembayaran_mhs a');
$this->db->where($data);
return $this->db->get()->row_array();
}
function get_makul_variabel($data){//terpakai
$this->db->select('kode,a.id_krs');
$this->db->from('keuangan_pembayaran_mhs a');
$this->db->join('krs_sementara b','a.id_krs=b.id_krs');
$this->db->where($data);
return $this->db->get();
}
function get_sum_aktivasi($tahun_akademik='',$semester=0,$proses=0){
 $this->db->select('count(distinct(npm)) as npm');
 $this->db->from('keuangan_pembayaran_mhs a');
$this->db->where('a.tahun_akademik',$tahun_akademik);
$this->db->where('a.semester',$semester);
$this->db->where('a.proses',$proses);
return $this->db->get()->row_array();
}
function get_for_aktivasi($tahun_akademik='',$semester=0,$npm='',$proses=0){
$this->db->select('b.kode,jenis_biaya,nominal,mkl,sks,a.jenis_pembayaran');
$this->db->from('keuangan_pembayaran_mhs_sementara a');
$this->db->where('a.tahun_akademik',$tahun_akademik);
$this->db->where('a.semester',$semester);
$this->db->where('a.npm',$npm);
$this->db->where('proses',$proses);
return $this->db->get();
}
function get_for_aktivasi2($tahun_akademik='',$semester=0,$npm='',$proses=0){
$this->db->select('b.kode,jenis_biaya,nominal,mkl,sks,a.jenis_pembayaran');
$this->db->from('keuangan_pembayaran_mhs_sementara a');
$this->db->join('krs_sementara b','a.id_krs=b.id_krs');
$this->db->join('keuangan_master_biaya c','a.jenis_pembayaran=c.id_biaya');
$this->db->join('kuliah d','b.kode=d.kode');
$this->db->where('a.tahun_akademik',$tahun_akademik);
$this->db->where('a.semester',$semester);
$this->db->where('a.npm',$npm);
$this->db->where('proses',$proses);
return $this->db->get();
}

function generate_pembayaran_sementara($tahun_akademik='',$semester=0,$npm='',$jenis_pembayaran=0,$nominal=0,$id_krs=0){
$arr_data=array("tahun_akademik"=>$tahun_akademik,
                "semester"=>$semester,
				"jenis_pembayaran"=>$jenis_pembayaran,
				"nominal"=>$nominal,
				"npm"=>$npm,
				"id_krs"=>$id_krs);
$this->db->insert('keuangan_pembayaran_mhs_sementara',$arr_data);
}
function get_kewajiban_biaya($jenis_biaya=0,$tahun_angkatan=0){
if($jenis_biaya!=0) $this->db->where('jenis_biaya',$jenis_biaya);
if($tahun_angkatan!=0) $this->db->where('tahun_angkatan',$tahun_angkatan);
return $this->db->get('keuangan_kewajiban_biaya');
}
function hapus_pembayaran_mhs_sementara($id_krs=0){
$this->db->delete('keuangan_pembayaran_mhs_sementara',array('id_krs'=>$id_krs));
}

}
?>