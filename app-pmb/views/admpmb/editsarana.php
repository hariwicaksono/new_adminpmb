<script>
$(function(){$("#kembali").click(function(){history.back()});}); 
</script>
<label><b>UBAH BIAYA SARANA <?php echo $namaglb;?></b></label>
<br /><br />
<?php
echo form_open('admpmb/editsarana');
?>
<div id="content_table">
	<table id="common_table">
		<thead>
			<th>NAMA PRODI</th>
			<th>NOMINAL SARANA</th>
		</thead>
		<?php
			$no=1;
			foreach($biaya as $data=>$item){
			++$no;
		?>		
		<tr <?php if(($no%2)==0){ echo 'class=black';} ?> >			
			<td align="left"><?php echo $item['NAMA_DEPT'];?></td>
			<?php
				$conf=array(
					'name'=>'biayabr[]',
					'value'=>$item['biaya']
				); 
			?>			
			<td><?php echo form_input($conf);?></td>
			<?php				
				echo form_hidden('kodejur[]',$item['jurusan']);
			?>
		</tr>
		<?php
			}
		?>
		<tr >
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr class='black'>
			<td colspan="2" class="mybutton">
				<?php 
					echo form_hidden('kodegel',$kode);
					echo form_hidden('namagel',$namaglb);
					echo form_submit('submit','UBAH');
					echo form_input(array('type'=>'button','id'=>'kembali','name'=>'kembali','value'=>'KEMBALI'));
			 	?>
			 </td>
		</tr>
	</table>
</div>
<?php
	echo form_close();
?>