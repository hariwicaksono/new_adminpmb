<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>javascript/cmxforms.js" ></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />

<script type="text/javascript">
        $(function() {$( "#tgldaftar" ).datepicker({dateFormat:'dd-mm-yy',minDate:'-0D'});});
		$(function() {$( "#tgltes" ).datepicker({dateFormat:'dd-mm-yy',minDate:'-0D'});});
		$(function() {$("#tgllahir").datepicker({dateFormat:'dd-mm-yy',minDate:'-OD'});})
		$(function(){$("#fak1").change(function(){$("#pil1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak1").val(),success: function(msg){$("#pil1").html(msg);}});});});		
		$(function(){$("#fak2").change(function(){$("#pil2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak2").val(),success: function(msg){$("#pil2").html(msg);}});});});	
		$(function(){$("#propinsi1").change(function(){$("#kabupaten1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi1").val(),success: function(msg){$("#kabupaten1").html(msg);}});});});		
		$(function(){$("#propinsi2").change(function(){$("#kabupaten2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi2").val(),success: function(msg){$("#kabupaten2").html(msg);}});});});		
		$(function(){$("#jenismhs").change(function(){$.ajax ({url: "<?php echo site_url('cloader/getBiayaPendaftaran')?>" + "/" + $("#jenismhs").val(),success: function(msg){$("#biayadaftar").val(msg);},error:"0"}); });});		
		$(document).ready(function(){var container = $('div.container');			
			var validator=$('#inputform').validate({
					rules:{fak1:{required:true},jenismhs:{required:true},namalengkap:{required:true,accept: "[a-zA-Z0-9 ]+"},nikktp:{required:true},pil1:{required:true},
						fak2:{required:true},pil2:{required:true},sekolahasal:{required:true,accept: "[a-zA-Z0-9 ]+"},tempatlahir:{required:true},tgllahir:{required:true},
						nem1:{required:true,number:true},nem2:{required:true,number:true},propinsi1:{required:true},kabupaten1:{required:true},
						alamat:{required:true,accept: "[a-zA-Z0-9 ]+"},kodepos:{number:true},telp:{required:true,number:true},email:{email:true},namaortu:{required:true,accept: "[a-zA-Z0-9 ,.]+"},
						rt:{number:true},rw:{number:true},alamatortu:{accept: "[a-zA-Z0-9,.]+"},kelurahan:{accept: "[a-zA-Z0-9,.]+"},kecamatan:{accept: "[a-zA-Z0-9,.]+"},kodeposortu:{number:true},telportu:{number:true}
					},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});});
</script>

<center>
	<div id="content_error">
		<?php echo validation_errors(); ?>
	</div>
	
	<div class="container">
	<h4>Periksa kembali inputan anda</h4>
		<ol>					
			<li><label for="jenismhs" class="error">Jenis Mahasiswa harus di pilih</label></li>			
			<li><label for="namalengkap" class="error">Nama Harus isi dan Harus berupa huruf</label></li>
			<li><label for="nikktp" class="error">NIK KTP Harus isi</label></li>
			<li><label for="fak1" class="error">Tentukan Fakultas pilihan pertama</label></li>
			<li><label for="pil1" class="error">Tentukan Pilihan pertama </label></li>
			<li><label for="tempatlahir" class="error">Tempat Lahir Harus Isi</label></li>
			<li><label for="tgllahir" class="error">Tanggal Lahir Harus isi</label></li>
			<li><label for="fak2" class="error">Tentukan Fakultas pilihan kedua</label></li>
			<li><label for="pil2" class="error">Tentukan Pilihan kedua </label></li>
			
			<li><label for="sekolahasal" class="error">Sekolah Harus isi dan Harus berupa huruf</label></li>
			<li><label for="nem1" class="error">Nem Harus isi dan berupa angka</label></li>
			<li><label for="nem2" class="error">Nem Harus isi dan berupa angka</label></li>
			<li><label for="propinsi1" class="error">Propinsi harus di isi</label></li>
			<li><label for="kabupaten1" class="error">Kabupaten harus di isi</label></li>
			<li><label for="telp" class="error">No. Telp Harus diisi dan berupa angka</label></li>
			
			<li><label for="alamat" class="error">Alamat harus di isi dan berupa huruf</label></li>
			<li><label for="kodepos" class="error">Kodepos berupa angka</label></li>
			<li><label for="telp" class="error">No. Telp Harus berupa angka</label></li>
			<li><label for="email" class="error">Email Tidak valid</label></li>
			
			<li><label for="namaortu" class="error">Nama ortu harus berupa huruf </label></li>
			<li><label for="rt" class="error">Rt ortu harus berupa angka</label></li>
			<li><label for="rw" class="error">Rw ortu harus berupa angka</label></li>
			<li><label for="alamatortu" class="error">Alamat ortu harus berupa huruf</label></li>
			
			<li><label for="kelurahan" class="error">Kelurahan ortu harus berupa huruf</label></li>
			<li><label for="kecamatan" class="error">Kecamatan ortu harus berupa huruf</label></li>
			<li><label for="kodeposortu" class="error">Kode Pos ortu harus berupa angka</label></li>
			<li><label for="telportu" class="error">No .Telp ortu harus berupa angka</label></li>
		</ol>
	</div>
	
	<div id="content_form">
		<?php echo form_open('mhsbaru',array('id'=>"inputform"));?>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="tb_title"><b>Data Calon Mahasiswa</b></td>
				<td align="right" class="tb_title">	
				<select name="gelombang">
					<?php											
						foreach($glmb as $data=>$item){							
					?>
						<option <?php if(($item['kode']==$gelactive)){?> selected="selected" <?php } ?> value="<?php echo $item['kode'];?>"  ><?php echo $item['gelombang']?></option>
					<?php
						}																			
					?>
				</select>																	
				</td>
			</tr>
		</table>		
		<table width="100%">
			<tr>
				<td>MENDAFTAR VIA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="daftarvia">
						<?php
							foreach($daftarvia as $data=>$item){
						?>
							<option value="<?php echo $item['kode'];?>"><?php echo $item['nama'];?></option>		
						<?php
							}
						?>
					</select>
					
				</td>
				<td>&nbsp;</td>
				<td>PILIHAN 1<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak1" id="fak1" >
						<option value="">--Pilih fakultas--</option>
						<?php
							foreach($fakultas as $data=>$item){
						?>
							<option value="<?php echo $item['KD_FAK'];?>"><?php echo $item['NAMA_FAK'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>JENIS MAHASISWA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="jenismhs" id="jenismhs">
						<option value="">--Pilih jenis mahasiswa--</option>
						<?php
							foreach($jenismhs as $data=>$item){
						?>
							<option value="<?php echo $item['ID_JENISMHS'].$item['KODE_JENIS'] ?>"  ><?php echo $item['NAMA'];?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil1" id="pil1" disabled="true">
						<option value="">--Pilih fakultas dahulu--</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>NAMA LENGKAP<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'namalengkap','id'=>'namalengkap','value'=>set_value('namalengkap'));						
						echo form_input($conf);
					?>
					
				</td>
				<td>&nbsp;</td>
				<td>PILIHAN 2<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak2" id="fak2">
						<option value="">--Pilih fakultas--</option>
						<?php
							foreach($fakultas as $data=>$item){
						?>
							<option value="<?php echo $item['KD_FAK'];?>"><?php echo $item['NAMA_FAK'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr><td>NIK KTP<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'nikktp','id'=>'nikktp','value'=>set_value('nikktp'));						
						echo form_input($conf);
					?>
			</td>
			</tr>
			<tr>
				<td>JENIS KELAMIN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
								'name'=>'jk',
								'value'=>'Pria',
								'checked'=>TRUE
							);
						echo form_radio($conf);
						echo 'Laki-laki';
						$conf=array(
								'name'=>'jk',
								'value'=>'Wanita',
								'checked'=>FALSE
							);
						echo form_radio($conf);
						echo 'Perempuan';
					?>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil2" id="pil2" disabled="true">
						<option value="">--Pilih fakultas dahulu--</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>AGAMA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="agama">
						<?php
							foreach($agama as $data=>$item){
								?>
								<option value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>INFORMASI DARI</td>
				<td>:</td>
				<td>
					<select name="infodari">
						<?php
							foreach($infodari as $data=>$item){
								?>
								<option value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>TEMPAT LAHIR<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'tempatlahir','id'=>'tempatlahir','value'=>set_value('tempatlahir'));						
						echo form_input($conf);
					?>
			</td>
			<td>&nbsp;</td>
			<td>TANGGAL LAHIR<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'tgllahir','id'=>'tgllahir','value'=>set_value('tgllahir'));						
						echo form_input($conf);
					?>
					
			</td>
			</tr>
			<tr>
				<td>ASAL SMA/SMK/PTN/PTS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'sekolahasal','id'=>'sekolahasal','value'=>set_value('sekolahasal'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>TANGGAL MENDAFTAR</td>
				<td>:</td>
				<td>					
					<?php
						$conf=array('name'=>'tgldaftar','id'=>'tgldaftar','value'=>$tgldaftar,'readonly'=>'true');						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td>JURUSAN SLTA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'jurslta','id'=>'jurslta','value'=>set_value('jurslta'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>PERSYARATAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
								'name'=>'syarat1',
								'value'=>'Lengkap',
								'checked'=>FALSE
							);
						echo form_radio($conf);
						echo 'Lengkap';
						$conf=array(
								'name'=>'syarat1',
								'value'=>'Tidak Lengkap',
								'checked'=>TRUE
							);
						echo form_radio($conf);
						echo 'Tidak Lengkap';
					?>
				</td>
			</tr>
			<tr>
				<td>TAHUN LULUS</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tahun_lulus','id'=>'tahun_lulus','value'=>set_value('tahun_lulus'));						
						echo form_input($conf);
					?>
				</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td>RATA-RATA NEM<label class="require">*</label></td>
				<td>:</td>
				<td>					
					<?php
						$conf=array('name'=>'nem1','id'=>'nem1','size'=>'2','maxlength'=>'2','value'=>'0');						
						echo form_input($conf);
					?>
					,
					<?php
						$conf=array('name'=>'nem2','id'=>'nem2','size'=>'2','maxlength'=>'2','value'=>'00');						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td valign="top" >BIAYA PENDAFTARAN</td>
				<td valign="top">:</td>
				<td>
					<?php
						$conf=array('name'=>'biayadaftar','id'=>'biayadaftar','readonly'=>'readonly','value'=>'150000');						
						echo form_input($conf);
					?>
					<br />
					<?php
						$conf=array(
								'name'=>'syarat2',
								'value'=>'Sudah',
								'checked'=>FALSE
							);
						echo form_radio($conf);
						echo 'Lunas';
						$conf=array(
								'name'=>'syarat2',
								'value'=>'Belum',
								'checked'=>TRUE
							);
						echo form_radio($conf);
						echo 'Belum Lunas';
					?>
				</td>
			</tr>
			<tr>
				<td>PROPINSI<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="propinsi1" id="propinsi1">
						<option value="">--Pilih propinsi--</option>
						<?php
							foreach($propinsi as $data=>$item){
						?>
							<option value="<?php echo $item['kdProp'];?>"><?php echo $item['NamaProp'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>KET.BAYAR</td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
								'name'=>'pembayaran',
								'value'=>'Bayar',
								'checked'=>FALSE
							);
						echo form_radio($conf);
						echo 'Bayar';
						$conf=array(
								'name'=>'pembayaran',
								'value'=>'TidakBayar',
								'checked'=>TRUE
							);
						echo form_radio($conf);
						echo 'Tidak Bayar';
					?>
				</td>
			</tr>
			<tr>
				<td>KABUPATEN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="kabupaten1" id="kabupaten1" disabled="true">
						<option value="">--Pilih propinsi dahulu--</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>TANGGAL TES</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tgltes','id'=>'tgltes','value'=>$tgldaftar);						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td>KECAMATAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatan','id'=>'kecamatan','value'=>set_value('kecamatan'));						
						echo form_input($conf);
					?>
				</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr valign="top">
				<td>ALAMAT<label class="require">*</label></td>
				<td >:</td>
				<td>					
				<?php	
					$conf=array('name'=>'alamat','id'=>'alamat','value'=>set_value('alamat'),'maxlength'=>'150','size'=>'35');						
					echo form_input($conf);
				?>				
				</td>
				<td>&nbsp;</td>
				<td >RELASI</td>
				<td >:</td>
				<td >
					<select name="relasi">
						<?php
							foreach($relasi as $data=>$item){
								?>
								<option value="<?php echo $item['ID_RELASI']?>"><?php echo $item['NAMA_RELASI'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>KODE POS</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kodepos','id'=>'kodepos','value'=>'99999');						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>Kelas</td>
				<td>:</td>
				<td><select name="kelas" id="kelas" >
						<option value="Pagi" selected>Pagi</option>
						<option value="Sore">Sore</option>
						<option value="Transfer">Transfer</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>TELP<label class="required">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telp','id'=>'telp','value'=>'62');						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>NO WHATSAPP<label class="required">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'no_wa','id'=>'no_wa','value'=>'62');						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>E-MAIL</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'email','id'=>'email','value'=>'sample@sample.com');						
						echo form_input($conf);
					?>
				</td>
			</tr>			
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" >
			<tr>
				<td class="tb_title"><b>Data Orangtua ( Ibu )</b></td>				
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td>NAMA IBU<label class="required"></label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'namaortu','id'=>'namaortu','value'=>set_value('namaortu'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>NAMA AYAH</td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'nama_ayah','id'=>'nama_ayah','value'=>set_value('nama_ayah'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td>PEKERJAAN IBU<label class="required"></label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'pekerjaan_ortu','id'=>'pekerjaan_ortu','value'=>set_value('pekerjaan_ortu'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>PEKERJAAN AYAH</td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'pekerjaan_ayah','id'=>'pekerjaan_ayah','value'=>set_value('pekerjaan_ayah'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td>TELP IBU<label class="required"></label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telportu','id'=>'telportu','value'=>set_value('telportu'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>TELP AYAH</td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'telpayah','id'=>'telpayah','value'=>set_value('telpayah'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<?php
						//$conf=array('name'=>'rt','id'=>'rt','size'=>'2','maxlength'=>'5','value'=>'99');						
						//echo form_input($conf);
					?>
					
					<?php
						//$conf=array('name'=>'rw','id'=>'rw','size'=>'2','maxlength'=>'5','value'=>'99');						
						//echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>PROPINSI ORANGTUA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="propinsi2" id="propinsi2">
						<option value="">--Pilih propinsi--</option>
						<?php
							foreach($propinsi as $data=>$item){
						?>
							<option value="<?php echo $item['kdProp'];?>"><?php echo $item['NamaProp'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<td>ALAMAT ORANGTUA</td>
				<td>:</td>
				<td>
					<input type="text" id="alamatortu" name="alamatortu"  maxlength="150" size="35" />											
				</td>
				<td>&nbsp;</td>
				<td>KABUPATEN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="kabupaten2" id="kabupaten2" disabled="true" >
						<option value="">--Pilih propinsi dahulu--</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>KELURAHAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kelurahan','id'=>'kelurahan','value'=>set_value('kelurahan'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KODEPOS</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kodeposortu','id'=>'kodeposortu','value'=>'99999');						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
				<td>KECAMATAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatan','id'=>'kecamatan','value'=>set_value('kecamatan'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>PENGHASILAN ORTU/bln</td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'penghasilan_ortu','id'=>'penghasilan_ortu','value'=>set_value('penghasilan_ortu'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td align="center" class="mybutton"><?php 
					echo form_input(array('type'=>'submit','name'=>'daftar','value'=>'Daftar','id'=>'godaftar'));
					//echo form_input(array('type'=>'reset','name'=>'reset','value'=>'Reset','class'=>'cancel'));
				?>
				</td>				
			</tr>
		</table>
		<?php echo form_close();?>
	</div>
</center>