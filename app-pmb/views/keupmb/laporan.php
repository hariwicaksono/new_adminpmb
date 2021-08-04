<script type="text/javascript">
function loadpage(namepage){$.ajax ({url: "<?php echo site_url('kloader')?>" + "/" + namepage+"/",	beforeSend:function(){$('#container-inside').html('<img src="<?php echo base_url(); ?>image/loading.gif" />');},success: function(msg){$("#container-inside").html(msg);},error:function(){	$('#container-inside').html('<center>halaman tidak dapat di load</center>');}});}			
</script>
<center>
	<div id="menu-inside">
		<ul>
		<?php
			foreach($menulaporan as $menu=>$item){				
				?>
				<li>
					[<a href='#' onclick="loadpage('<?php echo $menu;?>')" ><?php echo $item; ?></a>]
				</li>
				<?php
			}
		?>
		</ul>
	</div>	
	<div id="container-inside">		
		
	</div>
</center>