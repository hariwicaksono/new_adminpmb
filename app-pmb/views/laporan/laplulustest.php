<script>
	function pergelombang(kode){$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax ({url: "<?php echo site_url('cloader/getDataLulus')?>" + "/" + kode,success: function(msg){$("#fromajax").html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});}	
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 30, showcounter: true, pager : $("#datapagecounter") });});	
	$('#submitcari').click(function(){var name = $('#katakunci').val();if (!name || name == 'Name') {alert('Masukkan katakunci');return false;}var form_data={katakunci: $('#katakunci').val(),ajax: '1'};$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax({url: "<?php echo site_url('cloader/getDataLulus'); ?>" + "/none" ,type: 'POST',data: form_data,success: function(msg) {$('#fromajax').html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});return false;});
	$('#submitcaribytgl').click(function(){var form_data={tgl1: $('#tgl1').val(),tgl2: $('#tgl2').val(),ajax: '1'};$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax({url: "<?php echo site_url('cloader/getDataLulus'); ?>" + "/none" ,type: 'POST',data: form_data,success: function(msg) {$('#fromajax').html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});return false;});
	$('#submitcaribyjur').click(function(){
		var form_data={kd_jur:$('#kd_jur').val(),ajax: '1'};
		$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');
		$.ajax({
			url: "<?php echo site_url('cloader/getDataLulus'); ?>" + "/none" ,
			type: 'POST',
			data: form_data,
			success: function(msg) {
					$('#fromajax').html(msg);
					},
			error:function(){
					$('#fromajax').html('<center>Data yang dicari tidak ada</center>');
					}
			});
		return false;
		});
	$('#bynama').click(function(){$('.byname').show('slow');$('.bydate').hide('slow');$('.byjur').hide('slow');});$('#bytgl').click(function(){$('.bydate').show('slow');$('.byname').hide('slow');$('.byjur').hide('slow');});$('#byjuru').click(function(){$('.byjur').show('slow');$('.bydate').hide('slow');$('.byname').hide('slow');});$( "#tgl1" ).datepicker({dateFormat:'dd-mm-yy'});$( "#tgl2" ).datepicker({dateFormat:'dd-mm-yy'});	
</script>
<h3>LAPORAN LULUS TEST</h3>
<br />
<p>[<a href="#" id="bynama">Berdasar Nama</a>][<a href="#" id="bytgl">Berdasar Tanggal Test</a>][<a href="#" id="byjuru">Berdasar Jurusan</a>]</p>
<br />
<div id="search_box" class="byname"  style="display:none;">
	<h3>BERDASAR NAMA / NODAF</h3>
	<?php echo form_open('#');?>
	<?php
		$data = array(
              'name'        => 'katakunci',
              'id'          => 'katakunci',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '30'              
            );
		echo form_input($data);		
	?>
		<input type="submit" name="submit" value="Cari" id="submitcari" />
	<?php echo form_close();?>
</div>
<div id="search_box" class="bydate" style="display:none;">
	<h3>BERDASAR TANGGAL TEST</h3>
	<?php echo form_open('#');?>
		<input type="text" name="tgl1" id="tgl1" value="<?php echo $tgl1;?>" /> s/d
		<input type="text" name="tgl2" id="tgl2" value="<?php echo $tgl2;?>" />
		<input type="submit" name="submit" value="Cari" id="submitcaribytgl" />
	<?php echo form_close();?>
</div>
<div id="search_box" class="byjur" style="display:none;">
	<h3>BERDASAR JURUSAN LULUS</h3>
	<?php echo form_open('#');?>
	<select name="kd_jur" id='kd_jur'>
	<option value="">--Pilih Jurusan--</option>
	<?php
	$data=$this->db->query("select kd_dept,nama_dept from department")->result_array();
	foreach ($data as $key){
	?>
		<option value="<?=$key['kd_dept']?>"><?=$key['nama_dept']?></option>
	<?php
	}
	?>
	</select>
		<input type="submit" name="submit" value="Cari" id="submitcaribyjur" />
	<?php echo form_close();?>
</div>
<div id="content_error">
	<?php echo validation_errors(); ?>
</div>
<br />
<div id="content_gel">
		<li>			
			<a href='#' onclick="pergelombang('none')">[Semua]</a>
		</li>
	<?php
		foreach($glmb as $data){			
	?>
		<li>			
			<a href='#' onclick="pergelombang('<?php echo $data['kode'];?>')">[<?php echo $data['gelombang']; ?>]</a>
		</li>
	<?php
		}
	?>
</div>
<br />
<div id="fromajax">
<div id="content_table">
<a href="<?=site_url()?>/cloader/excelLulus?act=none&id=0"><b>Excel</b></a>
		<div id="datapage" >
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
						<td ><?php echo anchor('biodata/'.$data['nodaf'],$data['nama']);?></td>						
						<td ><?php echo $data['nama_gel'];?></td>
						<td ><?php echo $data['JURUSAN_LULUS'];?></td>												
						<td align="center"><?php echo $data['TANGGAL_TEST'];?></td>				
						<td align="center"><?php if(empty($data['NPM'])) echo anchor('mhsbaru/'.$data['nodaf'],'[Ubah]');?></td>
					</tr>				
					<?php
				}
			?>	
					
			</table>
		</div>
		<br /><br />
	<div id="datapagecounter">
		
	</div>	
</div>
</div>