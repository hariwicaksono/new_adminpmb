<script type="text/javascript">
	function getfrm(param1,param2,param3){$.ajax({url: "<?php echo site_url(); ?>/"+param1+"/"+param2+"/"+param3,beforeSend:function(){$('#form_user').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success: function(msg) {$('#form_user').html(msg);},error:function(){location.reload();}});}	
	function trowac(param1,param2,param3){if(confirm('Yakin hapus user '+param3+' ? ')){$.ajax({url: "<?php echo site_url(); ?>/"+param1+"/"+param2+"/"+param3,beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success: function(msg) {$('#content_table').html(msg);},error:function(){location.reload();}});}}
</script>

<div id="form_user">
	
</div>
<br />
<h3>Daftar User</h3>
<a href="#" onclick="getfrm('aloader','faddprevac','');" >[+]Tambah User</a>
<br /><br />
<table id="common_table" width="60%" >
	<thead>
		<th>Nama User</th>
		<th>Grup</th>
		<th>&nbsp;</th>		
	</thead>
	<?php
	$no=0;
	foreach($listuser as $data=>$item){
		if((substr($item['RoleName'], 0,3)!="db_")){
			if(trim($item['RoleName'])!="public"){
	?>
	<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >		
		<td align="left"><?php echo $item['UserName'] ?></td>
		<td align="left"><?php echo $item['RoleName'] ?></td>
		<td align="center">
			<a href="#" onclick="getfrm('aloader','fchpp','<?php echo $item['UserName'];?>');" >[Ganti Password]</a>
			<a href="#" onclick="trowac('aloader','delak','<?php echo $item['UserName'];?>');">[Hapus]</a>
		</td>		
	</tr>
		<?php
			}
		}
		$no++;
	} 
	?>
</table>
<br />