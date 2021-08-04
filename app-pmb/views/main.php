<?php
	$this->load->view('layout/header');	
?>

	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header" style="background-color: #56348B !important">
		<div class="pcm-logo">
			<img src="<?=base_url()?>image/logo_uap.png" alt="" class="logo logo-lg" width="50">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->
	<!-- [ Header ] start -->
	<header class="pc-header bg-primary" style="background-color: #56348B !important;">
		<div class="container">
			<div class="header-wrapper">
			<div class="m-header">
				<a href="<?php base_url()?>index" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="<?php echo base_url()?>image/logo_full_putih.png" alt="" class="logo logo-lg" width="240">
				</a>
			</div>
				<div class="ms-auto">
					<ul class="list-unstyled">
						<li class="dropdown pc-h-item">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i class="material-icons-two-tone">search</i>
							</a>
							<div class="dropdown-menu dropdown-menu-end pc-h-dropdown drp-search">
								<form class="px-3">
									<div class="form-group mb-0 d-flex align-items-center">
										<i data-feather="search"></i>
										<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
									</div>
								</form>
							</div>
						</li>
						<li class="dropdown pc-h-item pc-cart-menu">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i class="material-icons-two-tone">notifications_active</i>
								<span class="bg-danger pc-h-badge dots"><span class="sr-only"></span></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end pc-h-dropdown drp-cart">
								<div class="cart-head">
								
								</div>
								<div class="cart-item">
									
							
								</div>
							
				
							</div>
						</li>

						<li class="dropdown pc-h-item">
							<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<img src="<?php echo base_url()?>templates/dashboardkit/images/empty-image.png" alt="user-image" class="user-avtar">
								<span>
									<span class="user-name"><?php if(!empty($userlogin)){echo $userlogin;}else{echo 'Guest';}?></span>
									<span class="user-desc">Administrator</span>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
								<div class=" dropdown-header">
								<h5 class="text-overflow m-0"><span class="badge bg-light-success">TAHUN PMB [<?php if(!empty($tahunpmb)){echo $tahunpmb;}else{echo "Tahun PMB";}?>]</span></h5>
								</div>
								<a href="user-profile.html" class="dropdown-item">
									<i class="material-icons-two-tone">account_circle</i>
									<span>Profile</span>
								</a>

								<a href="auth-lockscreen.html" class="dropdown-item">
									<i class="material-icons-two-tone">https</i>
									<span>Lock Screen</span>
								</a>
								<a href="<?php echo base_url()?>index.php/logout" class="dropdown-item">
									<i class="material-icons-two-tone">exit_to_app</i>
									<span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- [ Header ] end -->
	<!-- [ navigation menu ] start -->
	<nav class="topbar " style="background-color: #56348B !important">
					<div class="container">
						<div class="navbar-wrapper">
							<ul class="pc-navbar">
							<li class="pc-item"><a href="<?php echo base_url()?>index.php/index" class="pc-link"><span class="pc-mtext">HOME</span></a></li>
							<?php
                                foreach ($menu as $key => $value) {
                                ?>
                                    <li class="pc-item pc-hasmenu"><a href="#!" class="pc-link"><span class="pc-mtext text-uppercase"><?php echo $value?></span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                        <ul class="pc-submenu">
                                        <?php
                                        foreach ($sub_menu[$key] as $row => $sub) {
                                        ?>
                                           <li class="pc-item">
                                                <a class="pc-link dropdown-toggle" href="<?php echo base_url().'index.php/'.$row?>"><?php echo $sub?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
								<li class="pc-item"><a href="<?php echo base_url()?>index.php/logout" class="pc-link"><span class="pc-mtext">LOGOUT</span></a></li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- [ navigation menu ] end -->

  	<div class="pc-container">
      	<div class="pcoded-content">
	  		<div class="card flat-card">
			  <div class="card-body">
			<?php
				$this->load->view($webcontent);
			?>
				</div>
		  	</div>
		</div>
	</div>

	<a href="<?php echo base_url()?>index.php/mhsbaru" class="btn-float" title="Tambah Mahasiswa Baru" alt="Tambah Mahasiswa Baru">
	<i class="fa fa-plus my-float"></i>
	</a>

<?php
	$this->load->view('layout/footer');
?>