<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Krs extends Model{
	
	var $data;
	var $msg;
	var $db;
	var $cek;
	
	function Krs(){
		parent::Model();
		$this->db_adak=$this->load->database('db_adak',TRUE);
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	/**
	 * untuk mendapatkan info KRS per jurusan
	 * 
	 * @param object $kd_jur
	 * @return 
	 */
	function infoKrsPerJur($kd_jur){
		$this->db_adak->select('ID,KETERANGAN,CONVERT(CHAR(19),TGLAWAL,120) as TGLAWAL,CONVERT(CHAR(19),TGLSELESAI,120) as TGLSELESAI,JURUSAN,KODE');
		$this->db_adak->from('INFO');
		$this->db_adak->where('JURUSAN',$kd_jur);
		$hasil=$this->db_adak->get();
		//print($this->db_adak->last_query());
		return $hasil->result_array();
	}
	
	/**
	 * menambah info jadwal KRS
	 * 
	 * @param object $kd_jur
	 * @return 
	 */
	function addInfo($kd_jur){
		$this->db_adak->select_max('ID','MAX_ID');	
		$nummax=$this->db_adak->get('INFO')->row_array();
		
		$nummax1=$nummax['MAX_ID']+1;
		$nummax2=$nummax1+1;
		$nummax3=$nummax2+1;
		$date = date("Y-m-d");
		$this->db_adak->trans_start();		
			$this->db_adak->insert('INFO',array('ID'=>$nummax1,'KETERANGAN'=>'PENGISIAN KRS','TGLAWAL'=>$date,'TGLSELESAI'=>$date,'JURUSAN'=>$kd_jur,'KODE'=>'ISI KRS'));
			$this->db_adak->insert('INFO',array('ID'=>$nummax2,'KETERANGAN'=>'PERUBAHAN KRS','TGLAWAL'=>$date,'TGLSELESAI'=>$date,'JURUSAN'=>$kd_jur,'KODE'=>'UBAH KRS'));
			$this->db_adak->insert('INFO',array('ID'=>$nummax3,'KETERANGAN'=>'PENGISIAN KRSP','TGLAWAL'=>$date,'TGLSELESAI'=>$date,'JURUSAN'=>$kd_jur,'KODE'=>'ISI KRSP'));
		$this->db_adak->trans_complete();
		
		if($this->db_adak->trans_status()===FALSE){
			$this->setMesg('Jadwal KRS untuk jurusan gagal di tambahkan');
			return FALSE;
		}else{
			$this->setMesg('Jadwal KRS untuk jurusan berhasil di tambahkan');
			return TRUE;
		}
	}
	
	/**
	 * untuk mengubah jadwak KRS
	 * 
	 * @param object $id
	 * @param object $kd_jur
	 * @param object $keterangan
	 * @param object $nama_jur
	 * @param object $tgmulai
	 * @param object $tgselesai
	 * @return 
	 */
	function editInfo($id,$kd_jur,$keterangan='',$nama_jur='',$tgmulai,$tgselesai){
		$this->data=array(
				'TGLAWAL'=>date('Y-m-d',strtotime($tgmulai)),
				'TGLSELESAI'=>date('Y-m-d',strtotime($tgselesai))
		);
		if($this->db_adak->update('INFO',$this->data,array('ID'=>$id,'JURUSAN'=>$kd_jur))){
			$this->setMesg('Jadwal '.$keterangan.' untuk jurusan '.$nama_jur.' berhasil diubah');
			return TRUE;
		}else{
			$this->setMesg('Jadwal '.$keterangan.' untuk jurusan '.$nama_jur.' gagal diubah');
			return FALSE;
		}
	}
	
	
	/**
	 * cek apakah sudah ada info krs untuk jurusan inputan
	 * 
	 * @param object $kd_jur
	 * @return 
	 */
	function isInfoExist($kd_jur){
		$this->db->select('*');
		$this->db->from('INFO');
		$this->db->where('JURUSAN',$kd_jur);
		$this->cek=$this->db->get();
		return $this->cek->num_rows();
	}
}
?>