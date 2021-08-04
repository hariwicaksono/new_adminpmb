<center>
<div id="content_error">
		<?php if(!empty($message)) echo $message; ?>
		<?php echo validation_errors(); ?>		
</div>
<br /><br />
<?php
if(empty($namagel)){
	?>
	<font color="red">Silakan tambahkan gelombang terlebih dahulu</font>
	<?php
}else{
?>
<div id="content_table">	
<table id="common_table" width="70%" border=0>
	<thead>
		<th>NAMA PRODI</th>
		<?php
			foreach($namagel as $data=>$item){
		?>
			<th><?php echo $item['gelombang'];?></th>	
		<?php
			} 
		?>
				
	</thead>
	<?php
		$no=1;
		foreach($showbiaya as $data=>$item){	
		++$no;				
	?>
	<tr <?php if(($no%2)==0){ echo 'class=black';} ?> >
		<td align="left"><?php echo $item['nama']; ?></td>
		<?php
			foreach($item['biaya'] as $biaya){
		?>			
		<td><?php echo $biaya;?></td>		
		<?php			
			}
		?>		
	</tr>
	<?php
		}
	?>
	<tr class='black'>
		<td>&nbsp;</td>
		<?php
			foreach($namagel as $data=>$item){
		?>
			<td><?php echo anchor('admpmb/sarana/'.$item['kode'].'/edit/'.$item['gelombang'],'[Edit]');?></td>	
		<?php
			} 
		?>
				
	</tr>
</table>
</div>
<br /><br /><br />
<?php	
	if(!empty($pageload)){		
			$this->load->view($pageload);
	}
?>
<?php
}
?>
</center>