<style type="text/css">
	#listmk tr{
		background-color:#dbdbdb;
	}
	
	#listmk tr:hover{
		background-color:#808080;
	}
	#listmk a{
		font-weight:bold;
	}
	#listmk a:hover{		
		color:#000;
	}
</style>
<table id="listmk">
<?php
if(!empty($mk)){
	foreach($mk as $data=>$item){
		?>
		<tr>
			<td><?php echo $item['KODE']; ?></td>
			<td><?php echo $item['MKL']; ?></td>
			<td><a href="#" onclick="setmk('<?php echo trim($item['KODE']);?>')">Pilih</a></td>
		</tr>
		<?php
	}
}else{
	?>
	<center>Matakuliah yang anda cari tidak ada</center>
	<?php
}
?>
</table>
