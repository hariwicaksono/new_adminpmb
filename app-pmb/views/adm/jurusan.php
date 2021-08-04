<script type="text/javascript">
function changej(kode0,kode1,kode2){$('#jurcon1').html('<center><img src="<?php echo base_url(); ?>/image/ajax-loader.gif" /></center>');$.ajax ({url: "<?php echo site_url('aloader')?>" + "/" + kode0+"/"+kode1+"/"+kode2,success: function(msg){$("#jurcon1").html(msg);}});}
</script>
<div id="jurcon1">
<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
	$(function() {$( "#tglak" ).datepicker({dateFormat:'dd-mm-yy',maxDate:'+0D'});});
	$(document).ready(function(){var container = $('div.container');var validator=$('#frmjurus').validate({rules:{kdprod:{required:true,number:true},kdkelas:{required:true},kdmk:{required:true},maxstudi:{required:true,number:true},
				skssmt1:{required:true,number:true},maxskssem:{required:true,number:true},maxskssempen:{required:true,number:true},gelar:{required:true},singkgel:{required:true},noijin:{required:true},statsak:{required:true},
				minsks:{required:true,number:true},nilaiskripsi:{required:true},maxd:{required:true,number:true},minskslulus:{required:true,number:true},minipk:{required:true,number:true}				
			},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'			
		});		
		$("input[type=reset]").click(function() {validator.resetForm();});
	});
</script>
<center>
	<h2>MANAGE JURUSAN</h2>	
	<br />
	<div class="container">
	<h4>Periksa kembali inputan anda</h4>
		<ol>					
			<li><label for="kdprod" class="error">Kode Prodi harus di isi dan berupa angka</label></li>			
			<li><label for="kdkelas" class="error">Kode Kelas harus di isi dan berupa angka</label></li>
			<li><label for="kdmk" class="error">Kode Mata Kuliah harus di isi</label></li>
			<li><label for="maxstudi" class="error">Maksimal Batas Studi harus di isi dan berupa angka</label></li>
			<li><label for="skssmt1" class="error">Sks Semester 1 harus di isi dan berupa angka</label></li>
			<li><label for="maxskssem" class="error">Maksimal Batas Studi harus di isi dan berupa angka</label></li>													
			<li><label for="maxskssempen" class="error">Maksimal Sks Semester Pendek harus di isi dan berupa angka</label></li>
			<li><label for="gelar" class="error">Gelar harus di isi</label></li>
			<li><label for="singkgel" class="error">Singkatan Gelar harus di isi</label></li>
			<li><label for="noijin" class="error">Nomor Ijin harus di isi</label></li>
			<li><label for="statsak" class="error">Status akreditasi harus di isi</label></li>
			<li><label for="minsks" class="error">Minimal Sks Skripsi harus di isi dan berupa angka</label></li>
			<li><label for="nilaiskripsi" class="error">Nilai Skripsi harus di isi</label></li>
			<li><label for="maxd" class="error">Maksimal Nilai D harus di isi dan berupa angka</label></li>
			<li><label for="minskslulus" class="error">Minimal SKS Lulus harus di isi dan berupa angka</label></li>
			<li><label for="minipk" class="error">Minimal IPK harus di isi dan berupa angka</label></li>
		</ol>
	</div>
	<div id="content_error">
		<?php if(!empty($messageproc)){ echo '<br />'.$messageproc.'<br /><br />';} ?>
		<?php echo validation_errors(); ?>				
	</div>
	<div id="content_form" style="width:800px;">
		<?php  echo form_open('adm/opjurusanad',array('id'=>'frmjurus')); ?>
			<table width="100%">
				<tr>
					<td class="tb_title"><b>Umum</b></td>
				</tr>
			</table>
			<table width="100%">				
				<tr>
					<td>Nama Fakultas</td>
					<td>:</td>
					<td>
						<select name="fakultas" id="fakultas">
							<?php
								foreach($fakultas as $data=>$item){
									?>
									<option value="<?php echo $item['KD_FAK'] ?>"><?php echo $item['NAMA_FAK'] ?></option>
									<?php
								}
							?>
						</select>
					</td>
					<td>Prodi</td>
					<td>:</td>
					<td>
						<select name="prodi" id="prodi">
							<?php
								foreach($nonjurusan as $data=>$item){
									?>
									<option value="<?php echo $item['kd_dept'] ?>"><?php echo $item['nama_dept'] ?></option>
									<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;</td>
					<td>Kode Prodi</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'kdprod',
								'id'=>'kdprod',
								'class'=>"text-short",
								'maxlength'=>4,
								'value'=>set_value('kdprod')				
								);
							echo form_input($config);
						?>
						<sub>* Maks 4 Karakter</sub>
					</td>
				</tr>
				<tr>
					<td>Kode Kelas</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'kdkelas',
								'id'=>'kdkelas',
								'class'=>"text-short",
								'maxlength'=>5,
								'value'=>set_value('kdkelas')				
								);
							echo form_input($config);
						?>
						<sub>* Maks 5 Karakter</sub>
					</td>
					<td>Kode Mata Kuliah</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'kdmk',
								'id'=>'kdmk',
								'class'=>"text-short",
								'maxlength'=>3,
								'value'=>set_value('kdmk')				
								);
							echo form_input($config);
						?>
						<sub>* Maks 3 Karakter</sub>
					</td>
				</tr>
				<tr>
					<td>Maks.Batas Study</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'maxstudi',
								'id'=>'maxstudi',
								'class'=>"text-short",
								'value'=>set_value('maxstudi')				
								);
							echo form_input($config);
						?>
						<sub>Semester</sub>
					</td>
					<td>Sks Semester 1</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'skssmt1',
								'id'=>'skssmt1',
								'class'=>"text-short",
								'value'=>set_value('skssmt1')				
								);
							echo form_input($config);
						?>
						<sub>SKS</sub>
					</td>
				</tr>
				<tr>
					<td>Maks Sks Per-Semester</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'maxskssem',
								'id'=>'maxskssem',
								'class'=>"text-short",
								'value'=>set_value('maxskssem')				
								);
							echo form_input($config);
						?>
						<sub>SKS</sub>						
					</td>
					<td>Maks Sks Semester Pendek</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'maxskssempen',
								'id'=>'maxskssempen',
								'class'=>"text-short",
								'value'=>set_value('maxskssempen')				
								);
							echo form_input($config);
						?>
						<sub>SKS</sub>
					</td>
				</tr>
				<tr>
					<td>Gelar</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'gelar',
								'id'=>'gelar',
								'class'=>"text-short",
								'value'=>set_value('gelar')				
								);
							echo form_input($config);
						?>						
					</td>
					<td>Singkatan Gelar</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'singkgel',
								'id'=>'singkgel',
								'class'=>"text-short",
								'value'=>set_value('singkgel')				
								);
							echo form_input($config);
						?>
					</td>
				</tr>
				<tr>
					<td>Kode TA/Skripsi</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'kodeta',
								'id'=>'kodeta',
								'class'=>"text-short",
								'disabled'=>'true',
								'value'=>set_value('kodeta')				
								);
							echo form_input($config);
						?>						
					</td>
					<td>Tanggal Akreditasi</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'tglak',
								'id'=>'tglak',
								'class'=>"text-short",
								'value'=>date('d-m-Y')				
								);
							echo form_input($config);
						?>
					</td>
				</tr>
				<tr>
					<td>Nomor Ijin</td>
					<td>:</td>
					<td>
						<?php
							$config=array(								
								'name'=>'noijin',
								'id'=>'noijin',
								'rows'=>8,
								'cols'=>20,								
								'value'=>set_value('noijin')				
								);
							echo form_textarea($config);
						?>						
					</td>
					<td>Status Akreditasi</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'name'=>'statsak',
								'id'=>'statsak',
								'rows'=>8,
								'cols'=>20,									
								'value'=>set_value('statsak')				
								);
							echo form_textarea($config);
						?>
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td class="tb_title"><b>Syarat Skripsi</b></td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td>Minimal SKS</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'minsks',
								'id'=>'minsks',
								'class'=>"text-short",
								'value'=>set_value('minsks')				
								);
							echo form_input($config);
						?>						
					</td>
					<td>MK Syarat Skripsi</td>
					<td>:</td>
					<td>
						<input type="button" class="button" name="mksyarat" value="Set MK Prasyarat" disabled="true" />
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td class="tb_title"><b>Syarat Lulus</b></td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td>Min. Nilai Skripsi</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'nilaiskripsi',
								'id'=>'nilaiskripsi',
								'class'=>"text-short",
								'value'=>set_value('nilaiskripsi')				
								);
							echo form_input($config);
						?>						
					</td>
					<td>Minimal Sks Lulus</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'minskslulus',
								'id'=>'minskslulus',
								'class'=>"text-short",
								'value'=>set_value('minskslulus')				
								);
							echo form_input($config);
						?>
					</td>
				</tr>
				<tr>
					<td>Max Jumlah Nilai D</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'maxd',
								'id'=>'maxd',
								'class'=>"text-short",
								'value'=>set_value('maxd')				
								);
							echo form_input($config);
						?>						
					</td>
					<td>Minimal IPK</td>
					<td>:</td>
					<td>
						<?php
							$config=array(
								'type'=>'text',
								'name'=>'minipk',
								'id'=>'minipk',
								'class'=>"text-short",
								'value'=>set_value('minipk')				
								);
							echo form_input($config);
						?><br />
						<sub>* masukkan angka dengan pemisah '.'(titik)</sub>
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>			
					<td align="center">
						<input type="hidden" id="mode" value="" name="mode" />
						<?php
							$config=array(
								'type'=>'submit',
								'name'=>'submit',
								'value'=>'Simpan'
							);
							echo form_input($config);							
						?>
						<?php
							$config=array(
								'type'=>'reset',
								'name'=>'reset',
								'value'=>'Reset',
								'id'=>'reset'
							); 
							echo form_input($config); 
						?>
					</td>
				</tr>
			</table>	
		<?php echo form_close();?>
	</div>
	<div>
		<br>
			<font color="red"> * Semua text field harus di isi </font><br>
			<font color="red"> * <b>Kode TA/Skripsi</b> di isi setelah jurusan baru di tambahkan dengan menggunakan fasilitas edit </font><br>
			<font color="red"> * <b>MK Prasyarat untuk Skripsi</b> di set setelah jurusan baru di tambahkan dengan menggunakan fasilitas edit</font><br>
		<br>
	</div>
	<?php
	//pr($jurusan);
	?>
	<div id="content_table">
		<table id="common_table" width="100%" >
			<thead>
				<th>KODE</th>
				<th>NAMA FAKULTAS</th>
				<th>NAMA DEPARTEMEN</th>
				<th>KODE MATA KULIAH</th>
				<th>KODE KELAS</th>
				<th>&nbsp;</th>
			</thead>
			<?php
			$no=1;
			foreach($jurusan as $data=>$item){
			?>
				<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >
					<td align="left"><?php echo $item['KD_DEPT']; ?></td>
					<td align="left"><?php echo $item['NAMA_FAK']; ?></td>
					<td align="left"><?php echo $item['NAMA_DEPT']; ?></td>
					<td><?php echo $item['KODE_MKL']; ?></td>
					<td><?php echo $item['KODE_KELAS']; ?></td>
					<td>
						<input type="button" onclick="changej('loedjur','<?php echo $item['KD_DEPT']; ?>','<?php echo $item['NAMA_DEPT'];?>')" value="Ubah" />
						<input type="button" onclick="" value="Hapus" />
					</td>
				</tr>
			<?php
			$no++;
			} 
			?>						
		</table>
	</div>
	<br />	
</center>
</div>