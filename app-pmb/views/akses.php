<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<title>SIPMB</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>amikompurwokerto.ico"/>
		<link rel="stylesheet" href="<?php echo base_url()?>templates/css/plugins/animate.min.css">
		<!-- font css -->
	
	<link rel="stylesheet" href="<?php echo base_url()?>templates/cloudui/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>templates/cloudui/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>templates/cloudui/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>templates/cloudui/vendors/css/vendor.bundle.addons.css">
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url()?>templates/cloudui/css/style.css?v=<?=mt_rand();?>" id="main-style-link">

		<!--<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery-1.8.3.min.js" ></script>
		<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.quickpaginate.packed.js" ></script>
		<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js" ></script>
		<script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.blockUI.js" ></script>
		<link href="<?php echo base_url()?>style/pmb.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>javascript/jquery-ui-1.9.2/themes/base/minified/jquery-ui.min.css" />-->
		
		<style>
.content{
 border: none;
}
.content span{
 width: 250px;
}
.content span:hover{
 cursor: pointer;
}
#search_box input {max-height:18px !important;max-width: 200px !important}
		</style>
</head>
<body>

<div class="mt-2">
<div class="container">

<div class="row justify-content-center">
	<div class="col-md-12">

<div class="card bg-primary text-white mb-0" style="background-color: #56348B !important">
	<div class="card-body">
		<div class="row">
			<div class="col-md-2">
			<img src="<?php echo base_url()?>image/logo_uap.png" width="80" alt="" title="">
			</div>
			<div class="col-md-10" style="margin-left: -70px;">
			<h1 class="h3 text-white"><?php echo $profil['NAMA']; ?></h1>
			<p class="mb-0"><?php echo $profil['ALAMAT1'].', '.$profil['KOTA'].', Kode Pos: '.$profil['KODE_POS'].', Telp: '.$profil['TELEPON'];?></p>
			</div>
		</div>
	</div>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F9AA2E">
<div class="container-fluid">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
		<a class="nav-link active">[USER : <?php if(!empty($userlogin)){echo $userlogin;}else{echo 'Guest';}?>]</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item">
		<a class="nav-link active">TAHUN PMB [<?php if(!empty($tahunpmb)){echo $tahunpmb;}else{echo "Tahun PMB";}?>]</a>
		</li>
	</ul>
	</div>
</nav>
</div><!-- card -->
</div>
</div>

<div class="row justify-content-center">
	<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<div class="row justify-content-center">
			<div class="col-md-4 border border-3 p-4">
				<h2>Login</h2>
				<h4 class="mb-3">Silakan masuk</h4>
				<?php echo form_open('login/toenter','id="validation-form123"');?>
					<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
					<input type="text" class="form-control form-control-lg" name="pengguna" placeholder="Masukkan nama pengguna">
					</div><!-- form-group -->
					<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
					<input type="password" class="form-control form-control-lg" name="passw" placeholder="Masukkan kata sandi">
					</div><!-- form-group -->
					<button class="btn btn-block btn-primary">Masuk</button>
				<?php echo form_close();?>
			</div>
			</div>
    	</div>
      </div>
    </div>
</div>


	<div id="foot_container" class="py-3">
		<p class="text-center">&copy; <?php echo $profil['NAMA'];?></p>
	</div>


</div>
</div>

<!-- plugins:js -->
<script src="<?php echo base_url()?>templates/cloudui/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url()?>templates/cloudui/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo base_url()?>templates/cloudui/js/template.js"></script>
<!-- endinject -->
<!-- sweet alert Js -->
<script src="<?php echo base_url()?>templates/cloudui/vendors/sweetalert2/sweetalert2.all.min.js"></script>
<?php if(!empty($message)){  ?> 
	<script>
	const Toast = Swal.mixin({
		toast: true,
		position: 'top',
		showConfirmButton: true,
		timer: 5000
		});

		Toast.fire({
        icon: 'error',
        title: '&nbsp;<?php echo $message ?>'
      })
	  </script>
	  <?php } ?>
	 
  <?php 
  $message = $this->session->flashdata('success');

  if(!empty($message)){  ?> 
	<script>
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 5000
    });

  Toast.fire({
        icon: 'success',
        title: '&nbsp;<?php echo $message ?>'
      })
	  </script>
	  <?php } ?>

		<script>
     	$(function(){
        'use strict'
        

     	 });
    	</script>

<script>
'use strict';
$(document).ready(function() {
    $(function() {

        $('#validation-form123').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'pengguna': {
                    required: true,
                },
                'passw': {
                    required: true,
                    minlength: 3,
                    maxlength: 30
                }
            },

            // Errors //
            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
    });
});

</script>

</body>
</html>
