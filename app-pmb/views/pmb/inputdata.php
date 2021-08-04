<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>javascript/cmxforms.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />

<script type="text/javascript">
        $(function() {$( "#tgldaftar" ).datepicker({dateFormat:'dd-mm-yy',minDate:'-0D'});});
		$(function() {$( "#tgltes" ).datepicker({dateFormat:'dd-mm-yy',minDate:'-0D'});});
		$(function() {$("#tgllahir").datepicker({dateFormat:'dd-mm-yy',minDate:'-OD'});})
		$(function(){$("#fak1").change(function(){$("#pil1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak1").val(),success: function(msg){$("#pil1").html(msg);}});});});		
		$(function(){$("#fak2").change(function(){$("#pil2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak2").val(),success: function(msg){$("#pil2").html(msg);}});});});	
		$(function(){$("#fak3").change(function(){$("#pil3").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak3").val(),success: function(msg){$("#pil3").html(msg);}});});});	
		$(function(){$("#propinsi1").change(function(){$("#kabupaten1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi1").val(),success: function(msg){$("#kabupaten1").html(msg);}});});});		
		$(function(){$("#propinsi2").change(function(){$("#kabupaten2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi2").val(),success: function(msg){$("#kabupaten2").html(msg);}});});});		
		$(function(){$("#jenismhs").change(function(){$.ajax ({url: "<?php echo site_url('cloader/getBiayaPendaftaran')?>" + "/" + $("#jenismhs").val(),success: function(msg){$("#biayadaftar").val(msg);},error:"0"}); });});		
		$(document).ready(function(){var container = $('div.container');			
			var validator=$('#inputform').validate({
					rules:{fak1:{required:true},jenismhs:{required:true},namalengkap:{required:true,accept: "[a-zA-Z0-9 ]+"},nikktp:{required:true},pil1:{required:true},fak2:{required:true},pil2:{required:true},fak3:{required:true},pil3:{required:true},sekolahasal:{required:true,accept: "[a-zA-Z0-9 ]+"},tempatlahir:{required:true},tgllahir:{required:true},nem1:{required:true,number:true},nem2:{required:true,number:true},propinsi1:{required:true},propinsi2:{required:true},kabupaten1:{required:true},kabupaten2:{required:true},status_registrasi:{required:true},ukuran_jas:{required:true},alamat:{required:true,accept: "[a-zA-Z0-9 ]+"},kodepos:{required:true,number:true},telp:{required:true,number:true},no_wa:{required:true,number:true},email:{required:true,email:true},namaortu:{required:true,accept: "[a-zA-Z0-9 ,.]+"},rt:{number:true},rw:{number:true},alamatortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kelurahan:{required:true,accept: "[a-zA-Z0-9,.]+"},rt:{required:true,accept: "[a-zA-Z0-9,.]+"},rw:{required:true,accept: "[a-zA-Z0-9,.]+"},kecamatan:{required:true,accept: "[a-zA-Z0-9,.]+"},kelurahanortu:{required:true,accept: "[a-zA-Z0-9,.]+"},rt_ortu:{required:true,accept: "[a-zA-Z0-9,.]+"},rw_ortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kecamatanortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kodeposortu:{required:true,number:true},telportu:{number:true}
					},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});});
</script>

<center>
	<div id="content_error">
		<?php echo validation_errors(); ?>
	</div>
	
	<div class="container">
	<h4>Periksa kembali inputan anda</h4>
		<ol>					
			<li><label for="jenismhs" class="error">Jenis Mahasiswa harus dipilih</label></li>			
			<li><label for="namalengkap" class="error">Nama Harus isi dan Harus berupa huruf</label></li>
			<li><label for="nikktp" class="error">NIK KTP Harus isi</label></li>
			<li><label for="fak1" class="error">Tentukan Fakultas pilihan pertama</label></li>
			<li><label for="pil1" class="error">Tentukan Pilihan pertama</label></li>
			<li><label for="tempatlahir" class="error">Tempat Lahir Harus Isi</label></li>
			<li><label for="tgllahir" class="error">Tanggal Lahir Harus isi</label></li>
			<li><label for="fak2" class="error">Tentukan Fakultas pilihan kedua</label></li>
			<li><label for="pil2" class="error">Tentukan Pilihan kedua</label></li>
			<li><label for="fak3" class="error">Tentukan Fakultas pilihan ketiga</label></li>
			<li><label for="pil3" class="error">Tentukan Pilihan ketiga</label></li>
			<li><label for="sekolahasal" class="error">Sekolah Harus isi dan Harus berupa huruf</label></li>
			<li><label for="nem1" class="error">Nem Harus isi dan berupa angka</label></li>
			<li><label for="nem2" class="error">Nem Harus isi dan berupa angka</label></li>
			<li><label for="propinsi1" class="error">Propinsi harus diisi</label></li>
			<li><label for="kabupaten1" class="error">Kabupaten harus diisi</label></li>
			<li><label for="propinsi2" class="error">Propinsi ORTU harus diisi</label></li>
			<li><label for="kabupaten2" class="error">Kabupaten ORTU harus diisi</label></li>
			
			<li><label for="alamat" class="error">Alamat harus diisi dan berupa huruf</label></li>
			<li><label for="kelurahan" class="error">Kelurahan harus diisi</label></li>
			<li><label for="rt" class="error">Rt harus diisi</label></li>
			<li><label for="rw" class="error">Rw harus diisi</label></li>
			<li><label for="kecamatan" class="error">Kecamatan ortu harus diisi</label></li>
			<li><label for="kodepos" class="error">Kodepos berupa angka</label></li>
			<li><label for="telp" class="error">No. Telp Harus diisi dan berupa angka</label></li>
			<li><label for="no_wa" class="error">No. Whatsapp Harus diisi dan berupa angka</label></li>
			<li><label for="email" class="error">Email Tidak valid</label></li>
			
			<li><label for="namaortu" class="error">Nama ortu harus diisi </label></li>
			<li><label for="alamatortu" class="error">Alamat ortu harus diisi</label></li>
			<li><label for="kelurahanortu" class="error">Kelurahan ortu harus diisi</label></li>
			<li><label for="rt_ortu" class="error">Rt Ortu harus diisi</label></li>
			<li><label for="rw_ortu" class="error">Rw Ortu harus diisi</label></li>
			<li><label for="kecamatanortu" class="error">Kecamatan Ortu harus diisi</label></li>
			<li><label for="kodeposortu" class="error">Kode Pos ortu harus berupa angka</label></li>
			<li><label for="telportu" class="error">No .Telp ortu harus berupa angka</label></li>
			<li><label for="status_registrasi" class="error">Status registrasi harus dipilih</label></li>
			<li><label for="ukuran_jas" class="error">Ukuran Jas harus dipilih</label></li>
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
			<td>KELAS<label class="require">*</label></td>
				<td>:</td>
				<td><select name="kelas" id="kelas" >
						<option value="Pagi" selected>Pagi</option>
						<option value="Sore">Sore</option>
						<option value="Transfer">Transfer</option>
					</select>
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
				<td>&nbsp;</td>
			<td>:</td>
			<td>
				<select name="pil2" id="pil2" disabled="true">
					<option value="">--Pilih fakultas dahulu--</option>
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
			<td>&nbsp;</td>
			<td>PILIHAN 3<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak3" id="fak3" >
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
			<td>TEMPAT LAHIR<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'tempatlahir','id'=>'tempatlahir','value'=>set_value('tempatlahir'));						
						echo form_input($conf);
					?>
			</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil3" id="pil3" disabled="true">
						<option value="">--Pilih fakultas dahulu--</option>
					</select>
				</td>
			</tr>
			<tr>
			<td>TANGGAL LAHIR<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'tgllahir','id'=>'tgllahir','value'=>set_value('tgllahir'));						
						echo form_input($conf);
					?>
					
			</td>
				<td>&nbsp;</td>
				<td>ASAL SMA/SMK/PTN/PTS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'sekolahasal','id'=>'sekolahasal','value'=>set_value('sekolahasal'));						
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
			<td>JURUSAN SLTA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'jurslta','id'=>'jurslta','value'=>set_value('jurslta'));						
						echo form_input($conf);
					?>
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
			<td>TAHUN LULUS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tahun_lulus','id'=>'tahun_lulus','value'=>set_value('tahun_lulus'));						
						echo form_input($conf);
					?>
				</td>
			

			</tr>
			<tr>
			<td>STATUS MENIKAH<label class="require">*</label></td>
				<td>:</td>
				<td><select name="status_menikah" id="status_menikah" >
						<option value="Belum Menikah" selected>Belum Menikah</option>
						<option value="Menikah">Menikah</option>
					</select>
				</td>
				<td>&nbsp;</td>
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
			<td>TANGGAL MENDAFTAR<label class="require">*</label></td>
				<td>:</td>
				<td>					
					<?php
						$conf=array('name'=>'tgldaftar','id'=>'tgldaftar','value'=>$tgldaftar,'readonly'=>'true');						
						echo form_input($conf);
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
			<td>PERSYARATAN<label class="require">*</label></td>
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
			<td>KECAMATAN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatan','id'=>'kecamatan','value'=>set_value('kecamatan'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td valign="top" >BIAYA PENDAFTARAN<label class="require">*</label></td>
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
			<td>KELURAHAN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kelurahan','id'=>'kelurahan','value'=>set_value('kelurahan'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KET.BAYAR<label class="require">*</label></td>
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
			<td>ALAMAT<label class="require">*</label></td>
				<td >:</td>
				<td>					
				<?php	
					$conf=array('name'=>'alamat','id'=>'alamat','value'=>set_value('alamat'),'maxlength'=>'150','size'=>'35');						
					echo form_input($conf);
				?>				
				</td>
				<td>&nbsp;</td>
				<td>TANGGAL TES<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tgltes','id'=>'tgltes','value'=>$tgldaftar);						
						echo form_input($conf);
					?>
				</td>
			</tr>

			<tr>
			
			<td>RT / RW<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'rt','id'=>'rt','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>set_value('rt'));						
						echo form_input($conf);
					?>
					
					<?php
						$conf=array('name'=>'rw','id'=>'rw','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>set_value('rw'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>INFORMASI DARI<label class="require">*</label></td>
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
			<td>KODE POS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kodepos','id'=>'kodepos','value'=>set_value('kodepos'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>UKURAN JAS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="ukuran_jas">
					<option value="">-- Pilih --</option>
						<?php
							foreach($jas as $data=>$item){
								?>
								<option value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>TELP<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telp','id'=>'telp','value'=>set_value('telp'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>ID RELASI<label class="require">*</label></td>
				<td>:</td>
				<td>
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
			<td>NO WHATSAPP<label class="require">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'no_wa','id'=>'no_wa','value'=>set_value('no_wa'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				
                <td>RELASI<label class="require">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'relasitxt','id'=>'relasitxt','value'=>set_value('relasitxt'));						
						echo form_input($conf);
					?>
				</td>
				
			</tr>

			<tr>
			<td>E-MAIL<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'email','id'=>'email','value'=>set_value('email'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>STATUS REGISTRASI<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="status_registrasi" id="status_registrasi">
						<option value="">-- Pilih --</option>
						<option value="Hanya Daftar">Hanya Daftar</option>
						<option value="KIP-Kuliah">KIP-Kuliah</option>
						<option value="Angsur">Angsur</option>
						<option value="Lunas">Lunas</option>
						<option value="Mortal">Mortal</option>
					</select>
				</td>
				
			</tr>

			<tr>
			<td>NO.KUITANSI</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'no_kuitansi','id'=>'no_kuitansi','value'=>set_value('no_kuitansi'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>NO. KIP-Kuliah</td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'no_kipk','id'=>'no_kipk','value'=>'0');						
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
				<td>NAMA IBU<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'namaortu','id'=>'namaortu','value'=>set_value('namaortu'));						
						echo form_input($conf);
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
			<tr>
			<td>NO. HP/WA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telportu','id'=>'telportu','value'=>set_value('telportu'));						
						echo form_input($conf);
					?>
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
			<td>PEKERJAAN IBU<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'pekerjaan_ortu','id'=>'pekerjaan_ortu','value'=>set_value('pekerjaan_ortu'));						
						echo form_input($conf);
					?>
				</td>
				
				<td>&nbsp;</td>
				<td>KECAMATAN ORTU<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatanortu','id'=>'kecamatanortu','value'=>set_value('kecamatanortu'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>NAMA AYAH<label class="require">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'nama_ayah','id'=>'nama_ayah','value'=>set_value('nama_ayah'));						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KELURAHAN ORTU<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kelurahanortu','id'=>'kelurahanortu','value'=>set_value('kelurahanortu'));						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>NO. HP/WA<label class="require">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'telpayah','id'=>'telpayah','value'=>set_value('telpayah'));						
						echo form_input($conf);
					?>
				</td>
				
				<td>&nbsp;</td>
				<td>ALAMAT ORANGTUA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<input type="text" id="alamatortu" name="alamatortu"  maxlength="150" size="35" />											
				</td>
                
			</tr>
			<tr>
			<td>PEKERJAAN AYAH<label class="require">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'pekerjaan_ayah','id'=>'pekerjaan_ayah','value'=>set_value('pekerjaan_ayah'));						
						echo form_input($conf);
					?>
				</td>
		
				<td>&nbsp;</td>
				<td>RT / RW ORTU<label class="require">*</label></td>
			<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'rt_ortu','id'=>'rt_ortu','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>set_value('rt_ortu'));						
						echo form_input($conf);
					?>
					
					<?php
						$conf=array('name'=>'rw_ortu','id'=>'rw_ortu','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>set_value('rw_ortu'));						
						echo form_input($conf);
					?>
				</td>
				
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>&nbsp;</td>
				<td>KODEPOS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kodeposortu','id'=>'kodeposortu','value'=>set_value('kodeposortu'));						
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
   