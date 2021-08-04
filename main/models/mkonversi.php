<?php

class Mkonversi extends Model{
function TglIndonesia($tgl){
	$days=date('d',strtotime($tgl));
	$bulans=date('m',strtotime($tgl));
	$tahun=date('Y',strtotime($tgl));
	
	switch ($bulans) {
	   case "01": $bulan="Januari";break; 
	   case "02": $bulan="Februari";break; 
	   case "03": $bulan="Maret";break; 
	   case "04": $bulan="April";break; 
	   case "05": $bulan="Mei";break; 
	   case "06": $bulan="Juni";break; 
	   case "07": $bulan="Juli";break; 
	   case "08": $bulan="Agustus";break; 
	   case "09": $bulan="September";break; 
	   case "10": $bulan="Oktober";break; 
	   case "11": $bulan="November";break; 
	   case "12": $bulan="Desember";break; 
	}
	return $days." ". $bulan ." ".$tahun;
}
function HariIndonesia($tgl=""){
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
if(empty($tgl))
   return $array_hari[date("N")];
else
   return $array_hari[date("N",strtotime($tgl))];
}
function tgl_eng($dt = ''){
        try {
            $dt = new  DateTime($dt);    
        } catch (Exception $e) {
            $dt = new  DateTime();
        }
        
        return $dt->format("F j") . "<span class='sup'>" . $dt->format("S") . "</span>, " . $dt->format("Y");
}
}

?>