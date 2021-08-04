<style type="text/css">
#listit{
	margin:0px auto;
	width:500px;
	background-color:#FFF;
	max-height:400px;
	overflow-y:scroll;		
}
#listit th{
	background-color:#808080;
	color:#FFF;
	font-size:12px;
}
#listit td{
	background-color:#e9e9e9;	
	font-size:12px;
}
#btnbox{
	margin-top:5px;
}	
</style>

<center><h3>MK SYARAT SKRIPSI</h3></center>
<?php echo form_open('aloader/setskripsi',array('id'=>'formdo'));?>
<input type="hidden" id="myjur" name="kdjur" value="<?php echo $kodejur; ?>" />
<div id="listit">
<table width="100%">
	<thead><th>Kode MK</th><th>NAMA MK</th><th>Min. Nilai</th><th>Pilih</th></thead>
	<tbody>
	<?php
	$i=0;
	$chek=0; 
	foreach($daftarmk as $data=>$item){
	?>
	<tr>
		<td><?php echo $item['KODE']; ?><input type="hidden" name="kode[<?php echo $i ?>]" value="<?php echo trim($item['KODE']); ?>" /></td>
		<td><?php echo $item['MKL']; ?></td>
		<td>
			<select name="nilai[<?php echo $i ?>]" >
				<?php 
				$chek=0;
				foreach($daftarnilai as $data=>$sim){					
					?>					
						<option value="<?php echo $sim['NILAI_HURUF']; ?>"
						<?php						 
							foreach($adanilai as $ko=>$key){ ?> 
							<?php if((trim($item['KODE'])==trim($key['KODE_MK'])) && ($sim['NILAI_HURUF']==$key['MIN_NILAI'])){echo "selected='selected'";$chek=1;} ?>
						<?php } ?>
						><?php echo $sim['NILAI_HURUF']; ?></option>
					<?php
					
				} 
				?>
			</select>
		</td>
		<td><input type="checkbox" name="status[<?php echo $i ?>]" value="<?php echo $chek;?>" <?php if($chek==1){ echo 'checked="checked"';} ?>   /></td>
	</tr>				
	<?php
	$chek=0;
	$i++;
	}
	?>
	</tbody>			
</table>
<br />
</div>
<div id="btnbox">
<center>
<input type="submit" id="kirimdata" name="tombol" value="Simpan" />
</center>
<?php echo form_close(); ?>
</div>