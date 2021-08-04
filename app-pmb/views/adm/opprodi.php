<script type="text/javascript">
	function getfrm(param1,param2,param3){$.ajax({url: "<?php echo site_url(); ?>/"+param1+"/"+param2+"/"+param3,beforeSend:function(){$('#form_user').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success: function(msg) {$('#form_user').html(msg);},error:function(){location.reload();}});}	
	function trowac(param1,param2,param3,param4,param5){if(confirm('Yakin hapus akses user '+param4+' untuk prodi '+param5+' ? ')){$.ajax({url: "<?php echo site_url(); ?>/"+param1+"/"+param2+"/"+param3+"/"+param4+"/"+param5,beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success: function(msg) {$('#content_table').html(msg);},error:function(){location.reload();}});}}
</script>
<div id="form_user">
	
</div>
<br />
<h3>Daftar User Prodi</h3>
<a href="#" onclick="getfrm('aloader','faddprou','');" >[+]Tambah User Prodi</a>
<br /><br />
<table id="common_table" width="60%" >
	<thead>
		<th>Nama User</th>
		<th>Prodi</th>
		<th>&nbsp;</th>		
	</thead>
	<?php
	$no=0;
	foreach($userprodi as $data=>$item){
		?>
	<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >
		<td align="left"><?php echo $item['NAMA'] ?></td>
		<td align="left"><?php echo $item['NAMA_DEPT'] ?></td>
		<td align="center">			
			<a href="#" onclick="trowac('aloader','delprodi','<?php echo $item['JURUSAN'];?>','<?php echo $item['NAMA'];?>','<?php echo $item['NAMA_DEPT'];?>');">[Hapus]</a>
		</td>		
	</tr>
		<?php
		$no++;
	} 
	?>
</table>
<br />
<?php
//pr($userprodi); 
?>