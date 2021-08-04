<script type="text/javascript" >
var date = new Date();
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
var tahun;
function set_year()
{
	document.getElementById("th_aka_awal").value=year;
	document.getElementById("th_aka_akir").value=year+1;

}
function set_year_up()
{
	tahun = document.getElementById("th_aka_awal").value;
	tahun = parseInt(tahun);
	document.getElementById("th_aka_awal").value=tahun+1 ;
	document.getElementById("th_aka_akir").value=tahun+2;
}
function set_year_down()
{
	tahun = document.getElementById("th_aka_awal").value;
	tahun = parseInt(tahun);
	document.getElementById("th_aka_awal").value=tahun-1 ;
	document.getElementById("th_aka_akir").value=tahun;
}		
</script>
<script type="text/javascript">
	$(function(){$("#datapage .paging").quickpaginate({ perpage: 15, showcounter: true, pager : $("#datapagecounter") });});	
	function aktivate(param1,param2){$.ajax({url: "<?php echo site_url('aloader'); ?>/" + param1 +"/"+ param2 ,success: function(msg) {location.reload();}});}
</script>
<center>
<h2>TAHUN AKADEMIK</h2>
<div id="content_error">
		<?php if(!empty($messageproc)){ echo $messageproc.'<br /><br />';} ?>				
</div>
<div id="content_form" style="width:350px;">
	<?php echo form_open('adm/optahun');?>
	<table width="100%">
		<tr>
			<td>Tambah Tahun Akademik</td>
			<td>:</td>
			<td>
				<div style="float:right"><img src="<?php echo base_url();?>image/scroll_up.gif" onClick="set_year_up();" /><br /><img src="<?php echo base_url();?>image/scroll_down.gif" onClick="set_year_down();"/></div><div style="float:right"><input type="text" name="th_aka_awal" size="4" id="th_aka_awal" readonly >/<input type="text" name="th_aka_akir" size="4" id="th_aka_akir" readonly/></div>				
			</td>
		</tr>						
	</table>
	<table width="100%">
			<tr>
				<td align="center" class="mybutton">				
				<?php 
					echo form_submit('simpan','Simpan');					
				?>
				</td>				
			</tr>
		</table>	
	<?php echo form_close();?>
</div>
<div id="content_table">
		<div id="datapage" >
		<table id="common_table" width="70%" >
			<thead>
				<th>TAHUN</th>
				<th>SEMESTER</th>								
				<th>&nbsp;</th>
			</thead>
			<?php
				$temp='';
				$no=0;
				foreach($daftartahun as $data=>$item){
					?>
			<tr <?php if(($no%2)==1){ echo 'class="black paging"';}else{echo 'class="paging"';} ?> >
				<?php 
					if($temp==$item['THN_AKADEMIK']){
					?>
						<td>&nbsp;</td>
					<?php
					}else{
					?>
						<td><?php echo $item['THN_AKADEMIK']?></td>
					<?php
					} 
				?>								
				<td><?php if($item['SEMESTER']==1){ echo "Ganjil";}elseif($item['SEMESTER']==2){echo "Genap";}elseif($item['SEMESTER']==3){echo "Pendek";}?></td>
				<td>
					<input type="button" onclick="aktivate('settahun','<?php echo $item['ID_TAHUN'] ?>')"  <?php if($thnaktif['ID_TAHUN']==$item['ID_TAHUN']){ ?>  value="Unset Tahun Aktif" <?php }else{ ?> value="Set Tahun Aktif" <?php } ?> />					
				</td>
			</tr>
					<?php
					$temp=$item['THN_AKADEMIK'];
					$no++;
				}
			?>														
		</table>
		</div>
		<div id="datapagecounter">
		
		</div>
	</div>
</center>
<script>set_year()</script>