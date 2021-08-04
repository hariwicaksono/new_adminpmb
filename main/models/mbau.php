<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbau extends CI_Model{
var $table_name="keuangan_pembayaran_mhs_sementara";
function select_pembayaran_sementara($data=array()){
return $this->db->get_where($this->table_name,$data);
}
function generate_pembayaran_sementara($tahun_akademik='',$semester=0,$npm='',$jenis_pembayaran=0,$nominal=0,$id_krs=0){
$arr_data=array("tahun_akademik"=>$tahun_akademik,
                "semester"=>$semester,
				"jenis_pembayaran"=>$jenis_pembayaran,
				"nominal"=>$nominal,
				"npm"=>$npm,
				"id_krs"=>$id_krs);
$this->db->insert('keuangan_pembayaran_mhs',$arr_data);
}
function get_kewajiban_biaya($jenis_biaya=0,$tahun_angkatan=0){
if($jenis_biaya!=0) $this->db->where('jenis_biaya',$jenis_biaya);
if($tahun_angkatan!=0) $this->db->where('tahun_angkatan',$tahun_angkatan);
return $this->db->get('keuangan_kewajiban_biaya');
}
function hapus_pembayaran_mhs_sementara($id_krs=0){
$this->db->delete('keuangan_pembayaran_mhs',array('id_krs'=>$id_krs));
}
function get_angkatan_forgenerate(){
$data=array('F','L','K','D');
$this->db->select('distinct(tha) as tha');
$this->db->from('mhs');
$this->db->order_by('tha','desc');
$this->db->where_not_in('koda',$data);
return $this->db->get();
}
}
?>