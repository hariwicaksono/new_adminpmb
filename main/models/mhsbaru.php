<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Mhsbaru extends Model
{
	var $data;
	var $msg;
	var $db_adak;
	var $db_public;
	var $result;
	function Mhsbaru() {
		parent::Model();
		$this->db_adak=$this->load->database('db_adak',TRUE);
	//	$this->db_public=$this->load->database('db_public',TRUE);
	}
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	function setResult($hasil=''){
		$this->result=$hasil;
	}
	
	function getResult(){
		return $this->result;
	}
	
	/**
	 * mendaftar via 
	 * @return 
	 */
	function daftarVia(){
		$via=array(
				array('kode'=>'AO','nama'=>'ADMISI'),
				array('kode'=>'OL','nama'=>'ONLINE')
			);
		return $via;	
	}
	
	/**
	 * JENIS MAHASISWA
	 * @return 
	 */
	function getJenisMhs(){
		$this->db->select('ID_JENISMHS,NAMA,KODE_JENIS');
		$this->db->from('master_jenismhs');
		$hasil=$this->db->get()->result_array();
		return $hasil;		
	}
	
	/**
	 * relasi mahasiswa
	 * @return 
	 */
	function relasiMhs(){
		$this->db->select('*');
		$this->db->from('RELASI_MHS');
		$hasil=$this->db->get()->result_array();
		return $hasil;
	}			
	
	/**
	 * menampilkan list mhs baru
	 * 
	 * @param object $KdGelombang [optional]
	 * @param object $ThnPmb [optional]
	 * @return 
	 */
	function getMhsBaru($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir='',$kd_jur='',$tgltesawal='',$tgltesakhir='',$status=''){
		$this->db->select('status_registrasi,nama_ayah,nodaf,nama,nem,NPM,c.gelombang,d.gelombang as nama_gel,pilihan1,de.KODE_KELAS as PIL1, pilihan2, df.KODE_KELAS as PIL2, pilihan3, dg.KODE_KELAS as PIL3,syarat1,convert(varchar(10),tgldaftar,105) as tgldaftar,syarat2,TGL_TES ');
		$this->db->from('calonsiswa c');
		$this->db->join('data_gelombang d','c.gelombang=d.kode');
		$this->db->join('jurusan de','c.pilihan1=de.KD_JUR');
		$this->db->join('jurusan df','c.pilihan2=df.KD_JUR');
		$this->db->join('jurusan dg','c.pilihan3=dg.KD_JUR');
		
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.tgldaftar between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}
			
		if(!empty($kd_jur)){
			$this->db->where('c.pilihan1',$kd_jur);
		}
		
		if(!empty($tgltesawal) && !empty($tgltesakhir)){
			$this->db->where("c.tgl_tes between '".date('Y-m-d',strtotime($tgltesawal))."' and '".date('Y-m-d',strtotime($tgltesakhir))."' ");
		}
		if(!empty($status)){
			$this->db->where('c.status_registrasi',$status);	
		}
		
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
	}
	
	function getMhsBaru_excel($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir='',$kd_jur='',$tgltesawal='',$tgltesakhir='',$status=''){
		$this->db->select('c.*,g.gelombang,namakab,namaprop,dp.nama_dept as pil1,de.nama_dept as pil2,df.nama_dept as pil3,mj.nama as kelas,nama_relasi,c.no_kipk');
		$this->db->from('calonsiswa c');
		$this->db->join('data_gelombang g','c.gelombang=g.kode');
		$this->db->join('kabupaten k','k.kdkab=c.kabupaten');
		$this->db->join('propinsi p','p.kdprop=c.propinsi');
		$this->db->join('department dp','dp.kd_dept=c.pilihan1');
		$this->db->join('department de','de.kd_dept=c.pilihan2');
		$this->db->join('department df','df.kd_dept=c.pilihan3');
		$this->db->join('master_jenismhs mj','mj.id_jenismhs=c.id_jenismhs');
		$this->db->join('relasi_mhs r','c.id_relasi=r.id_relasi');
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.tgldaftar between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}
			
		if(!empty($kd_jur)){
			$this->db->where('c.pilihan1',$kd_jur);
		}
		
		if(!empty($tgltesawal) && !empty($tgltesakhir)){
			$this->db->where("c.tgl_tes between '".date('Y-m-d',strtotime($tgltesawal))."' and '".date('Y-m-d',strtotime($tgltesakhir))."' ");
		}
		
		if(!empty($status)){
			$this->db->where('c.status_registrasi',$status);	
		}
		
		$this->db->order_by('nodaf','asc');
		$hasil=$this->db->get();			
		return $hasil->result_array();
	}
	
	function getMhsBaru_online($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir=''){
		$this->db->select('c.nodaf,nama,telepon,tn.score,nem,NPM,c.gelombang,d.gelombang as nama_gel,pilihan1,de.KODE_KELAS as PIL1, pilihan2, df.KODE_KELAS as PIL2, pilihan3, dg.KODE_KELAS as PIL3,syarat1,convert(varchar(10),tgldaftar,105) as tgldaftar,syarat2 ');
		$this->db->from('calonsiswa c');
		$this->db->where("c.nodaf like '%OL%'");
		$this->db->join('data_gelombang d','c.gelombang=d.kode');
		$this->db->join('jurusan de','c.pilihan1=de.KD_JUR');
		$this->db->join('jurusan df','c.pilihan2=df.KD_JUR');
		$this->db->join('jurusan dg','c.pilihan3=dg.KD_JUR');
		$this->db->join('tbl_nilai tn','c.nodaf=tn.nodaf','left');
		
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.tgldaftar between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}	
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
	}

	/**
	 * menampilkan list mhs baru yang dinyatakan lulus ujian
	 * 
	 * @param object $ThnPmb [optional]
	 * @param object $KdGelombang [optional]
	 * @param object $searchkey [optional]
	 * @param object $tglawal [optional]
	 * @param object $tglakhir [optional]
	 * @return 
	 */
	function getMhsLulusTest($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir='',$kd_jur=''){
		$this->db->select('nodaf,nama,NPM,c.gelombang,d.gelombang as nama_gel,JUR_LULUS,de.KODE_KELAS as JURUSAN_LULUS,convert(varchar(10),TGL_TES,105) as TANGGAL_TEST ');
		$this->db->from('calonsiswa c');
		$this->db->join('data_gelombang d','c.gelombang=d.kode');
		$this->db->join('jurusan de','c.JUR_LULUS=de.KD_JUR');
		$this->db->where("c.ket_lulus='Lulus'");
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.TGL_TES between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}	

		if(!empty($kd_jur)){
			$this->db->where('c.JUR_LULUS',$kd_jur);
		}
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
				
	}

	function getMhsLulusTest_excel($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir='',$kd_jur=''){
		$this->db->select('c.*,namakab,namaprop,c.gelombang,d.gelombang as nama_gel,JUR_LULUS,de.KODE_KELAS as JURUSAN_LULUS,convert(varchar(10),TGL_TES,105) as TANGGAL_TEST');
		$this->db->from('calonsiswa c');
		$this->db->join('data_gelombang d','c.gelombang=d.kode');
		$this->db->join('jurusan de','c.JUR_LULUS=de.KD_JUR');
		$this->db->join('kabupaten k','k.kdkab=c.kabupaten');
		$this->db->join('propinsi p','p.kdprop=c.propinsi');
		$this->db->where("c.ket_lulus='Lulus'");
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.TGL_TES between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}	

		if(!empty($kd_jur)){
			$this->db->where('c.JUR_LULUS',$kd_jur);
		}
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
				
	}
	
	function get_dokumen($data=array()){ 
		$this->db->order_by('nodaf','desc');
		return $this->db->get_where('dokumen_pmb',$data);
	}
	
	/**
	 * menampilkan list mhs baru yang lulus dan sudah herregistrasi
	 * 
	 * @param object $ThnPmb [optional]
	 * @param object $KdGelombang [optional]
	 * @param object $searchkey [optional]
	 * @param object $tglawal [optional]
	 * @param object $tglakhir [optional]
	 * @return 
	 */
	
	function getMhsHerregistrasi($ThnPmb='',$KdGelombang='',$searchkey='',$tglawal='',$tglakhir=''){
		$this->db->select('nodaf,nama,NPM,c.gelombang,d.gelombang as nama_gel,JUR_LULUS,de.KODE_KELAS as JURUSAN_LULUS,convert(varchar(10),tgl_her,105) as TGL_HER ');
		$this->db->from('calonsiswa c');
		$this->db->join('data_gelombang d','c.gelombang=d.kode');
		$this->db->join('jurusan de','c.JUR_LULUS=de.KD_JUR');
		$this->db->where("c.ket_lulus='Lulus'");
		$this->db->where("c.NPM is not null");
		$this->db->where("c.tgl_her is not null");
		
		if(!empty($ThnPmb)){
			$this->db->where('c.thn_akademik',$ThnPmb);	
		}
		if(!empty($KdGelombang)){
			$this->db->where('c.gelombang',$KdGelombang);	
		}
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
		
		if(!empty($tglawal) && !empty($tglakhir)){
			$this->db->where("c.tgl_her between '".date('Y-m-d',strtotime($tglawal))."' and '".date('Y-m-d',strtotime($tglakhir))."' ");
		}
		
		$hasil=$this->db->get();
		//print($this->db->last_query());			
		return $hasil->result_array();
	}
	
	/**
	 * menampilkan biodata lengkap mhs baru
	 * 
	 * @param object $nodaf [optional]
	 * @return 
	 */
	function getMhsBaruLengkap($nodaf=''){
		$this->db->select('*,convert(varchar(10),tgldaftar,105) as tglpendaftaran,convert(varchar(10),TGL_TES,105) as tglujian,d.NAMA_DEPT as NAMAPIL1,e.NAMA_DEPT as NAMAPIL2,f.NAMA_DEPT as NAMAPIL3,NamaKab,NamaProp,NAMA_RELASI,dg.gelombang,c.gelombang as kodegelombang,status_registrasi');
		$this->db->from('calonsiswa c');
		$this->db->join('department d','c.pilihan1=d.KD_DEPT');
		$this->db->join('department e','c.pilihan2=e.KD_DEPT');
		$this->db->join('department f','c.pilihan3=f.KD_DEPT');
		$this->db->join('kabupaten k','c.kabupaten=k.kdKab');
		$this->db->join('data_gelombang dg','c.gelombang=dg.kode');
		$this->db->join('propinsi p','c.propinsi=p.kdProp');
		$this->db->join('RELASI_MHS r','c.ID_RELASI=r.ID_RELASI');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get();
		//print($this->db->last_query());
		return $hasil->row_array();
	}
	
	/**
	 * pencetakan kartu pendaftaran
	 * @return 
	 */
	function forkartupendaftaran($nodaf=''){
		$this->db->select('nodaf,noref,nama,jurusan,nem,catatan,TGL_TES,convert(varchar(10),TGL_TES,105) as tglujian,d.NAMA_DEPT as NAMAPIL1,e.NAMA_DEPT as NAMAPIL2,f.NAMA_DEPT as NAMAPIL3,dg.gelombang,BIAYA_PENDAFTARAN');
		$this->db->from('calonsiswa c');
		$this->db->join('department d','c.pilihan1=d.KD_DEPT');
		$this->db->join('department e','c.pilihan2=e.KD_DEPT');
		$this->db->join('department f','c.pilihan3=f.KD_DEPT');
		$this->db->join('kabupaten k','c.kabupaten=k.kdKab');
		$this->db->join('propinsi p','c.propinsi=p.kdProp');
		$this->db->join('data_gelombang dg','c.gelombang=dg.kode');
		$this->db->join('RELASI_MHS r','c.ID_RELASI=r.ID_RELASI');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get();
		return $hasil->row_array();
	}	
	
	/**
	 * menambah data mhs baru
	 * 
	 * @param object $mhsbr [optional]
	 * @param object $is_full [optional]
	 * @param object $is_online [optional]
	 * @return 
	 */
	function addMhsbr($mhsbr=array(),$is_full=0,$is_online=0) {
		$mhsbr['nodaf']=$this->genNodaf($mhsbr['THN_AKADEMIK'],$is_full,$is_online);
		$mhsbr['noref']=$this->nomor_referensi($mhsbr['nodaf']);
		$this->data=array(
				'nodaf'=>$mhsbr['nodaf'],				
				'nem'=>$mhsbr['nem'],
				'nama'=>strtoupper($mhsbr['nama']),
				'noref'=>$mhsbr['noref'],
				'jk'=>$mhsbr['jk'],
				'sekolah'=>strtoupper($mhsbr['sekolah']),
				'jurusan'=>$mhsbr['jurusan'],
				'alamat'=>$mhsbr['alamat'],
				'propinsi'=>$mhsbr['propinsi'],
				'kabupaten'=>$mhsbr['kabupaten'],
				'kodepos'=>$mhsbr['kodepos'],
				'telepon'=>$mhsbr['telepon'],
				'email'=>$mhsbr['email'],
				'tgldaftar'=>date('Y-m-d',strtotime($mhsbr['tgldaftar'])),
				'gelombang'=>$mhsbr['gelombang'],
				'pilihan1'=>$mhsbr['pilihan1'],
				'pilihan2'=>$mhsbr['pilihan2'],
				/*'beasarana'=>$mhsbr['beasarana'],
				'beasiswa'=>$mhsbr['beasiswa'],
				'biaya_pendukung'=>$mhsbr['biaya_pendukung'],
				'biaya_pindahan'=>$mhsbr['biaya_pindahan'],
				'spptetap'=>$mhsbr['spptetap'],
				'sppvariabel'=>$mhsbr['sppvariabel'],*/
				'BIAYA_PENDAFTARAN'=>(int)$mhsbr['BIAYA_PENDAFTARAN'],
				'komentar'=>$mhsbr['komentar'],
				'syarat1'=>$mhsbr['syarat1'],
				'syarat2'=>$mhsbr['syarat2'],
				'wawancara'=>'Belum',
				'catatan'=>'Test',
				'Status'=>0,
				'AGAMA'=>$mhsbr['AGAMA'],				
				'THN_AKADEMIK'=>$mhsbr['THN_AKADEMIK'],	
				'TGL_TES'=>date('Y-m-d',strtotime($mhsbr['TGL_TES'])),
				'NAMA_ORTU'=>strtoupper($mhsbr['NAMA_ORTU']),
				'RT_ORTU'=>$mhsbr['RT_ORTU'],
				'RW_ORTU'=>$mhsbr['RW_ORTU'],
				'KELURAHAN_ORTU'=>strtoupper($mhsbr['KELURAHAN_ORTU']),
				'KECAMATAN_ORTU'=>strtoupper($mhsbr['KECAMATAN_ORTU']),
				'KABUPATEN_ORTU'=>$mhsbr['KABUPATEN_ORTU'],
				'PROPINSI_ORTU'=>$mhsbr['PROPINSI_ORTU'],
				'KODEPOS_ORTU'=>$mhsbr['KODEPOS_ORTU'],
				'TELP_ORTU'=>$mhsbr['TELP_ORTU'],
				'ALAMATORTU'=>$mhsbr['ALAMATORTU'],	
				'NAMA_CS'=>$mhsbr['NAMA_CS'],
				'KODE_KERJASAMA'=>$mhsbr['KODE_KERJASAMA'],
				'BELIFORMULIR'=>0,
				'MATRIKULASI'=>0,
				'JENIS_MHS'=>$mhsbr['JENIS_MHS'],				
				'ID_RELASI'=>$mhsbr['ID_RELASI'],
				'ID_JENISMHS'=>$mhsbr['ID_JENISMHS'],
				'nikktp'=>$mhsbr['nik'],
				'tempatlahir'=>$mhsbr['tmp'],
				'tgllahir'=>date('Y-m-d',strtotime($mhsbr['tglahir'])),
				'KELAS'=>$mhsbr['KELAS'],
				'kelurahan'=>$mhsbr['kelurahan'],
				'rt'=>$mhsbr['rt'],
				'rw'=>$mhsbr['rw'],
				'kecamatan'=>$mhsbr['kecamatan'],
				'tahun_lulus'=>$mhsbr['tahun_lulus'],
				'NAMA_AYAH'=>$mhsbr['nama_ayah'],
				'pekerjaan_ortu'=>$mhsbr['pekerjaan_ortu'],
				'pekerjaan_ayah'=>$mhsbr['pekerjaan_ayah'],
				'TELP_AYAH'=>$mhsbr['TELP_AYAH'],
				'no_wa'=>$mhsbr['no_wa'],
				'status_registrasi'=>$mhsbr['status_registrasi'],
				'no_kipk'=>$mhsbr['no_kipk'],
				'ukuran_jas'=>$mhsbr['ukuran_jas'],
				'pilihan3'=>$mhsbr['pilihan3'],
				'status_pernikahan'=>$mhsbr['status_pernikahan'],
				'RELASI'=>$mhsbr['RELASI'],
				'no_kuitansi'=>$mhsbr['no_kuitansi']
		);
		
		if($this->db->insert('calonsiswa',$this->data)){
			$this->setMesg('Data mahasiswa baru berhasil dimasukkan');
			$this->setResult($mhsbr['nodaf']);
			return TRUE;
		}else{
			$this->setMesg('Data mahasiswa baru gagal dimasukkan');
			return FALSE;
		}
	}
	
	/**
	 * mengubah data mhs baru
	 * 
	 * @param object $data [optional]
	 * @param object $nodaf [optional]
	 * @return 
	 */
	function editMhsbr($mhsbr=array(),$nodaf='') {
		$this->data=array(
				'nodaf'=>$mhsbr['nodaf'],				
				'nem'=>$mhsbr['nem'],
				'nama'=>strtoupper($mhsbr['nama']),
				'noref'=>$mhsbr['noref'],
				'jk'=>$mhsbr['jk'],
				'sekolah'=>strtoupper($mhsbr['sekolah']),
				'jurusan'=>$mhsbr['jurusan'],
				'alamat'=>$mhsbr['alamat'],
				'propinsi'=>$mhsbr['propinsi'],
				'kabupaten'=>$mhsbr['kabupaten'],
				'kodepos'=>$mhsbr['kodepos'],
				'telepon'=>$mhsbr['telepon'],
				'email'=>$mhsbr['email'],
				'tgldaftar'=>date('Y-m-d',strtotime($mhsbr['tgldaftar'])),
				'gelombang'=>$mhsbr['gelombang'],
				'pilihan1'=>$mhsbr['pilihan1'],
				'pilihan2'=>$mhsbr['pilihan2'],
				/*'beasarana'=>$mhsbr['beasarana'],
				'beasiswa'=>$mhsbr['beasiswa'],
				'biaya_pendukung'=>$mhsbr['biaya_pendukung'],
				'biaya_pindahan'=>$mhsbr['biaya_pindahan'],
				'spptetap'=>$mhsbr['spptetap'],
				'sppvariabel'=>$mhsbr['sppvariabel'],*/
				'BIAYA_PENDAFTARAN'=>(int)$mhsbr['BIAYA_PENDAFTARAN'],
				'komentar'=>$mhsbr['komentar'],
				'syarat1'=>$mhsbr['syarat1'],
				'syarat2'=>$mhsbr['syarat2'],
				'wawancara'=>'Belum',
				'catatan'=>'Test',
				'Status'=>0,
				'AGAMA'=>$mhsbr['AGAMA'],				
				'THN_AKADEMIK'=>$mhsbr['THN_AKADEMIK'],	
				'TGL_TES'=>date('Y-m-d',strtotime($mhsbr['TGL_TES'])),
				'NAMA_ORTU'=>strtoupper($mhsbr['NAMA_ORTU']),
				'RT_ORTU'=>$mhsbr['RT_ORTU'],
				'RW_ORTU'=>$mhsbr['RW_ORTU'],
				'KELURAHAN_ORTU'=>strtoupper($mhsbr['KELURAHAN_ORTU']),
				'KECAMATAN_ORTU'=>strtoupper($mhsbr['KECAMATAN_ORTU']),
				'KABUPATEN_ORTU'=>$mhsbr['KABUPATEN_ORTU'],
				'PROPINSI_ORTU'=>$mhsbr['PROPINSI_ORTU'],
				'KODEPOS_ORTU'=>$mhsbr['KODEPOS_ORTU'],
				'TELP_ORTU'=>$mhsbr['TELP_ORTU'],
				'ALAMATORTU'=>$mhsbr['ALAMATORTU'],	
				'NAMA_CS'=>$mhsbr['NAMA_CS'],
				'KODE_KERJASAMA'=>$mhsbr['KODE_KERJASAMA'],
				'BELIFORMULIR'=>0,
				'MATRIKULASI'=>0,
				'JENIS_MHS'=>$mhsbr['JENIS_MHS'],				
				'ID_RELASI'=>$mhsbr['ID_RELASI'],
				'ID_JENISMHS'=>$mhsbr['ID_JENISMHS'],
				'KELAS'=>$mhsbr['KELAS'],
				'tahun_lulus'=>$mhsbr['tahun_lulus'],
				'kelurahan'=>$mhsbr['kelurahan'],
				'rt'=>$mhsbr['rt'],
				'rw'=>$mhsbr['rw'],
				'kecamatan'=>$mhsbr['kecamatan'],
				'NAMA_AYAH'=>$mhsbr['nama_ayah'],
				'status_registrasi'=>$mhsbr['status_registrasi'],
				'no_kipk'=>$mhsbr['no_kipk'],
				'pekerjaan_ortu'=>$mhsbr['pekerjaan_ortu'],
				'pekerjaan_ayah'=>$mhsbr['pekerjaan_ayah'],
				'TELP_AYAH'=>$mhsbr['TELP_AYAH'],
				'no_wa'=>$mhsbr['no_wa'],
				'ukuran_jas'=>$mhsbr['ukuran_jas'],
				'pilihan3'=>$mhsbr['pilihan3'],
				'status_pernikahan'=>$mhsbr['status_pernikahan'],
				'RELASI'=>$mhsbr['RELASI'],
				'no_kuitansi'=>$mhsbr['no_kuitansi']
		);
		if($this->db->update('calonsiswa',$this->data,array('nodaf'=>$nodaf))){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function ubah_mhs($data1=array(),$data2=array()){
		$this->db->update('calonsiswa',$data1,$data2);
	}
	
	/**
	 * menghapus data mahasiswa baru
	 * 
	 * @param object $nodaf [optional]
	 * @return 
	 */
	function delMhsbr($nodaf=''){
		if($this->db->delete('calonsiswa',array('nodaf'=>$nodaf))){
			$this->setMesg('Data calon mahasiswa berhasil di hapus');
			return TRUE;
		}else{
			$this->setMesg('Data calon mahasiswa gagal di hapus');
			return FALSE;
		}
	}
	
	/**
	 * ambil password by nim
	 * 
	 * @param object $nim
	 * @return 
	 */
	function getPasswdByNIM($nim){
		$this->db_adak->select('NPM,PWD');
		$this->db_adak->from('AKSES');
		$this->db_adak->like('NPM',$nim,'both');
		$this->data=$this->db_adak->get();
		return $this->data->result_array();
	}
	
	/**
	 * ambil password by nama
	 * 
	 * @param object $nama
	 * @return 
	 */
	function getPasswdByNama($nama){
		$this->db_adak->select('m.NPM,NAMA,PWD');
		$this->db_adak->from('AKSES a');
		$this->db_adak->join('mhs m','m.NPM=a.NPM');
		$this->db_adak->like('NAMA',$nama,'both');
		$this->data=$this->db_adak->get();
		return $this->data->result_array();
	}
	
	function is_mhslulus($nodaf){		
		$this->db->select('ket_lulus');
		$this->db->from('calonsiswa');
		$this->db->where('nodaf',$nodaf);		
		$this->db->where("(ket_lulus='Tidak' or ket_lulus is null)");	
		$hasil=$this->db->get()->num_rows();		
		if($hasil==0){
			$this->setMesg('Calon mahasiswa dengan nodaf '.$nodaf.' lulus tes');
			return TRUE;
		}else{
			$this->setMesg('Calon mahasiswa dengan nodaf '.$nodaf.' belum lulus tes');
			return FALSE;
		}
	}
			
	
	
	//cek dengan noref	
	/**
	 * untuk mendapat list mahasiswa untuk proses kelulusan
	 * 
	 * @param object $nodaf1 [optional]
	 * @param object $nodaf2 [optional]
	 * @param object $thn_akademik [optional]
	 * @return 
	 */
	function getKelulusanPmb($nodaf1='',$nodaf2='',$thn_akademik='',$gelombang='',$is_lulus=''){
		$strQuery="
		select 
		nodaf,nama,ket_lulus,pilihan1,npm,j.KODE_KELAS,d.NAMA_DEPT as pil1,pilihan2,k.KODE_KELAS,e.NAMA_DEPT as pil2,pilihan3,f.NAMA_DEPT as pil3, JUR_LULUS,beasiswa,syarat1,SPI,biaya_pengakuan_sks,spptetap,sppvariabel,penghasilan_ortu
		from calonsiswa c
		join department d on d.KD_DEPT=c.pilihan1 
		join department e on e.KD_DEPT=c.pilihan2	
		join department f on f.KD_DEPT=c.pilihan3	
		join jurusan j on j.KD_JUR=c.pilihan1
		join jurusan k on k.KD_JUR=c.pilihan2	
		join jurusan l on l.KD_JUR=c.pilihan3					
		";
		$strQuery.=" where thn_akademik='".$thn_akademik."' ";
		if(!empty($nodaf1) && !empty($nodaf2)){
			$strQuery.=" and nodaf between '".$nodaf1."' and '".$nodaf2."'";	
		}
		
		if(!empty($gelombang)){
			$strQuery.=" and c.gelombang='".$gelombang."'";	
		}
		
		if(!empty($is_lulus) && ($is_lulus=='Lulus' || $is_lulus=='Tidak')){
			$strQuery.=" and c.ket_lulus='".$is_lulus."'";
		}		
		
		$hasil=$this->db->query($strQuery);	
		return $hasil->result_array();
	}
			
	
	/**
	 * set kelulusan mhs
	 * 
	 * @param object $jurlulus [optional]
	 * @param object $beasiswa [optional]
	 * @param object $ketlulus [optional]
	 * @param object $nodaf [optional]
	 * @param object $thn_akademik [optional]
	 * @return 
	 */
	function setKelulusan($thn_akademik,$jurlulus,$beasiswa=0,$SPI=0,$ketlulus,$nodaf,$biaya_pengakuan_sks=0,$penghasilan_ortu){
		if(!empty($ketlulus) && !is_null($ketlulus) && $ketlulus=='Lulus' && !is_null($jurlulus)){
			$this->data=array(
				'ket_lulus'=>'Lulus',
				'JUR_LULUS'=>$jurlulus,
				'beasiswa'=>(int)$beasiswa,
				'SPI'=>(int)$SPI,
				'biaya_pengakuan_sks'=>(int)$biaya_pengakuan_sks,
				'penghasilan_ortu'=>$penghasilan_ortu
			);

		} elseif(!empty($ketlulus) && !is_null($ketlulus) && $ketlulus=='Tidak' ){
			$this->data=array(
				'ket_lulus'=>'Tidak',
				'JUR_LULUS'=>NULL,
				'beasiswa'=>(int)$beasiswa,
                'SPI'=>(int)$SPI,
				'biaya_pengakuan_sks'=>(int)$biaya_pengakuan_sks,
				'penghasilan_ortu'=>$penghasilan_ortu
			);	
		}else {
			$this->data=array(
				'ket_lulus'=>NULL,
				'JUR_LULUS'=>NULL,
				'beasiswa'=>(int)$beasiswa,
                'SPI'=>(int)$SPI,
				'biaya_pengakuan_sks'=>(int)$biaya_pengakuan_sks,	
				'penghasilan_ortu'=>$penghasilan_ortu
			);
		}									
		$databiaya=array();
		if($this->db->update('calonsiswa',$this->data,array('nodaf'=>$nodaf,'thn_akademik'=>$thn_akademik))){
		
			if($ketlulus=='Lulus'){
				$biaya=$this->genBiayaMhsBr($nodaf);
				$kode_jur=array(55201,55701);
				//if ($biaya['ID_JENISMHS']==1) $spptetap=3800000;else $spptetap=4000000;
				if (in_array($jurlulus,$kode_jur)){
					if ($biaya['id_jenismhs']==1) { 
					$spptetap=4000000;
					}else{ 
					$spptetap=4200000;
					}
				}elseif($jurlulus=='59201') { 
					$spptetap=3050000;
				}else{
					$spptetap=2650000;
				}				
				$spp_tetap=$this->db->query("select besaran from keuangan_master_biaya where id_biaya=1")->row_array();
				$spp_variabel=$this->db->query("select besaran from keuangan_master_biaya where id_biaya=2")->row_array();
				$databiaya=array(
						'beasarana'=>$biaya['biayasarana'],						
						'biaya_pendukung'=>$biaya['biayapendukung'],
						'biaya_pindahan'=>$biaya['biayapindahan'],
						'SPI'=>$SPI,
						'biaya_pengakuan_sks'=>(int)$biaya_pengakuan_sks,
						//'spptetap'=>$spp_tetap['besaran'],
						//'sppvariabel'=>$spp_variabel['besaran']
						'spptetap'=>$spptetap,
						'sppvariabel'=>0,
						'penghasilan_ortu'=>$penghasilan_ortu
				);		
						
			}else{
				$databiaya=array(
						'beasarana'=>0,						
						'biaya_pendukung'=>0,
						'biaya_pindahan'=>0,
						'spptetap'=>0,
						'sppvariabel'=>0,
						'SPI'=>0,
						'biaya_pengakuan_sks'=>0,
						'penghasilan_ortu'=>$penghasilan_ortu
				);
			}		
			
			if($this->db->update('calonsiswa',$databiaya,array('nodaf'=>$nodaf,'thn_akademik'=>$thn_akademik))){
				return TRUE;	
			}else{
				return FALSE;
			}								
		}else{
			return FALSE;
		}
	}
	
	
	function doPindahGelombang($kd_gel1,$kd_gel2,$nodaf,$ThaPmb){
		
	}
	
	/**
	 * generate passwd mhs baru
	 * 
	 * @return passwd 
	 */
	function genPasswd(){
		do 
		{
			$mypasswd=rand(10000,99999);
			$strQuery="select PWD from AKSES where PWD='".$mypasswd."'";
			$this->data=$this->db->query($strQuery);
			$cekhasil=$this->data->num_rows();
		} while($cekhasil>0);
	
		return $mypasswd;
	}
	
	/**
	 * generate NPM
	 * 
	 * @param object $noref [optional]
	 * @param object $format [optional]
	 * @return 
	 */
	 function genNPMBaru($noref='',$format='TH-JJ-FK-JUR-JNS-URUT'){
		$param_it=explode('-',$format);
		$this->db->select('JUR_LULUS,JENIS_MHS');
		$this->db->from('calonsiswa');
		$this->db->where('noref',$noref);
		$this->db->where('ket_lulus','Lulus');						
		$temp=$this->db->get()->row_array();								
		
		$jurusan=array();
		
		//$kd_fak=$this->db->query("select * from jurusan where kd_jur='".$temp['JUR_LULUS']."'")->row_array();

		//menentukan jenjang x(digit ketiga) ex:19 X A1001
		if(in_array('JJ',$param_it)){
			$this->db->select('KD_PRODI,KD_JUR,KD_FAK,JENJANG');
			$this->db->from('jurusan');
			$this->db->where('KD_JUR',$temp['JUR_LULUS']);
			$jurusan=$this->db->get()->row_array();
			if(trim($jurusan['JENJANG'])=='S1'){
				$jenjang='S';
			}else if(trim($jurusan['JENJANG'])=='S2'){
				$jenjang='M';
			}else if(trim($jurusan['JENJANG'])=='S3'){
				$jenjang='D';
			}else if(trim($jurusan['JENJANG'])=='D3'){
				$jenjang='A';
			}else{
				$jenjang='';
			}
		}else{
			$jenjang='';
		}
		
		//tahun pendaftaran ambil 2digit ex 2019 --> 19
		$jur=$this->db->query("select KD_JUR from JURUSAN")->result_array();
		if(in_array('TH',$param_it)){
			$this->db->select('thn_akademik');
			$this->db->from('tha_pmb');
			$tahun=$this->db->get()->row_array();
			if(in_array(trim($jurusan['KD_FAK']),$jur)){
				$dtthn=substr($tahun['thn_akademik'],2,2);
			}else{
				//$dtthn=substr($tahun['thn_akademik'],0,4);
				$dtthn=substr($tahun['thn_akademik'],2,2);
			}						
		}else{
			$dtthn='';
		}
		
		//menentukan fakultas x (digit keempat) ex:19S X 1001
		
		if(in_array('FK',$param_it)){
			$this->db->select('KD_PRODI,KD_JUR,KD_FAK,JENJANG');
			$this->db->from('jurusan');
			$this->db->where('KD_JUR',$temp['JUR_LULUS']);
			$jurusan=$this->db->get()->row_array();
			if(trim($jurusan['KD_FAK'])=='01'){
				$kode_fak='A';
			}elseif(trim($jurusan['KD_FAK'])=='02'){
				$kode_fak='B';
			}
		}else{
			$kode_fak='';
		}
		//menentukan prodi x (digit kelima)  ex:19SA X 001
		$jurusan=array();
		if(in_array('JUR',$param_it)){
			$this->db->select('KD_PRODI,KD_JUR,KD_FAK');
			$this->db->from('jurusan');
			$this->db->where('KD_JUR',$temp['JUR_LULUS']);
			$jurusan=$this->db->get()->row_array();
			if(trim($jurusan['KD_PRODI'])=='55201'){
				$dtjur='1';
			}else if(trim($jurusan['KD_PRODI'])=='55701'){
				$dtjur='2';
			}else if(trim($jurusan['KD_PRODI'])=='59201'){
				$dtjur='3';
			}else if(trim($jurusan['KD_PRODI'])=='61209'){
				$dtjur='1';
			}else if(trim($jurusan['KD_PRODI'])=='70201'){
				$dtjur='2';
			}else{							
				$dtjur='';
			}
			//$dtjur=$jurusan['KD_PRODI'];		
		}else{
			$dtjur='';
		}
		//menentukan no urut(3 digit)  ex:19SA1 XXX
		$fakultas=array('55201','55701','59201','70201','61209');
		if(in_array('URUT',$param_it)){
			$strQuery="SELECT npm_akhir FROM GetNPMAkhirBaru ('".$tahun['thn_akademik']."', '".$jurusan['KD_JUR']."')";					
			$urutan=$this->db->query($strQuery)->row_array();
			$dturut=$urutan['npm_akhir'];
			if(in_array($jurusan['KD_FAK'],$fakultas)){
				while(strlen($dturut)<=3) {
					$dturut="0".$dturut;
				}
			}else{
				while(strlen($dturut)<=2) {
					$dturut="0".$dturut;
				}
			}			
						
		}else{
			$dturut='';
		}	
		
		//format npm akhir 8 Digit THN-jenjang-fakultas-prodi-no_urut tanpa tanda baca/spasi contoh : 19SA1001
		$hasil=$dtthn.''.$jenjang.''.$kode_fak.''.$dtjur.''.$dturut;		
		return $hasil;
	}
	 
	function genNPM($noref='',$format='TH-JUR-JNS-URUT',$mode=''){ //dipersiapkan untuk prodi baru
		$param_it=explode('-',$format);
		$this->db->select('JUR_LULUS,JENIS_MHS');
		$this->db->from('calonsiswa');
		$this->db->where('noref',$noref);
		$this->db->where('ket_lulus','Lulus');						
		$temp=$this->db->get()->row_array();								
		
		$jurusan=array();
		if(in_array('JUR',$param_it)){
			$this->db->select('KD_PRODI,KD_JUR,KD_FAK');
			$this->db->from('jurusan');
			$this->db->where('KD_JUR',$temp['JUR_LULUS']);
			$jurusan=$this->db->get()->row_array();
			if(trim($jurusan['KD_PRODI'])=='55201'){
				$dtjur='11';
			}else if(trim($jurusan['KD_PRODI'])=='55701'){
				$dtjur='12';
			}else{
				$dtjur='';
			}
			//$dtjur=$jurusan['KD_PRODI'];		
		}else{
			$dtjur='';
		}
		
		$fakultas=array('55201','55701');
		
		if(in_array('TH',$param_it)){
			$this->db->select('thn_akademik');
			$this->db->from('tha_pmb');
			$tahun=$this->db->get()->row_array();
			if(in_array(trim($jurusan['KD_FAK']),$fakultas)){
				$dtthn=substr($tahun['thn_akademik'],2,2);
			}else{
				//$dtthn=substr($tahun['thn_akademik'],0,4);
				$dtthn=substr($tahun['thn_akademik'],2,2);
			}			
						
		}else{
			$dtthn='';
		}
		
		if(in_array('JNS',$param_it)){
			$this->db->select('ID_JENISMHS,KODE_JENIS');
			$this->db->from('master_jenismhs');
			$this->db->where('ID_JENISMHS',trim($temp['JENIS_MHS']));
			$this->db->where('IS_USED','1');
			$jenismhs=$this->db->get()->row_array();				
			if(!empty($jenismhs)){
				$dtjenis=$jenismhs['KODE_JENIS'];
			}else{
				$dtjenis='';
			}
		}else{
			$dtjenis='';
		}
				
		if(in_array('URUT',$param_it)){
			$strQuery="SELECT npm_akhir FROM GetNPMAkhir ('".$tahun['thn_akademik']."', '".$jurusan['KD_JUR']."')";					
			$urutan=$this->db->query($strQuery)->row_array();
			$dturut=$urutan['npm_akhir'];
			if(in_array($jurusan['KD_FAK'],$fakultas)){
				while(strlen($dturut)<=4) {
					$dturut="0".$dturut;
				}
			}else{
				while(strlen($dturut)<=3) {
					$dturut="0".$dturut;
				}
			}			
						
		}else{
			$dturut='';
		}			
		$hasil=$dtthn.'.'.$dtjur.'.'.$dturut;		
		return $hasil;
	}
	
	/**
	 * cek mhs sudah registrasi
	 * 
	 * @param object $nodaf [optional]
	 * @return 
	 */
	function is_mhshasregister($noref=''){
		$this->db->select('NPM');
		$this->db->from('calonsiswa');
		$this->db->where('noref',$noref);
		$this->db->where('NPM is null');
		$this->db->where('TGL_HER is null');
		$this->data=$this->db->get();
		if($this->data->num_rows()==0){
			$this->setMesg('Calon mahasiswa sudah registrasi');			
			return TRUE;
		}else{
			$this->setMesg('Calon mahasiswa belum registrasi');
			return FALSE;
		}
	}
		
	
	/**
	 * 
	 * 
	 * @param object $noref
	 * @param object $tglbayar
	 * @param object $nama [optional]
	 * @return 
	 */
	function is_mhsRegToday($noref,$tglbayar,$nama='')
	{
		$this->db->select('NOREF,TGL_BAYAR');
		$this->db->from('HERR_MHSBARU');
		$this->db->where('NOREF',$noref);
		$this->db->where('TGL_BAYAR',date('Y-m-d',strtotime($tglbayar)));
		$this->data=$this->db->get()->num_rows();			
		if($this->data>0){
			$this->setMesg($nama.' sudah melakukan transaksi pembayaran biaya semester 1 dengan tanggal '.$tglbayar.'<br />silakan melakukan transaksi kembali besok');
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	//[11-01-2010]perlu di cek soal validasi mhs yang dah registrasi 
	/**
	 * cek status mha sudah lunas atau belum
	 * 
	 * @param object $noref
	 * @param object $nama
	 * @return 
	 */
	function _is_mhsLunas($noref,$nama){
		$strQuery="select distinct beban_biaya from herr_mhsbaru where noref='".$noref."'";
		
		$cek_beban=$this->db->query($strQuery)->row_array();
		
		$strQuery="select sum(JUMLAH) as JMLDIBAYAR from herr_mhsbaru where noref='".$noref."'";
		
		$cek_dibayar=$this->db->query($strQuery)->row_array();
		if(!$this->is_mhshasregister($noref)){
			return FALSE;
		}else{
			if(!empty($cek_beban['beban_biaya']) || !empty($cek_dibayar['JMLDIBAYAR'])){
				if($cek_beban['beban_biaya']==$cek_dibayar['JMLDIBAYAR']){
					//print('Karena '.$cek_beban['beban_biaya'].' sama '.$cek_dibayar['JMLDIBAYAR'].'<br />');
					//print('disini<br />');
					exit();
					$this->setMesg('Mahasiswa '.$nama.' sudah tidak mempunyai beban biaya yang harus di bayar untuk semester 1 ');
					return TRUE;
				}elseif($cek_beban['beban_biaya']<$cek_dibayar['JMLDIBAYAR']){
					$this->setMesg('Mahasiswa '.$nama.' membayar lebih dari biaya yang seharusnya ');
					return TRUE;
				}else{			
					$this->setMesg('Mahasiswa '.$nama.' masih mempunyai beban biaya yang harus di bayar untuk semester 1<br />sebesar  Rp. '.($cek_beban['beban_biaya']-$cek_dibayar['JMLDIBAYAR']).'<br /> total biaya yang sudah di bayarkan adalah Rp. '.$cek_dibayar['JMLDIBAYAR']);							
					return FALSE;
				}
			}else{
				return FALSE;
			}
				
		}		
		
	}
	
	/**
	 * proses herregistrasi mahasiswa
	 * 
	 * @param object $nama
	 * @param object $noref
	 * @param object $tgl_bayar
	 * @param object $jumlah
	 * @param object $beban_biaya
	 * @param object $ThaPmb
	 * @return 
	 */

	function doHerMhs($nama,$noref,$tgl_bayar,$jumlah,$beban_biaya,$ThaPmb){
		//print($nama.' | '.$noref.' | '.$tgl_bayar.' | '.$jumlah.' | '.$beban_biaya.' | '.$ThaPmb);exit();		
		if($this->is_mhsRegToday($noref,$tgl_bayar,$nama)){			
			return FALSE;
		}else{			
			if($this->_is_mhsLunas($noref, $nama)){				
				return FALSE;
			}else{
				$dataherr=array(
					'NOREF'=>$noref,
					'TGL_BAYAR'=>date('Y-m-d',strtotime($tgl_bayar)),
					'JUMLAH'=>(int)$jumlah,
					'beban_biaya'=>(int)$beban_biaya,
					'THN_AKADEMIK'=>$ThaPmb
				);							
				if($this->is_mhshasregister($noref)){
					if($this->db->insert('HERR_MHSBARU',$dataherr)){
						$this->setMesg('Her-registrasi untuk '.$nama.' berhasil dilakukan');
						return TRUE;
					}else{
						$this->setMesg('Her-registrasi untuk '.$nama.' gagal dilakukan');
						return FALSE;
					}
				}else{
					$genNpm=$this->genNPMBaru($noref,'TH-JJ-FK-JUR-JNS-URUT');
					$datacal=array(
						'tgl_her'=>date('Y-m-d'),
						'NPM'=>$genNpm
					);
					
					$genpasswd=$this->genPasswd();
					$dataak=array(
						'NPM'=>$genNpm,
						'PWD'=>$genpasswd
					);
					$this->db->trans_start();
					$this->db->insert('HERR_MHSBARU',$dataherr);
					$this->db->update('calonsiswa',$datacal,array('noref'=>$noref));
					$this->db->insert('AKSES',$dataak);
					$this->db->trans_complete();
					if($this->db->trans_status()==FALSE){
						$this->setMesg('Her-registrasi untuk '.$nama.' gagal dilakukan');
						return FALSE;
					}else{
						$this->setMesg('Her-registrasi untuk '.$nama.' berhasil dilakukan');
						return TRUE;
					}
				}												
			}
		}					
	}
	
	/**
	 * generate nomor pendaftaran
	 * 
	 * @param object $ThaPmb
	 * @param object $is_full [optional]
	 * @param object $is_online [optional]
	 * @param object $startnum [optional]
	 * @return 
	 */
	function genNodaf($ThaPmb,$is_full=0,$is_online=0,$startnum='0001'){
		$th=substr($ThaPmb,2,2);		
		if($is_full=='1'){
			$th=substr($ThaPmb,0,4);
		}		
		
		$kode='AO';
		if($is_online=='1'){
			$kode='OL';
		}
						
		$this->db->select("max(replace(replace(nodaf,'AO',''),'OL',''))+1 as nodaf");
		$this->db->from('calonsiswa');
		$this->db->where('thn_akademik',$ThaPmb);
		$hasil=$this->db->get()->row_array();
		
		$nodafe='';
		if(is_null($hasil['nodaf'])){
			$nodafe=$th.$startnum.$kode;			
		}else{
			$nodafe=$hasil['nodaf'].$kode;
		}
		return $nodafe;
		
	}
	
	function nomor_referensi($nodaf)
	{
		$angka1 = "12345";
		$angka2 = "67890";
		for ($x=0; $x < 6; $x++) 
		{
			mt_srand ((double) microtime() * 1000000);
			$angka_1[$x] = substr($angka1, mt_rand(0, strlen($angka1)-1), 1);
			$angka_2[$x] = substr($angka2, mt_rand(0, strlen($angka2)-1), 1);
		}
		
		$noref = $angka_1[0] . $angka_2[1] . $angka_1[2] . $angka_2[3] . $angka_1[4];
		$noref = $nodaf . $noref; 
		return $noref;
	}
	
	/**
	 * generate biaya untuk mhs baru
	 * 
	 * @param object $ThaPmb
	 * @param object $kode_gel
	 * @param object $jur_lulus
	 * @param object $id_jenismhs
	 * @return 
	 */
	function genBiayaMhsBr($nodaf){
		$this->db->select('THN_AKADEMIK,gelombang,JUR_LULUS,ID_JENISMHS,KELAS');
		$this->db->from('calonsiswa');
		$this->db->where('nodaf',$nodaf);
		$info=$this->db->get()->row_array();
		$ThaPmb=$info['THN_AKADEMIK'];
		$kode_gel=$info['gelombang'];
		$jur_lulus=$info['JUR_LULUS'];
		$id_jenismhs=$info['ID_JENISMHS'];		
		$kelas=$info['KELAS'];
		
		//get spptetap mhsbaru 
		$thn=substr($ThaPmb,0,4);
		$this->db->select('nominal');
		$this->db->from('KEUANGAN_KEWAJIBAN_BIAYA');
		$this->db->where('jenis_biaya','1');
		//$this->db->where('jurusan',$jur_lulus);
		$this->db->where('tahun_angkatan',$thn);
		$spptetap=$this->db->get()->row_array();
		
		//sppvariabel mhsbaru		
		$this->db->select('nominal');
		$this->db->from('KEUANGAN_KEWAJIBAN_BIAYA');
   		// if ($id_jenismhs==1 && $kelas=='Pagi')
		 $this->db->where('jenis_mhs',$id_jenismhs);
   		//  else
   		//  $this->db->where('jenis_kwj','H');
		$this->db->where('jenis_biaya',2);
		$this->db->where('tahun_angkatan',$thn);
		$sppvariabel=$this->db->get()->row_array();
		
		//biaya sarana | sumbangan mhs baru
		$this->db->select('biaya');
		$this->db->from('biaya_sarana');
		$this->db->where('jurusan',$jur_lulus);
		$this->db->where('kode_gel',$kode_gel);		
		$biayasarana=$this->db->get()->row_array();
		
		//biaya pendukung untuk kasus mhs pindahan,
		//maka biaya pindahan mengambil dr biaya pendukung untuk mhs pindahan   
		$this->db->select('BIAYA_PENDUKUNG');
		$this->db->from('MASTER_JENISMHS');
		$this->db->where('ID_JENISMHS',$id_jenismhs);
		$biayapendukung=$this->db->get()->row_array();
		
		
		//jumlah sks semester 1
		$this->db->select('SKS_SMT1');
		$this->db->from('JURUSAN');
		$this->db->where('KD_JUR',$jur_lulus);
		$skssmt1=$this->db->get()->row_array();
		
		$databiaya=array();
		//print_r($sppvariabel['nominal']);break;
		if(!empty($spptetap['nominal'])){$databiaya['spptetap']=$spptetap['nominal'];}else{$databiaya['spptetap']=0;}
		if(!empty($sppvariabel['nominal'])){$databiaya['sppvariabel']=$sppvariabel['nominal'] * $skssmt1['SKS_SMT1'];}else{$databiaya['sppvariabel']=0;}
		
		$databiaya['biayasarana']=$biayasarana['biaya'];
		//if($id_jenismhs==2){
		//	$databiaya['biayapendukung']='0';
		//	$databiaya['biayapindahan']=$biayapendukung['BIAYA_PENDUKUNG'];
		//} else {
		$databiaya['biayapendukung']=$biayapendukung['BIAYA_PENDUKUNG'];
		$databiaya['biayapindahan']='0';	
		$databiaya['id_jenismhs']=$info['ID_JENISMHS'];
		//}
		
		return $databiaya;
	}
	
	function getlistacc($mode='NPM',$katakunci){
		$this->db_adak->select('NAMA,a.NPM,PWD');
		$this->db_adak->from('akses a');
		$this->db_adak->join('mhs m','m.NPM=a.NPM');				
		if($mode=='NPM'){			
			$this->db_adak->where("a.NPM like '".trim($katakunci)."%'");	
		}elseif($mode=='NAMA'){									
			$this->db_adak->where("m.NAMA like '".trim($katakunci)."%'");
		}		
		$hasil=$this->db_adak->get()->result_array();		
		return $hasil;		
	}
  
	function getMhsBaruPublic($ThnPmb='',$nodaf=''){
			$this->db_public->select('nodaf');
			$this->db_public->from('calonsiswa c');
			$this->db_public->where('thn_akademik',$ThnPmb);
			$this->db_public->where('nodaf',$nodaf);
			$cek=$this->db_public->get();
	}	
	
	function formulirMhsOnline($nodaf=''){
		$this->db->select('*,convert(varchar(10),tgldaftar,105) as tglpendaftaran,convert(varchar(10),TGL_TES,105) as tglujian,d.NAMA_DEPT as NAMAPIL1,e.NAMA_DEPT as NAMAPIL2,f.NAMA_DEPT as NAMAPIL3,k.NamaKab as Kab,p.NamaProp as Prop,ko.NamaKab as KabOrtu,po.NamaProp as PropOrtu,NAMA_RELASI,dg.gelombang,c.gelombang as kodegelombang,status_registrasi');
		$this->db->from('calonsiswa c');
		$this->db->join('department d','c.pilihan1=d.KD_DEPT');
		$this->db->join('department e','c.pilihan2=e.KD_DEPT');
		$this->db->join('department f','c.pilihan3=f.KD_DEPT');
		$this->db->join('kabupaten k','c.kabupaten=k.kdKab');
		$this->db->join('propinsi p','c.propinsi=p.kdProp');
		$this->db->join('kabupaten ko','c.KABUPATEN_ORTU=ko.kdKab');
		$this->db->join('propinsi po','c.PROPINSI_ORTU=po.kdProp');
		$this->db->join('data_gelombang dg','c.gelombang=dg.kode');
		$this->db->join('RELASI_MHS r','c.ID_RELASI=r.ID_RELASI');
		$this->db->where('nodaf',$nodaf);
		$hasil=$this->db->get();
		//print($this->db->last_query());
		return $hasil->row_array();
	}

	function getRegisterAkun_online($searchkey=''){
		$this->db->select('r.*, c.nodaf');
		$this->db->from('registrasi_pmb r');
		$this->db->join('calonsiswa c','c.email=r.email', 'left');
		$this->db->order_by("r.tanggal_daftar desc");
		$this->db->limit(1000);
		
		if(!empty($searchkey)){
			$this->db->where("r.nama like '%".$searchkey."%' or r.telp like '%".$searchkey."%' or r.email like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%'");			
		}
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
	}

	function getDataUjianCBT($searchkey=''){
		$this->db->select('tn.*,ta.*, c.nodaf,c.nama');
		$this->db->from('tbl_nilai tn');
		$this->db->join('tbl_attempt ta','ta.id_user=tn.id_user');
		$this->db->join('calonsiswa c','c.nodaf=tn.nodaf');
		$this->db->order_by("tn.tanggal desc");
		$this->db->limit(1000);
		
		if(!empty($searchkey)){
			$this->db->where("c.nama like '%".$searchkey."%' or c.nodaf like '%".$searchkey."%' or tn.id_user like '%".$searchkey."%' or ta.id_user like '%".$searchkey."%'");			
		}
					
		$hasil=$this->db->get();			
		return $hasil->result_array();
	}

	function delDataUjianCBT($iduser=''){
		if(!empty($iduser)){
			$this->db->trans_start();
			$this->db->delete('tbl_nilai',array('id_user'=>$iduser));
			$this->db->trans_complete();
			if($this->db->delete('tbl_attempt',array('id_user'=>$iduser))){				
				$this->setMesg('Data berhasil dihapus');
				return TRUE;
			}else{
				$this->setMesg('Data gagal dihapus');
				return FALSE;
			}
		}else{
			$this->setMesg('Data gagal dihapus');
			return FALSE;
		}
	}


}
?>