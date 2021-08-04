<?php

//file header
$objPHPExcel = new PHPExcel();
// set the font style for the entire workbook
$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Arial')
    ->setSize(8)
    ->setBold(FALSE);
$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'size'  => 11,
        'name'  => 'Verdana'
    ));
$styleArray2 =array(
'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  ),
    'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'd1f2ff')
     ),
   'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        ));
$styleArray3 =array(
'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  ),
   'font' => array(
    'bold' => false,
    'size' => 8),
   );
$bg1 =array(
	'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'ffffff')
	),
	'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
);
$bg2 =array(
	'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'c6f5e9')
	),
	'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
);
$bg3 =array(
	'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '8a8383')
	),
	'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
);
$bg4 =array(
	'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'dfe619')
	),
	'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
);
$bg5 =array(
	'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => 'a32121')
	),
	'font' => array(
    'bold' => true,
    'size' => 9),
   'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
);

   
 
  $objPHPExcel->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->getStyle('B7:AW7')->applyFromArray($styleArray2);
  $objPHPExcel->getActiveSheet()->getStyle('V1:X1')->applyFromArray($bg1);
  $objPHPExcel->getActiveSheet()->getStyle('V2:X2')->applyFromArray($bg2);
  $objPHPExcel->getActiveSheet()->getStyle('V3:X3')->applyFromArray($bg3);
  $objPHPExcel->getActiveSheet()->getStyle('V4:X4')->applyFromArray($bg4);
  $objPHPExcel->getActiveSheet()->getStyle('V5:X5')->applyFromArray($bg5);
            $objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
										
										->mergeCells('D2:I2')
                                        ->mergeCells('B2:C5')
										->mergeCells('D3:I3')
										->mergeCells('D4:U4')
										->mergeCells('C2:C5')
                                        ->setCellValue('D2', 'UNIVERSITAS AMIKOM PURWOKERTO')
                                        ->setCellValue('D3', 'TAHUN AKADEMIK '.$tahunpmb)
                                        ->setCellValue('D4', 'Jl Letjend Pol Soemarto Watumas Purwanegara, PURWOKERTO 53131. Telp : (0281)623321')
                                        ->setCellValue('D5', '')
										->setCellValue('B7','NO')
										->setCellValue('C7','GEL')
										->setCellValue('D7','NODAF')
										->setCellValue('E7','NAMA')
										->setCellValue('F7','NIK')
										->setCellValue('G7','AGAMA')
										->setCellValue('H7','JK')
										->setCellValue('I7','TEMPAT LAHIR')
										->setCellValue('J7','TANGGAL LAHIR')
										->setCellValue('K7','STATUS PERNIKAHAN')
										->setCellValue('L7','ASAL SEKOLAH')
										->setCellValue('M7','JURUSAN SLTA')
										->setCellValue('N7','THN LULUS')
										->setCellValue('O7','NEM')
										->setCellValue('P7','ALAMAT')
										->setCellValue('Q7','KECAMATAN')
										->setCellValue('R7','KABUPATEN')
										->setCellValue('S7','PROVINSI')
										->setCellValue('T7','NO TELP')
										->setCellValue('U7','NO WA')
										->setCellValue('V7','EMAIL')
										->setCellValue('W7','PILIHAN 1')
										->setCellValue('X7','PILIHAN 2')
										->setCellValue('Y7','PILIHAN 3')
										->setCellValue('Z7','KELAS')
										->setCellValue('AA7','TGL DAFTAR')
										->setCellValue('AB7','INFORMASI')
										->setCellValue('AC7','PERSYARATAN')
										->setCellValue('AD7','RELASI')
										->setCellValue('AE7','TGL TES')
										->setCellValue('AF7','NAMA IBU')
										->setCellValue('AG7','PEKERJAAN IBU')
										->setCellValue('AH7','TELP IBU')
										->setCellValue('AI7','NAMA AYAH')
										->setCellValue('AJ7','PEKERJAAN AYAH')
										->setCellValue('AK7','TELP AYAH')
										->setCellValue('AL7','ALAMAT ORTU')
										->setCellValue('AM7','KELURAHAN ORTU')
										->setCellValue('AN7','KECAMATAN ORTU')
										->setCellValue('AO7','KABUPATEN ORTU')
										->setCellValue('AP7','PROVINSI ORTU')
										->setCellValue('AQ7','KODEPOS ORTU')
										->setCellValue('AR7','PENGHASILAN/bln ORTU')
										->setCellValue('AS7','RELASI')
										->setCellValue('AT7','UKURAN JAS')
										->setCellValue('AU7','SPI')
										->setCellValue('AV7','NO KUITANSI')
										->setCellValue('AW7','NO KIPK')
										->mergeCells('V1:X1')
										->setCellValue('V1','Hanya Daftar')
										->mergeCells('V2:X2')
										->setCellValue('V2','KIP-Kuliah')
										->mergeCells('V3:X3')
										->setCellValue('V3','Angsur')
										->mergeCells('V4:X4')
										->setCellValue('V4','Lunas')
										->mergeCells('V5:X5')
										->setCellValue('V5','Mortal');
		  $objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($styleArray);
		  $objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray($styleArray);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("5");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("5");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth("20");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth("15");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth("15");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth("15");
		  $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(false);
		  $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth("15");
		  $objDrawing = new PHPExcel_Worksheet_Drawing();
	$objDrawing->setName('Logo');
	$objDrawing->setDescription('Logo');
	$objDrawing->setPath('image/logo.png');
	$objDrawing->setHeight(75);
	$objDrawing->setWidth(80);
	$objDrawing->setCoordinates('B2');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	$worksheet = $objPHPExcel->getActiveSheet();
	
		$i=1;
		foreach($datamhs as $row){
			$ol=substr($row['nodaf'],-2);
			if ($ol=='AO' or ($ol=='OL' and $row['syarat2']=='Sudah')){
			$kab_ortu=$this->db->query("select namakab from kabupaten where kdkab=".$row['KABUPATEN_ORTU']." ")->row_array();
			$prop_ortu=$this->db->query("select namaprop from propinsi where kdprop='".$row['PROPINSI_ORTU']."' ")->row_array();
			$merge=7+$i;
			$agama=$this->umum->getAgama();
			foreach($agama as $data=>$item){
				if ($item['kode']==$row['AGAMA']) $nama_agama=$item['nama'];
			}
			$worksheet
					->setCellValueByColumnAndRow($column + 1, $i + 7, $i)
					->setCellValueByColumnAndRow($column+2,$i+7,$row['gelombang'])
					->setCellValueByColumnAndRow($column+3,$i+7,$row['nodaf'])
					->setCellValueByColumnAndRow($column+4,$i+7,$row['nama'])
					->setCellValueByColumnAndRow($column+5,$i+7,$row['nikktp'])
					->setCellValueByColumnAndRow($column+6,$i+7,$nama_agama)
					->setCellValueByColumnAndRow($column+7,$i+7,$row['jk'])
					->setCellValueByColumnAndRow($column+8,$i+7,$row['tempatlahir'])
					->setCellValueByColumnAndRow($column+9,$i+7,$row['tgllahir'])
					->setCellValueByColumnAndRow($column+10,$i+7,$row['status_pernikahan'])
					->setCellValueByColumnAndRow($column+11,$i+7,$row['sekolah'])
					->setCellValueByColumnAndRow($column+12,$i+7,$row['jurusan'])
					->setCellValueByColumnAndRow($column+13,$i+7,$row['tahun_lulus'])
					->setCellValueByColumnAndRow($column+14,$i+7,$row['nem'])
					->setCellValueByColumnAndRow($column+15,$i+7,$row['alamat'])
					->setCellValueByColumnAndRow($column+16,$i+7,$row['kecamatan'])
					->setCellValueByColumnAndRow($column+17,$i+7,$row['namakab'])
					->setCellValueByColumnAndRow($column+18,$i+7,$row['namaprop'])
					->setCellValueByColumnAndRow($column+19,$i+7,$row['telepon'])
					->setCellValueByColumnAndRow($column+20,$i+7,$row['no_wa'])
					->setCellValueByColumnAndRow($column+21,$i+7,$row['email'])
					->setCellValueByColumnAndRow($column+22,$i+7,$row['pil1'])
					->setCellValueByColumnAndRow($column+23,$i+7,$row['pil2'])
					->setCellValueByColumnAndRow($column+24,$i+7,$row['pil3'])
					->setCellValueByColumnAndRow($column+25,$i+7,$row['kelas'])
					->setCellValueByColumnAndRow($column+26,$i+7,date('d-m-Y',strtotime($row['tgldaftar'])))
					->setCellValueByColumnAndRow($column+27,$i+7,$row['komentar'])
					->setCellValueByColumnAndRow($column+28,$i+7,$row['syarat1'])
					->setCellValueByColumnAndRow($column+29,$i+7,$row['nama_relasi'])
					->setCellValueByColumnAndRow($column+30,$i+7,date('d-m-Y',strtotime($row['TGL_TES'])))
					->setCellValueByColumnAndRow($column+31,$i+7,$row['NAMA_ORTU'])
					->setCellValueByColumnAndRow($column+32,$i+7,$row['PEKERJAAN_ORTU'])
					->setCellValueByColumnAndRow($column+33,$i+7,$row['TELP_ORTU'])
					->setCellValueByColumnAndRow($column+34,$i+7,$row['NAMA_AYAH'])
					->setCellValueByColumnAndRow($column+35,$i+7,$row['PEKERJAAN_AYAH'])
					->setCellValueByColumnAndRow($column+36,$i+7,$row['TELP_AYAH'])
					->setCellValueByColumnAndRow($column+37,$i+7,$row['ALAMATORTU'])
					->setCellValueByColumnAndRow($column+38,$i+7,$row['KELURAHAN_ORTU'])
					->setCellValueByColumnAndRow($column+39,$i+7,$row['KECAMATAN_ORTU'])
					->setCellValueByColumnAndRow($column+40,$i+7,$kab_ortu['namakab'])
					->setCellValueByColumnAndRow($column+41,$i+7,$prop_ortu['namaprop'])
					->setCellValueByColumnAndRow($column+42,$i+7,$row['KODEPOS_ORTU'])
					->setCellValueByColumnAndRow($column+43,$i+7,$row['penghasilan_ortu'])
					->setCellValueByColumnAndRow($column+44,$i+7,$row['RELASI'])
					->setCellValueByColumnAndRow($column+45,$i+7,$row['ukuran_jas'])
					->setCellValueByColumnAndRow($column+46,$i+7,$row['SPI'])
					->setCellValueByColumnAndRow($column+47,$i+7,$row['no_kuitansi'])
					->setCellValueByColumnAndRow($column+48,$i+7,$row['no_kipk']);
			if ($row['status_registrasi']=='Lunas') {
				$color='dfe619';
			}elseif ($row['status_registrasi']=='Mortal') {
				$color='a32121';
			}elseif ($row['status_registrasi']=='Angsur') {
				$color='8a8383';
			}elseif ($row['status_registrasi']=='Hanya Daftar') {
				$color='ffffff';
			}elseif ($row['status_registrasi']=='KIP-Kuliah') {
				$color='c6f5e9';
			}
			$styleArray4 =array(
				'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => $color)
			),
			'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  ),
			);
			$worksheet->getStyle('B'.$merge.':AW'.$merge)->applyFromArray($styleArray4);
		$i++;
			}//ol
		}//foreach
				//isi
    
    
 
            $objPHPExcel->getActiveSheet()->setTitle('Laporan PMB ');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
            //sesuaikan headernya 
			ob_end_clean();
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			

            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporan_pmb.xls"');
				ob_end_clean();
            //unduh file
            $objWriter->save("php://output");

		



	?>
    
 