<script type="text/javascript">
	$(function(){
		$("#datapage .paging").quickpaginate({ perpage: 50, showcounter: true, pager : $("#datapagecounter") });
	});
</script>
<br />
<center>
<div id="search_box">
	<?php echo form_open('datamhs');?>
	<?php
		$data = array(
              'name'        => 'katakunci',
              'id'          => 'katakunci',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '30'              
            );
		echo form_input($data);
		echo form_submit('cari','Cari');
	?>
	<?php echo form_close();?>
</div>
<div id="content_error">
	<?php echo validation_errors(); ?>
</div>
<br />
</center>

<div id="content_table">
	<center>
		<div id="datapage" >
			<table width="100%">
				<thead>
					<th>NO</th>
					<th>NAMA</th>
					<th>NO. TELP/HP</th>
					<th>EMAIL</th>
					<th>USERNAME</>
					<th>PASSWORD</th>
					<th>BUKTI PEMBAYARAN</th>
					<th>KETERANGAN</th>
				</thead>			
				<tbody>
					<?php
						$no=1;
						foreach ($calonmhs->result_array() as $mhs) { ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$mhs['nama']?></td>
								<td><?=$mhs['telp']?></td>
								<td><?=$mhs['email']?></td>
								<td><?=$mhs['username']?></td>
								<td><?=$mhs['password']?></td>
								<td align="center"><a href="">Detail</a></td>
								<td><?php if ($mhs['aktivasi']==0) echo 'Diajukan'; else if($mhs['aktivasi']==1) echo 'Lunas';
											else if($mhs['aktivasi']==2) echo 'Ditolak';?></td>
							</tr>
					<?php
					$no++;
						}
					?>
				</tbody>
					
			</table>
			</div>
		<br /><br />
	<div id="datapagecounter">
		
	</div>
	</center>
</div>	