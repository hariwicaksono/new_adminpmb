
<script type="text/javascript">
	$(function() {$("#nodaf1").val('NODAF1');$("#nodaf2").val('NODAF2');$('#nodaf1').focus(function(){$('#nodaf1').val('');});$('#nodaf2').focus(function() {$('#nodaf2').val('');});});					
</script>
<style>
blink {
	color :#670eed;
    -webkit-animation: 2s linear infinite condemned_blink_effect; // for android
    animation: 2s linear infinite condemned_blink_effect;
}
@-webkit-keyframes condemned_blink_effect { // for android
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}
@keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}
</style>

<center>	
	<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>
		<?php echo validation_errors().'<br /><br />'; ?>
	</div>	
	<div id="search_box">
		<label>Masukkan Nomor pendaftaran</label><br /><br />
		<?php //print_r($this->mhsbaru->genBiayaMhsBr('190354AO')) ?>
		<?php echo form_open('kelulusan');?>	
		<?php
			$data = array(
	              'name'        => 'nodaf1',
	              'id'          => 'nodaf1',
	              'value'       => '',
	              'maxlength'   => '20',
	              'size'        => '10',
				  'value'		=>set_value('nodaf1')              
	            );
			echo form_input($data);
			?>
			<label>s/d</label>
			<?php
			$data = array(
	              'name'        => 'nodaf2',
	              'id'          => 'nodaf2',
	              'value'       => '',
	              'maxlength'   => '20',
	              'size'        => '10',
				  'value'		=>set_value('nodaf2')              
	            );
			echo form_input($data);
			echo "<br /><br />";
			echo form_submit('tampikan','Tampilkan');
		?>
		<?php echo form_close();?>
	</div>
<?php echo form_open('luluskan',array('id'=>'pelulusan'));?>
<div id="content_table">
<?php if(!empty($cmhslulus)){ ?>	
	<div id="content_error">		
		<?php echo $message; ?>
	</div>	
	<table width="100%"  cellpadding="0" cellspacing="0" >
		<thead>
			<th width="5%">NO</th>
			<th width="10%">NODAF</th>
			<th width="25%">NAMA</th>
			<th width="20%">KET_LULUS</th>			
			<th width="10%">PILIHAN</th>			
			<th width="10%">BEASISWA</th>
			<th width="10%">SPI</th>
			<th width="10%">PENGAKUAN SKS</th>
			<th width="10%">PENGHASILAN ORANGTUA</th>
		</thead>
		<?php
		
			$i=0;
			foreach($cmhslulus as $data=>$item){
				if(!empty($item['npm'])) echo "<blink>Nodaf Sudah di Registrasi tidak dapat diedit !!!</blink>" ;	
				?>
				<tr <?php if((($i%2)==0)){ echo 'class="black"';} ?> <?php if($item['syarat1']!='Lengkap'){ ?> style="background-color:red;"  <?php }elseif($item['ket_lulus']=='Lulus'){?> style="background-color:#ad5bff;" <?php }elseif($item['ket_lulus']=='Tidak'){ ?> style="background-color:#320064;" <?php } ?> >
					<td><?php echo ($i+1);?></td>			
					<td>
					<?php 
						echo $item['nodaf'];
						echo form_hidden('nodaf['.$i.']',$item['nodaf']);
					?>
					</td>
					<td width="30%"><?php echo $item['nama'];?></td>
					<td width="20%">
						<select name="setlulus[<?php echo $i;?>]" <?php if($item['syarat1']!='Lengkap'){ ?> readonly <?php }else if (!empty($item['npm'])) { ?> readonly <?php }?>  >
							<option <?php if($item['ket_lulus']=='' || is_null($item['ket_lulus'])){?> selected="selected" <?php }?> value="NULL">--pilih--</option>
							<option <?php if($item['ket_lulus']=='Lulus'){?> selected="selected" <?php }?> value="Lulus">Lulus</option>
							<option <?php if($item['ket_lulus']=='Tidak'){?> selected="selected" <?php }?> value="Tidak">Tidak Lulus</option>							
						</select>
						<?php //echo $item['ket_lulus'];?>
					</td>
					<td>
						<select name="jurpil[<?php echo $i;?>]" <?php if($item['syarat1']!='Lengkap'){ ?> readonly <?php } if (!empty($item['npm'])) { ?> readonly <?php }?>>
						<?php
						if ($item['JUR_LULUS']==NULL){
						?>
							<option <?php if($item['pilihan1']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan1'] ?>"><?php echo $item['pil1'];?></option>
							<option <?php if($item['pilihan2']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan2'] ?>"><?php echo $item['pil2'];?></option>
							<option <?php if($item['pilihan3']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan3'] ?>"><?php echo $item['pil3'];?></option>
						<?
						}else{
						$dept=$this->db->query("select nama_dept from department where kd_dept='".$item['JUR_LULUS']."'")->row_array();
						?>
							<option selected="selected" value="<?php echo $item['JUR_LULUS'] ?>"><?php echo $dept['nama_dept'];?></option>
							<option <?php if($item['pilihan1']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan1'] ?>"><?php echo $item['pil1'];?></option>
							<option <?php if($item['pilihan2']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan2'] ?>"><?php echo $item['pil2'];?></option>
							<option <?php if($item['pilihan3']==$item['JUR_LULUS']){?> selected="selected" <?php }?> value="<?php echo $item['pilihan3'] ?>"><?php echo $item['pil3'];?></option>
						<?php
						}
						?>
							
						</select>						
					</td>					
					<td><input class="thebeasiswa" name="beasiswa[<?php echo $i;?>]" value="<?php echo $item['beasiswa'];?>" size="15" <?php if($item['syarat1']!='Lengkap'){ ?> readonly <?php } if (!empty($item['npm'])) { ?> readonly <?php }?> /></td>					
 	 			    <td><input class="SPI" name="SPI[<?php echo $i;?>]" value="<?php echo $item['SPI'];?>" size="15"  <?php if($item['syarat1']!='Lengkap'){ ?> disabled="true" <?php } if (!empty($item['npm'])) { ?> readonly <?php }?> /></td>	
   				    <td><input class="biaya_pengakuan_sks" name="biaya_pengakuan_sks[<?php echo $i;?>]" value="<?php echo $item['biaya_pengakuan_sks'];?>" size="15" <?php if($item['syarat1']!='Lengkap'){ ?> readonly <?php } if (!empty($item['npm'])) { ?> readonly <?php }?> /></td>	
					<td><input class="penghasilan_ortu" name="penghasilan_ortu[<?php echo $i;?>]" value="<?php echo $item['penghasilan_ortu'];?>" size="15" /></td>
					
				</tr>
				<?php
				$i++;
			}
			?>
			<tr>
				<td colspan="7" align="center" class="mybutton">
					&nbsp;
				</td>				
			</tr>
			<tr>
				<td colspan="7" align="center" class="mybutton">
					<?php 						
						echo form_submit('proses','Proses');						
				?>
				</td>				
			</tr>									
	</table>
	<?php
		}
	?>	
</div>
<?php echo form_close();?>
</center>