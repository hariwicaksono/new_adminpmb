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

  $objPHPExcel->getActiveSheet()->getStyle('A1:B2')->applyFromArray($styleArray);
  $objPHPExcel->getActiveSheet()->getStyle('B7:K7')->applyFromArray($styleArray2);
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
										->setCellValue('C7','NODAF')
										->setCellValue('D7','NAMA')
										->setCellValue('E7','BENAR')
										->setCellValue('F7','SALAH')
										->setCellValue('G7','KOSONG')
										->setCellValue('H7','SCORE')
										->setCellValue('I7','KETERANGAN')
										->setCellValue('J7','TANGGAL')
										->setCellValue('K7','STATUS REGISTRASI')
										;
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
			$merge=7+$i;

			$worksheet
					->setCellValueByColumnAndRow($column + 1, $i + 7, $i)
					->setCellValueByColumnAndRow($column+2,$i+7,$row['nodaf'])
					->setCellValueByColumnAndRow($column+3,$i+7,$row['nama'])
					->setCellValueByColumnAndRow($column+4,$i+7,$row['benar'])
					->setCellValueByColumnAndRow($column+5,$i+7,$row['salah'])
					->setCellValueByColumnAndRow($column+6,$i+7,$row['kosong'])
					->setCellValueByColumnAndRow($column+7,$i+7,$row['score'])
					->setCellValueByColumnAndRow($column+8,$i+7,$row['keterangan'])
					->setCellValueByColumnAndRow($column+9,$i+7,$row['tanggal'])
					->setCellValueByColumnAndRow($column+10,$i+7,$row['status_registrasi'])
					;
			$styleArray4 =array(
				'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID
			
			),
				'borders' => array(
				'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			),
			);
			$worksheet->getStyle('B'.$merge.':K'.$merge)->applyFromArray($styleArray4);
		$i++;
		
		}//foreach
				//isi
    
    
 
            $objPHPExcel->getActiveSheet()->setTitle('Laporan Nilai ');
 
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
            header('Content-Disposition: attachment;filename="Laporan_nilai.xls"');
				ob_end_clean();
            //unduh file
            $objWriter->save("php://output");

		



	?>
    
 