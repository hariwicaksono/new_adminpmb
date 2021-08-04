<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
	function edform(param1,param2,param3){$('#kdfak').val(param1);$('#kdfak').attr('readonly','readonly');$('#namafak').val(param2);$('#namadek').val(param3);$('#mode').val('edit');}	
	function doconfirm(param1,param2){if(confirm('Yakin menghapus Fakultas '+param2+' ? ')){$.ajax({url: "<?php echo site_url('aloader/delfakultas') ?>/"+param1+"/"+param2,success: function(data) {location.reload();}});}}	
	$(document).ready(function(){$('#reset').click(function(){$('#kdfak').val('');$('#kdfak').removeAttr('readonly');$('#namafak').val('');$('#namadek').val('');$('#mode').val('');});});	
	$(document).ready(function(){var container = $('div.container');var validator=$('#frmfak').validate({rules:{kdfak:{required:true,number:true},namafak:{required:true}},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});$("input[type=reset]").click(function() {validator.resetForm();});});
</script>
<center>
	<h2>MANAGE FAKULTAS</h2>
	<br />
	<div class="container">
	<h4>Periksa kembali inputan anda</h4>
		<ol>					
			<li><label for="kdfak" class="error">Kode Fakultas harus di isi dan berupa angka</label></li>			
			<li><label for="namafak" class="error">Nama Fakultas harus di isi</label></li>													
		</ol>
	</div>
	<div id="content_form" style="width:450px;">
	<?php  echo form_open('adm/opfakultas',array('id'=>'frmfak')); ?>
	<table width="100%">
		<tr>
			<td>Kode Fakultas</td>
			<td>:</td>
			<td>
			<?php
				$config=array(
					'type'=>'text',
					'name'=>'kdfak',
					'id'=>'kdfak',
					'class'=>"text-short",
					'value'=>set_value('kdfak')				
					);
				echo form_input($config);
			 ?>
			</td>
		</tr>
		<tr>
			<td>Nama Fakultas</td>
			<td>:</td>
			<td>
			<?php
				$config=array(
					'type'=>'text',
					'name'=>'namafak',
					'id'=>'namafak',
					'class'=>"text-long",
					'value'=>set_value('namafak')				
					);
				echo form_input($config);
			 ?>
			</td>
		</tr>
		<tr>
			<td>Nama Dekan</td>
			<td>:</td>
			<td>
				<select name="namadek" id="namadek" style="width:300px;">
					<?php 
							foreach($listdosen as $data=>$item){
						?>
							<option value="<?php echo $item['NIK']; ?>" ><?php echo '[ '.$item['NIK'].' ] '.$item['NAMA']; ?></option>
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
	<?php  echo form_close(); ?>
	</div>
	<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>
		<?php echo validation_errors(); ?>				
	</div>
	<div id="content_table">
		<table id="common_table" width="70%" >
			<thead>
				<th>KODE FAKULTAS</th>
				<th>NAMA FAKULTAS</th>
				<th>NAMA DEKAN</th>
				<th>&nbsp;</th>
			</thead>
			<?php
			$no=1;
			foreach($fakultas as $data=>$item):
			?>
			<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >
				<td><?php echo $item['KD_FAK'];?></td>
				<td align="left"><?php echo $item['NAMA_FAK'];?></td>
				<td align="left"><?php echo $item['NAMA'];?></td>
				<td>
					<input type="button" onclick="edform('<?php echo $item['KD_FAK'];?>','<?php echo url_title($item['NAMA_FAK']);?>','<?php echo $item['NIK_DEKAN'];?>')" value="Ubah" />
					<input type="button" onclick="doconfirm('<?php echo $item['KD_FAK'];?>','<?php echo url_title($item['NAMA_FAK']);?>')" value="Hapus" />
				</td>
			</tr>
			<?php
			$no++;
			endforeach; 
			?>
		</table>
	</div>
</center>