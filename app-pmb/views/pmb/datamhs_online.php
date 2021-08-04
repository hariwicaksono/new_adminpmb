
<script type="text/javascript">
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 30, showcounter: true, pager : $("#datapagecounter") });});
</script>
<br />
<center>
<div id="search_box">
	<?php echo form_open('datamhs_online');?>
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
		<li><?php echo anchor('datamhs_online/gel/','[Semua]');?></li>
	<?php
		foreach($glmb as $data){			
	?>
		<li><?php echo anchor('datamhs_online/gel/'.$data['kode'],'['.$data['gelombang'].']');?></li>
	<?php
		}
	?>
</div>
<br />
<div id="content_gel">
<li>Simpan Excel:</li>
<li><a href="<?=site_url()?>/cloader/excelStatus?act=tidak_diterima&id=0"><b>Status Tidak Diterima</b></a></li>
<li><a href="<?=site_url()?>/cloader/excelStatus?act=diterima&id=0"><b>Status Diterima</b></a></li>
</div>
<br />
</center>
<div id="content_table">
	<center>
		<div id="datapage" >
			<table width="100%">
				<thead>
					<th>NO</th>
					<th>NODAFF</th>
					<th>NAMA</th>
					<th>NO.HP</th>
					<th>UJIAN ONLINE</th>
					<th>STATUS</th>	
					<th>DOKUMEN</th>
					<th>DETAIL</th>
				</thead>			
			<?php
				$no=1;
				foreach($datamhs as $data){
				if ($data['syarat2']=='Belum') $status='Belum diproses'; elseif ($data['syarat2']=='Sudah') $status="Diterima"; 
				else $status=$data['syarat2']; 
					?>				
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{echo 'class=paging';} ?> >	
						<td align="center"><?php echo $no++;?></td>
						<td align="center"><?php echo $data['nodaf'];?></td>
						<td align="center"><a href="<?=base_url()?>index.php/detailmhs_online/<?=$data['nodaf']?>" target="_blank()"><?php echo $data['nama'];?></a></td>
						<td align="center"><?php echo $data['telepon'];?></td>
						<td align="center"><?php echo $data['score'];?></td>
						<td align="center"><?=$status?></td>
						<td align="center"><?=$data['syarat1']?> <a href="#" class='content' data-bs-toggle="tooltip">
   						<span title='Please wait..' id='user_<?php echo $data['nodaf'];?>'>Cek</span>
						</a></td>
						<td align="center"><a href="<?=base_url()?>index.php/detailmhs_online/<?=$data['nodaf']?>" target="_blank()">Lihat</a> || <?php echo anchor('testing/formulir/'.$data['nodaf'].'/','Cetak',array('target'=>'_blank'));?></td>	
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
