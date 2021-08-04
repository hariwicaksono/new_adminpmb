<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style/val.css" />
<script type="text/javascript">
	$(document).ready(function(){var container = $('div.container');var validator=$('#frmadduser').validate({rules:{loginname:{required:true},oldpasskey:{required:true},newpasskey: {required:true}},errorContainer: container,errorLabelContainer: $("ol", container),wrapper: 'li'});$("input[type=reset]").click(function() {validator.resetForm();});$('#loginname').validate({onchange:true});$('#oldpasskey').validate({onchange:true});$('#newpasskey').validate({onchange:true});$('#simpanu').click(function(){$.ajax ({type:'POST',data:({loginname : $('#loginname').val(),oldpasskey:$('#oldpasskey').val(),newpasskey:$('#newpasskey').val()}),url: "<?php echo site_url('aloader/pfchpp')?>",beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success:function(msg){$("#content_table").html(msg);},error:function(){ alert('inputan masih salah'); location.reload();}});});});		
	function cekpassword(param){var pass=/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/; var nl=$(param).val(); if(!pass.test(nl)){alert('Password minimal terdiri dari satu huruf besar, huruf kecil dan angka, dengan panjang kombinasi minimal 6 karakter'); $(param).val(''); $(param).focus(); $(param).css('border-color','red'); $('#simpanu').attr('disabled',true); } else {$(param).css('border-color','#d3d3d3'); $('#simpanu').removeAttr('disabled');} }function cekpassword(param){var pass=/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/; var nl=$(param).val(); if(!pass.test(nl)){alert('Password minimal terdiri dari satu huruf besar, huruf kecil dan angka, dengan panjang kombinasi minimal 6 karakter'); $(param).val(''); $(param).focus(); $(param).css('border-color','red'); $('#simpanu').attr('disabled',true); } else {$(param).css('border-color','#d3d3d3'); $('#simpanu').removeAttr('disabled');} }
</script>
<h2>Ganti Password User</h2>
<br />
<div class="container">
<h4>Periksa kembali inputan anda</h4>
	<ol>					
		<li><label for="loginname" class="error">Nama User harus di isi</label></li>			
		<li><label for="oldpasskey" class="error">Password Lama harus di isi</label></li>													
		<li><label for="newpasskey" class="error">Password Baru harus di isi</label></li>		
	</ol>
</div>
<div id="content_form" style="width:450px;">
<?php  echo form_open('aloader/pfchpp',array('id'=>'frmadduser')); ?>
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
				'class'=>"text-medium",
				'value'=>$nama,
				'readonly'=>'readonly'			
				);
			echo form_input($config);
		 ?>
		</td>
	</tr>
	<tr>
		<td>Password Lama</td>
		<td>:</td>
		<td>
		<?php
			$config=array(
				'type'=>'text',
				'name'=>'oldpasskey',
				'id'=>'oldpasskey',
				'class'=>"text-medium"			
				);
			echo form_password($config);
		 ?>
		</td>
	</tr>
	<tr>
		<td>Password Baru</td>
		<td>:</td>
		<td>
		<?php
			$config=array(
				'type'=>'text',
				'name'=>'newpasskey',
				'id'=>'newpasskey',
				'class'=>"text-medium",
				'onBlur'=>"cekpassword('#newpasskey')"
				);
			echo form_password($config);
		 ?>
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