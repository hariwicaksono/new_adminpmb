<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Kartu Bukti Heregistrasi</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/report.css?v1" />
	</head>
	
<body onload="JavaScript:window.print();">
<style type="text/css" media="print">
@media print
{
    @page {
        margin-top: 0;
        margin-bottom: 0;
    }
    body  {
        padding-top: 45px;
        padding-bottom: 72px ;
    }
}
</style>
	<div id="regcard">	
		<div class="regcard_title">
			<label>Telah diterima uang sebesar Rp. <?php echo $data['BIAYA_PENDAFTARAN']?>,- untuk biaya pendaftaran</label>
		</div>
		<div class="regcard_table">
			<table width="100%">
				<tr>
					<td><label>Gelombang</label></td>
					<td>:</td>
					<td><?php echo $data['gelombang'];?></td>
				</tr>
				<tr>
					<td><label>Nomor Pendaftaran</label></td>
					<td>:</td>
					<td><?php echo $data['nodaf'];?></td>
				</tr>
				<tr>
					<td><label>Nomor Referensi</label></td>
					<td>:</td>
					<td><?php echo $data['noref'];?></td>
				</tr>
				<tr>
					<td><label>Nama Lengkap</label></td>
					<td>:</td>
					<td><?php echo $data['nama'];?></td>
				</tr>
				<tr>
					<td><label>Jurusan SLTA/SMK</label></td>
					<td>:</td>
					<td><?php echo $data['jurusan'];?></td>
				</tr>
				<tr>
					<td><label>Pilihan</label></td>
					<td>:</td>
					<td>1. <?php echo $data['NAMAPIL1'];?></td>
				</tr>
				<tr>
					<td><label></label></td>
					<td>:</td>
					<td>2. <?php echo $data['NAMAPIL2'];?></td>
				</tr>
				<tr>
					<td><label></label></td>
					<td>:</td>
					<td>3. <?php echo $data['NAMAPIL3'];?></td>
				</tr>
				<tr>
					<td><label>Rata-Rata NEM/UAN</label></td>
					<td>:</td>
					<td><?php echo $data['nem'];?></td>
				</tr>
				<tr>
					<td><label>Jadwal Test/Pukul</label></td>
					<td>:</td>
					<td><?php echo format_indo(date('Y-m-d',strtotime($data['TGL_TES'])));?> - 09:00 / 10:00 WIB</td>
				</tr>				
			</table>
		</div>
		<div class="regcard_side">
			<b>Purwokerto, <?php echo date('d-m-Y');?></b>			
		</div>
		<div id="regcard_footer">
			<div class="footer_box">
				<label>Pendaftar</label>
			</div>
			<div class="footer_box">				
			</div>
			<div class="footer_box">
				<label>Petugas Pendaftaran</label>
			</div>
			<div class="footer_box">
				<label>Pengawas Ujian</label>
			</div>
		</div>
		<div style="clear:both"></div>
		<div id="regcard_footer">
			<div class="footer_box">
				
			</div>
			<div class="footer_box photo">
				<br />
				<label>Foto 3x4</label>
			</div>
			<div class="footer_box">
				
			</div>
			<div class="footer_box">
				
			</div>
		</div>
		<div style="clear:both"></div>
		<div id="regcard_footer_bottom">
			<div class="footer_box">
				<label>(<?php echo $data['nama'];?>)</label>
			</div>
			<div class="footer_box">				
			</div>
			<div class="footer_box">
			<?php //echo $cs;?>
				<label>(...............................)</label>
			</div>
			<div class="footer_box">
				<label>(...............................)</label>
			</div>
		</div>
		<div style="clear:both"></div>
		<label>Note: Tes Wawancara wajib hadir dengan Orang Tua/Wali</label><br/><br/>
		<div><center><a href="JavaScript:window.print();">Print</a></center></div>
	</div>
							
	</body>
</html>
