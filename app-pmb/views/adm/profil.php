<center>
<h2>PROFIL PT</h2>
<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>				
</div>
<div id="content_form" style="width:450px;">
	<?php echo form_open('adm/home');?>
	<table width="100%">
		<tr>
			<td>NAMA PT</td>
			<td>:</td>
			<td><input type="text" name="namapt" value="<?php echo $profil['NAMA']; ?>" class="text-long" /></td>
		</tr>
		<tr>
			<td>NIK REKTOR</td>
			<td>:</td>
			<td>
				<select name="nikrektor" style="width:300px;">
					<?php 
						foreach($listdosen as $data=>$item){
					?>
						<option value="<?php echo $item['NIK']; ?>" <?php if($item['NIK']==$profil['NIK_REKTOR']){ ?> selected="selected" <?php } ?> ><?php echo '[ '.$item['NIK'].' ] '.$item['NAMA']; ?></option>
					<?php
						}
					?>					
				</select>				
			</td>
		</tr>
		<tr>
			<td>ALAMAT PT</td>
			<td>:</td>
			<td><input type="text" name="alamatpt" value="<?php echo $profil['ALAMAT1']; ?>" class="text-long" /></td>
		</tr>
		<tr>
			<td>KOTA PT</td>
			<td>:</td>
			<td><input type="text" name="kotapt" value="<?php echo $profil['KOTA']; ?>" class="text-medium" /></td>
		</tr>
		<tr>
			<td>KODEPOS PT</td>
			<td>:</td>
			<td><input type="text" name="kodepospt" value="<?php echo $profil['KODE_POS']; ?>" class="text-short" /></td>
		</tr>
		<tr>
			<td>TELEPON PT</td>
			<td>:</td>
			<td>				
				<input type="text" name="teleponpt" value="<?php echo $profil['TELEPON']; ?>" class="text-long" />
			</td>
		</tr>		
	</table>
	<table width="100%">
			<tr>
				<td align="center" class="mybutton">
				<input type="hidden" name="kodeprofil" value="<?php echo $profil['KODE']; ?>"  />
				<?php 
					echo form_submit('simpan','Simpan');					
				?>
				</td>				
			</tr>
		</table>	
	<?php echo form_close();?>
</div>
</center>