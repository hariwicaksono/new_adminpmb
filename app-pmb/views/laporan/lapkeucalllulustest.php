<script type="text/javascript">
		$(function(){$("#datapageing .paging").quickpaginate({ perpage: 30, showcounter: true, pager : $("#datapagecounter") });});
</script>
<div id="content_table">
	<div id="datapageing" >
		<table width="100%">
			<thead>
				<th>NO</th>
				<th>NODAF</th>
				<th>NAMA</th>					
				<th>GELOMBANG</th>
				<th>JURUSAN LULUS</th>										
				<th>TANGGAL TEST</th>
				<th></th>
			</thead>			
			<?php
				$no=1;
				foreach($datamhs as $data){
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{ echo 'class="paging"';} ?> >	
						<td ><?php echo $no++;?></td>
						<td align="center"><?php echo $data['nodaf'];?></td>
						<td ><?php echo anchor('keupmb/biodata/'.$data['nodaf'],$data['nama']);?></td>						
						<td ><?php echo $data['nama_gel'];?></td>
						<td ><?php echo $data['JURUSAN_LULUS'];?></td>												
						<td align="center"><?php echo $data['TANGGAL_TEST'];?></td>				
						<td align="center"><?php if(empty($data['NPM'])) echo anchor('mhsbaru/'.$data['nodaf'],'[Ubah]');?></td>
					</tr>				
					<?php
				}
			?>	
			
		</table>
		<br /><br />
		<div id="datapagecounter">
			
		</div>
	</div>
</div>