<?php $tgl=$this->mkonversi->TglIndonesia(date('Y-m-d')); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Formulir Pendaftaran</title>
	<style type="text/css">
	.table td, th {
	border: 1px solid #999;
	}
	</style>

</head>

<body>
		
	<div id="container">	
	<strong><?=$biodata['nodaf']?><br/>
	<?=$biodata['nama']?></strong>
	<table class="table" style="margin-top: 5px;font-size: 12px;">
	<tr>
		<th>Jenis File</th>
		<th>File</th>
	</tr>
	<tr>
		<td>IJAZAH</td>
		<td>
			<?php if (!empty($ijazah['nama_dokumen'])){ ?>
				<a href="http://pmb.amikompurwokerto.ac.id/dokumen/ijazah/<?=$ijazah['nama_dokumen']?>" target="pdf-frame"
					class="btn btn-info"><?=$ijazah['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak ada dokumen
				<?php } ?>
			</td>

		</tr>
		<tr>
			<td>SKHU</td>
			<td>
				<?php if (!empty($skhu['nama_dokumen'])) { ?>
					<a href="http://pmb.amikompurwokerto.ac.id/dokumen/skhu/<?=$skhu['nama_dokumen']?>" target="pdf-frame" class="btn btn-info"><?=$skhu['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak ada dokumen
				<?php } ?>
			</td>
		</td>
	</tr>
	<tr>
		<td>FOTO</td>
		<td>
			<?php if (!empty($foto['nama_dokumen'])) { ?>
				<a href="http://pmb.amikompurwokerto.ac.id/dokumen/foto/<?=$foto['nama_dokumen']?>" target="pdf-frame" 
					class="btn btn-info"><?=$foto['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak ada dokumen
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>KTP</td>
			<td>
				<?php if (!empty($ktp['nama_dokumen'])) { ?>
					<a href="http://pmb.amikompurwokerto.ac.id/dokumen/ktp/<?=$ktp['nama_dokumen']?>" target="pdf-frame" class="btn btn-info"><?=$ktp['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak ada dokumen
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>BUKTI BAYAR</td>
			<td>
				<?php if (!empty($bukti_bayar['nama_dokumen'])) { ?>
					<a href="http://pmb.amikompurwokerto.ac.id/dokumen/bukti_bayar/<?=$bukti_bayar['nama_dokumen']?>" target="pdf-frame" 
						class="btn btn-info"><?=$bukti_bayar['nama_dokumen']?></a>
					<?php } else { ?>
						Tidak ada dokumen
					<?php } ?>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
