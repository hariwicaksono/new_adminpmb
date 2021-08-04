<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkuliahtp extends CI_Model{
var $table_name='kuliahtp';
function get_kuliahtp($data=array()){
 $this->db->select("ktp.nik,ktp.kelas,hari,ruang,jam1,jam2,ktp.idkuliah,kelasgab,max_pesertabaru,jeniskuliah");
 $this->db->from('kuliahtp ktp');
 $this->db->join('jadwalperkuliahan jp','jp.idkuliah=ktp.idkuliah');
 $this->db->join('jam j','j.idjam=jp.jam');
 $this->db->join('master_kelasaktif mk','ktp.kelas=mk.id_kelas'); 
 $this->db->where($data);
 $this->db->order_by('ktp.kelas','asc');
 $this->db->order_by('ktp.jeniskuliah','asc');
 
 return $this->db->get();
 //$this->db->join('master_kelasaktif mk','ktp.kelas=mk.id_kelas'); matikan sementara data master_kelas kosong
 
}
function cari($data=array()){
return $this->db->get_where($this->table_name,$data);
}
function sinkronisasi($tahun_aktif=0,$kd_jur='',$sem=0,$thn_akademik='',$semester_akademik=0,$npm='',$jenis_mhs=1){
if($jenis_mhs!=1) $query="exec Usp_sinkronisasi_nonreguler @tahun_aktif=$tahun_aktif,@kd_jur='$kd_jur',@sem=$sem,
                          @thn_akademik='$thn_akademik',@semester=$semester_akademik,
						  @npm='$npm'";
else 
$query="exec Usp_sinkronisasi_reguler @tahun_aktif=$tahun_aktif,@kd_jur='$kd_jur',@sem=$sem,
                          @thn_akademik='$thn_akademik',@semester=$semester_akademik,
						  @npm='$npm'";
return $this->db->query($query);
}

}
?>