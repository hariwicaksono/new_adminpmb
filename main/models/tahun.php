<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 17-10-2011
 * @version : 1.2
 */
class Tahun extends Model
{
	var $data;
	var $msg;
	
	var $db_adak;
	var $db_user;
	function Tahun(){
		parent::Model();		
		$this->db_adak=$this->load->database('db_adak',TRUE);
		$this->db_user=$this->load->database('db_user',TRUE);
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	} 
	
	/**
	 * menampilkan tahun PMB pada saat itu
	 * @return 
	 */
	function getThaPmb(){
		$this->db->select('thn_akademik');
		$this->db->from('tha_pmb');
		$this->data=$this->db->get()->row_array();									
		return $this->data['thn_akademik'];
	}
	
	/**
	 * get tahun 4 digit atau 2 digit
	 * @return 
	 */
	
	function getTha(){
		$temp=$this->getThaPmb();
		$this->data=array();
		$this->data['empatdigit']=substr($temp['thn_akademik'],0,4);
		$this->data['duadigit']=substr($temp['thn_akademik'],2,2);
		return $this->data;
	}
	
	/**
	 * untuk setting tahun PMB aktif
	 * 
	 * @param object $thn_akademik [optional]
	 * @param object $semester [optional]
	 * @return boolean 
	 */
	function setThaPMB($thn_akademik='',$semester='1'){
		if(!empty($thn_akademik)){
			$this->data=array(
						'thn_akademik'=>$thn_akademik,
						'semester'=>$semester
					);
			if($this->db->update('THA_PMB',$this->data)){
				$this->setMesg('Tahun PMB aktif telah di ubah');
				return TRUE;
			}else{
				$this->setMesg('Tahun PMB aktif gagal di ubah');
				return FALSE;
			}	
		}else{
			$this->setMesg('Tahun akademik kosong proses data tidak dapat di lanjutkan');
			return FALSE;
		}		
	}
	
		
	/**
	 * menampilkan tahun aktif
	 * @return 
	 */
	function getThaAktif(){
		$this->db->select('t.ID_TAHUN,ta.THN_AKADEMIK');
		$this->db->from('tahun_aktif t');
		$this->db->join('tahun_akademik ta','t.ID_TAHUN=ta.ID_TAHUN');
		$this->data=$this->db->get();
		
		return $this->data->row_array();
	}
	
	/**
	 * Setting tahun aktif
	 * 
	 * @param object $id_ThnAkademik [optional]
	 * @return boolean 
	 */
	
	function setThaAktif($id_ThnAkademik=''){
		if(!empty($id_ThnAkademik)){
			$this->data=array(
					'ID_TAHUN'=>$id_ThnAkademik
				);
			if($this->db_adak->update('TAHUN_AKTIF',$this->data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
		
	}
	
	
	/**
	 * menampilkan list tahun akademik
	 * @return 
	 */
	function getListThnAkademik($ThnAkademik=''){
		$this->db->select('distinct(THN_AKADEMIK) as THN_AKADEMIK');
		$this->db->from('tahun_akademik');
		if(!empty($ThnAkademik)){
			$this->db->where('THN_AKADEMIK',$ThnAkademik);
		}
		$this->db->order_by('THN_AKADEMIK','desc');
		$this->data=$this->db->get();		
		return $this->data->result_array();
	}	
	
	/**
	 * untuk menambah tahun akademik
	 * 
	 * @param object $ThnAkademik [optional]
	 * @return boolean 
	 */
	function addThnAkademik($ThnAkademik=''){
		if(!empty($ThnAkademik)){
			if(sizeof($this->listTahunAkademik($ThnAkademik))>0){	
				$this->setMesg("Tahun Akademik ".$ThnAkademik." sudah ada");			
				return FALSE;
			}else{							
				for($i=1;$i<4;$i++){
					$this->data=array(
						'THN_AKADEMIK'=>$ThnAkademik,
						'SEMESTER'=>$i
					);
					$this->db_adak->insert('TAHUN_AKADEMIK',$this->data);										
				}
				if(sizeof($this->listTahunAkademik($ThnAkademik))==3){	
					$this->setMesg("Tahun Akademik ".$ThnAkademik." berhasil di tambahkan");				
					return TRUE;
				}else{				
					$this->setMesg("Tahun Akademik ".$ThnAkademik." gagal di tambahkan");
					return FALSE;
				}
			}			
		}else{			
			return FALSE;
		}
	}
	
	
	function listTahunAkademik($thnakademik=''){
		$this->db->select('*');
		$this->db->from('TAHUN_AKADEMIK');		
		if(!empty($thnakademik)){
			$this->db->where('THN_AKADEMIK',$thnakademik);
		}
		$this->db->orderBy('THN_AKADEMIK','desc');		
		$hasil=$this->db->get();		
		return $hasil->result_array();
	}
		
	
}
?>