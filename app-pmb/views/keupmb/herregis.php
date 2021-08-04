
<center>
	<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>
		<?php if(!empty($message)){ echo $message.'<br /><br />';} ?>
		<?php echo validation_errors().'<br /><br />'; ?>
	</div>
	<div id="search_box" >
		<label>Masukkan Nomor pendaftaran</label><br /><br />
		<?php echo form_open('keupmb/herregistrasi');?>	
		<?php
			$data = array(
	              'name'        => 'nodaf',
	              'id'          => 'nodaf',
	              'value'       => '',
	              'maxlength'   => '20',
	              'size'        => '10',
				  'value'		=>set_value('nodaf')              
	            );
			echo form_input($data);			
			echo "<br /><br />";
			echo form_submit('tampil','Tampilkan');
		?>
		<?php echo form_close();?>
	</div>	
</center>