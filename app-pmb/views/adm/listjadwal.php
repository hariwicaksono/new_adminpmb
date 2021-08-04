<?php 

if(empty($infokrs)){
	?>
		<input type="button" class="button" id="genjadwal" value="Generate Jadwal KRS" onclick="generate('<?php echo $kode; ?>')" />
	<?php
}else{
	
?>
<script type="text/javascript">
	$(function(){$('.firstdate').datepicker({dateFormat:'dd-mm-yy'});$('.lastdate').datepicker({dateFormat:'dd-mm-yy'});});		
	function convertDate(dt) {var d = dt.split('-');return new Date(d[2],d[1],d[0]);}	
	function setjadwal(param0,param1,param2,param3,param4){var awal=$('input[name='+param2+']').val();var akhir=$('input[name='+param3+']').val();var kode=param1;var myval=param4;if (!awal || awal=='') {alert('tanggal awal tidak boleh kosong');return false;}if (!akhir || akhir=='') {alert('tanggal akhir tidak boleh kosong');return false;}if(convertDate(awal)>convertDate(akhir)){alert('tanggal awal melebihi tanggal akhir');return false;}var form_data={mycode:kode,tgla1:awal,tgla2:akhir,jurusan:myval,ajax: '1'};$.ajax({url: "<?php echo site_url('welcome'); ?>/"+param0,type: 'POST',data: form_data,beforeSend:function(){$('#content_table').html('<img src="<?php echo base_url(); ?>/image/ajax-loader.gif" />');},success: function(msg) {$('#content_table').html(msg);}});}
</script>
<table id="common_table" width="70%" >
		<thead>
			<th>KETERANGAN</th>
			<th>TANGGAL MULAI</th>
			<th>TANGGAL SELESAI</th>
			<th>&nbsp;</th>
		</thead>
		<?php 
			$no=1;						
			foreach($infokrs as $data=>$item){				
			?>
			<tr>											
				<td align="left"><?php echo $item['KETERANGAN'] ?></td>								
				<td><input type="text" class="firstdate" name="tglawal<?php echo $no ?>" value="<?php echo date('d-m-Y',strtotime($item['TGLAWAL'])); ?>" /></td>
				<td><input type="text" class="lastdate" name="tglakhir<?php echo $no ?>" value="<?php echo date('d-m-Y',strtotime($item['TGLSELESAI'])); ?>" /></td>
				<td><input type="button" class="button" name="submit" onclick="setjadwal('setkrs','<?php echo $item['ID']; ?>','tglawal<?php echo $no ?>','tglakhir<?php echo $no ?>','<?php echo $item['JURUSAN'] ?>')" value="Set" /> </td>						
			</tr>
			<?php
			$no++;			
		} 
		?>
		
</table>
<?php
}
?>