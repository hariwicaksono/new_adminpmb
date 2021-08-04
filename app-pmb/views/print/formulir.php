<?php $tgl=$this->mkonversi->TglIndonesia(date('Y-m-d')); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Formulir Pendaftaran</title>
	<style type="text/css">

		.form-group{
			width: 100%;
			line-height: 1.4
		}
		.col-label{
			width: 15%;
		}
		.col-content{
			float: right;
			width: 85%;
		}
		input[type="text"] { 
			width: 100%;
			border: none;
			padding: 5px 5px;
			margin: 5px 0;
			
		}
		.row {
		margin-right: 15px;
		margin-left: 15px;
		}
		.row-no-gutters {
		margin-right: 0;
		margin-left: 0;
		}
		.row-no-gutters [class*="col-"] {
		padding-right: 0;
		padding-left: 0;
		}
		.col-print-1 {width:8%;  float:left;}
		.col-print-2 {width:16%; float:left;}
		.col-print-3 {width:25%; float:left;}
		.col-print-4 {width:33%; float:left;}
		.col-print-5 {width:42%; float:left;}
		.col-print-6 {width:50%; float:left;}
		.col-print-7 {width:58%; float:left;}
		.col-print-8 {width:66%; float:left;}
		.col-print-9 {width:75%; float:left;}
		.col-print-10{width:83%; float:left;}
		.col-print-11{width:92%; float:left;}
		.col-print-12{width:100%; float:left;}

		input[type="radio"],input[type="checkbox"] {
			-ms-transform: scale(1.3); /* IE 9 */
			-webkit-transform: scale(1.3); /* Chrome, Safari, Opera */
			transform: scale(1.3);
		}
		.photo{
			border:1px solid #000;	
			width:104px;
			height:124px;	
		}
		.photo label{
			margin: 25px;
			position: absolute;
			text-align: center;
		}
		.logo{text-align: center}

	</style>
	<style type="text/css" media="print">
		@media print
		{
			@page {
				margin-top:0;
				margin-right: 2px;
				margin-left: 2px;
			}
			.no-print {
				visibility: hidden;
			}
			
		}

	</style>
</head>

<body>
	<center class="no-print"><a href="JavaScript:window.print();">Print</a></center>
		
	<div id="container">	
		<div class="header">
			<div class="row">
			<div class="col-print-7">
			<h1 style="margin-bottom: -20px;">FORMULIR PENDAFTARAN</h1>
			<h3>Mahasiswa Universitas Amikom Purwokerto</h3>
			</div>
			<div class="col-print-5">
			<div class="logo">
				<img src="<?php echo base_url();?>image/kop_atas.png" width="200" style="margin-top: 20px;margin-bottom: -5px;" />
				&nbsp;&nbsp;<p style="font-size:10px;">Jl. Let. Jend. Pol. Sumarto Purwokerto Telp/Fax : ( 0281 ) 623321 email:amikom@amikompurwokerto.ac.id</p>
			</div>
			</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div class="container" style="padding-top: 10px;border-top: 1px solid #444">
			<form>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">No.Pendaftaran</label>
					<div class="col-content">
						<label>: <?php echo $data['nodaf'];?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Nama Lengkap</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['nama']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">NIK KTP</label>
					<div class="col-content">
						<label>: <?php echo $data['nikktp'];?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Tempat,Tgl.Lahir</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['tempatlahir']);?>, <?php echo date("d-m-Y", strtotime($data['tgllahir']));?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Jenis Kelamin</label>
					<div class="col-content">
						<label>: <?php echo $data['jk']=="Pria" ? "LAKI-LAKI":"PEREMPUAN";?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Agama</label>
					<div class="col-content">
						<label>: <?php echo $data['AGAMA']=="I" ? "ISLAM":"";?><?php echo $data['AGAMA']=="P" ? "PROTESTAN":"";?><?php echo $data['AGAMA']=="K" ? "KATHOLIK":"";?><?php echo $data['AGAMA']=="B" ? "BUDDHA":"";?><?php echo $data['AGAMA']=="H" ? "HINDU":"";?><?php echo $data['AGAMA']=="KH" ? "KONGHUCU":"";?><?php echo $data['AGAMA']=="L" ? "LAINNYA":"";?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Status Pernikahan</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['status_pernikahan']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Asal Sekolah</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['sekolah']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Jurusan Sekolah</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['jurusan']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Rata-rata Rapot</label>
					<div class="col-content">
						<label style="margin-right: 4rem">: <?php echo strtoupper($data['nem']);?></label>
						<label style="margin-right: 4rem">Tahun Lulus: <?php echo strtoupper($data['tahun_lulus']);?></label>
						<label>Prestasi: </label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">No. WA</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['telepon']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">E-mail</label>
					<div class="col-content">
						<label>: <?php echo strtolower($data['email']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Alamat</label>
					<div class="col-content">
						<label style="margin-right: 1rem">: <?php echo strtoupper($data['alamat']);?></label>
						
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
					<label>: RT: <?php echo $data['rt'];?> &nbsp; RW: <?php echo $data['rw'];?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label>: Kelurahan/Desa:&nbsp;<?php echo strtoupper($data['kelurahan']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label>: Kecamatan:&nbsp;<?php echo strtoupper($data['kecamatan']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label>: Kabupaten:&nbsp;<?php echo strtoupper($data['Kab']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label style="margin-right: 1rem">: Propinsi:&nbsp;<?php echo strtoupper($data['Prop']);?></label>
						<label>Kode Pos: <?php echo $data['kodepos'];?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Deskripsi Alamat</label>
					<div class="col-content">
						<label style="font-size:88%">: <?php echo strtoupper($data['deskripsi_alamat']==' ' ? '-' : $data['deskripsi_alamat']);?></label>
					
					</div>
				</div>
				
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label"></label>
					<div class="col-content">
						
					</div>
				</div>
				
				<div class="form-group row">
				<br/><label for="nama" class="col-label col-form-label">Program Studi</label>
					<div class="col-content">
						<label>: Pilihan 1: <?php echo strtoupper($data['NAMAPIL1']);?> / <?php echo strtoupper($data['pilihan1']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label>: Pilihan 2: <?php echo strtoupper($data['NAMAPIL2']);?> / <?php echo strtoupper($data['pilihan2']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">&nbsp;</label>
					<div class="col-content">
						<label>: Pilihan 3: <?php echo strtoupper($data['NAMAPIL3']);?> / <?php echo strtoupper($data['pilihan3']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Ibu Kandung</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['NAMA_ORTU']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">No. HP/WA</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['TELP_ORTU']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Pekerjaan</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['PEKERJAAN_ORTU']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Nama Ayah</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['NAMA_AYAH']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">No. HP/WA</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['TELP_AYAH']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Pekerjaan</label>
					<div class="col-content">
						<label>: <?php echo strtoupper($data['PEKERJAAN_AYAH']);?></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Alamat</label>
					<div class="col-content">
						<label style="font-size:88%">: <?php echo strtoupper($data['ALAMATORTU']);?> &nbsp;&nbsp; RT. <?php echo $data['RW_ORTU'];?> &nbsp; RW. <?php echo $data['RW_ORTU'];?>, <?php echo strtoupper($data['KELURAHAN_ORTU']);?>, KEC. <?php echo strtoupper($data['KECAMATAN_ORTU']);?>, KAB. <?php echo strtoupper($data['KabOrtu']);?>, <?php echo strtoupper($data['PropOrtu']);?> - <?php echo $data['KODEPOS_ORTU'];?>
						</label>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="form-group row">
				<span>Informasi Pertama tentang Universitas Amikom Purwokerto</span>
				</div>
				<div class="form-group row">
					<?php
					$info=array('Brosur&nbsp;','Surat&nbsp;','Televisi&nbsp;','Internet&nbsp;','FB&nbsp;','IG&nbsp;','Teman/Saudara&nbsp;','Lainnya&nbsp;');
					$info2=array('brosur','surat','televisi','internet','fb','ig','teman/saudara','lainnya');
					$i=0;
					foreach ($info2 as $key) { ?>
					<input type="checkbox" id="<?=$info2[$i]?>" name="<?=$info2[$i]?>" value="<?=$key?>" 
					<?php if (!empty($data)) { 
							$pecah=explode(',',$data['komentar']);
							foreach ($pecah as $data_info) {
								if ($data_info==$key) { echo 'checked=checked'; }
							}
						} ?> onclick="return false;" >
					<label for="<?=$info2[$i]?>">
						<?=$info[$i];?> 
					</label>
					<?php   
					$i++;
					}
					?>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Jas Almamater</label>
					<div class="col-content">
					: <?php
						$jas=array('&nbsp;S&nbsp;','&nbsp;M&nbsp;','&nbsp;L&nbsp;','&nbsp;XL&nbsp;','&nbsp;XXL&nbsp;','&nbsp;3L&nbsp;','&nbsp;5L&nbsp;','&nbsp;Lainnya&nbsp;.............');
						$jas2=array('S','M','L','XL','XXL','3L','5L','ln');
						$i=0;
						foreach ($jas2 as $key) { ?>
							<label class="checkbox-inline">
							<input type="checkbox" name="jas<?=$jas2[$i];?>" value="<?=$key?>" 
							<?php if ($data['ukuran_jas']==$key) { echo 'checked=checked'; }?> onclick="return false;" ><?=$jas[$i];?> 
							</label>
						<?php   
							$i++;
						}
						?>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-label col-form-label">Check List</label>
					<div class="col-content">
						: <input type="checkbox" id="checkktp" name="checkktp" value="KTP" onclick="return false;" >
							<label for="checkktp"> KTP</label>
							<input type="checkbox" id="checkijazah" name="checkijazah" value="IJAZAH" onclick="return false;" >
							<label for="checkrapor"> IJAZAH/SKL/RAPOT</label>
							<input type="checkbox" id="checkfoto" name="checkfoto" value="FOTO" onclick="return false;" >
							<label for="checkfoto"> PAS FOTO</label>
							<input type="checkbox" id="checkuang" name="checkuang" value="UANG" onclick="return false;" >
							<label for="checkuang"> UANG PENDAFTARAN</label>
						
					</div>
				</div>
			</form>

		</div>
		<div class="footer" style="margin-top: 10px;">
		<div class="row">
		<div class="col-print-4">
		<br/>
			<span>Petugas PMB</span>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			(......................................)
		</div>
		<div class="col-print-4">
		<?php if (!empty($foto['nama_dokumen'])) { ?>
				<img src="http://pmb.amikompurwokerto.ac.id/dokumen/foto/<?=$foto['nama_dokumen']?>" width="104" height="124">
				<?php } else { ?>
				<div class="photo">
				<label>Foto 3x4</label>
				</div>
				<?php } ?>
		</div>
		<div class="col-print-4">
			<span>Purwokerto, <?php echo date("d-m-Y", strtotime($data['tgldaftar']));?></span><br/>
			<span>Calon Mahasiswa</span>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<?php echo strtoupper($data['nama']);?>
		</div>
		</div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<hr/>
	<div class="row">
	<p style="font-size:9px;"><i>Dicetak tanggal <?php echo date('d/m/Y H:i:s');?>, <?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?></i></p>
	</div>
</body>
</html>
