<script>
	$(function() {$( "#tglmulai" ).datepicker({dateFormat:'dd-mm-yy'});$( "#tglselesai" ).datepicker({dateFormat:'dd-mm-yy'});});
</script>
<?php
if(isset($admode) && $admode=='tambah'){
		?>		
<label><b>Tambah Gelombang</b></label><br />
<?php
	echo form_open('admpmb/tambahgel');
?>
<div id="content_table">	
<table id="common_table" width="70%" border=1>
		<thead>
			<th>NAMA GELOMBANG</th>
			<th>TANGGAL MULAI</th>
			<th>TANGGA SELESAI</th>
			<th>&nbsp;</th>
		</thead>
		<tr>			
			<td><?php echo form_input(array('name'=>'nama'));?></td>
			<td>
				<?php
				$conf=array(
					'id'=>'tglmulai',
					'name'=>'tglmulai',
					'value'=>date('d-m-Y')					
				);
				echo form_input($conf);
				?>
			</td>
			<td>
				<?php
				$conf=array(
					'id'=>'tglselesai',
					'name'=>'tglselesai',
					'value'=>date('d-m-Y')					
				);
				echo form_input($conf);
				?>
			</td>
			<td>
				<?php								
				echo form_submit('submit','[Tambah]');
				?>
			</td>
		</tr>
</table>
</div>
		
<?php
	echo form_close();

}elseif(isset($admode) && $admode=='hapus'){
?>
	<label><b><?php echo 'Yakin akan menghapus '.$namegel;?></b></label><br /><br />
		<?php
			echo form_open('admpmb/hapusgel');
		?>
		<div id="content_table">	
		<table id="common_table" width="70%" border=1>
				<thead>
					<th>NAMA GELOMBANG</th>
					<th>TANGGAL MULAI</th>
					<th>TANGGA SELESAI</th>
					<th>&nbsp;</th>
				</thead>
				<tr>			
					<td><?php
						$conf=array(
							'id'=>'nama',
							'name'=>'nama',
							'value'=>$jadwaled['gelombang'],
							'readonly'=>'readonly'
						);
						echo form_input($conf); 				
					?></td>
					<td>
						<?php
						$conf=array(
							'id'=>'tglmulai',
							'name'=>'tglmulai',
							'value'=>$jadwaled['tgl_mulai'],
							'disabled'=>TRUE
						);
						echo form_input($conf);
						?>
					</td>
					<td>
						<?php
						$conf=array(
							'id'=>'tglselesai',
							'name'=>'tglselesai',
							'value'=>$jadwaled['tgl_selesai'],
							'disabled'=>TRUE
						);
						echo form_input($conf);
						?>
					</td>
					<td>
						<?php
						echo form_hidden('kode',$jadwaled['kode']);				
						echo form_submit('submit','[Hapus]');
						?>
					</td>
				</tr>
		</table>
		</div>
<?php
	echo form_close();
		
	}else{
?>
<label><b><?php echo $namegel;?></b></label><br />
<?php
	echo form_open('admpmb/editgel');
?>
<div id="content_table">	
<table id="common_table" width="70%" border=1>
		<thead>
			<th>NAMA GELOMBANG</th>
			<th>TANGGAL MULAI</th>
			<th>TANGGA SELESAI</th>
			<th>&nbsp;</th>
		</thead>
		<tr>			
			<td><?php
				$conf=array(
					'id'=>'nama',
					'name'=>'nama',
					'value'=>$jadwaled['gelombang']
				);
				echo form_input($conf); 				
			?></td>
			<td>
				<?php
				$conf=array(
					'id'=>'tglmulai',
					'name'=>'tglmulai',
					'value'=>$jadwaled['tgl_mulai']
				);
				echo form_input($conf);
				?>
			</td>
			<td>
				<?php
				$conf=array(
					'id'=>'tglselesai',
					'name'=>'tglselesai',
					'value'=>$jadwaled['tgl_selesai']
				);
				echo form_input($conf);
				?>
			</td>
			<td>
				<?php
				echo form_hidden('kode',$jadwaled['kode']);				
				echo form_submit('submit','[Ubah]');
				?>
			</td>
		</tr>
</table>
</div>
<?php
	echo form_close();	
	}
?>
