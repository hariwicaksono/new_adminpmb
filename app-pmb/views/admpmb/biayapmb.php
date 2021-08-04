
<center>
	<div id="content_error">
		<?php if(!empty($message)) echo $message; ?>
		<?php echo validation_errors(); ?>		
	</div>
	<div id="content_table">
		<?php echo form_open('admpmb/biayadaftar',array('id'=>"inputform"));?>
		<table>
			<thead>
				<th>GELOMBANG</th>
				<th>BIAYA PENDAFTARAN</th>
				<th>BIAYA PENDUKUNG</th>				
			</thead>
			<?php
				$i=1;
				foreach($biayadaftar as $data=>$item){
				++$i;				
			?>
				<tr <?php if(($i%2)==0){ echo 'class=black';} ?> >
					<td>
						<?php echo $item['NAMA'];?>
						<input type="hidden" name="idtoproc[]" value="<?php echo $item['ID_JENISMHS'];?>" />
					</td>
					<td>						
						<?php 							
							$conf=array(								
								'name'=>'biayadaftar[]',
								'value'=>$item['BIAYA_DAFTAR']
							);
							echo form_input($conf);						
						?>						
					</td>
					<td>
						<?php 							
							$conf=array(								
								'name'=>'biayadukung[]',
								'value'=>$item['BIAYA_PENDUKUNG']
							);
							echo form_input($conf);	
						?>
					</td>					
				</tr>
			<?php				
				}
			?>
			<tr>
				<td colspan="3" align="center"><?php echo form_submit('proses','Proses'); ?></td>								
			</tr>
		</table>
		<?php echo form_close();?>
	</div>	
</center>
