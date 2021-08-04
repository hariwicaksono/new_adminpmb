<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mmhs extends CI_Model{
var $table_name="mhs";
function ubah($data1=array(),$data2=array()){
$this->db->update($this->table_name,$data1,$data2);
}
function get_biodata($npm=''){
$this->db->select('m.npm,NAMA,koda,nama_dept,m.kd_jur,pa,temlahir,tha,agama,jenis,tglahir,email,alamatmhs,telpmhs,kodepropasal,kabupaten,slta,
                  nama_ortu, alamatortu, pendidikan_ortu, no_hp, pekerjaan_ortu, nik_ortu,
				  pangkatortu, jabatanortu, instansi, alamat_kantor,id_jenismhs,sem');
$this->db->from('mhs m');
$this->db->join('department d','m.kd_jur=d.kd_dept');
$this->db->where('npm',$npm);
 return $this->db->get()->row_array();
}
function get_count_mhsbelumgenerate($data=array()){
$this->db->select('count(distinct(a.npm)) as tot');
$this->db->from('krs_sementara a');
$this->db->join('mhs b','a.npm=b.npm');
$this->db->where($data);
$this->db->where_in('koda',array('A','C','T','N'));
return $this->db->get();
}
function get_count_statusmhs($data=array()){
$this->db->select('count(distinct(a.npm)) as tot');
$this->db->from('mhs a');
//$this->db->where($data);
$this->db->where_in('koda',$data);
return $this->db->get();
}
function tambah_statusmhs($data=array()){
$this->db->insert('akademik_statusmhs',$data);
}
function semester_mhs($npm=''){
$this->db->where('npm',$npm);
$names = array('A', 'N');
$this->db->where_in('status', $names);
$this->db->from('akademik_statusmhs');
return $this->db->count_all_results();
}
}
?>