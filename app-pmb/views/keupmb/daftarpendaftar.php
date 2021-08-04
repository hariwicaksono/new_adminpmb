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
<div id="content_gel">
		<li><?php echo anchor('keupmb/datamhs/gel/','[Semua]');?></li>
	<?php
		foreach($glmb as $data){			
	?>
		<li><?php echo anchor('keupmb/datamhs/gel/'.$data['kode'],'['.$data['gelombang'].']');?></li>
	<?php
		}
	?>
</div>
<br />
</center>

<div id="content_table">
	<center>
		<div id="datapage" >
			<table width="100%">
				<thead>
					<th>NO</th>
					<th>NODAF</th>
					<th>NAMA</th>
					<th>NEM</th>
					<th>GELOMBANG</th>
					<th>PILIHAN 1</th>
					<th>PILIHAN 2</th>
					<th>PERSYARATAN</th>
					<th>TANGGAL DAFTAR</th>					
				</thead>			
			<?php
				$no=1;
				foreach($datamhs as $data){
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class=paging';} ?> >	
						<td ><?php echo $no++;?></td>
						<td align="center"><?php echo $data['nodaf'];?></td>
						<td ><?php echo anchor('keupmb/biodata/'.$data['nodaf'],$data['nama']);?></td>
						<td ><?php echo $data['nem'];?></td>
						<td ><?php echo $data['nama_gel'];?></td>
						<td ><?php echo $data['PIL1'];?></td>
						<td ><?php echo $data['PIL2'];?></td>
						<td ><?php echo $data['syarat1'];?></td>
						<td align="center"><?php echo $data['tgldaftar'];?></td>										
					</tr>				
					<?php
				}
			?>	
					
			</table>
			</div>
		<br /><br />
	<div id="datapagecounter">
		
	</div>
	</center>
</div>	