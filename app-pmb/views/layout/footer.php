<div id="foot_container" class="py-3">
  <p class="text-center">&copy; <?php echo $profil['NAMA'];?></p>
</div>


<div id="preloader"></div>
	<!-- Required Js -->
 
<script src="<?php echo base_url()?>templates/dashboardkit/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>javascript/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js" ></script>
<script src="<?php echo base_url()?>templates/dashboardkit/js/plugins/feather.min.js"></script>
<script src="<?php echo base_url()?>templates/dashboardkit/js/pcoded.min.js"></script>

<!-- sweet alert Js -->
<script src="<?php echo base_url()?>templates/dashboardkit/js/plugins/sweetalert2.all.min.js"></script>
<!-- datatable Js -->
<script src="<?php echo base_url()?>templates/dashboardkit/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>templates/dashboardkit/js/plugins/dataTables.bootstrap4.min.js"></script>
<script>
  // Preloader
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        $(this).remove();
      });
    }
  });
    </script>
    
    <script>
    $('#simpletable').DataTable();
    
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');
    });
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
            $('.m-header').addClass(temp);
        }
    });
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
        }
    });
    $('#cust-darklayout').change(function() {
        if ($(this).is(":checked")) {
            $("#main-style-link").attr("href", "assets/css/style-dark.css");
        } else {
            $("#main-style-link").attr("href", "assets/css/style.css");
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
</script>

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

    

	</body>
</html>