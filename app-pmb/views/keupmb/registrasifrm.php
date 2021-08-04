<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<script type="text/javascript">
	$(function() {$( "#tglbayar" ).datepicker({dateFormat:'dd-mm-yy',maxDate:'+0D'});});$(function(){$("#batal").click(function(){history.back();	});});	
	$(document).ready(function(){$("#herregform").validate({rules: {bayarsekarang: {required:true}},messages: {bayarsekarang: {required:"Nama user tidak boleh kosong"	}}});});
</script>

<center>
	<?php
		if(!empty($biaya) && !empty($namabiaya)){
	?>
	<div id="content_form">
		<?php echo form_open('keupmb/registrasi',array('id'=>'herregform'));?>
		<table >
			<tr>
				<td>NOMOR PENDAFTARAN</td>
				<td>:</td>
				<td>
					<?php 
						$conf=array(
							'name'=>'nodaf',
							'value'=>$biaya['nodaf'],
							'readonly'=>'readonly',
							'class'=>'justread'
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td>NOMOR REFERENSI</td>
				<td>:</td>
				<td>
					<?php 
						$conf=array(
							'name'=>'noref',
							'value'=>$biaya['noref'],
							'readonly'=>'readonly',
							'class'=>'justread'
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
							'name'=>'nama',
							'value'=>$biaya['nama'],
							'readonly'=>'readonly',
							'class'=>'justread'
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[0]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						if ($tahunpmb==$biaya['thn_akademik']) {
							
							if ($biaya['id_jenismhs']==1) $spp=3900000; else $spp=4100000;
						} else { 
							$spp=$biaya['spptetap'];
						}
						$conf=array(
							'name'=>'spptetap',
							'value'=>$biaya['spptetap'],
							'readonly'=>'readonly',
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[1]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						if ($tahunpmb==$biaya['thn_akademik']) {
							$spp_var=0;
						} else { 
							$spp_var=$biaya['sppvariabel'];
						}
						$conf=array(
							'name'=>'sppvariabel',
							'value'=>$spp_var,
							'readonly'=>'readonly',
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[2]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php 

				$conf=array(
							'name'=>'beasarana',
							'value'=>$biaya['beasarana']
							//'readonly'=>'readonly',dimatikan sementara
							//'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[9]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
							'name'=>'beasiswa',
							'value'=>$biaya['beasiswa'],
							'readonly'=>'readonly',
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[10]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
							'name'=>'biaya_pendukung',
							'value'=>$biaya['biaya_pendukung'],
							//'readonly'=>'readonly',
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[8]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
							'name'=>'biaya_pindahan',
							'value'=>$biaya['SPI'],
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper($namabiaya[16]['nama_kwj']);?></td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
							'name'=>'biaya_pengakuan_sks',
							'value'=>$biaya['biaya_pengakuan_sks']						
						);
						echo form_input($conf); 
					?>
				</td>
			</tr>

			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr>
				<td ><b>TOTAL BIAYA</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'name'=>'totalbayar',
							'value'=>$totalbayar['TOTALBIAYA']
							//'readonly'=>'readonly',
							//'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr>
				<td ><b>TOTAL BAYAR AWAL</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'name'=>'bayarawal',
							'value'=>$bayarawal['TOTALBAYARAWAL']
						//	'readonly'=>'readonly',
							//'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr>
				<td ><b>TOTAL SUDAH DIBAYAR</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'name'=>'sdhbayar',
							'value'=>$sdhbayar,
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr>
				<td ><b>DIBAYAR SEKARANG</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'id'=>'bayarsekarang',
							'name'=>'bayarsekarang',
							'value'=>set_value('bayarsekarang')													
						);
						echo form_input($conf); 
					?>
					<br /><label for="bayarsekarang" class="error">Jumlah yang dibayarkan harus di isi</label>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr>
				<td ><b>TANGGAL HER-REGISTRASI</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'name'=>'tglreg',
							'value'=>$tgldata,
							'readonly'=>'readonly',
							'class'=>'justread'							
						);
						echo form_input($conf); 
					?>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<tr valign="top">
				<td ><b>TANGGAL BAYAR</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'id'=>'tglbayar',
							'name'=>'tglbayar',
							'value'=>$tgldata														
						);
						echo form_input($conf); 
					?>
					<br /><label style="color:red">*tanggal saat pembayaran di bank</label>
				</td>				
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>				
			</tr>
			<!--<tr>
				<td ><b>NPM</b></td>
				<td >:</td>
				<td >
					<?php
						$conf=array(
							'name'=>'npmgen',
							'value'=>$npmgen,
							'readonly'=>'readonly'							
						);
						echo form_input($conf); 						
					?>
				</td>				
			</tr>
			<tr>
				<td colspan="3">
					&nbsp;
				</td>				
			</tr>-->
			<tr>
				<td colspan="3" align="center" class="mybutton">
				<?php 
					echo form_submit('daftar','Proses');
					$conf = array(
					    'name' => 'batal',
					    'id' => 'batal',					    					    
					    'value' => 'Batal',
						'type'=>'button'
					);
					echo form_input($conf);					
				?>
				</td>				
			</tr>
		</table>		
		<?php echo form_close();?>
	</div>
	<?php
		}
	?>
	<br />
	<?php echo anchor('keupmb/buktiher/'.$biaya['nodaf'].'/'.$biaya['noref'].'/'.url_title($biaya['nama']),'Cetak Kartu Registrasi');?>
	<br />
	<br />
		
</center>