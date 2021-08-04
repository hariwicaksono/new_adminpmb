<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
	$(document).ready(function(){var container = $('div.container');var validator=$('#frmadduser').validate({rules:{loginname:{required:true},passkey:{required:true},grup: {required:true},klpstat:{required:true}},	errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});$("input[type=reset]").click(function() {validator.resetForm();});$('#loginname').validate({onchange:true});$('#passkey').validate({onchange:true});$('#grup').validate({onchange:true});$('#simpanu').click(function(){$.ajax ({type:'POST',data:({loginname : $('#loginname').val(),passkey:$('#passkey').val(),grup:$('#grup').val(),klpstat:$('#klpstat').val()}),url: "<?php echo site_url('aloader/pfaddprevac')?>",beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success:function(msg){$("#content_table").html(msg);},error:function(){ alert('inputan masih salah'); location.reload();}});});});		
	function cekpassword(param){var pass=/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/; var nl=$(param).val(); if(!pass.test(nl)){alert('Password minimal terdiri dari satu huruf besar, huruf kecil dan angka, dengan panjang kombinasi minimal 6 karakter'); $(param).val(''); $(param).focus(); $(param).css('border-color','red'); $('#simpanu').attr('disabled',true); } else {$(param).css('border-color','#d3d3d3');$('#simpanu').removeAttr('disabled');} }
</script>
<h2>Tambah User</h2>
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
<div id="content_form" style="width:450px;">
<?php  echo form_open('aloader/pfaddprevac',array('id'=>'frmadduser')); ?>
<table width="100%">
	<tr>
		<td>Nama User</td>
		<td>:</td>
		<td>
		<?php
			$config=array(
				'type'=>'text',
				'name'=>'loginname',
				'id'=>'loginname',
				'class'=>"text-medium"			
				);
			echo form_input($config);
		 ?>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td>
		<?php
			$config=array(
				'type'=>'text',
				'name'=>'passkey',
				'id'=>'passkey',
				'class'=>"text-medium",
				'onBlur'=>"cekpassword('#passkey')"
				);
			echo form_password($config);
		 ?>
		</td>
	</tr>
	<tr>
		<td>Kelompok Aplikasi</td>
		<td>:</td>
		<td>
			<select id="grup" name="grup" >
				<option value="">--Pilih Group/Role--</option>
				<?php
					foreach($roledb as $opdata=>$opitem){
						if(substr($opitem['RoleName'],0,3)!="db_"){
							if($opitem['RoleName']!="public"){
				?>
					<option value="<?php echo $opitem['RoleName'];?>" ><?php echo $opitem['RoleName'];?></option>
				<?php
							}
						}
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>:</td>
		<td>
			<select name="klpstat" id="klpstat">
					<option value="2">CS PMB</option>
					<option value="3">CS Keuangan PMB</option>
					<option value="1">Admin PMB</option>
					<option value="10">Admin Akademik(Web)</option>
					<option value="4">Admin Prodi</option>
					<option selected="selected" value="0">Aplikasi Umum</option>
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