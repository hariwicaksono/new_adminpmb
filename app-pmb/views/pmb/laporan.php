<script type="text/javascript">
	function loadpage(namepage){$('#container-inside').empty().html('<img src="<?php echo base_url(); ?>/image/loading.gif" />');$('#container-inside').load('<?php echo site_url(); ?>/pmb/'+namepage);}
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
	</div><br /><br />	
	<div id="container-inside">		
		
	</div>
</center>