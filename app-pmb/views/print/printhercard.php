<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Kartu Bukti Heregistrasi</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/report.css" />
	</head>
	
	<body>
		<center><a href="JavaScript:window.print();">Print</a></center>
<style type="text/css" media="print">
@media print
{
    @page {
        margin-top: 0;
        margin-bottom: 0;
    }
    body  {
        padding-top: 10px;
        padding-bottom: 72px ;
    }
}
</style>		
	<div id="container">	
		<div class="header">
			<div class="logo2">
				<img src="<?php echo base_url();?>image/kop_atas.png" style="width: 30%;margin-top: 10px;padding-left: 10px;margin-bottom: 0px;" />
				<div style=" border: 2px solid black;width:150px;text-align:center;margin-top:10px;float:right;margin-right:10px;font-weight:bold;"><p>Untuk Mahasiswa</p></div>
				<br />
				&nbsp;&nbsp;<font style="font-size:10px;">Jl. Let. Jend. Pol. Sumarto Purwokerto Telp/Fax : ( 0281 ) 623321 email:amikom@amikompurwokerto.ac.id</font>
			</div>
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
		<?php $tgl=$this->mkonversi->TglIndonesia(date('Y-m-d')); ?>
		<div class="container">
			<div style="font-size:14px;"><center><b>BUKTI HER-REGISTRASI MAHASISWA</b></center></div>
			<div class="biodata">
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $tocard['info']['nama'] ?></td>
					</tr>
					<tr>
						<td>Nomor Mahasiswa</td>
						<td>:</td>
						<td><?php echo $tocard['info']['npm'] ?></td>
					</tr>
					<tr>
						<td>Nomor Referensi</td>
						<td>:</td>
						<td><?php echo $tocard['info']['noref'] ?></td>
					</tr>
					<tr>
						<td colspan="3">Rincian Biaya Administrasi Jurusan : <?php echo $tocard['info']['nama_dept'] ?></td>
					</tr>
				</table>
			</div>
			<div class="tablecontain">
				<table width="100%"  cellpadding="1" cellspacing="1" border="1" >
					<thead>
						<th>No.</th>
						<th>Rincian Biaya</th>
						<th>Jumlah</th>
						<th>Dibayar</th>
						<th>Keterangan</th>
					</thead>
					<tbody>
					<tr>
						<td>1.</td>
						<td><?php echo $tocard['namabiaya'][2]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['beasarana']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>2.</td>
						<td><?php echo $tocard['namabiaya'][9]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['beasiswa']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Sarana</b></td>
						<td><b><?php echo 'Rp. '.money_set(($tocard['info']['beasarana']-$tocard['info']['beasiswa'])); ?></b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<?php
					if ($tahunpmb==$tocard['info']['thn_akademik']) {
					?>
					<tr>
						<td>3.</td>
						<td>SPP</td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['spptetap']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<?php
					} else {
					?>
					<tr>
						<td>3.</td>
						<td><?php echo $tocard['namabiaya'][0]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['spptetap']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>4.</td>
						<td><?php echo $tocard['namabiaya'][1]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['sppvariabel']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<?php } ?>
					<tr>
						<td><?php if ($tahunpmb==$tocard['info']['thn_akademik']) echo 4; else echo 5;?>.</td>
						<td><?php echo $tocard['namabiaya'][8]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['SPI']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><?php if ($tahunpmb==$tocard['info']['thn_akademik']) echo 5; else echo 6;?>.</td>
						<td><?php echo $tocard['namabiaya'][10]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['biaya_pendukung']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<!--<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Wajib</b></td>
						<td><b><?php echo 'Rp. '.money_set($tocard['totalwajib']['TOTALWAJIB']); ?></b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>-->
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['totalbayar']['TOTALBIAYA']); ?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Dibayar Sebelumnya</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['sdhbayar']); ?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Dibayar Sekarang</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['terakhirbayar']['jumlah']);?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Kelebihan / Kekurangan bayar</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['sisatanggungan']);?></b></td>
						<td>&nbsp;</td>
					</tr>
					</tbody>					
				</table>
			</div>
		</div>
		<div class="footer">
			<div class="ket">
				<label>*) Silahkan melengkapi biodata pada <u>http://student.amikompurwokerto.ac.id</u> dengan mengisi:
						<br />
						&nbsp;&nbsp;Username : <b><?php echo $tocard['info']['npm'] ?></b>
						<br />
						&nbsp;&nbsp;Password&nbsp; : <b><?php echo $tocard['keycode'][0]['PWD']; ?></b>
						<br />
						*) Semua informasi kegiatan kampus dapat dilihat pada <u>http://amikompurwokerto.ac.id</u>
						<br />
						*) Lembar ini harap disimpan .
				</label>
			</div>
			<div class="hsign">
				<table>
					<tr>
						
						<td>Purwokerto, <?php echo $tgl;?></td>
					</tr>
					<tr>
						<td >Petugas Administrasi</td>
					</tr>
					<tr>
						<td >&nbsp;</td>
					</tr>
					<tr>
						<td >&nbsp;</td>
					</tr>										
					<tr>
						<td ><hr /></td>
					</tr>
				</table>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
	<hr />	
	<div id="container">	
		<div class="header">
			<div class="logo2">
				<img src="<?php echo base_url();?>image/kop_atas.png" style="width: 30%;margin-top: 10px;padding-left: 10px;margin-bottom: 0px;" />
				<div style=" border: 2px solid black;width:150px;text-align:center;margin-top:10px;float:right;margin-right:10px;font-weight:bold;"><p>Untuk Petugas</p></div>
				<br />
				&nbsp;&nbsp;<font style="font-size:10px;">Jl. Let. Jend. Pol. Sumarto Purwokerto Telp/Fax : ( 0281 ) 623321 email:amikom@amikompurwokerto.ac.id</font>
			</div>

			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
		<div class="container">
			<div style="font-size:14px;"><center><b>BUKTI HER-REGISTRASI MAHASISWA</b></center></div>
			<div class="biodata">
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $tocard['info']['nama'] ?></td>
					</tr>
					<tr>
						<td>Nomor Mahasiswa</td>
						<td>:</td>
						<td><?php echo $tocard['info']['npm'] ?></td>
					</tr>
					<tr>
						<td>Nomor Referensi</td>
						<td>:</td>
						<td><?php echo $tocard['info']['noref'] ?></td>
					</tr>
					<tr>
						<td colspan="3">Rincian Biaya Administrasi Jurusan : <?php echo $tocard['info']['nama_dept'] ?></td>
					</tr>
				</table>
			</div>
			<div class="tablecontain">
				<table width="100%"  cellpadding="1" cellspacing="1" border="1" >
					<thead>
						<th>No.</th>
						<th>Rincian Biaya</th>
						<th>Jumlah</th>
						<th>Dibayar</th>
						<th>Keterangan</th>
					</thead>
					<tbody>
					<tr>
						<td>1.</td>
						<td><?php echo $tocard['namabiaya'][2]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['beasarana']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>2.</td>
						<td><?php echo $tocard['namabiaya'][9]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['beasiswa']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Sarana</b></td>
						<td><b><?php echo 'Rp. '.money_set(($tocard['info']['beasarana']-$tocard['info']['beasiswa'])); ?></b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>3.</td>
						<td><?php echo $tocard['namabiaya'][0]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['spptetap']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>4.</td>
						<td><?php echo $tocard['namabiaya'][1]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['sppvariabel']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>5.</td>
						<td><?php echo $tocard['namabiaya'][8]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['SPI']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>6.</td>
						<td><?php echo $tocard['namabiaya'][10]['nama_kwj'];?></td>
						<td><?php echo 'Rp. '.money_set($tocard['info']['biaya_pendukung']); ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Wajib</b></td>
						<td><b><?php echo 'Rp. '.money_set($tocard['totalwajib']['TOTALWAJIB']); ?></b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya(Wajib+Sarana)</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['totalbayar']['TOTALBIAYA']); ?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Dibayar Sebelumnya</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['sdhbayar']); ?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Total Biaya Dibayar Sekarang</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['terakhirbayar']['jumlah']);?></b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><b>Sisa yang harus dibayar</b></td>
						<td>&nbsp;</td>
						<td><b><?php echo 'Rp. '.money_set($tocard['sisatanggungan']);?></b></td>
						<td>&nbsp;</td>
					</tr>
					</tbody>					
				</table>
			</div>
		</div>
		<div class="footer">
			<div class="hsign">
				<table>
					<tr>
						<td>Purwokerto, <?php echo $tgl;?></td>
					</tr>
					<tr>
						<td >Petugas Administrasi</td>
					</tr>
					<tr>
						<td >&nbsp;</td>
					</tr>
					<tr>
						<td >&nbsp;</td>
					</tr>										
					<tr>
						<td ><hr /></td>
					</tr>
				</table>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
	</body>
</html>
