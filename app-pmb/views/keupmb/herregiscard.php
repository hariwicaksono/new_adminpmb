<center>
	<div id="content_error">
		<b><u><?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?></u></b>			
	</div>
</center>
<div class="title_table">
	<div class="title_table_l"></div>
	<div class="title_table_c"></div>
	<div class="title_table_r"></div>
</div>

<div id="table_box">
	<table width="100%" class="inside" border=0>		
		<tr>
			<td colspan='3'><b><u>CALON MAHASISWA</u></b></td>			
		</tr>
		<tr>
			<td>NOMOR PENDAFTARAN</td>
			<td>:</td>
			<td><?php echo $tocard['info']['nodaf']; ?></td>
		</tr>
		<tr>
			<td>NOMOR REFERENSI</td>
			<td>:</td>
			<td><?php echo $tocard['info']['noref']; ?></td>
		</tr>
		<tr>
			<td>NAMA</td>
			<td>:</td>
			<td><?php echo $tocard['info']['nama']; ?></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp</td>			
		</tr>
		<tr>
			<td colspan='3'><b><u>RINCIAN BIAYA</u></b></td>			
		</tr>		
		<tr>
			<td><?php echo $tocard['namabiaya'][2]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['beasarana']); ?></td>
		</tr>
		<tr>
			<td><?php echo $tocard['namabiaya'][9]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['beasiswa']); ?></td>
		</tr>
		<?php 
		if ($tahunpmb==$tocard['info']['thn_akademik']) {
		?>
		<tr>
			<td>SPP</td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['spptetap']); ?></td>
		</tr>
		<?php
		} else {
		?>
		<tr>
			<td><?php echo $tocard['namabiaya'][0]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['spptetap']); ?></td>
		</tr>
		<tr>
			<td><?php echo $tocard['namabiaya'][1]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['sppvariabel']); ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td><?php echo $tocard['namabiaya'][8]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['SPI']); ?></td>
		</tr>
		<tr>
			<td><?php echo $tocard['namabiaya'][10]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['biaya_pendukung']); ?></td>
		</tr>
		<tr>
			<td><?php echo $tocard['namabiaya'][16]['nama_kwj'];?></td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['info']['biaya_pengakuan_sks']); ?></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp</td>			
		</tr>
		<tr>
			<td colspan='3'><b><u>TOTAL</u></b></td>			
		</tr>		
		<tr>
			<td>TOTAL BAYAR</td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['totalbayar']['TOTALBIAYA']); ?></td>
		</tr>
		<tr>
			<td>TOTAL SUDAH DI BAYAR</td>
			<td>:</td>
			<td><?php echo 'Rp. '.money_set($tocard['sdhbayar']); ?></td>
		</tr>
	</table>
</div>
<br /><br />
<div>	
<center>[<?php echo anchor('testing/heregcardhtml/'.$tocard['info']['nodaf'].'/','Cetak Bukti Herregistrasi',array('target'=>'_blank'));?>]</center>
</div>
<br /><br />