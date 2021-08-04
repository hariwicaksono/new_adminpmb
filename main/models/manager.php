<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Manager extends Model{	
	var $data;
	var $msg;
	
	function Manager(){
		parent::Model();
		$this->db_user=$this->load->database('db_user',TRUE);	
	}	
	
	function setMesg($pesan=''){
		$this->msg=$pesan;
	}
	
	function getMesg(){
		return $this->msg;
	}
	
	function getloginAP(){
		$hasil=$this->db_user->query('exec sp_helplogins');		
		return $hasil->result_array();	
	}
	
	function getuserDB(){
		$hasil=$this->db_user->query('exec sp_helpuser');
		return $hasil->result_array();		
	}
	
	function addloginDB($loginame,$passwd){
		if($this->db_user->query("exec sp_addlogin '".$loginame."','".$passwd."','DB_PWT'")){
			return TRUE;
		}else{
			return FALSE;
		}		
	}
	
	function delloginDB($loginame){
		if($this->db_user->query("exec sp_droplogin '".$loginame."'")){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function adduserDB($loginame,$nameindb,$grpname){
		if($this->db_user->query("exec sp_adduser '".$loginame."','".$nameindb."','".$grpname."'")){
			return TRUE;
		}else{
			return FALSE;
		}
	}						

	function deluserDB($nameindb){
		if($this->db_user->query("exec sp_dropuser '".$nameindb."'")){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function GantiPasswordUserDb($oldparam,$newparam,$loginame){
		if($this->db_user->query("exec sp_password '".$oldparam."','".$newparam."','".$loginame."'")){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	
	function listroleDB(){
		$hasil=$this->db_user->query('exec sp_helprole');
		return $hasil->result_array();
	}
	
	
	function adduserToTbl($username,$password,$kelompok){
		$this->db_user->where('nama',$username);
		$hasil=$this->db_user->get('PMB_X');
		if($hasil->num_rows() > 0){
			return FALSE;
		}else{
			$this->data=array(
				'nama'=>$username,
				'pass'=>$password,
				'status'=>$kelompok
			);
			if($this->db_user->insert('PMB_X',$this->data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
	
	function deluserToTbl($username){
		if($this->deluserDB($username)){
			if($this->delloginDB($username)){
				if($this->db_user->delete('PMB_X',array('nama'=>$username))){
					return TRUE;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}			
		}else{
			return FALSE;
		}
		
	}	
	
	function tambahuser($loginname,$passwd,$grpname,$kelompok){		
		if($this->addloginDB($loginname, $passwd)){
			if($this->adduserDB($loginname, $loginname, $grpname)){
				if($this->adduserToTbl($loginname, $passwd, $kelompok)){
					$this->setMesg('User berhasil di tambahkan');
					return TRUE;
				}else{
					$this->setMesg('User gagal di tambahkan');
					return FALSE;
				}
			}else{
				$this->setMesg('User gagal di tambahkan');
				return FALSE;
			}
		}else{
			$this->setMesg('User gagal di tambahkan');
			return FALSE;
		}							
						
	}
	
	function chPassTbl($username,$passwordlama,$passwordbaru){
		$this->db_user->where('nama',trim($username));
		$this->db_user->where('pass',trim($passwordlama));
		$num=$this->db_user->get('PMB_X');
		if($num->num_rows()==1){
			if($this->GantiPasswordUserDb(trim($passwordlama), trim($passwordbaru), trim($username))){
				$this->data=array('pass'=>trim($passwordbaru));
				if($this->db_user->update('PMB_X',$this->data,array('nama'=>trim($username)))){
					return TRUE;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;	
			}			
		}else{
			return FALSE;
		}
	}	
	
	function userProdi(){
		$this->db_user->where('STATUS',4);		
		$hasil=$this->db_user->get('PMB_X');
		return $hasil->result_array();
	}	
	
	function listUserProdi(){
		$this->db_user->select('USER_JUR as NAMA,u.JURUSAN,NAMA_DEPT');
		$this->db_user->from('user_jurusan u');
		$this->db_user->join('department d','u.JURUSAN=d.KD_DEPT');
		$this->db_user->order_by('u.NAMA');
		$hasil=$this->db_user->get();		
		return $hasil->result_array();
	}	
	
	
	function manageUserProdi($namauser,$kdjur,$namauserold,$kdjurold){
		$this->db_user->where("USER_JUR",$namauserold);
		$this->db_user->where('JURUSAN',$kdjurold);
		$num=$this->db_user->get('user_jurusan');
		if($num->num_rows()>0){
			$this->db_user->where("USER_JUR",$namauser);
			$this->db_user->where('JURUSAN',$kdjur);
			$num=$this->db_user->get('user_jurusan');
			if($num->num_rows()>0){
				return FALSE;
			}else{
				$this->data=array('USER_JUR'=>$namauser,'JURUSAN'=>$kdjur);
				$condi=array('USER_JUR'=>$namauserold,'JURUSAN'=>$kdjurold);
				if($this->db_user->update('user_jurusan',$this->data,$condi)){
					return TRUE;
				}else{
					return FALSE;
				}
			}
		}else{
			$this->data=array('USER_JUR'=>$namauser,'JURUSAN'=>$kdjur);
			if($this->db_user->insert('user_jurusan',$this->data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}		
	}
	
	function hapusUserProdi($namauser,$kdjur){
		if($this->db_user->delete('user_jurusan',array('USER_JUR'=>$namauser,'JURUSAN'=>$kdjur))){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
}
?>
