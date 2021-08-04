<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Department extends Model
{
	var $data;
	var $msg;
	var $db_adak;
	var $cek;
	
	function Department(){
		parent::Model();
		$this->db_adak=$this->load->database('db_adak',TRUE);
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	
	function getFakultasSimple(){
		$this->db_adak->select('KD_FAK,NAMA_FAK');
		$this->db_adak->from('fakultas f');
		$this->db_adak->join('dosen d','f.NIK_DEKAN=d.NIK');
		$hasil=$this->db_adak->get()->result_array();
		return $hasil;
	}
	
	/**
	 * ambil data fakultas lengkap
	 * @return 
	 */
	function getFakultas(){
		$this->db->select('KD_FAK,NAMA_FAK,NIK_DEKAN,NAMA,GELARDEPAN as GB,GELARBLKG as GD');
		$this->db->from('fakultas f');
		$this->db->join('dosen d','f.NIK_DEKAN=d.NIK');
		$data=$this->db->get();
		return $data->result_array();
	}
	
	/**
	 * cek fakultas sudah ada atau belum
	 * @param object $kd_fak [optional]
	 * @param object $nama_fak [optional]
	 * @return 
	 */
	function _getFakultasNum($kd_fak='',$nama_fak='',$mode=''){
		$this->db->select('KD_FAK,NAMA_FAK');
		$this->db->from('fakultas');
		if(!empty($mode) && !empty($kd_fak) && !empty($nama_fak)){
			if($mode=='add'){
				$this->db->where('KD_FAK',$kd_fak);
				//$this->db->where('NAMA_FAK',$nama_fak);	
			}elseif($mode=='edit'){
				$this->db->where('KD_FAK !=',$kd_fak);
				$this->db->where('NAMA_FAK',$nama_fak);	
			}	
			$this->cek=$this->db->get();		
			return $this->cek->num_rows();					
		}else{
			return FALSE;
		}								
	}
	
	/**
	 * cek relasi fakultas
	 * @param object $kd_fak
	 * @return 
	 */
	function _isFakRelated($kd_fak){
		$this->db->select('KD_FAK');
		$this->db->from('jurusan');
		$this->db->where('KD_FAK',$kd_fak);
		$this->cek=$this->db->get();
		return $this->cek->num_rows();
	}
	
	/**
	 * Tambah fakultas
	 * 
	 * @param object $kd_fak
	 * @param object $nama_fak
	 * @param object $nik_dekan
	 * @return 
	 */
	
	function addFakultas($kd_fak,$nama_fak,$nik_dekan){
		if($this->_getFakultasNum($kd_fak,$nama_fak,'add')){
			$this->setMesg('Kode Fakultas '.$kd_fak.' sudah digunakan');
			return FALSE;
		}else{
			$this->data=array(
						'KD_FAK'=>$kd_fak,
						'NAMA_FAK'=>$nama_fak,
						'NIK_DEKAN'=>$nik_dekan
					);
			if($this->db_adak->insert('fakultas',$this->data)){
				$this->setMesg('Fakultas '.$nama_fak.' berhasil ditambahkan');
				return TRUE;
			}else{
				$this->setMesg('Fakultas '.$nama_fak.' gagal ditambahkan');
				return FALSE;
			}
		}		
	}
	
	/**
	 * ubah fakultas
	 * 
	 * @param object $kd_fak
	 * @param object $nama_fak
	 * @param object $nik_dekan
	 * @return 
	 */
	function editFakultas($kd_fak,$nama_fak,$nik_dekan){
		if($this->_getFakultasNum($kd_fak,$nama_fak,'edit')){
			$this->setMesg('Nama Fakultas '.$nama_fak.' sudah digunakan');
			return FALSE;
		} else {
			$this->data=array(						
						'NAMA_FAK'=>$nama_fak,
						'NIK_DEKAN'=>$nik_dekan
					);
			if($this->db_adak->update('fakultas',$this->data,array('KD_FAK'=>$kd_fak,))){
				$this->setMesg('Fakultas '.$nama_fak.' berhasil diubah');
				return TRUE;
			}else{
				$this->setMesg('Fakultas '.$nama_fak.' gagal diubah');
				return FALSE;
			}
		}		
	}
	
	/**
	 * hapus fakultas
	 * 
	 * @param object $kd_fak
	 * @return 
	 */
	function deleteFakultas($kd_fak,$nama_fak){
		if($this->_isFakRelated($kd_fak)>0){
			$this->setMesg('Fakultas masih mempunyai jurusan, Fakultas tidak dapat di hapus');
			return FALSE;
		}else{
			if($this->db_adak->delete('fakultas',array('KD_FAK'=>$kd_fak,))){
				$this->setMesg('Fakultas '.$nama_fak.' berhasil dihapus');
				return TRUE;
			}else{
				$this->setMesg('Fakultas '.$nama_fak.' gagal dihapus');
				return FALSE;
			}
		}		
	}		
	
		
	/**
	 * mengambil nama dan kode department
	 * 
	 * @return 
	 */
	function getKdNamaDept(){
		$this->db->select('KD_DEPT,NAMA_DEPT');
		$this->db->from('DEPARTMENT d');
		$this->db->join('JURUSAN j','d.KD_DEPT=j.KD_JUR');
		$this->data=$this->db->get();
		return $this->data->result_array();
	}
	
	/**
	 * mengambil nama department
	 * @return 
	 */
	function getDepartment($kode=''){
		$this->db->select('KD_DEPT,NAMA_DEPT,d.NIK,dos.NAMA,ENGLISH_NAME,IS_PRODI,NAMA_PRODI,NAMA_PRODI_EN');
		$this->db->from('DEPARTMENT d');
		$this->db->join('JURUSAN j','d.KD_DEPT=j.KD_JUR','left');
		$this->db->join('DOSEN dos','dos.NIK=d.NIK');		
		if(empty($kode)){
			$data=$this->db->get();
			return $data->result_array();	
		}else{
			$this->db->where('KD_DEPT',$kode);
			$data=$this->db->get();
			return $data->row_array();
		}		
		
	}
	
	/**
	 * cek departemen sudah ada atau belum
	 * 
	 * @param object $kd_dept [optional]
	 * @param object $nama_dept [optional]
	 * @return 
	 */
	function _isDeptExist($kd_dept='',$nama_dept='',$mode=''){
		$this->db->select('KD_DEPT,NAMA_DEPT');
		$this->db->from('DEPARTMENT');
		
		if(!empty($mode) && !empty($kd_dept) && !empty($nama_dept)){
			if($mode=='add'){
				$this->db->where('KD_DEPT',$kd_dept);				
			}elseif($mode=='edit'){
				$this->db->where('KD_DEPT !=',$kd_dept);
				$this->db->where('NAMA_DEPT',$nama_dept);	
			}	
			$this->cek=$this->db->get();		
			return $this->cek->num_rows();					
		}else{
			return FALSE;
		}						
	}
	
	/**
	 * cek departemen berelasi dengan jurusan
	 * 
	 * @param object $kd_dept
	 * @return 
	 */
	function _isDeptRelated($kd_dept){
		$this->db->select('KD_JUR');
		$this->db->from('JURUSAN');
		if(!empty($kd_dept)){
			$this->db->where('KD_JUR',$kd_dept);	
		}		
		$this->cek=$this->db->get();
		return $this->cek->num_rows();
	}
	
	/**
	 * menambah departemen
	 * 
	 * @param object $dept [optional]
	 * $dept=array(
	 * 		'KD_DEPT'=>$dept['KD_DEPT'],
	 * 		'NAMA_DEPT'=>$dept['NAMA_DEPT'],
	 * 		'NIK'=>$dept['NIK'],
	 * 		'ENGLISH_NAME'=>$dept['ENGLISH_NAME'],
	 * 		'IS_PRODI'=>$dept['IS_PRODI'],
	 * 		'NAMA_PRODI'=>$dept['NAMA_PRODI'],
	 * 		'NAMA_PRODI_EN'=>$dept['NAMA_PRODI_EN']
	 * );
	 * @return 
	 */
	function addDepartment($dept=array()){
		if($this->_isDeptExist($dept['KD_DEPT'],$dept['NAMA_DEPT'],'add')>0){
			$this->setMesg('Kode departemen '.$dept['KD_DEPT'].' sudah digunakan departemen lain ');
			return FALSE;
		}else{
			$this->data=array(	
					'KD_DEPT'=>$dept['KD_DEPT'],
					'NAMA_DEPT'=>$dept['NAMA_DEPT'],
					'NIK'=>$dept['NIK'],
					'ENGLISH_NAME'=>$dept['ENGLISH_NAME'],
					'IS_PRODI'=>$dept['IS_PRODI'],
					'NAMA_PRODI'=>$dept['NAMA_PRODI'],
					'NAMA_PRODI_EN'=>$dept['NAMA_PRODI_EN']
				);
			if($this->db->insert('DEPARTMENT',$this->data)){
				$this->setMesg('Departemen '.$dept['NAMA_DEPT'].' berhasil ditambahkan ');
				return TRUE;
			}else{
				$this->setMesg('Departemen '.$dept['NAMA_DEPT'].' gagal ditambahkan ');
				return FALSE;
			}
		}		
	}
	
	/**
	 * mengubah departemen
	 * 
	 * @param object $dept [optional]
	 * $dept=array(
	 * 		'KD_DEPT'=>$dept['KD_DEPT'],
	 * 		'NAMA_DEPT'=>$dept['NAMA_DEPT'],
	 * 		'NIK'=>$dept['NIK'],
	 * 		'ENGLISH_NAME'=>$dept['ENGLISH_NAME'],
	 * 		'IS_PRODI'=>$dept['IS_PRODI'],
	 * 		'NAMA_PRODI'=>$dept['NAMA_PRODI'],
	 * 		'NAMA_PRODI_EN'=>$dept['NAMA_PRODI_EN']
	 * );
	 * @return 
	 */
	function editDepartment($dept=array()){
		if($this->_isDeptExist($dept['KD_DEPT'],$dept['NAMA_DEPT'],'edit')>0){
			$this->setMesg('Nama departemen '.$dept['NAMA_DEPT'].' sudah digunakan departemen lain ');
			return FALSE;
		}else{
			$this->data=array(						
					'NAMA_DEPT'=>$dept['NAMA_DEPT'],
					'NIK'=>$dept['NIK'],
					'ENGLISH_NAME'=>$dept['ENGLISH_NAME'],
					'IS_PRODI'=>$dept['IS_PRODI'],
					'NAMA_PRODI'=>$dept['NAMA_PRODI'],
					'NAMA_PRODI_EN'=>$dept['NAMA_PRODI_EN']
				);
			if($this->db->update('DEPARTMENT',$this->data,array('KD_DEPT'=>$dept['KD_DEPT']))){
				$this->setMesg('Departemen '.$dept['NAMA_DEPT'].' berhasil diubah ');
				return TRUE;
			}else{
				$this->setMesg('Departemen '.$dept['NAMA_DEPT'].' gagal diubah ');
				return FALSE;
			}
		}
	}
	
	/**
	 * menghapus departemen
	 * 
	 * @param object $kd_dept
	 * @param object $nama_dept
	 * @return 
	 */
	function deleteDepartment($kd_dept,$nama_dept){
		if($this->_isDeptRelated($kd_dept)>0){
			$this->setMesg('Data departemen masih digunakan, data tidak dapat di hapus');
			return FALSE;
		}else{
			if($this->db->delete('DEPARTMENT',array('KD_DEPT'=>$kd_dept))){
				$this->setMesg('Departemen '.$nama_dept.' berhasil di hapus');
				return TRUE;
			}else{
				$this->setMesg('Departemen '.$nama_dept.' gagal di hapus');
				return FALSE;
			}
		}
	} 
	
	/**
	 * mengambil data jurusan
	 * 
	 * @return 
	 */
	function getJurusan(){
		$this->db->select('KD_DEPT,NAMA_FAK,NAMA_DEPT,KODE_MKL,KODE_KELAS,MAX_BATASSTUDI,MAX_SKS_PERSEMESTER');
		$this->db->from('DEPARTMENT d');
		$this->db->join('JURUSAN j','d.KD_DEPT=j.KD_JUR');
		$this->db->join('FAKULTAS f','f.KD_FAK=j.KD_FAK');
		$this->data=$this->db->get();
		return $this->data->result_array();
	}
	
	/**
	 * mengambil jur yang sudah dipilih calonsiswa
	 * 
	 * @param object $kd_jur
	 * @return 
	 */
	function getSelectedJurusan($kd_jur){
		$this->db->select('KD_DEPT,NAMA_DEPT,KD_FAK');
		$this->db->from('department d');
		$this->db->join('jurusan j','j.KD_JUR=d.KD_DEPT');
		$this->db->where('j.KD_JUR',$kd_jur);
		$hasil=$this->db->get()->row_array();
		return $hasil;
	}
	
	/**
	 * Ambil data jurusan per fakultas
	 * 
	 * @param object $kd_fak [optional]
	 * @return 
	 */
	function getJurusanByFak($kd_fak=''){
		$this->db->select('KD_DEPT, NAMA_DEPT');
		$this->db->from('DEPARTMENT d');
		$this->db->join('JURUSAN j','d.KD_DEPT=j.KD_JUR');
		if(!empty($kd_fak)){
			$this->db->where('j.KD_FAK',$kd_fak);
		}
		$hasil=$this->db->get()->result_array();		
		return $hasil;
	}
	
	/**
	 * Ambil data jurusan simple
	 * @param object $kd_jur [optional]
	 * @return 
	 */
	function getJurusanSimple($kd_jur=''){
		$this->db->select('KD_DEPT, NAMA_DEPT');
		$this->db->from('DEPARTMENT d');
		$this->db->join('JURUSAN j','d.KD_DEPT=j.KD_JUR');
		if(!empty($kd_jur)){
			$this->db->where('KD_DEPT',$kd_jur);
			$this->data=$this->db->get();		
			return $this->data->row_array();
		}else{
			$this->data=$this->db->get();		
			return $this->data->result_array();
		}		
	}
	
	function getJurusanToEd($kd_jur=''){
		$this->db->select('*,convert(varchar(10),TGL_AKREDITASI,105) as TGLAKRED');
		$this->db->from('JURUSAN');
		$this->db->where('KD_JUR',$kd_jur);
		$hasil=$this->db->get();
		return $hasil->row_array();
	}
	
	/**
	 * get calon departemen yang akan menjadi jurusan
	 * 
	 * @return 
	 */
	function getNonJurusan(){
		$strQuery="select kd_dept, nama_dept from department 
					where kd_dept not in(select a.kd_jur from jurusan a , department b where a.kd_jur = b.kd_dept)
					and is_prodi='1'";
		$this->data=$this->db->query($strQuery);
		return $this->data->result_array();
	}
	
	/**
	 * cek relasi jurusan ke PMB
	 * 
	 * @return 
	 */
	function _isJurRelatedSarana($kd_jur){
		$this->db->select('jurusan');
		$this->db->from('biaya_sarana');
		$this->db->where('jurusan',$kd_jur);
		$this->cek=$this->db->get();
		if($this->cek->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;	
		}		
	}
	
	/**
	 * cek jurusan sudah ada atau belum
	 * 
	 * @param object $kd_jur
	 * @return 
	 */
	function _isJurExist($kd_jur){
		$this->db->select('KD_JUR');
		$this->db->from('jurusan');
		$this->db->where('KD_JUR',$kd_jur);
		$this->cek=$this->db->get();
		if($this->cek->num_rows() > 0){
			return false;
		}else{
			return true;
		}		
	}
	
	/**
	 * Tambah jurusan
	 * 
	 * @param object $jurusan [optional]
	 * $jurusan=array(
	 * 		'KD_JUR'=>$jurusan['KD_JUR'],
	 * 		'MAX_BATASSTUDI'=>$jurusan['MAX_BATASSTUDI'],
	 * 		'KODE_MKL'=>$jurusan['KODE_MKL'],
	 * 		'KODE_KELAS'=>$jurusan['KODE_KELAS'],
	 * 		'SKS_SMT1'=>$jurusan['SKS_SMT1'],
	 * 		'MIN_SKS_SKRIPSI'=>$jurusan['MIN_SKS_SKRIPSI'],
	 * 		'MAX_SKS_PERSEMESTER'=>$jurusan['MAX_SKS_PERSEMESTER'],
	 * 		'MAX_SKS_SP'=>$jurusan['MAX_SKS_SP'],
	 * 		'KD_PRODI'=>$jurusan['KD_PRODI'],
	 * 		'KD_FAK'=>$jurusan['KD_FAK'],
	 * 		'STATUS_AKREDITASI'=>$jurusan['STATUS_AKREDITASI'],	
	 * 		'TGL_AKREDITASI'=>$jurusan['TGL_AKREDITASI'],
	 * 		'NO_IJIN'=>$jurusan['NO_IJIN'],
	 * 		'GELAR'=>$jurusan['GELAR'],
	 * 		'SINGKATAN_GELAR'=>$jurusan['SINGKATAN_GELAR'],
	 * 		'MIN_NILAI_SKRIPSI'=>$jurusan['MIN_NILAI_SKRIPSI'],
	 * 		'MIN_SKS_LULUS'=>$jurusan['MIN_SKS_LULUS'],
	 * 		'MIN_NILAI_D'=>$jurusan['MIN_SKS_LULUS'],
	 * 		'MIN_IPK'=>$jurusan['MIN_IPK']
	 * )
	 * @return 
	 */
	function addJurusan($jurusan=array(),$tahun){		
		if(!empty($jurusan)){
			if($this->_isJurExist($jurusan['KD_JUR'])){
				if($this->db->insert('JURUSAN',$jurusan)){
					$this->db->select('kode');
					$this->db->from('data_gelombang');
					$this->db->where('thn_akademik',$tahun);
					$th=$this->db->get()->result_array();					
					$this->db->trans_start();
					foreach($th as $data=>$item){
						$toenter=array(
							'kode_gel'=>$item['kode'],
							'jurusan'=>$jurusan['KD_JUR'],
							'biaya'=>0
						);
						$this->db->insert('biaya_sarana',$toenter);
					}
					$this->db->trans_complete();					
					$this->setMesg('Prodi baru berhasil ditambahkan');
					return TRUE;
				}else{
					$this->setMesg('Prodi baru gagal ditambahkan');
					return FALSE;
				}
			}	
		}			
	}
	
	/**
	 * ubah jurusan
	 * 
	 * @param object $jurusan [optional]
	 * @param object $kd_jur
	 * $jurusan=array(
	 * 		'MAX_BATASSTUDI'=>$jurusan['MAX_BATASSTUDI'],
	 * 		'KODE_MKL'=>$jurusan['KODE_MKL'],
	 * 		'KODE_KELAS'=>$jurusan['KODE_KELAS'],
	 * 		'SKS_SMT1'=>$jurusan['SKS_SMT1'],
	 * 		'MIN_SKS_SKRIPSI'=>$jurusan['MIN_SKS_SKRIPSI'],
	 * 		'MAX_SKS_PERSEMESTER'=>$jurusan['MAX_SKS_PERSEMESTER'],
	 * 		'MAX_SKS_SP'=>$jurusan['MAX_SKS_SP'],
	 * 		'KD_PRODI'=>$jurusan['KD_PRODI'],
	 * 		'KD_FAK'=>$jurusan['KD_FAK'],
	 * 		'STATUS_AKREDITASI'=>$jurusan['STATUS_AKREDITASI'],	
	 * 		'TGL_AKREDITASI'=>$jurusan['TGL_AKREDITASI'],
	 * 		'NO_IJIN'=>$jurusan['NO_IJIN'],
	 * 		'GELAR'=>$jurusan['GELAR'],
	 * 		'SINGKATAN_GELAR'=>$jurusan['SINGKATAN_GELAR'],
	 * 		'MIN_NILAI_SKRIPSI'=>$jurusan['MIN_NILAI_SKRIPSI'],
	 * 		'MIN_SKS_LULUS'=>$jurusan['MIN_SKS_LULUS'],
	 * 		'MIN_NILAI_D'=>$jurusan['MIN_SKS_LULUS'],
	 * 		'MIN_IPK'=>$jurusan['MIN_IPK']
	 * 		'KODE_TA'=>$jurusan['KODE_TA']
	 * )
	 * @return 
	 */
	function editJurusan($jurusan=array(),$kd_jur){
		if(!empty($jurusan) && !empty($kd_jur)){
			if($this->db->update('JURUSAN',$jurusan,array('KD_JUR'=>$kd_jur))){
				//print($this->db->last_query());exit();				
					$this->setMesg('Informasi prodi berhasil diubah');
					return TRUE;
				}else{
					$this->setMesg('Informasi prodi gagal diubah');
					return FALSE;
				}
		}
	}
	
	/**
	 * 
	 * 
	 * @return 
	 */
	function deleteJurusan(){
		
	}
	
	function getlistmk($prodi,$key=''){
		if(empty($key)){
			return NULL;
		}else{
			$this->db_adak->select('k.KODE,MKL');
			$this->db_adak->from('kuliah k');
			$this->db_adak->join('ragam_kuliah r','k.KODE=r.KODE');
			$this->db_adak->where("(UPPER(k.KODE) like '".strtoupper($key)."%' or UPPER(MKL) like '".strtoupper($key)."%') and r.KD_JUR like '".$prodi."' ");
			$hasil=$this->db_adak->get()->result_array();			
			return $hasil;
		}					
	}
	
	function getlistmkto($prodi){		
		$this->db_adak->select('k.KODE,MKL');
		$this->db_adak->from('kuliah k');
		$this->db_adak->join('ragam_kuliah r','k.KODE=r.KODE');
		$this->db_adak->where("r.KD_JUR='".$prodi."'");
		$hasil=$this->db_adak->get()->result_array();			
		return $hasil;					
	}
	
	function getnilaistandart(){
		$this->db_adak->select('distinct(NILAI_HURUF)');
		$this->db_adak->from('bobot_nilai');
		$hasil=$this->db_adak->get()->result_array();			
		return $hasil;
	}
	
	function setnilaiminsk($kode=array(),$nilai=array(),$status=array(),$kdjur){
		$this->db_adak->delete('SYARAT_SKRIPSI',array('KD_JUR'=>$kdjur));
		$this->db->trans_start();
		foreach(array_keys($status) as $data){
			$this->data=array(
					'KODE_MK'=>$kode[$data],
					'KD_JUR'=>$kdjur,
					'MIN_NILAI'=>$nilai[$data]
			);
			$this->db_adak->insert('SYARAT_SKRIPSI',$this->data);
		}
		if($this->db->trans_complete()===TRUE){					
			$this->setMesg('Syarat skripsi berhasil di set');
			return TRUE;
		}else{
			$this->setMesg('Syarat skripsi gagal di set');
			return FALSE;
		}
	}
	
	function getnilaihaveset($kdjur){		
		$this->db_adak->where('KD_JUR',$kdjur);
		$hasil=$this->db_adak->get('SYARAT_SKRIPSI')->result_array();
		return $hasil;		
	}
		
}
?>