<script>
	function pergelombang(kode){$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax ({url: "<?php echo site_url('cloader/getDataMhs')?>" + "/" + kode,success: function(msg){$("#fromajax").html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});}
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 30, showcounter: true, pager : $("#datapagecounter") });});	
	$('#submitcari').click(function(){var name = $('#katakunci').val();if (!name || name == 'Name') {alert('Masukkan katakunci');return false;}var form_data={katakunci: $('#katakunci').val(),ajax: '1'};$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax({url: "<?php echo site_url('cloader/getDataMhs'); ?>" + "/none" ,type: 'POST',data: form_data,success: function(msg) {$('#fromajax').html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});return false;});
	$('#submitcaribytgl').click(function(){var form_data={tgl1: $('.tgl1').val(),tgl2: $('.tgl2').val(),ajax: '1'};$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');$.ajax({url: "<?php echo site_url('cloader/getDataMhs'); ?>" + "/none" ,type: 'POST',data: form_data,success: function(msg) {$('#fromajax').html(msg);},error:function(){$('#fromajax').html('<center>Data yang dicari tidak ada</center>');}});return false;});		
	$('#bynama').click(function(){$('.byname').show('slow');$('.bydate').hide('slow');$('.byjur').hide('slow');$('.bytes').hide('slow');$('.bystatus').hide('slow')});$('#bytgl').click(function(){$('.bydate').show('slow');$('.byname').hide('slow');$('.byjur').hide('slow');$('.bytes').hide('slow');$('.bystatus').hide('slow')});$( ".tgl1" ).datepicker({dateFormat:'dd-mm-yy'});$( ".tgl2" ).datepicker({dateFormat:'dd-mm-yy'});
	$('#byjuru').click(function(){$('.byjur').show('slow');$('.bydate').hide('slow');$('.byname').hide('slow');$('.bytes').hide('slow');$('.bystatus').hide('slow')});$('#bytes').click(function(){$('.bytes').show('slow');$('.bydate').hide('slow');$('.byname').hide('slow');$('.byjur').hide('slow');$('.bystatus').hide('slow')});
	$('#bystatus').click(function(){$('.bystatus').show('slow');$('.bydate').hide('slow');$('.byname').hide('slow');$('.byjur').hide('slow');$('.bydate').hide('slow')});
	$('#submitcaribyjur').click(function(){
		var form_data={kd_jur:$('#kd_jur').val(),ajax: '1'};
		$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');
		$.ajax({
			url: "<?php echo site_url('cloader/getDataMhs'); ?>" + "/none" ,
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
		$('#submitcaribytes').click(function(){
		var form_data={tgltes1: $('[name="tgltes1"]').val(),tgltes2: $('[name="tgltes2"]').val(),ajax: '1'};
		$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');
		$.ajax({
			url: "<?php echo site_url('cloader/getDataMhs'); ?>" + "/none" ,
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
		$('#submitcaristatus').click(function(){
		var form_data={status:$('#status').val(),ajax: '1'};
		$('#fromajax').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');
		$.ajax({
			url: "<?php echo site_url('cloader/getDataMhs'); ?>" + "/none" ,
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
</script>
<h3>LAPORAN PENDAFTAR</h3>
<br />
<p>[<a href="#" id="bynama">Berdasar Nama</a>][<a href="#" id="bytgl">Berdasar Tanggal Daftar</a>]</p>
<p>[<a href="#" id="byjuru">Berdasar Jurusan</a>][<a href="#" id="bytes"> Berdasar Tanggal Tes</a>]</p>
<p>[<a href="#" id="bystatus">Berdasar Status Registrasi</a>]</p>
<br />
<div id="search_box" class="byname"  style="display:none;">
	<h3>BERDASAR NAMA / NODAF</h3>
	<?php echo form_open('lapdaftar');?>
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
	<h3>BERDASAR TANGGAL PENDAFTARAN</h3>
	<?php echo form_open('lapdaftar');?>
		<input type="text" name="tgl1" class="tgl1" value="<?php echo $tgl1;?>" /> s/d
		<input type="text" name="tgl2" class="tgl2" value="<?php echo $tgl2;?>" />
		<input type="submit" name="submit" value="Cari" id="submitcaribytgl" />
	<?php echo form_close();?>
</div>
<div id="search_box" class="byjur" style="display:none;">
	<h3>BERDASAR JURUSAN </h3>
	<?php echo form_open('lapdaftar');?>
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
<div  class="bytes" style="display:none;">
	<h3>BERDASAR TANGGAL TES</h3>
	<?php echo form_open('lapdaftar');?>
		<input type="text" name="tgltes1" class="tgl1" value="<?php echo $tgl1;?>" /> s/d
		<input type="text" name="tgltes2" class="tgl2" value="<?php echo $tgl2;?>" />
		<input type="submit" name="submit" value="Cari" id="submitcaribytes" />
	<?php echo form_close();?>
</div>
<div  class="bystatus" style="display:none;">
	<h3>BERDASAR STATUS REGISTRASI </h3>
	<?php echo form_open('lapdaftar');?>
	<select name="status" id='status'>
	<?php
		$array=array("Hanya Daftar","KIP-Kuliah","Angsur","Lunas","Mortal");
		foreach($array as $data){
		?>
			<option value="<?=$data?>"><?=$data?></option>
		<?php
		}
	?>
	</select>
		<input type="submit" name="submit" value="Cari" id="submitcaristatus" />
	<?php echo form_close();?>
</div>
<div id="content_error" style="color: red">
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
		<a href="<?=site_url()?>/cloader/excel?act=none&id=0"><b>excel</b></a>
		<div id="datapage" >
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
					<tr <?php if(($no%2)==0){ echo 'class="black paging"';}else{ echo 'class="paging"';} ?> >	
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
						<td align="center"><?php if(empty($data['NPM'])) echo anchor('mhsbaru/'.$data['nodaf'],'[Ubah]');?></td>
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
</div>