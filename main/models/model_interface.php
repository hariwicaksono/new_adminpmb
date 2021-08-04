<?php
/*
 * Created on Jan 11, 2010
 * Code by d_an@nk
 * Innovation Center STMIK AMIKOM Yogyakarta
 * 
 * Filename model_interface.php
 */
/**
 * class ini adalah class yang digunakan di semua class,
 * hati2 jika ingin mengubah class ini.
 * fungsi dari class ini adalah untuk memudahkan validasi dan pengecekan error 
 */
class Model_interface extends Model{
	
	/**
	 * pesan untuk developer
	 * @var string
	 */
	var $msg;
	
	/**
	 * waktu saat ini dengan format YY-mm-dd HH:ii:ss seperti hasil dari fungsi date('Y-m-d H:i:s')
	 * @var datetime
	 */
	var $now;
	
	/**
	 * field untuk menyimpan hasil validasi dari fungsi setField($rules,$data) dan getField()
	 * @var array
	 */
	var $field;
	
	/**
	 * pesan untuk user
	 * @var string
	 */
	var $uMsg;
	
	/**
	 * digunakan untuk mengambil jumlah data yang ada setelah melakukan query,
	 * jika query menggukan limit akan diquery lagi dengan count(*) tanpa menggunakan limit
	 * @var int
	 */
	var $total_rows;
	
	/**
	 * menyimpan status untuk upoad file
	 * @var array
	 */
	var $upload_status;
	
	function __construct(){
		parent::Model();
		$this->now = date("Y-m-d H:i:s");
		$this->field = array();
	}
	
	/**
	 * mendapatkan error string dari database jika dirasa error pesan yang keluar belum begitu jelas
	 * @return string
	 */
	function getErrorMessage(){
		if($errrmsg=$this->getError()){
			if(isset($errrmsg['message'][1])){
				return $errrmsg['message'][1];
			}
		}
		return false;
	}
	
	/**
	 * mendapatkan error number dari database jika dirasa error pesan yang keluar belum begitu jelas
	 * @return int
	 */
	function getErrorNumber(){
		if($errrmsg=$this->getError()){
			if(isset($errrmsg['message'][0])){
				return $errrmsg['message'][0];
			}
		}
		return false;
	}
	
	/**
	 * mendapatkan error sql dari database jika dirasa error pesan yang keluar belum begitu jelas
	 * @return string SQL yaitu: SQL yang error pada saat melakukan query
	 */
	function getErrorSql(){
		if($errrmsg=$this->getError()){
			if(isset($errrmsg['message'][2])){
				return $errrmsg['message'][2];
			}
		}
		return false;
	}
	
	/**
	 * mendapatkan error sql dari database jika dirasa error pesan yang keluar belum begitu jelas
	 * @return array yang berisi error string, error number dan error sql
	 */
	function getError(){
		if(isset($this->db->error_message)){
			return $this->db->error_message;
		}
		else return false;
	}
	
	/**
	 * ambil pesan untuk user
	 * created : arif.laksito
	 * Feb 02,2010 13:37
	 * 
	 */
	function getMsgUser(){
		$set = explode(",", $this->msg);
		if(isset($set[2])){
			$data = explode("@", $set[2]);
			return strip_tags(str_replace("param: ","",$data[1]));
		}
	}
	
	/**
	 * set msg untuk user upload xls
	 * created : arif.laksito
	 * Feb 02,2010 14:08
	 * 
	 */
	function setMsgUsers($status, $mode='error'){
		$sts = "";
		for($j=0; $j<count($status); $j++){
			if(isset($this->upload_status[$j])){
				
				if($this->upload_status[$j][2]==0){ 
					
					$set = explode(",", $status[$j][3]);
					if(isset($set[2])){
					$_set = str_replace("@param:","",$set[2]);
					}else{
						$_set = "";
					}
					$sts .= $status[$j][1]." guru, baris ke ".($j+1)." ".$_set;
					$sts .= "<br />";
				}else{
					if($mode!='error'){ 
						$sts .= $status[$j][1]." guru, baris ke ".($j+1)." sukses";
						$sts .= "<br />";
					}
				}	
			}
		}
		
		$this->uMsg = $sts;
		
	}	 
	 
	/**
	 * ambil pesan untuk user saat upload xls
	 * created : arif.laksito
	 * Feb 02,2010 13:40
	 * 
	 */
	function getMsgUsers(){
		return $this->uMsg;		  		
	}	 
	
	/**
	 * ambil pesan
	 */
	function getMsg(){
		//return $this->msg;
		return $this->getMsgUser();
	}
	
	/**
	 * set error message.
	 * 
	 * @param string $varname nama variabel yang error
	 * @param string $msg pesan yang akan ditampilkan, jika dikosongi secara otomatis akan mengambil error message dari library validasi
	 * @param bool $add default=false yaitu mereplace messagge yang lama dengan yang baru.
	 *         ganti true jika tidak ingin mereplace message yang lama dengan yang baru,
	 *         tetapi menambahkannya dengan separator html "<br />"
	 */
	function setMsg($varname='',$msg='',$add=false,$trace_index=1){
		if(empty($varname)){return;}
		$tmp=($add)?$this->msg:"";
		$backtrace = debug_backtrace();
		$this->msg="@model: <b>".$backtrace[$trace_index]['class']."</b>, @method: <b>".$backtrace[$trace_index]['function']."</b>, @param: <b>$varname</b> ";
		if(empty($msg)){
			$errrmsg=$this->validasi->get_error_message();
			$this->msg.=(!empty($errrmsg))?$errrmsg:"";
		}else{
			$this->msg.=$msg;
		}
		$this->msg=$tmp.(!empty($tmp)?"<br />":"").$this->msg;
	}
	
	/**
	 * set field yang akan dimasukkan dalam database
	 * @param array $rules=array('FIELD_NAME'=>"validasi string") berisi nama2 field, dan nama2 field tersebut berisi validasi string
	 * @param array $dtArray array input yagn akan dimasukkan dalam $field sesuai validasi string yang ditemtukan di var $rules
	 * @return bool false berarti var $msg tidak kosong dan var $field kosong, dan sebaliknya
	 */
	function setField($rules=array(),$dtArray=array()){
		$this->field =array();
		$validinput=true;
		if(!$this->validasi->is_array($rules)){
			$this->setMsg("rules",'',true,2);
			$validinput=false;
		}
		if(!$this->validasi->is_array($dtArray)){
			$this->setMsg("dtArray",'',true,2);
			$validinput=false;
		}
		if(!$validinput){
			return false;
		}				
		
		foreach($rules as $key=>$cek){
			if(isset($dtArray[$key])){							
				if(!$this->validasi->cek($dtArray[$key],$cek)){
					$this->setMsg($key,'',true,2);
				}else{
					if(!empty($dtArray[$key])){																				
						$this->field[$key]=$dtArray[$key];	
					}else $this->field[$key]=''; 								
					
				}
			}
		}
		
		if(!empty($this->msg)){
			return false;
		}else{
			return true;
		}
	}
	
	/**
	 * mengambil field yang telah dimasukkan saat method setField() dipanggil dan menghasilkan nilai true
	 * jika nilai dari setField()==false maka kembalian kosong
	 * @return array $field=array('FIELD_NAME'=>"VALUE")
	 */
	function getField(){
		return $this->field;
	}
	
	/**
	 * mengambil nilai variabel total_rows
	 * @return unknown_type
	 */
	function total_rows(){
		return $this->total_rows;
	}		
	
	/**
	 * inisialisasi untuk membuat(download) file excel
	 * 
	 * @return void
	 */
	/*function _init_excel($type="Writer"){
		$ini = ini_get('include_path');
		$path = BASEPATH.'pear/';
		if(strpos($ini,$path)===false){
			$server=strtolower($_SERVER["SERVER_SOFTWARE"]);
			$separator=":"; //linux
			if(strpos($server,"win32") or strpos($server,"win")){$separator=";";} //windows
			ini_set('include_path', $ini.$separator.$path);
		}
		if($type=="Writer"){
			$lib="Spreadsheet/Excel/Writer.php";
			require_once $lib;
			$this->load->library('excel'); //harus setelah _init_excel()
			$this->xls = $this->excel->xls;
		}else{
			$lib="Spreadsheet/Excel/Reader.php";
			require_once $lib;
			$this->xls = new Spreadsheet_Excel_Reader();
		}

	}*/
	
}

/* End of file model_interface.php */
/* Location: ./models/model_interface.php */

?>