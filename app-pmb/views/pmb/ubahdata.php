<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>javascript/cmxforms.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script>
		$(function() {$( "#tgltes" ).datepicker({dateFormat:'dd-mm-yy',minDate:'<?php echo $biodata['tglpendaftaran'];?>'});});$(function(){$("#fak1").change(function(){$("#pil1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak1").val(),success: function(msg){$("#pil1").html(msg);}});});});		
		$(function(){$("#fak2").change(function(){$("#pil2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak2").val(),success: function(msg){$("#pil2").html(msg);}});});});
		$(function(){$("#fak3").change(function(){$("#pil3").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fak3").val(),success: function(msg){$("#pil3").html(msg);}});});});
		$(function(){$("#propinsi1").change(function(){$("#kabupaten1").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi1").val(),success: function(msg){$("#kabupaten1").html(msg);}}); });});		
		$(function(){$("#propinsi2").change(function(){$("#kabupaten2").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getKab')?>" + "/" + $("#propinsi2").val(),success: function(msg){$("#kabupaten2").html(msg);}});});});$(function(){$("#jenismhs").change(function(){$.ajax ({url: "<?php echo site_url('cloader/getBiayaPendaftaran')?>" + "/" + $("#jenismhs").val(),success: function(msg){$("#biayadaftar").val(msg);},error:"0"}); });});		
		$(function(){$("#batal").click(function(){history.back()});});		
		$(document).ready(function(){var container = $('div.container');var validator=$('#inputform').validate({
					rules:{fak1:{required:true},jenismhs:{required:true},namalengkap:{required:true,accept: "[a-zA-Z0-9 ]+"},nikktp:{required:true},pil1:{required:true},fak2:{required:true},pil2:{required:true},fak3:{required:true},pil3:{required:true},sekolahasal:{required:true,accept: "[a-zA-Z0-9 ]+"},tempatlahir:{required:true},tgllahir:{required:true},nem1:{required:true,number:true},nem2:{required:true,number:true},propinsi1:{required:true},propinsi2:{required:true},kabupaten1:{required:true},kabupaten2:{required:true},status_registrasi:{required:true},ukuran_jas:{required:true},alamat:{required:true,accept: "[a-zA-Z0-9 ]+"},kodepos:{number:true},telp:{required:true,number:true},email:{email:true},namaortu:{required:true,accept: "[a-zA-Z0-9 ,.]+"},rt:{number:true},rw:{number:true},alamatortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kelurahan:{required:true,accept: "[a-zA-Z0-9,.]+"},rt:{required:true,accept: "[a-zA-Z0-9,.]+"},rw:{required:true,accept: "[a-zA-Z0-9,.]+"},kecamatan:{required:true,accept: "[a-zA-Z0-9,.]+"},kelurahanortu:{required:true,accept: "[a-zA-Z0-9,.]+"},rt_ortu:{required:true,accept: "[a-zA-Z0-9,.]+"},rw_ortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kecamatanortu:{required:true,accept: "[a-zA-Z0-9,.]+"},kodeposortu:{number:true},telportu:{number:true}
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
		<?php echo form_open('mhsbaru/'.$biodata['nodaf'],array('id'=>"inputform"));?>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="tb_title"><b>Data Calon Mahasiswa</b></td>				
			</tr>
		</table>
		<?php
		//print_r($biodata); 
		?>
		<table width="100%">
			<tr>
				<td >
					<b>Nomor Pendaftaran : <?php echo $biodata['nodaf']?><br />Nomor Referensi : <?php echo $biodata['noref'];?></b>					
				</td>
				<td align="right">	
				<select name="gelombang">
					<?php
						foreach($glmb as $data=>$item){							
					?>
						<option <?php if($item['kode']==$biodata['kodegelombang']){?> selected="selected" <?php } ?> value="<?php echo $item['kode'];?>"  ><?php echo $item['gelombang']?></option>
					<?php
						}
					?>
				</select>																	
				</td>
			</tr>
		</table>
		<?php			
			echo form_hidden('nodaf',$biodata['nodaf']);			
			echo form_hidden('noref',$biodata['noref']);
		?>		
		<table width="100%">
			<tr>
				<td>MENDAFTAR VIA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="daftarvia" disabled="true">
						<?php
							foreach($daftarvia as $data=>$item){
						?>
							<option <?php if($item['kode']==$biodata['via']){?> selected="selected" <?php } ?> value="<?php echo $item['kode'];?>"><?php echo $item['nama'];?></option>		
						<?php
							}
						?>
					</select>
					
				</td>
				<td>&nbsp;</td>
				<td>PILIHAN 1<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak1" id="fak1">
						<option>--Pilih fakultas--</option>
						<?php
							foreach($fakultas as $data=>$item){
						?>
							<option <?php if($item['KD_FAK']==$biodata['fakselected1']){ ?> selected="selected" <?php } ?> value="<?php echo $item['KD_FAK'];?>"><?php echo $item['NAMA_FAK'];?></option>		
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
							$nojenis=$biodata['ID_JENISMHS'].$biodata['JENIS_MHS'];						
							foreach($jenismhs as $data=>$item){
								$itemjenis=$item['ID_JENISMHS'].$item['KODE_JENIS'];
						?>
							<option <?php if($itemjenis==$nojenis){?> selected="selected" <?php } ?> value="<?php echo $itemjenis; ?>"  ><?php echo $item['NAMA'];?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil1" id="pil1" >
						<option>--Pilih jurusan--</option>
						<?php
							foreach($jurpilihan1 as $data=>$item){
								?>
								<option <?php if($item['KD_DEPT']==$biodata['pilihan1']){ ?> selected="selected" <?php }?> value="<?php echo $item['KD_DEPT']?>"><?php echo $item['NAMA_DEPT'];?></option>
								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>KELAS</td>
				<td>:</td>
				<td><select name="kelas" id="kelas" >
				        <option value="" <?php if(empty($biodata['KELAS'])) echo 'Selected'; ?>>--Pilih Salah Satu--</option>
						<option value="Pagi" <?php if($biodata['KELAS']=='Pagi') echo 'Selected'; ?>>Pagi</option>
						<option value="Sore" <?php if($biodata['KELAS']=='Sore') echo 'Selected'; ?>>Sore</option>
						<option value="Transfer" <?php if($biodata['KELAS']=='Transfer') echo 'Selected'; ?>>Transfer</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>PILIHAN 2<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak2" id="fak2">
						<option>--Pilih fakultas--</option>
						<?php
							foreach($fakultas as $data=>$item){
						?>
							<option <?php if($item['KD_FAK']==$biodata['fakselected2']){ ?> selected="selected" <?php } ?> value="<?php echo $item['KD_FAK'];?>"><?php echo $item['NAMA_FAK'];?></option>		
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
						$conf=array('name'=>'namalengkap','id'=>'namalengkap','value'=>$biodata['nama']);						
						echo form_input($conf);
					?>
					
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil2" id="pil2" >
						<option>--Pilih jurusan--</option>
						<?php
							foreach($jurpilihan2 as $data=>$item){
								?>
								<option <?php if($item['KD_DEPT']==$biodata['pilihan2']){ ?> selected="selected" <?php }?> value="<?php echo $item['KD_DEPT']?>"><?php echo $item['NAMA_DEPT'];?></option>
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
						$conf=array('name'=>'nikktp','id'=>'nikktp','value'=>$biodata['nikktp']);						
						echo form_input($conf);
					?>
			</td>
			<td>&nbsp;</td>
			<td>PILIHAN 3<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="fak3" id="fak3">
						<option>--Pilih fakultas--</option>
						<?php
							foreach($fakultas as $data=>$item){
						?>
							<option <?php if($item['KD_FAK']==$biodata['fakselected3']){ ?> selected="selected" <?php } ?> value="<?php echo $item['KD_FAK'];?>"><?php echo $item['NAMA_FAK'];?></option>		
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
						$conf=array('name'=>'tempatlahir','id'=>'tempatlahir','value'=>$biodata['tempatlahir']);						
						echo form_input($conf);
					?>
			</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>:</td>
				<td>
					<select name="pil3" id="pil3" >
						<option>--Pilih jurusan--</option>
						<?php
							foreach($jurpilihan3 as $data=>$item){
								?>
								<option <?php if($item['KD_DEPT']==$biodata['pilihan3']){ ?> selected="selected" <?php }?> value="<?php echo $item['KD_DEPT']?>"><?php echo $item['NAMA_DEPT'];?></option>
								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>TANGGAL LAHIR<label class="require">*</label></td>
			<td>:</td>
			<td>
			<?php
						$conf=array('name'=>'tgllahir','id'=>'tgllahir','value'=>$biodata['tgllahir']);						
						echo form_input($conf);
					?>
					
			</td>
				<td>&nbsp;</td>
				<td>ASAL SMA/SMK/PTN/PTS<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'sekolahasal','id'=>'sekolahasal','value'=>$biodata['sekolah']);						
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
							);
						if($biodata['jk']=='Pria'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Laki-laki';
						$conf=array(
								'name'=>'jk',
								'value'=>'Wanita',
								'checked'=>FALSE
							);
						if($biodata['jk']=='Wanita'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Perempuan';
					?>
				</td>
			<td>&nbsp;</td>
			<td>JURUSAN SLTA<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'jurslta','id'=>'jurslta','value'=>$biodata['jurusan']);						
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
								<option <?php if($item['kode']==$biodata['AGAMA']){?> selected="selected" <?php } ?> value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				
                <td>TAHUN LULUS</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tahun_lulus','id'=>'tahun_lulus','value'=>$biodata['tahun_lulus']);						
						echo form_input($conf);
					?>
				</td>
				
			</tr>
			<tr>
			<td>STATUS MENIKAH</td>
				<td>:</td>
				<td><select name="status_menikah" id="status_menikah" >
						<option value="Belum Menikah" <?php if($biodata['status_pernikahan']=='Belum Menikah'){?> selected="selected" <?php } ?> >Belum Menikah</option>
						<option value="Menikah" <?php if($biodata['status_pernikahan']=='Menikah'){?> selected="selected" <?php } ?>>Menikah</option>
					</select>
				</td>
				<td>&nbsp;</td>

                <td>RATA-RATA NEM<label class="require">*</label></td>
				<td>:</td>
				<td>					
					<?php
						$nem=explode('.',$biodata['nem']);
						$conf=array('name'=>'nem1','id'=>'nem1','size'=>'2','maxlength'=>'2','value'=>isset($nem[0]) ? $nem[0] : '00');						
						echo form_input($conf);
					
						$conf=array('name'=>'nem2','id'=>'nem2','size'=>'2','maxlength'=>'2','value'=>isset($nem[1]) ? $nem[1] : '00');						
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
							<option <?php if($item['kdProp']==$biodata['propinsi']){?> selected="selected" <?php } ?> value="<?php echo $item['kdProp'];?>"><?php echo $item['NamaProp'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>TANGGAL MENDAFTAR</td>
				<td>:</td>
				<td>					
					<?php
						$conf=array('name'=>'tgldaftar','id'=>'tgldaftar','value'=>$biodata['tglpendaftaran'],'readonly'=>'true');						
						echo form_input($conf);
					?>
                </td>
			</tr>
			<tr>
			<td>KABUPATEN<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="kabupaten1" id="kabupaten1" >
						<option value="">--Pilih Kabupaten--</option>
						<?php
							foreach($kabbupaten as $data=>$item){
								?>
								<option <?php if($item['KdKab']==$biodata['kabupaten']){ ?> selected="selected" <?php }?> value="<?php echo $item['KdKab'] ?>" > <?php echo $item['NamaKab'] ?></option>
								<?php
							}
						?>
					</select>
				</td>
				 <td>&nbsp;</td>
				<td>PERSYARATAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
								'name'=>'syarat1',
								'value'=>'Lengkap'								
							);
						if($biodata['syarat1']=='Lengkap'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Lengkap';
						$conf=array(
								'name'=>'syarat1',
								'value'=>'Tidak Lengkap'								
							);
						if($biodata['syarat1']=='Tidak Lengkap'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Tidak Lengkap';
					?>
				</td>
			</tr>
			<tr>
			<td>KECAMATAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatan','id'=>'kecamatan','value'=>$biodata['kecamatan']);						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td valign="top" >BIAYA PENDAFTARAN</td>
				<td valign="top">:</td>
				<td>
					<?php
						$conf=array('name'=>'biayadaftar','id'=>'biayadaftar','readonly'=>'readonly','value'=>$biodata['BIAYA_PENDAFTARAN']);						
						echo form_input($conf);
					?>
					<br />
					<?php
						$conf=array(
								'name'=>'syarat2',
								'value'=>'Sudah'								
							);
						if($biodata['syarat2']=='Sudah'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Lunas';
						$conf=array(
								'name'=>'syarat2',
								'value'=>'Belum'								
							);
						if($biodata['syarat2']=='Belum'){
							$conf['checked']=TRUE;
						}else{
							$conf['checked']=FALSE;
						}
						echo form_radio($conf);
						echo 'Belum Lunas';
					?>
				</td>
			</tr>
			<tr>
			<td>KELURAHAN</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kelurahan','id'=>'kelurahan','value'=>$biodata['kelurahan']);						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KET.BAYAR</td>
				<td>:</td>
				<td>
					<?php
						$conf=array(
								'name'=>'pembayaran',
								'value'=>'Bayar',
								'checked'=>TRUE
							);
						echo form_radio($conf);
						echo 'Bayar';
						$conf=array(
								'name'=>'pembayaran',
								'value'=>'Tidak Bayar',
								'checked'=>FALSE
							);
						echo form_radio($conf);
						echo 'Tidak Bayar';
					?>
				</td>
			</tr>
			<tr>
			<td>RT / RW</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'rt','id'=>'rt','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>$biodata['rt']);						
						echo form_input($conf);
					?>
					
					<?php
						$conf=array('name'=>'rw','id'=>'rw','size'=>'2','maxlength'=>'5','placeholder'=>'00','value'=>$biodata['rw']);						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>TANGGAL TES</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'tgltes','id'=>'tgltes','value'=>$biodata['tglujian']);						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>ALAMAT<label class="require">*</label></td>
				<td >:</td>
				<td>
					<input type="text" name="alamat" id="alamat" value="<?php echo trim(str_replace(chr(194),'',$biodata['alamat'])); ?>" maxlength="150" size="35" />										
				</td>
				
				<td>&nbsp;</td>
				<td>INFORMASI DARI</td>
				<td>:</td>
				<td>
					<select name="infodari">
						<?php
							foreach($infodari as $data=>$item){
								?>
								<option <?php if($item['kode']==$biodata['komentar']){?> selected="selected" <?php } ?> value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
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
						$conf=array('name'=>'kodepos','id'=>'kodepos');
						if(!empty($biodata['kodepos'])){$conf['value']=$biodata['kodepos'];}						
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
								<option <?php if($item['kode']==$biodata['ukuran_jas']){?> selected="selected" <?php } ?> value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>

			</tr>

			<tr valign="top">
			<td>TELP</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telp','id'=>'telp');
						if(!empty($biodata['telepon'])){$conf['value']=$biodata['telepon'];}						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>ID RELASI</td>
				<td>:</td>
				<td>
					<select name="relasi">
						<?php
							foreach($relasi as $data=>$item){
								?>
								<option <?php if($item['ID_RELASI']==$biodata['ID_RELASI']){ ?> selected="selected" <?php } ?> value="<?php echo $item['ID_RELASI']?>"><?php echo $item['NAMA_RELASI'] ?></option>
								<?php
							} 
						?>
					</select>
				</td>
				
			</tr>
			<tr>
			<td>NO WHATSAPP<label class="required">*</label></td>
				<td>:</td>
				<td>
				<?php
						$conf=array('name'=>'no_wa','id'=>'no_wa','value'=>'62');
						if(!empty($biodata['no_wa'])){$conf['value']=$biodata['no_wa'];}
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>RELASI</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'relasitxt','id'=>'relasitxt','value'=>$biodata['RELASI']);						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>E-MAIL</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'email','id'=>'email');
						if(!empty($biodata['email'])){$conf['value']=$biodata['email'];}						
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>STATUS REGISTRASI<label class="require">*</label></td>
				<td>:</td>
				<td>
					<select name="status_registrasi" id="status_registrasi">
					<option value="">-- Pilih --</option>
						<?php
							foreach($registrasi as $data=>$item){
								?>
								<option <?php if($item['kode']==$biodata['status_registrasi']){?> selected="selected" <?php } ?> value="<?php echo $item['kode']?>"><?php echo $item['nama'] ?></option>
								<?php
							} 
						?>
					</select>
					
				</td>

			</tr>	
			<tr>
			<td>NO.KUITANSI</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'no_kuitansi','id'=>'no_kuitansi','value'=>$biodata['no_kuitansi']);						
						echo form_input($conf);
					?>
				</td>
			<td>&nbsp;</td>
			<?php if($biodata['status_registrasi']=='KIP-Kuliah'){ ?>
			<td>NO KIPK</td>
				<td>:</td>
					<td>
					<?php
						$conf=array('name'=>'no_kipk','id'=>'no_kipk');
						if(!empty($biodata['no_kipk'])){$conf['value']=$biodata['no_kipk'];}						
						echo form_input($conf);
						
						//echo $biodata['no_kipk'];
						
					?>
					
			</td>	
			<?php }else{ ?>
				<td></td>
				<td></td>
				<td></td>
			<?php } ?>
			</tr>	
		</table>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="tb_title"><b>Data Orangtua</b></td>				
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td>NAMA IBU<label class="require">*</label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'namaortu','id'=>'namaortu');
						if(!empty($biodata['NAMA_ORTU'])){$conf['value']=$biodata['NAMA_ORTU'];}							
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>PROPINSI ORANGTUA</td>
				<td>:</td>
				<td>
					<select name="propinsi2" id="propinsi2">
						<option value="">--Pilih propinsi--</option>
						<?php
							foreach($propinsi as $data=>$item){
						?>
							<option <?php if($item['kdProp']==$biodata['PROPINSI_ORTU']){ ?> selected="selected" <?php }?> value="<?php echo $item['kdProp'];?>"><?php echo $item['NamaProp'];?></option>		
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>TELP IBU<label class="required"></label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telportu','id'=>'telportu');
						if(!empty($biodata['TELP_ORTU'])){$conf['value']=$biodata['TELP_ORTU'];}							
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KABUPATEN</td>
				<td>:</td>
				<td>
					<select name="kabupaten2" id="kabupaten2" >
						<option value="">--Pilih Kabupaten--</option>
						<?php
							foreach($kabbupaten2 as $data=>$item){
								?>
								<option <?php if($item['KdKab']==$biodata['KABUPATEN_ORTU']){ ?> selected="selected" <?php } ?> value="<?php echo $item['KdKab'];?>"> <?php echo $item['NamaKab'] ?></option>
								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>PEKERJAAN IBU<label class="required"></label></td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'pekerjaan_ortu','id'=>'pekerjaan_ortu');
						if(!empty($biodata['PEKERJAAN_ORTU'])){$conf['value']=$biodata['PEKERJAAN_ORTU'];}							
						echo form_input($conf);
					?>
				</td>
				
				<td>&nbsp;</td>
				<td>KECAMATAN ORTU</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kecamatanortu','id'=>'kecamatan_ortu');
						if(!empty($biodata['KECAMATAN_ORTU'])){$conf['value']=$biodata['KECAMATAN_ORTU'];}						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>NAMA AYAH</td>
				<td>:</td>
				<td>
				<?php
					$conf=array('name'=>'nama_ayah','id'=>'nama_ayah');
						if(!empty($biodata['NAMA_AYAH'])){$conf['value']=$biodata['NAMA_AYAH'];}							
						echo form_input($conf);
					?>
				</td>
				<td>&nbsp;</td>
				<td>KELURAHAN ORTU</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kelurahanortu','id'=>'kelurahan_ortu');
						if(!empty($biodata['KELURAHAN_ORTU'])){$conf['value']=$biodata['KELURAHAN_ORTU'];}						
						echo form_input($conf);
					?>
				</td>
			</tr>
			<tr>
			<td>TELP AYAH</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'telpayah','id'=>'telpayah');
						if(!empty($biodata['TELP_AYAH'])){$conf['value']=$biodata['TELP_AYAH'];}							
						echo form_input($conf);
					?>
				</td>
			
				<td>&nbsp;</td>
				<td>ALAMAT ORANGTUA</td>
				<td>:</td>
				<td>
					<input type="text" name="alamatortu" id="alamat_ortu" value="<?php echo trim(str_replace(chr(194),'',$biodata['ALAMATORTU'])); ?>" maxlength="150" size="35" />				
				</td>  
				
			</tr>

			<tr>
			<td>PEKERJAAN AYAH</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'pekerjaan_ayah','id'=>'pekerjaan_ayah');
						if(!empty($biodata['PEKERJAAN_AYAH'])){$conf['value']=$biodata['PEKERJAAN_AYAH'];}							
						echo form_input($conf);
					?>
				</td>
			
				<td>&nbsp;</td>
				<td>RT / RW ORTU</td>
			<td>:</td>
				<td>
					<?php
					
						$conf=array('name'=>'rt_ortu','id'=>'rt_ortu','size'=>'2','placeholder'=>'00','maxlength'=>'5');
						if(!empty($biodata['RT_ORTU'])){$conf['value']=$biodata['RT_ORTU'];}						
						echo form_input($conf);
					?>
					
					<?php
						$conf=array('name'=>'rw_ortu','id'=>'rw_ortu','size'=>'2','placeholder'=>'00','maxlength'=>'5');	
						if(!empty($biodata['RW_ORTU'])){$conf['value']=$biodata['RW_ORTU'];}					
						echo form_input($conf);
					?>
				</td>
				
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>&nbsp;</td>
				<td>KODEPOS ORTU</td>
				<td>:</td>
				<td>
					<?php
						$conf=array('name'=>'kodeposortu','id'=>'kodeposortu');
						if(!empty($biodata['KODEPOS_ORTU'])){$conf['value']=$biodata['KODEPOS_ORTU'];}							
						echo form_input($conf);
					?>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td align="center" class="mybutton"><?php 
					echo form_submit('daftar','Simpan');
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
</center>

