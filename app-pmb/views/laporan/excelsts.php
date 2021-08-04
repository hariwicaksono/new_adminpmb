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
  $objPHPExcel->getActiveSheet()->getStyle('B7:O7')->applyFromArray($styleArray2);
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
										->setCellValue('G7','JK')
										->setCellValue('H7','NO TELP')
										->setCellValue('I7','NO WA')
										->setCellValue('J7','EMAIL')
										->setCellValue('K7','PILIHAN 1')
										->setCellValue('L7','PILIHAN 2')
										->setCellValue('M7','PILIHAN 3')
										->setCellValue('N7','STATUS')
										->setCellValue('O7','SYARAT PMB')
										->mergeCells('V1:X1')
										->setCellValue('V1','Hanya Daftar')
										->mergeCells('V2:X2')
										->setCellValue('V2','Bidikmisi')
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
			if ($ol=='AO' or $ol=='OL'){
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
					->setCellValueByColumnAndRow($column+6,$i+7,$row['jk'])
					->setCellValueByColumnAndRow($column+7,$i+7,$row['telepon'])
					->setCellValueByColumnAndRow($column+8,$i+7,$row['no_wa'])
					->setCellValueByColumnAndRow($column+9,$i+7,$row['email'])
					->setCellValueByColumnAndRow($column+10,$i+7,$row['pil1'])
					->setCellValueByColumnAndRow($column+11,$i+7,$row['pil2'])
					->setCellValueByColumnAndRow($column+12,$i+7,$row['pil3'])
					->setCellValueByColumnAndRow($column+13,$i+7,$row['syarat2'])
					->setCellValueByColumnAndRow($column+14,$i+7,$row['syarat1'])
					;
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
			$worksheet->getStyle('B'.$merge.':O'.$merge)->applyFromArray($styleArray4);
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
            header('Content-Disposition: attachment;filename="Laporan_status.xls"');
				ob_end_clean();
            //unduh file
            $objWriter->save("php://output");

		



	?>
    
 