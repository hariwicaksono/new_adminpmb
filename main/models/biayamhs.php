<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Biayamhs extends Model
{
	
	var $data;
	var $data2;
	var $msg;
	
	function Biayamhs(){
		parent::Model();
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	/**
	 * mendapat list biaya pendaftaran
	 * 
	 * @param object $ThaPmb
	 * @return 
	 */
	function getBiayaPendaftaran($ThaPmb){
		$this->db->select('biaya_pendaftaran,biaya_pendaftaran_pindahan,biaya_pendaftaran_lulusd3');
		$this->db->from('THA_PMB');
		$this->db->where('thn_akademik',$ThaPmb);
		$this->data=$this->db->get();
		return $this->data->row_array();
	}		
	
	/**
	 * 
	 * @param object $baru
	 * @param object $pindahan
	 * @param object $transfer
	 * @param object $ThaPmb
	 * @return 
	 */
	function setBiayaPendaftaran($baru,$pindahan,$transfer,$ThaPmb){
		$this->data=array(
						'biaya_pendaftaran'=>$baru,
						'biaya_pendaftaran_pindahan'=>$pindahan,
						'biaya_pendaftaran_lulusd3'=>$transfer
					);
		if($this->db->update('thn_akademik',$this->data,array('thn_akademik'=>$ThaPmb))){
			$this->setMesg('Biaya pendaftaran berhasil di ubah');
			return TRUE;
		}else{
			$this->setMesg('Biaya pendaftaran gagal di ubah');
			return FALSE;
		}
	}
	
	
	/**
	 * list biaya pendaftaran dr master_jenismhs
	 * @param object $jenisMhs [optional]
	 * @return 
	 */
	function getBiayaPendaftaranMhs($jenisMhs=''){
		$this->db->select('BIAYA_DAFTAR');
		$this->db->from('master_jenismhs');
		if(!empty($jenisMhs)){
			$this->db->where('ID_JENISMHS',$jenisMhs);	
		}		
		$hasil=$this->db->get()->result_array();
		return $hasil;
	}
	
	function getBiayaDaftarDukung(){
		$this->db->select('ID_JENISMHS,NAMA,KODE_JENIS,BIAYA_DAFTAR,BIAYA_PENDUKUNG');
		$this->db->from('master_jenismhs');				
		$hasil=$this->db->get()->result_array();
		return $hasil;
	}
	
	function setBiayaDaftarDukung($biaya=array()){
		$this->data=array(
				'BIAYA_DAFTAR'=>(int)$biaya['BIAYA_DAFTAR'],
				'BIAYA_PENDUKUNG'=>(int)$biaya['BIAYA_PENDUKUNG']
		);
		if($this->db->update('MASTER_JENISMHS',$this->data,array('ID_JENISMHS'=>$biaya['ID_JENISMHS']))){			
			return TRUE;
		}else{			
			return FALSE;
		}
	}	
	
	/**
	 * info sumbangan per gelombang
	 * 
	 * @param object $kode_gel
	 * @return 
	 */
	function getSumbanganPerGlb($kode_gel){
		$this->db->select('kode_gel,jurusan,NAMA_DEPT,biaya');
		$this->db->from('biaya_sarana b');
		$this->db->join('department d','b.jurusan=d.KD_DEPT');
		$this->db->where('IS_PRODI','1');
		$this->db->where('kode_gel',$kode_gel);
		$hasil=$this->db->get()->result_array();		
		return $hasil;
	}
	
	function getSumbanganPerJurPerTh($ThaPmb,$kd_jur){
		$this->db->select('biaya');
		$this->db->from('biaya_sarana b');
		$this->db->join('data_gelombang d','b.kode_gel=d.kode');
		$this->db->where('thn_akademik',$ThaPmb);
		$this->db->where('jurusan',$kd_jur);
		$hasil=$this->db->get()->result_array();
		return $hasil;
	}
	
	/**
	 * info sumbangan perjurusan
	 * 
	 * @param object $kode_jur
	 * @param object $kode_gel
	 * @return 
	 */
	function getSumbanganPerjurusan($kode_jur,$kode_gel){
		$this->db->select('biaya');
		$this->db->from('biaya_sarana');
		if(!empty($kode_jur) && empty($kode_gel)){
			$this->db->where('jurusan',$kode_jur);	
			$hasil=$this->db->get()->result_array();
		}
		if(!empty($kode_gel) && empty($kode_jur)){
			$this->db->where('kode_gel',$kode_gel);
			$hasil=$this->db->get()->result_array();
		}
		
		if(!empty($kode_gel) && !empty($kode_jur)){
			$hasil=$this->db->get()->row_array();					
		}
		return $hasil;
	}
	
	/**
	 * menambah biaya sarana
	 * 
	 * @param object $KodeGel
	 * @param object $KodeJur
	 * @param object $NamaJur
	 * @param object $nominal
	 * @return 
	 */
	function addSumbangan($KodeGel,$KodeJur,$NamaJur,$nominal){
		$this->data=array(
						'kode_gel'=>$KodeGel,
						'jurusan'=>$KodeJur,
						'biaya'=>$nominal
					);
		if($this->db->insert('biaya_sarana',$this->data)){
			$this->setMesg('Biaya sarana untuk jurusan '.$NamaJur.' berhasil ditambahkan');
			return TRUE;
		}else{
			$this->setMesg('Biaya sarana untuk jurusan '.$NamaJur.' gagal ditambahkan');
			return FALSE;
		}
	}		
	
	/**
	 * ubah biaya sarana
	 * 
	 * @param object $KodeGel
	 * @param object $KodeJur
	 * @param object $NamaJur
	 * @param object $nominal
	 * @return 
	 */
	function editSumbangan($KodeGel,$KodeJur,$nominal,$NamaJur=''){
		$this->data=array(						
						'biaya'=>(int)$nominal
					);
					
		$this->data2=array(
					'kode_gel'=>$KodeGel,
					'jurusan'=>$KodeJur	
		);
		if($this->db->update('biaya_sarana',$this->data,$this->data2)){			
			return TRUE;
		}else{			
			return FALSE;
		}
	}
	
	/**
	 * hapus biaya sarana
	 * 
	 * @param object $KodeGel
	 * @param object $KodeJur
	 * @param object $NamaJur
	 * @return 
	 */
	function delSumbangan($KodeGel,$KodeJur,$NamaJur){
		$this->data=array(
				'kode_gel'=>$KodeGel,
				'jurusan'=>$KodeJur	
		);
		if($this->db->delete('biaya_sarana',$this->data)){
			$this->setMesg('Biaya sarana untuk jurusan '.$NamaJur.' berhasil dihapus');
			return TRUE;
		}else{
			$this->setMesg('Biaya sarana untuk jurusan '.$NamaJur.' gagal dihapus');
			return FALSE;
		}
	}
	
	/**
	 * untuk mendapat info biaya pendukung
	 * 
	 * @param object $ThaPmb
	 * @return 
	 */
	function getBiayaPendukung($ThaPmb){
		$this->db->select('thn_akademik,biaya,biaya_pindahan');
		$this->db->from('biaya_pendukung');
		$this->db->where('thn_akademik',$ThaPmb);
		$this->data=$this->db->get();
		
		return $this->data->row_array();
	}
	
	
	
	/**
	 * set biaya pendukung per tahun PMB
	 * 
	 * @param object $ThaPmb
	 * @param object $Reguler
	 * @param object $Pindahan
	 * @return 
	 */
	function setBiayaPendukung($ThaPmb,$Reguler,$Pindahan){
		if(sizeof($this->getBiayaPendukung($ThaPmb)==3)){
			$this->data=$this->_editBiayaPendukung($ThaPmb, $Reguler, $Pindahan);			
		}else{
			$this->data=$this->_addBiayaPendukung($ThaPmb, $Reguler, $Pindahan);
		}
		return $this->data;
	}
	
	/**
	 * tambah biaya pendukung
	 * 
	 * @param object $ThaPmb
	 * @param object $Reguler
	 * @param object $Pindahan
	 * @return 
	 */
	function _addBiayaPendukung($ThaPmb,$Reguler,$Pindahan){
		$this->data=array(
						'thn_akademik'=>$ThaPmb,
						'biaya'=>$Reguler,
						'biaya_pindahan'=>$Pindahan
					);
		if($this->db->insert('biaya_pendukung',$this->data)){
			$this->setMesg('Biaya pendukung berhasil di tambahkan');
			return TRUE;
		}else{
			$this->setMesg('Biaya pendukung gagal di tambahkan');
			return FALSE;
		}
	}
	
	/**
	 * ubah biaya pendukung
	 * 
	 * @param object $ThaPmb
	 * @param object $Reguler
	 * @param object $Pindahan
	 * @return 
	 */
	function _editBiayaPendukung($ThaPmb,$Reguler,$Pindahan){
		$this->data=array(						
						'biaya'=>$Reguler,
						'biaya_pindahan'=>$Pindahan
					);
		if($this->db->update('biaya_pendukung',$this->data,array('thn_akademik'=>$ThaPmb,))){
			$this->setMesg('Biaya pendukung berhasil di ubah');
			return TRUE;
		}else{
			$this->setMesg('Biaya pendukung gagal di ubah');
			return FALSE;
		}
	}
	
	function getJenisBiaya(){
		$this->db->select('jenis_kwj,nama_kwj');
		$this->db->from('jenis_kwj');
		$hasil=$this->db->get()->result_array();
		return $hasil;
	}
	
	/**
	 * biaya yang harus di bayar per mahasiswa
	 * 
	 * @param object $nodaf [optional]
	 * @return 
	 */
	function getBiayaPerMHS($nodaf='',$thn_pmb='',$toher=TRUE){
		if($toher){
			$this->db->select('nodaf,noref,npm,nama,nama_dept,spptetap,sppvariabel,beasarana,beasiswa,biaya_pendukung,biaya_pindahan,SPI,biaya_pengakuan_sks,thn_akademik,id_jenismhs');
			$this->db->from('calonsiswa c');
			$this->db->join('department d','c.JUR_LULUS=d.KD_DEPT');
		}else{
			$this->db->select('nodaf,noref,nama,spptetap,sppvariabel,beasarana,beasiswa,biaya_pendukung,biaya_pindahan,biaya_pengakuan_sks,thn_akademik,id_jenismhs');
			$this->db->from('calonsiswa');	
		}		
		
		$this->db->where('nodaf',$nodaf);
		$this->db->where('THN_AKADEMIK',$thn_pmb);		
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	function getTotalWajib($nodaf){
		$this->db->select('(spptetap+sppvariabel+biaya_pendukung+biaya_pindahan+biaya_pengakuan_sks) as TOTALWAJIB');
		$this->db->from('calonsiswa');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	/**
	 * ambil total bayar mhs
	 * 
	 * @param object $nodaf
	 * @return 
	 */
	function getTotalBayar($nodaf){
		$this->db->select('((spptetap+sppvariabel+beasarana+biaya_pendukung+SPI+biaya_pengakuan_sks)-(beasiswa)) as TOTALBIAYA');
		$this->db->from('calonsiswa');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	
	/**
	 * ambil total bayar mhs
	 * 
	 * @param object $nodaf
	 * @return 
	 */
	function getBayarAwal($nodaf){
		//$this->db->select('((spptetap+sppvariabel+biaya_pendukung+biaya_pindahan)-(beasiswa)) as TOTALBAYARAWAL');
		$this->db->select('(spptetap+sppvariabel+biaya_pendukung+biaya_pengakuan_sks+(((beasarana-beasiswa)))) as TOTALBAYARAWAL');
		$this->db->from('calonsiswa');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	/**
	 * ambil yang pernah di bayar mhs
	 * 
	 * @param object $noref
	 * @return 
	 */
	function getSudahDibayar($nodaf){
		$strQuery="select noref from calonsiswa where nodaf='".$nodaf."'";
		$noref=$this->db->query($strQuery)->row_array();
		
		$strQuery="select sum(JUMLAH) as JMLDIBAYAR from herr_mhsbaru where noref='".$noref['noref']."'";
		$cek_dibayar=$this->db->query($strQuery)->row_array();
		if(is_null($cek_dibayar['JMLDIBAYAR'])){
			$cek_dibayar['JMLDIBAYAR']=0;
		}
		return $cek_dibayar['JMLDIBAYAR'];
	}
	
	/**
	 * ambil biaya sarana
	 * 
	 * @param object $ThnAngkatan [optional]
	 * @param object $KdJur [optional]
	 * @return 
	 */
	function getSppTetap($ThnAngkatan='',$KdJur=''){
		$this->db->select('biaya');
		$this->db->from('kewajiban');
		$this->db->where('angkatan',$ThnAngkatan);
		$this->db->where('jurusan',$KdJur);
		$this->db->where('jenis_kwj','1');
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	/**
	 * ambil biaya variabel
	 * 
	 * @param object $ThnAngkatan [optional]
	 * @param object $KdJur [optional]
	 * @return 
	 */
	function getSppVariabel($ThnAngkatan='',$KdJur=''){
		$this->db->select('biaya');
		$this->db->from('kewajiban');
		$this->db->where('angkatan',$ThnAngkatan);
		$this->db->where('jurusan',$KdJur);
		$this->db->where('jenis_kwj','2');
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	function getbayarterakhir($nodaf){
		$this->db->select('top 1 tgl_bayar,jumlah');
		$this->db->from('herr_mhsbaru h');
		$this->db->join('calonsiswa c','c.noref=h.noref');
		$this->db->where('c.nodaf',$nodaf);
		$this->db->order_by('tgl_bayar','DESC');
		$hasil=$this->db->get();		
		return $hasil->row_array();
	}
	
	function getpertamakalibayar($nodaf,$jmlminbyr,$jmlbayar){
		$this->db->select('top 1 tgl_bayar,jumlah');
		$this->db->from('herr_mhsbaru h');
		$this->db->join('calonsiswa c','c.noref=h.noref');
		$this->db->where('c.nodaf',$nodaf);
		$this->db->order_by('tgl_bayar');
		$hasil=$this->db->get()->row_array();
		if(is_null($hasil) || empty($hasil) || count($hasil)<=0){
			if($jmlbayar<$jmlminbyr){
				$this->setMesg('Biaya yang dibayarkan di awal minimal Rp.'.$jmlminbyr.' anda memasukkan Rp. '.$jmlbayar);
				return TRUE;
			}else{
				return FALSE;	
			}			
		}else{
			return FALSE;
		}		
	}	

	function getTabelHerr($ThaPmb,$searchkey=''){
		$this->db->select('h.*, c.nodaf,c.nama');
		$this->db->from('herr_mhsbaru h');
		$this->db->join('calonsiswa c','c.noref=h.noref');
		$this->db->order_by('h.tgl_bayar','DESC');
		$this->db->where('h.THN_AKADEMIK',$ThaPmb);
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}

		$hasil=$this->db->get();		
		return $hasil->result_array();
	}
		
}

?>