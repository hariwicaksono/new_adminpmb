<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
$(document).ready(function(){var container = $('div.container');var validator=$('#frmadduser').validate({rules:{loginname:{required:true},passkey:{required:true},grup: {required:true},klpstat:{required:true}},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});$("input[type=reset]").click(function() {validator.resetForm();});$('#loginname').validate({onchange:true});$('#passkey').validate({onchange:true});$('#grup').validate({onchange:true});$('#simpanu').click(function(){$.ajax ({type:'POST',data:({uprodi : $('#uprodi').val(),fakultas:$('#fakultas').val(),prodi:$('#prodi').val()}),url: "<?php echo site_url('aloader/paddprou')?>",beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success:function(msg){$("#content_table").html(msg);},error:function(){ alert('inputan masih salah'); location.reload();}});});
$(function(){$("#fakultas").change(function(){$.ajax ({url: "<?php echo site_url('cloader/getJurusan')?>" + "/" + $("#fakultas").val(),success: function(msg){$("#prodi").html(msg);}});});});});		
</script>
<h2>Tambah User Prodi</h2>
<br />
<div class="container">
<h4>Periksa kembali inputan anda</h4>
	<ol>					
		<li><label for="loginname" class="error">Nama User harus di isi</label></li>			
		<li><label for="passkey" class="error">Password harus di isi</label></li>													
		<li><label for="grup" class="error">Grup harus pilih sesuai aplikasi</label></li>
		<li><label for="klpstat" class="error">Status user harus di isi sesuai aplikasi</label></li>
	</ol>
</div>
<div id="content_form" style="width:400px;">
<?php  echo form_open('aloader/paddprou',array('id'=>'frmadduser')); ?>
<table width="100%">
	<tr>
		<td>User Prodi</td>
		<td>:</td>
		<td>
			<select id="uprodi" name="uprodi" >				
				<?php
					foreach($userprodi as $opdata=>$opitem){						
				?>
					<option value="<?php echo $opitem['NAMA'];?>" ><?php echo $opitem['NAMA'];?></option>
				<?php						
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>:</td>
		<td>
			<select id="fakultas" name="fakultas" style="width:300px;">
			<option value="">--Pilih Fakultas--</option>				
				<?php
					foreach($fakultas as $data=>$item){						
				?>
					<option value="<?php echo $item['KD_FAK'];?>" ><?php echo $item['NAMA_FAK'];?></option>
				<?php						
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Prodi</td>
		<td>:</td>
		<td>
			<select id="prodi" name="prodi" style="width:300px;">				
				<option value="">--Pilih Fakultas Dahulu--</option>
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
					'id'=>'simpanu',
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