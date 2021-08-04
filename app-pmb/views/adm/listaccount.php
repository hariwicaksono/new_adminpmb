<?php
if(empty($daftar)){
	?>
	<center><h3>Data tidak ditemukan</h3></center>
	<?php
}else{
?>
<table id="common_table" width="70%" >
	<thead>
		<th>NAMA</th>
		<th>NPM</th>
		<th>PASSWORD</th>		
	</thead>
	<?php
	$no=0;
	foreach($daftar as $data=>$item){
		?>
	<tr <?php if(($no%2)==1){ echo 'class=black';} ?> >
		<td align="left"><?php echo $item['NAMA'] ?></td>
		<td align="left"><?php echo $item['NPM'] ?></td>
		<td><?php echo $item['PWD'] ?></td>
	</tr>
		<?php
		$no++;
	} 
	?>	
</table>
<?php
}
//pr($daftar); 
?>