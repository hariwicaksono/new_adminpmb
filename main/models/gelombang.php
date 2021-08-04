<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Gelombang extends Model
{
	var $data;
	var $msg;
	
	function Gelombang(){
		parent::Model();
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	/**
	 * menampilkan gelombang pendaftaran sesuai tahun PMB 
	 * 
	 * @param object $ThaPmb
	 * @return 
	 */
	function getGelombang($ThaPmb,$kode_gel=''){
		$this->db->select('kode,gelombang,convert(varchar(10),tgl_mulai,105) as tgl_mulai,convert(varchar(10),tgl_selesai,105) as tgl_selesai');
		$this->db->from('data_gelombang');
		$this->db->where('thn_akademik',$ThaPmb);
		if(!empty($kode_gel)){
			$this->db->where('kode',$kode_gel);
			$hasil=$this->db->get();		
			return $hasil->row_array();
		}else{
			$hasil=$this->db->get();		
			return $hasil->result_array();
		}		
					
	}
	
	/**
	 * menampilkan hanya nama dan kode gelombang
	 * 
	 * @param object $ThaPmb
	 * @return 
	 */
	function getNmKdGel($ThaPmb){
		$this->db->select('kode,gelombang');
		$this->db->from('data_gelombang');
		$this->db->where('thn_akademik',$ThaPmb);
		$hasil=$this->db->get()->result_array();				
		return $hasil;
	}
	
	/**
	 * ambil gelombang aktif 
	 * 
	 * @return 
	 */
	function getGelActive(){
		$this->db->select('kode,gelombang');
		$this->db->from('data_gelombang');
		$this->db->where('tgl_mulai<'.date('Y-m-d').' and tgl_selesai>'.date('Y-m-d').'');
		$hasil=$this->db->get()->row_array();
		//print($this->db->last_query());
		if(is_null($hasil) || empty($hasil)){
			return '';
		}							
		return $hasil['kode'];
	}
	
	/**
	 * Untuk menambah gelombang
	 * 
	 * @param object $gelombang
	 * @param object $tglmulai
	 * @param object $tglselesai
	 * @param object $thnakademik
	 * @return 
	 */
	function addGelombang($gelombang,$tglmulai,$tglselesai,$thnakademik){
		$this->data=array(
						'gelombang'=>$gelombang,
						'tgl_mulai'=>date('Y-m-d',strtotime($tglmulai)),
						'tgl_selesai'=>date('Y-m-d',strtotime($tglselesai)),
						'thn_akademik'=>$thnakademik
					);	
		if($this->db->insert('data_gelombang',$this->data)){
			$last_id=$this->db->insert_id();
			$this->db->select('KD_JUR');
			$this->db->from('jurusan');
			$query=$this->db->get();
			
			$this->db->trans_start();			
			foreach($query->result_array() as $row){
				$datainput=array(
					'kode_gel'=>$last_id,
					'jurusan'=>$row['KD_JUR'],
					'biaya'=>0
				);
				$this->db->insert('biaya_sarana',$datainput);
			}
			$this->db->trans_complete();	
					
			$this->setMesg('Gelombang PMB berhasil ditambahkan');
			return TRUE;
		}else{
			$this->setMesg('Gelombang PMB gagal ditambahkan');
			return FALSE;
		}
	}
	
	/**
	 * untuk mengedit gelombang
	 * 
	 * @param object $gelombang
	 * @param object $tglmulai
	 * @param object $tglselesai
	 * @param object $thnakademik
	 * @param object $kode [optional]
	 * @return 
	 */
	function editGelombang($gelombang,$tglmulai,$tglselesai,$thnakademik,$kode=''){
		$this->data=array(
						'gelombang'=>$gelombang,
						'tgl_mulai'=>date('Y-m-d',strtotime($tglmulai)),
						'tgl_selesai'=>date('Y-m-d',strtotime($tglselesai)),
						'thn_akademik'=>$thnakademik
					);				
		if(!empty($kode)){
			if($this->db->update('data_gelombang',$this->data,array('kode'=>$kode))){
				$this->setMesg('Gelombang PMB berhasil diubah');
				return TRUE;
			}else{
				$this->setMesg('Gelombang PMB gagal diubah');
				return FALSE;
			}
		}else{
			$this->setMesg('Gelombang PMB gagal diubah');
			return FALSE;
		}
	}
	
	/**
	 * untuk menghapus data gelombang
	 * 
	 * @param object $kode [optional]
	 * @return 
	 */
	function delGelombang($kode=''){		
		if(!empty($kode)){
			$this->db->trans_start();
			$this->db->delete('biaya_sarana',array('kode_gel'=>$kode));
			$this->db->trans_complete();
			if($this->db->delete('data_gelombang',array('kode'=>$kode))){				
				$this->setMesg('Gelombang PMB berhasil dihapus');
				return TRUE;
			}else{
				$this->setMesg('Gelombang PMB gagal dihapus');
				return FALSE;
			}
		}else{
			$this->setMesg('Gelombang PMB gagal dihapus');
			return FALSE;
		}
	}
	
	
}
?>