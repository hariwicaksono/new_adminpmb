<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mabsen_dosen extends CI_Model{
var $table_name="absen_dosen";
function tambah($data=array()){
 $this->db->insert($this->table_name,$data);
}
function cari($data=array()){
return $this->db->get_where($this->table_name,$data);
}

function cari2($data=array()){
	$this->db->select('*');
	$this->db->from('absen_dosen');
	$this->db->where($data);
	$this->db->order_by('id_presensi_dosen','desc');
	$this->db->limit('2');
	return $this->db->get();
}

function hapus($data=array()){
$this->db->delete($this->table_name,$data);
}
function update($data1=array(),$data2=array()){
$this->db->update($this->table_name,$data1,$data2);
}
function ambilke($data=array()){
$this->db->from($this->table_name);
$this->db->where($data);
return $this->db->count_all_results();
}
function join_kuliah($data=array()){
$this->db->select('ad.*,ktp.kode,mkl,kelasgab');
$this->db->from('absen_dosen ad');
$this->db->join('kuliahtp ktp','ad.kuliah_tp_id=ktp.idkuliah');
$this->db->join('kuliah k','ktp.kode=k.kode');
$this->db->join('master_kelasaktif mk','ktp.kelas=mk.id_kelas');
$this->db->where($data);
return $this->db->get();
}
function cek_jadwalmengajar($data=array()){
$this->db->select('jp.idkuliah,jam');
$this->db->from('jadwalperkuliahan jp');
$this->db->join('kuliahtp ktp','jp.idkuliah=ktp.idkuliah');
$this->db->where($data);//tahun aktif, hari, jam, nik
return $this->db->get();
}

function cari_dosen($data=array()){
	return $this->db->get_where('dosen',$data);

}

}
?>