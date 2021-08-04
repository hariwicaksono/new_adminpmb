<script type="text/javascript">
	function changej(kode0,kode1){$('#jurcon1').html('<center><img src="<?php echo base_url(); ?>/image/ajax-loader.gif" /></center>');$.ajax ({url: "<?php echo site_url('aloader')?>" + "/" + kode0+"/"+kode1,success: function(msg){$("#jurcon1").html(msg);}});}
</script>
<div id="jurcon1">
<center><input type="button" name="tempbtn" id="tmepbtn" class="button" value="Kembali ke Edit Jurusan" onclick="changej('loedjur','<?php echo $kembali; ?>')" /></center>
</div>