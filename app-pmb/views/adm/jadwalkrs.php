<script type="text/javascript">
	$(function(){$("#fakultas").change(function(){$("#jurusan").attr('disabled',false);$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fakultas").val(),success: function(msg){$("#jurusan").html(msg);}});});});	
	function generate(param){$.ajax({url: "<?php echo site_url('welcome/genjadwalkrs'); ?>/"+param,beforeSend:function(){$('#content_table').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');},success: function(msg) {$('#content_table').html(msg);}});}	
	$(document).ready(function(){$('#submitcari').click(function(){var name = $('#jurusan').val();if (!name || name == 'Name' || name=='') {alert('Pilih jurusan dahulu');return false;}var form_data={jurusan: $('#jurusan').val(),ajax: '1'};$.ajax({url: "<?php echo site_url('welcome/tglkrs'); ?>",type: 'POST',data: form_data,beforeSend:function(){$('#content_table').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');},success: function(msg) {$('#content_table').html(msg);}});return false;});});
</script>
<center>
<div id="content_form" style="width:350px;">
	<?php echo form_open('#',array('id'=>'frmjadwal'));?>
	<table width="100%">
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td>
				<select name="fakultas" id="fakultas" >
					<option value="">--Pilih Fakultas--</option>
					<?php
					foreach($fakultas as $data=>$item){						
						?>
						<option value="<?php echo $item['KD_FAK']; ?>" ><?php echo $item['NAMA_FAK']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td>
				<select name="jurusan" id="jurusan" disabled="true" >
					<option value="">--Pilih Fakultas Dahulu--</option>
				</select>
			</td>
		</tr>		
	</table>
	<table width="100%">
		<tr>
			<td align="center" class="mybutton">				
				<?php 
					echo form_input(array('id'=>'submitcari','name'=>'submit','type'=>'submit','value'=>'Tampilkan'));					
				?>
			</td>
		</tr>
	</table>
	<?php echo form_close();?>
</div>
<div id="content_table">
	
</div>
</center>