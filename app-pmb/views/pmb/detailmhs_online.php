<?php
$biodata=$this->model_crud->selectData('calonsiswa',array('nodaf'=>$this->uri->segment(2)))->row_array();
$ijazah=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ijazah','nodaf'=>$this->uri->segment(2)))->row_array();
$skhu=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'skhu','nodaf'=>$this->uri->segment(2)))->row_array();
$foto=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'foto','nodaf'=>$this->uri->segment(2)))->row_array();
$ktp=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ktp','nodaf'=>$this->uri->segment(2)))->row_array();
$bukti_bayar=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'bukti_bayar','nodaf'=>$this->uri->segment(2)))->row_array();
//$uri2=$this->uri->segment(2);
error_reporting(0);
?>

<!--<img src="http://pmb.amikompurwokerto.ac.id/dokumen/ijazah/<?=$ijazah['nama_dokumen']?>" width="70px;" height="110px;">-->
<style>
	.tabel th{ 
		padding-left: 10px;
		padding-right:10px;
		width:200px;
		text-align:center;
	}
	.tabel td{
		padding: 10px;
		width:200px;
		text-align:center;
	}
</style>
<center>
	<table style="font-weight: bold;">
		<td>Nomor Pendaftaran</td>
		<td>:</td>
		<td><?=$biodata['nodaf']?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?=$biodata['nama']?></td>
	</tr>
	<tr>
		<td>No. Telepon/HP</td>
		<td>:</td>
		<td><?=$biodata['telepon']?></td>
	</tr>
</table>
<br/>
<table border="1px" class="tabel">
	<tr>
		<th>JENIS FILE</th>
		<th>FILE</th>
		<th>Proses</th>
	</tr>
	<tr>
		<td>IJAZAH</td>
		<td>
			<?php if (!empty($ijazah['nama_dokumen'])){ ?>
				<a href="http://pmb.amikompurwokerto.ac.id/dokumen/ijazah/<?=$ijazah['nama_dokumen']?>" target="pdf-frame"
					class="btn btn-info"><?=$ijazah['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak dokumen
				<?php } ?>
			</td>
			<td rowspan="5">
				<form method="post" action="<?=base_url()?>index.php/detailmhs_online/proses/<?=$this->uri->segment(2)?>" >
					<label class="radio-inline"><input type="radio" name="proses" value="Sudah" <?php if ($biodata['syarat2']=='Sudah') echo 'checked=checked'; ?>>Proses</label>
					<label class="radio-inline"><input type="radio" name="proses" value="Tidak diterima" <?php if ($biodata['syarat2']=='Tidak diterima') echo 'checked=checked'; ?> >Ditolak</label>
					<div style="padding:5%;" ></div>
					<button>Ubah</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>SKHU</td>
			<td>
				<?php if (!empty($skhu['nama_dokumen'])) { ?>
					<a href="http://pmb.amikompurwokerto.ac.id/dokumen/skhu/<?=$skhu['nama_dokumen']?>" target="pdf-frame" class="btn btn-info"><?=$skhu['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak dokumen
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
					Tidak dokumen
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>KTP</td>
			<td>
				<?php if (!empty($ktp['nama_dokumen'])) { ?>
					<a href="http://pmb.amikompurwokerto.ac.id/dokumen/ktp/<?=$ktp['nama_dokumen']?>" target="pdf-frame" class="btn btn-info"><?=$ktp['nama_dokumen']?></a>
				<?php } else { ?>
					Tidak dokumen
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
						Tidak dokumen
					<?php } ?>
				</td>
			</tr>
		</table>
	</center>
	
	<?php
	
	if($this->uri->segment(2)=='proses'){
 //echo $this->uri->segment(2);
		$this->model_crud->updateData('calonsiswa',array('syarat2'=>$_POST['proses']),array('nodaf'=>$this->uri->segment(3)));
		?><script language="javascript">
			alert ("Data berhasil diubah");
			window.location="<?=base_url()?>index.php/datamhs_online";
		</script>
		<?php
 //redirect(base_url('index.php/datamhs_online));
	}
	?>