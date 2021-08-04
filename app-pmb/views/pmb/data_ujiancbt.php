<script type="text/javascript">
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 10, showcounter: true, pager : $("#datapagecounter") });});
</script>

<center>
<div id="search_box">
	<?php echo form_open('dataujiancbt');?>
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
	<?php if(!empty($message)) echo $message; ?>
	<?php echo validation_errors(); ?>		
</div>
<!--<br />
<div id="content_gel">
<li>Simpan Excel:</li>
<li><a href="<?=site_url()?>/cloader/excelStatus?act=tidak_diterima&id=0"><b>Status Tidak Diterima</b></a></li>
<li><a href="<?=site_url()?>/cloader/excelStatus?act=diterima&id=0"><b>Status Diterima</b></a></li>
</div>-->
<p>Simpan Ke: <a href="<?=site_url()?>/cloader/excelNilai?act=none&id=0"><b>Excel</b></a></p>
</center>

<div id="content_table">
	<center>
		<div id="datapage" >
			<table width="100%">
				<thead>
					<th align="center">NO</th>
					<th>NODAF</th>
					<th>HASIL</th>
					<th>SCORE</th>
					<th>KETERANGAN</th>
					<th>TANGGAL</th>	
					<th>AKSI</th>
				</thead>			
			<?php
				$no=1;
				foreach($datamhs as $data){
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class=paging';} ?> >	
						<td align="center"><?php echo $no++;?></td>
						<td><?php echo $data['nodaf'];?><br/><?php echo $data['nama'];?></td>
						<td>Benar: <?php echo $data['benar'];?><br/>Salah: <?php echo $data['salah'];?><br/>Kosong: <?php echo $data['kosong'];?></td>
						<td><?php echo $data['score'];?></td>
						<td><?php echo $data['keterangan'];?></td>
						<td><?php echo $data['tanggal'];?><br/>Mulai: <?php echo $data['waktu_mulai'];?><br/>Selesai: <?php echo $data['waktu_selesai'];?></td>
						<td align="center"><a href="<?=base_url()?>index.php/pmb/hapus_dataujiancbt/<?=$data['id_user']?>" onclick="return confirm('Are you sure you want to Remove?');" style="background-color: #F9AA2E; /* Green */
											border: none;
											color: black;
											padding: 3px 8px;
											text-align: center;
											text-decoration: none;
											display: inline-block;
											font-weight: normal;
											font-size: 12px;">Hapus</a></td>
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
