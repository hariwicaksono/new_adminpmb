<?php
/**
 * SIA WEB (PMB,ADMINPMB,KEUANGANPMB,ADMIN AKADEMIK)
 * @pengarah development : arif laksito
 * @author : puguh hasta gunawan
 * @copyright : Innovation Center
 * @since : 01-01-2011
 * @version : 1.2
 */
class Umum extends Model{
	function Umum(){
		parent::Model();
	}
	
	function getAgama(){
		$via=array(
				array('kode'=>'I','nama'=>'ISLAM'),
				array('kode'=>'P','nama'=>'PROTESTAN'),
				array('kode'=>'K','nama'=>'KATOLIK'),
				array('kode'=>'H','nama'=>'HINDU'),
				array('kode'=>'B','nama'=>'BUDDHA'),
				array('kode'=>'KH','nama'=>'KONGHUCU'),
				array('kode'=>'L','nama'=>'LAINNYA')
			);
		return $via;
	}
	
	function infoDari(){
		$via=array(
				array('kode'=>'brosur','nama'=>'Brosur'),
				array('kode'=>'surat','nama'=>'Surat'),
				array('kode'=>'internet','nama'=>'Internet'),
				array('kode'=>'fb','nama'=>'FB'),
				array('kode'=>'ig','nama'=>'IG'),
				array('kode'=>'tv','nama'=>'Televisi'),
				array('kode'=>'teman/saudara','nama'=>'Teman/Saudara'),
				array('kode'=>'lainnya','nama'=>'Lainnya')				
			);
		return $via;
	}
	
	function jurusanSMA(){
		$via=array(
				array('kode'=>'IPA','nama'=>'IPA'),
				array('kode'=>'IPS','nama'=>'IPS'),
				array('kode'=>'BAHASA','nama'=>'BAHASA'),
				array('kode'=>'AKUNTANSI','nama'=>'AKUNTANSI'),
				array('kode'=>'PERKANTORAN','nama'=>'PERKANTORAN'),
				array('kode'=>'MESIN','nama'=>'MESIN'),
				array('kode'=>'LISTRIK','nama'=>'LISTRIK'),
				array('kode'=>'ELEKTRO','nama'=>'ELEKTRO'),
				array('kode'=>'TKJ','nama'=>'TKJ'),
				array('kode'=>'MULTIMEDIA','nama'=>'MULTIMEDIA'),
				array('kode'=>'RPL','nama'=>'RPL'),
				array('kode'=>'lainnya','nama'=>'Lainnya')				
			);
		return $via;
	}

	function ukuranJas(){
		$jas=array(
				array('kode'=>'S','nama'=>'S'),
				array('kode'=>'M','nama'=>'M'),
				array('kode'=>'L','nama'=>'L'),
				array('kode'=>'XL','nama'=>'XL'),
				array('kode'=>'XXL','nama'=>'XXL'),
				array('kode'=>'3L','nama'=>'3L'),
				array('kode'=>'5L','nama'=>'5L')
			);
		return $jas;
	}

	function statusReg(){
		$via=array(
				array('kode'=>'Hanya Daftar','nama'=>'Hanya Daftar'),
				array('kode'=>'KIP-Kuliah','nama'=>'KIP-Kuliah'),
				array('kode'=>'KIP-Kuliah2','nama'=>'KIP-Kuliah-Gel2'),
				array('kode'=>'Angsur','nama'=>'Angsur'),
				array('kode'=>'Lunas','nama'=>'Lunas'),
				array('kode'=>'Mortal','nama'=>'Mortal')				
			);
		return $via;
	}
		
}
?>