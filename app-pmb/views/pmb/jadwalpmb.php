<center>
<div id="content_table">
	<table id="common_table" width="60%">
		<thead>
			<th>KODE</th>
			<th>GELOMBANG</th>
			<th>TANGGAL MULAI</th>
			<th>TANGGAL SELESAI</th>			
		</thead>
		<?php
		$no=1;
		foreach($jadwal as $data){		
					
		?>
		<tr <?php if(($no%2)==0){ echo 'class=black';} ?>>
				<td><?php echo $no;?></td>
				<td><?php echo $data['gelombang'];?></td>
				<td><?php echo $data['tgl_mulai'];?></td>
				<td><?php echo $data['tgl_selesai'];?></td>
		</tr>
		<?php
		$no++;			
		}
		?>
	</table>
</div>
</center>
<br />