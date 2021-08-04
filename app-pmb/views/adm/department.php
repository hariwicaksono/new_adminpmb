<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
	$(document).ready(function(){$('#kategori').change(function(){var kode=$('#kategori').val();if(kode==0){$('#namaprod').val('');$('#namaprod').attr('disabled','true');$('#namaproden').val('');$('#namaproden').attr('disabled','true');}else{$('#namaprod').removeAttr('disabled');$('#namaproden').removeAttr('disabled');}});});	
	function edform(par1,par2,par3,par4,par5,par6,par7){$('#kddept').val(par1);$('#kddept').attr('readonly','readonly');$('#namadept').val(par2);$('#namadepten').val(par3);$('#kategori').val(par4);$('#namaprod').val(par5);$('#namaproden').val(par6);$('#namakabag').val(par7);$('#mode').val('edit');if(par4==0){$('#namaprod').attr('disabled','true');$('#namaproden').attr('disabled','true');}else{$('#namaprod').removeAttr('disabled');$('#namaproden').removeAttr('disabled');}}	
	function doconfirm(param1,param2){if(confirm('Yakin menghapus Departemen '+param2+' ?  ')){$.ajax({url: "<?php echo site_url('aloader/deldepartment') ?>/"+param1+"/"+param2,success: function(html) {location.reload();}});}}	
	$(document).ready(function(){var container = $('div.container');var validator=$('#frmdept').validate({rules:{kddept:{required:true,number:true},namadept:{required:true},namadepten:{required:true},namaprod:{required:true},namaproden:{required:true},},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});$("input[type=reset]").click(function() {$('#kddept').removeAttr('readonly');$('#namaprod').removeAttr('disabled');$('#namaproden').removeAttr('disabled');$('#mode').val('');validator.resetForm();});});
</script>
<center>
	<h2>Department</h2>
	<br />
	<div class="container">
	<h4>Periksa kembali inputan anda</h4>
		<ol>					
			<li><label for="kddept" class="error">Kode Departemen harus di isi dan berupa angka</label></li>			
			<li><label for="namadept" class="error">Nama Departemen harus di isi</label></li>			
			<li><label for="namadepten" class="error">Nama Departemen dalam bahasa inggris harus di isi</label></li>
			<li><label for="namaprod" class="error">Nama Prodi harus di isi </label></li>
			<li><label for="namaproden" class="error">Nama Prodi dalam bahasa inggris harus di isi</label></li>								
		</ol>
	</div>
	<div id="content_form" style="width:490px;">
		<?php  echo form_open('adm/opdepartment',array('id'=>'frmdept')); ?>
			<table width="100%">
				<tr>
					<td>Kode Department</td>
					<td>:</td>
					<td>						
					<?php
						$config=array(
							'type'=>'text',
							'name'=>'kddept',
							'id'=>'kddept',
							'class'=>"text-short",
							'maxlength'=>10,
							'value'=>set_value('kddept')				
							);
						echo form_input($config);
					 ?>
					</td>
				</tr>
				<tr>
					<td>Nama Department</td>
					<td>:</td>
					<td>
					<?php
						$config=array(
							'type'=>'text',
							'name'=>'namadept',
							'id'=>'namadept',
							'class'=>"text-long",
							'value'=>set_value('namadept')				
							);
						echo form_input($config);
					 ?>
					 <label>(id)</label>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>:</td>
					<td>
					<?php
						$config=array(
							'type'=>'text',
							'name'=>'namadepten',
							'id'=>'namadepten',
							'class'=>"text-long",
							'value'=>set_value('namadepten')				
							);
						echo form_input($config);
					 ?>
					 <label>(en)</label>
					</td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
					<td>
						<select name="kategori" id="kategori" >
							<?php
							foreach($kategori as $data=>$item){
								?>
								<option value="<?php echo $data;?>" ><?php echo $item; ?></option>	
								<?php
							}
							?>
							
						</select>					 
					</td>
				</tr>
				<tr>
					<td>Nama Prodi</td>
					<td>:</td>
					<td>
					<?php
						$config=array(
							'type'=>'text',
							'name'=>'namaprod',
							'id'=>'namaprod',
							'class'=>"text-long",
							'value'=>set_value('namaprod')				
							);
						echo form_input($config);
					 ?>
					 <label>(id)</label>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>:</td>
					<td>
					<?php
						$config=array(
							'type'=>'text',
							'name'=>'namaproden',
							'id'=>'namaproden',
							'class'=>"text-long",
							'value'=>set_value('namaproden')				
							);
						echo form_input($config);
					 ?>
					 <label>(en)</label>
					</td>
				</tr>
				<tr>
					<td>Nama Kabag</td>
					<td>:</td>
					<td>
						<select name="namakabag" id="namakabag" style="width:300px;">
							<?php 
									foreach($listdosen as $data=>$item){
								?>
									<option value="<?php echo $item['NIK']; ?>" ><?php echo '[ '.$item['NIK'].' ]'.$item['NAMA']; ?></option>
								<?php
									}
								?>
						</select>
					</td>
				</tr>
				
			</table>
			<table width="100%">
				<tr>			
					<td align="center">
						<input type="hidden" id="mode" value="<?php echo set_value('mode');?>" name="mode" />
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
		<?php  echo form_close(); ?>
	</div>
	<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>
		<?php echo validation_errors(); ?>				
	</div>	
	<div id="content_table">
		<table id="common_table" class="dept" width="100%" >
			<thead>
				<th>KODE </th>
				<th>NAMA DEPARTEMEN(id)</th>				
				<th>KATEGORI</th>
				<th>NAMA PRODI(id)</th>				
				<th>NAMA KABAG</th>
				<th>&nbsp;</th>
			</thead>
			<?php
			$no=1;
			foreach($department as $data=>$item):
			?>
			<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >
				<td align="left"><?php echo $item['KD_DEPT'];?></td>
				<td align="left"><?php echo $item['NAMA_DEPT'];?></td>				
				<td ><?php if($item['IS_PRODI']==1){echo 'PRODI';}else{echo 'UMUM';}?></td>
				<td align="left"><?php echo $item['NAMA_PRODI'];?></td>				
				<td align="left"><?php echo $item['NAMA'];?></td>
				<td>
					<input type="button" onclick="edform('<?php echo $item['KD_DEPT'];?>','<?php echo $item['NAMA_DEPT'];?>','<?php echo $item['ENGLISH_NAME'];?>','<?php echo url_title($item['IS_PRODI']);?>','<?php echo url_title($item['NAMA_PRODI']);?>','<?php echo url_title($item['NAMA_PRODI_EN']);?>','<?php echo $item['NIK'];?>')" value="Ubah" />
					<input type="button" onclick="doconfirm('<?php echo $item['KD_DEPT'];?>','<?php echo $item['NAMA_DEPT'];?>')" value="Hapus" />
				</td>
			</tr>
			<?php
			$no++;
			endforeach; 
			?>
		</table>
	</div>	
</center>
