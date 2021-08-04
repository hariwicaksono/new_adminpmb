<script type="text/javascript">
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 50, showcounter: true, pager : $("#datapagecounter") });});
</script>

<center>
<div id="content_gel">
<ul class="nav nav-pills nav-fill" id="tabs" >
		<li class="nav-item"><?php echo anchor('datamhs','Semua','class="nav-link "');?></li>
	<?php
		foreach($glmb as $data){			
	?>
		<li class="nav-item"><?php echo anchor('datamhs/gel/'.$data['kode'],''.$data['gelombang'].'','class="nav-link "');?></li>
	<?php
		}
	?>
	</ul>
</div>
<br />
<div class="row">
<div class="col-md-4 mr-auto">
	<?php echo form_open('datamhs');?>
	<div class="form-group mb-2">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="katakunci" name="katakunci" id="katakunci">
			<button class="btn btn-secondary" type="submit"><i class="feather icon-search"></i> Cari</button>
		</div>
	</div>
	<?php echo form_close();?>
	</div>
	<div class="col-md-8">

	</div>
	
</div>
<div id="content_error" style="color:red;margin-top:0;margin-bottom:0">
	<?php echo validation_errors(); ?>
</div>

</center>

<div id="content_table">
	<center>
		<div id="datapage" class="table-responsive">
			<table class="table table-xs table-striped table-bordered nowrap" width="100%">
				<thead>
					<th>NO</th>
					<th>NODAF</th>
					<th>NAMA</th>
					<th>NEM</th>
					<th>GEL</th>
					<th>PIL 1</th>
					<th>PIL 2</th>
					<th>PIL 3</th>
					<th>SYARAT</th>
					<th>TGL DAFTAR</th>
					<th>STATUS REGISTRASI</th>
					<th>KETERANGAN</th>
					<th></th>
				</thead>	
				<tbody>		
			<?php
				$no=1;
				foreach($datamhs as $data){
				$ol=substr($data['nodaf'],-2);
					if ($ol=='AO' or ($ol=='OL' and $data['syarat2']=='Sudah')){ 
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class=paging';} ?> >	
						<td ><?php echo $no++;?></td>
						<td align="center">
						<?php if ($ol=='OL' and $data['TGL_TES']=='') { ?>
							<font color="red"><?=$data['nodaf']?></font>
						<?php } else { echo $data['nodaf']; } ?></td>
						<td ><?php echo anchor('biodata/'.$data['nodaf'],$data['nama']);?></td>
						<td ><?php echo $data['nem'];?></td>
						<td ><?php echo $data['nama_gel'];?></td>
						<td ><?php echo $data['PIL1'];?></td>
						<td ><?php echo $data['PIL2'];?></td>
						<td ><?php echo $data['PIL3'];?></td>
						<td ><?php echo $data['syarat1'];?></td>
						<td align="center"><?php echo $data['tgldaftar'];?></td>
						<td><?php if(!empty($data['NPM'])) echo "<font color=green>Registrasi</font>"; else echo "<font color=red>Belum</font>";
								?></td>
						<td><?=$data['status_registrasi']?></td>
						<td align="center"><?php if(empty($data['NPM'])) echo anchor('mhsbaru/'.$data['nodaf'],'[Ubah]');?></td>
						
					</tr>				
					<?php
					}//ol
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

<script>
$(function($) {
  let url = window.location.href;
  $('#tabs li a.nav-link').each(function() {
    if (this.href === url) {
      $(this).closest('li a.nav-link').addClass('active');
    }
  });
});
</script>