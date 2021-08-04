<script type="text/javascript">
		$(function(){$("#datapageing .paging").quickpaginate({ perpage: 30, showcounter: true, pager : $("#datapagecounter") });});
	</script>
	<div id="content_table">
	<div id="datapageing" >
	<?=$kriteria?>
	<table width="100%">
		<thead>
			<th>NO</th>
			<th>NODAF</th>
			<th>NAMA</th>
			<th>NEM</th>
			<th>GELOMBANG</th>
			<th>PIL 1</th>
			<th>PIL 2</th>
			<th>PIL 3</th>
			<th>PERSYARATAN</th>
			<th>TANGGAL DAFTAR</th>
			<th></th>
		</thead>			
	<?php
		$no=1;
		foreach($datamhs as $data){
		$ol=substr($data['nodaf'],-2);
			if ($ol=='AO' or ($ol=='OL' and $data['syarat2']=='Sudah')){ 
			?>				
			<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class="paging"';} ?> >	
				<td ><?php echo $no++;?></td>
				<td align="center">
						<?php if ($ol=='OL' and $data['TGL_TES']=='') { ?>
							<font color="red"><?=$data['nodaf']?></font>
						<?php } else { echo $data['nodaf']; } ?>
				</td>
				<td ><?php echo anchor('biodata/'.$data['nodaf'],$data['nama']);?></td>
				<td ><?php echo $data['nem'];?></td>
				<td ><?php echo $data['nama_gel'];?></td>
				<td ><?php echo $data['PIL1'];?></td>
				<td ><?php echo $data['PIL2'];?></td>
				<td ><?php echo $data['PIL3'];?></td>
				<td ><?php echo $data['syarat1'];?></td>
				<td align="center"><?php echo $data['tgldaftar'];?></td>				
				<td align="center"><?php echo anchor('mhsbaru/'.$data['nodaf'],'[Ubah]');?></td>
			</tr>				
			<?php
			}//ol
		}
	?>					
	</table>
	</div>	
<br /><br />
<div id="datapagecounter">
	
</div>
</div>