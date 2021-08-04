<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Cloader extends Controller
{
	function Cloader(){
		parent::Controller();
		$this->load->model('tahun');
		$this->load->model('kabupaten');	
		$this->load->model('department');
		$this->load->model('biayamhs');	
		$this->load->model('mhsbaru');
		$this->load->model('umum');
		//$this->output->enable_profiler(true);
	}
	
	function getKab($id_propinsi=''){		
		if(!empty($id_propinsi)){
			$list_kabupaten = $this->kabupaten->getKab($id_propinsi);
			echo '<option value="">--Pilih Kabupaten--</option>';
			foreach ($list_kabupaten as $kab){
				echo '<option value='.$kab['KdKab'].'>'.$kab['NamaKab'].'</option>';
			}
		} else {
			echo '<option value="">--Pilih Kabupaten--</option>';
		}		
	}
	
	function getJurusan($id_fak=''){
		if(!empty($id_fak)){
			$list_jurusan=$this->department->getJurusanByFak($id_fak);
			echo '<option value="">--Pilih Jurusan--</option>';
			foreach ($list_jurusan as $jur){
				echo '<option value='.$jur['KD_DEPT'].'>'.$jur['NAMA_DEPT'].'</option>';
			}
		} else {
			echo '<option value="">--Pilih Jurusan--</option>';
		}	
	}
	
	function getBiayaPendaftaran($idjenismhs=''){		
		if(!empty($idjenismhs)){
			$list_biaya=$this->biayamhs->getBiayaPendaftaranMhs(substr($idjenismhs,0,1));			
			foreach ($list_biaya as $data){
				echo $data['BIAYA_DAFTAR'];
			}
		} else {
				echo '0';
		}			
	}
	
	function getDataMhs($kodegel){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		if(!empty($katakunci)){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'',$katakunci);
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=nama&id='.$katakunci.'">excel</a>';
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=periode&tgl1='.$tgl1.'&tgl2='.$tgl2.'">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'','',$tgl1,$tgl2);
		}else if (!empty($_POST['kd_jur'])){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=kd_jur&id='.$_POST['kd_jur'].'">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'','','','',$_POST['kd_jur']);
		}else if(!empty($_POST['tgltes1']) && !empty($_POST['tgltes2'])){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=tgltes&tgl1='.$_POST['tgltes1'].'&tgl2='.$_POST['tgltes2'].'">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'','','','','',$_POST['tgltes1'],$_POST['tgltes2']);
		}else if(!empty($_POST['status'])){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=status&id='.$_POST['status'].'">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,'','','','','','','',$_POST['status']);
		}else if($kodegel=='none'){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=none&id=0">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun);
		}else{
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excel?act=gelombang&id='.$kodegel.'">excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru($tahun,$kodegel);	
		}
		$this->load->view('laporan/lapcallpendaftar',$this->data);		
	}
	
	
	function getDataLulus($kodegel){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$kdjur=$this->input->post('kd_jur');
		if(!empty($katakunci)){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excelLulus?act=nama&id='.$katakunci.'">Excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,'',$katakunci);
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excelLulus?act=tgltes&tgl1='.$_POST['tgl1'].'&tgl2='.$_POST['tgl2'].'">Excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,'','',$tgl1,$tgl2);
		}else if(!empty($kdjur)){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excelLulus?act=kd_jur&id='.$kdjur.'">Excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,'','','','',$kdjur);
		}else
		if($kodegel=='none'){
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excelLulus?act=none&id=0">Excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun);
		}else{
			$this->data['kriteria']='<a href="'.site_url().'/cloader/excelLulus?act=gelombang&id='.$kodegel.'">Excel</a>';
			$this->data['datamhs']=$this->mhsbaru->getMhsLulusTest($tahun,$kodegel);	
		}
		$this->load->view('laporan/lapcalllulustest',$this->data);
	}
	
	function getDataHer(){
		$tahun=$this->tahun->getThaPmb();
		$katakunci=$this->input->post('katakunci');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		if(!empty($katakunci)){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,'',$katakunci);
		}else if(!empty($tgl1) && !empty($tgl2)){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,'','',$tgl1,$tgl2);
		}else
		if($kodegel=='none'){
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun);
		}else{
			$this->data['datamhs']=$this->mhsbaru->getMhsHerregistrasi($tahun,$kodegel);	
		}
		$this->load->view('laporan/lapcallherregistrasi',$this->data);
	}
	
	function excel(){
  	require_once APPPATH . "/third_party/PHPExcel.php";
 	 $this->data['tahunpmb']=$this->tahun->getThaPmb();
	if($_REQUEST['act']=='nama'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],'',$_REQUEST['id']);
		}else if($_REQUEST['act']=='periode'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],'','',$_REQUEST['tgl1'],$_REQUEST['tgl2']);
		}else if ($_REQUEST['act']=='kd_jur'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],'','','','',$_REQUEST['id']);
		}else if($_REQUEST['act']=='tgltes'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],'','','','','',$_REQUEST['tgl1'],$_REQUEST['tgl2']);
		}else if($_REQUEST['act']=='status'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],'','','','','','','',$_REQUEST['id']);	
		}else if($_REQUEST['act']=='gelombang'){
			$this->data['datamhs']=$this->mhsbaru->getMhsBaru_excel($this->data['tahunpmb'],$_REQUEST['id']);
		}elseif($_REQUEST['act']=='none'){
			$this->data['datamhs']=$this->db->query("select c.*,g.gelombang,namakab,namaprop,dp.nama_dept as pil1,de.nama_dept as pil2,df.nama_dept as pil3,mj.nama as kelas,nama_relasi,c.no_kipk from calonsiswa c join data_gelombang g on c.gelombang=g.kode join kabupaten k on k.kdkab=c.kabupaten join propinsi p on p.kdprop=c.propinsi join department dp on dp.kd_dept=c.pilihan1 join department de on de.kd_dept=c.pilihan2 join department df on df.kd_dept=c.pilihan3 join master_jenismhs mj on mj.id_jenismhs=c.id_jenismhs join relasi_mhs r on c.id_relasi=r.id_relasi where c.thn_akademik='".$this->data['tahunpmb']."' order by nodaf asc")->result_array();
		}
		$this->load->view('laporan/excel',$this->data);
	}

	function excelStatus(){
		require_once APPPATH . "/third_party/PHPExcel.php";
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
	  		if($_REQUEST['act']=='tidak_diterima'){
			  $this->data['datamhs']=$this->db->query("select c.*,g.gelombang,namakab,namaprop,dp.nama_dept as pil1,de.nama_dept as pil2,df.nama_dept as pil3,mj.nama as kelas,nama_relasi,c.no_kipk from calonsiswa c join data_gelombang g on c.gelombang=g.kode join kabupaten k on k.kdkab=c.kabupaten join propinsi p on p.kdprop=c.propinsi join department dp on dp.kd_dept=c.pilihan1 join department de on de.kd_dept=c.pilihan2 join department df on df.kd_dept=c.pilihan3 join master_jenismhs mj on mj.id_jenismhs=c.id_jenismhs join relasi_mhs r on c.id_relasi=r.id_relasi where c.syarat2 = 'Tidak diterima' AND c.thn_akademik='".$this->data['tahunpmb']."' order by nodaf asc")->result_array();
			  } elseif($_REQUEST['act']=='diterima'){
				$this->data['datamhs']=$this->db->query("select c.*,g.gelombang,namakab,namaprop,dp.nama_dept as pil1,de.nama_dept as pil2,df.nama_dept as pil3,mj.nama as kelas,nama_relasi,c.no_kipk from calonsiswa c join data_gelombang g on c.gelombang=g.kode join kabupaten k on k.kdkab=c.kabupaten join propinsi p on p.kdprop=c.propinsi join department dp on dp.kd_dept=c.pilihan1 join department de on de.kd_dept=c.pilihan2 join department df on df.kd_dept=c.pilihan3 join master_jenismhs mj on mj.id_jenismhs=c.id_jenismhs join relasi_mhs r on c.id_relasi=r.id_relasi where c.syarat2 = 'Sudah' AND c.thn_akademik='".$this->data['tahunpmb']."' order by nodaf asc")->result_array();
				}
		  $this->load->view('laporan/excelsts',$this->data);
	  }

	  function excelAkun(){
		require_once APPPATH . "/third_party/PHPExcel.php";
		$this->data['tahunpmb']=$this->tahun->getThaPmb();
	  		if($_REQUEST['act']=='none'){
			  $this->data['datamhs']=$this->db->query("select r.*, c.nodaf from registrasi_pmb r left join calonsiswa c on c.telepon=r.telp order by r.tanggal_daftar desc")->result_array();
			  } 
		  $this->load->view('laporan/excelakun',$this->data);
	  }
	
}
?>