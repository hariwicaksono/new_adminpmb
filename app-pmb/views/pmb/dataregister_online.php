<script type="text/javascript">
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 500, showcounter: true, pager : $("#datapagecounter") });});
</script>

<h2><?=$content_title?></h2>

<div class="row">
	<div class="col-md-6">
		<div id="search_box">
		<?php echo form_open('dataregister_online');?>
		<div class="form-group mb-2">
		<div class="input-group">
			<input type="text" class="form-control form-control-sm" placeholder="katakunci" name="katakunci" id="katakunci">
			<button class="btn btn-secondary" type="submit"><i class="feather icon-search"></i> Cari</button>
		</div>
	</div>
		<?php echo form_close();?>
	</div>
</div>
<div class="col-md-6">
<a class="btn btn-success btn-md float-end" href="<?=site_url()?>/cloader/excelAkun?act=none&id=0"><b><i class="fas fa-file-excel"></i> Simpan Excel</b></a>
</div>
</div>

<div id="content_error" style="color: red">
	<?php echo validation_errors(); ?>
</div>

<div id="content_table">
	<center>
		<div id="datapage" class="table-responsive">
		<table class="table table-xs table-striped table-bordered nowrap" width="100%">
				<thead>
					<th align="center">NO</th>
					<th>NAMA</th>
					<th>USERNAME/PASSWORD</th>
					<th>NO.HP</th>
					<th>EMAIL</th>
					<th>TANGGAL</th>	
					<th>DETAIL</th>
				</thead>			
			<?php
				$no=1;
				foreach($datamhs as $data){
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class=paging';} ?> >	
						<td align="center"><?php echo $no++;?></td>
						<td><?php echo $data['nama'];?></td>
						<td>Username: <?php echo $data['username'];?><br/>Password: <?php echo $data['password'];?></td>
						<td><?php echo $data['telp'];?></td>
						<td><?php echo $data['email'];?></td>
						<td ><?php echo $data['tanggal_daftar'];?></td>
						<td><?php echo $data['nodaf'];?></td>
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

<script type="text/javascript">
$(document).ready(function(){ 
 // initialize tooltip
 $( ".content span" ).tooltip({
   track:true,
   open: function( event, ui ) {
   var id = this.id;
   var split_id = id.split('_');
   var userid = split_id[1];
 
   $.ajax({
    url:'<?=base_url()?>index.php/testing/tooltip/',
    type:'post',
    data:{userid:userid},
    success: function(response){
 
    // Setting content option
    $("#"+id).tooltip('option','content',response);
 
   }
  });
  }
 });

 $(".content span").mouseout(function(){
   // re-initializing tooltip
   $(this).attr('title','Please wait...');
   $(this).tooltip();
   $('.ui-tooltip').hide();
 });
});
</script>
