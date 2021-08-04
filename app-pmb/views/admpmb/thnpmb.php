<center>	
	<div>
		<label>Tahun PMB aktif saat ini</label><br /><br />		
		<div id="content_error">
			<label><b>[<?php echo $tahunpmb;?>]</b></label><br /><br />
			<?php if(!empty($message)) echo $message; ?>			
		</div>
		<?php echo form_open('admpmb/thn');?>
		<select name="tahunpmb">
			<?php foreach($listtahun as $data=>$item){ ?>
			<option <?php if($item['THN_AKADEMIK']==$tahunpmb){?> selected="selected" <?php } ?> value="<?php echo $item['THN_AKADEMIK'];?>" > <?php echo $item['THN_AKADEMIK']; ?></option>
			<?php } ?>
		</select>		
		<br /><br />
		<?php echo form_submit('aktifkan','Ubah Tahun PMB Aktif');?>
		<br />
		<?php echo form_close();?>
	</div>
</center>