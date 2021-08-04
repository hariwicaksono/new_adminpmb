<script type="text/javascript">
	$(document).ready(function(){$('#findby').change(function(){$('#labelnpm').text($('#findby').val());});$('#submitcari').click(function(){if($('#katakunci').val()==''){alert('Kata kunci pencarian masih kosong');return false;}var form_data={findby: $('#findby').val(),katakunci: $('#katakunci').val(),ajax: '1'};$.ajax({url: "<?php echo site_url('aloader/listaccount'); ?>",type: 'POST',data: form_data,beforeSend:function(){$('#content_table').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');},success: function(msg) {$('#content_table').html(msg);},error:function(){alert('Data yang anda cari tidak ada');location.reload();}});return false;});});
</script>
<center>
	<h3>LIHAT NPM DAN PASSWORD MHS</h3>
	<div id="content_form" style="width:300px;">
		<?php echo form_open('adm/cariakses');?>
		<table width="100%">
			<tr>
				<td>
					<b><label id="labelnpm" >NPM</label></b>					
				</td>
				<td>:</td>
				<td>
					<select name="findby" id="findby" >
						<option value="NPM" >NPM</option>
						<option value="NAMA" >NAMA</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>KATA KUNCI</b></td>
				<td>:</td>
				<td><input type="text" name="katakunci" id="katakunci" /></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td align="center" ><?php echo form_input(array('id'=>'submitcari','name'=>'submit','type'=>'submit','value'=>'Tampilkan')); ?></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
	</div>
	
	<div id="content_table">
		
	</div>
</center>