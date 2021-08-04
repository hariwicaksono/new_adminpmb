<script type="text/javascript">
	function getpage(param1,param2){$.ajax({url: "<?php echo site_url(); ?>/"+param1+"/"+param2,beforeSend:function(){$('#content_table').html('<br /><img src="<?php echo base_url(); ?>image/ajax-loader.gif" /><br />');},success: function(msg) {$('#content_table').html(msg);},error:function(){location.reload();}});}
</script>
<center>
	<h3>USER MANAGER</h3>	
	<div id="menu_user">| <a href="#" onclick="getpage('aloader','userman');" >Manage User</a> | <a href="#" onclick="getpage('aloader','userprodi');" >Admin Prodi</a> |</div>
	<br />
	<div id="content_table">
		
	</div>
</center>