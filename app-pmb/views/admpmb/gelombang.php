<center>
<div id="content_error">
	<?php if(!empty($message)) echo $message; ?>
	<?php echo validation_errors(); ?>		
</div>
<div id="content_table">
	<table id="common_table" width="60%">
		<thead>
			<th>NO</th>
			<th>GELOMBANG</th>
			<th>TANGGAL MULAI</th>
			<th>TANGGAL SELESAI</th>
			<th>&nbsp;</th>			
		</thead>
		<?php
		$no=1;
		foreach($jadwal as $data){					
		?>
		<tr <?php if(($no%2)==1){ echo 'class=black';} ?>>
				<td><?php echo $no;?></td>
				<td><?php echo $data['gelombang'];?></td>
				<td><?php echo $data['tgl_mulai'];?></td>
				<td><?php echo $data['tgl_selesai'];?></td>
				<td>										
					<?php
						echo anchor('admpmb/setpmb/'.$data['kode'].'/'.url_title($data['gelombang']),'[Ubah]');																	
						echo anchor('admpmb/setpmb/hapus/'.$data['kode'].'/'.url_title($data['gelombang']),'[Hapus]');
					?>																									
				</td>
		</tr>
		<?php
			$no++;					
		}		
		?>
		<tr>
			<td colspan="5"><?php echo anchor('admpmb/setpmb/tambah','[Tambah]');?></td>
		</tr>
	</table>
</div>
<br /><br />
<div id="editgel">	
	<?php
		if(!empty($pageload)){
			$this->load->view($pageload);
		}
	?>
</div>
</center>
<br />