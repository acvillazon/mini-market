<?php
	defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
	
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/fonts/circular-std/style.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/libs/css/style.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/fonts/fontawesome/css/fontawesome-all.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/charts/chartist-bundle/chartist.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/charts/morris-bundle/morris.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/charts/c3charts/c3.css'?>">
		<link rel="stylesheet" href="<?php echo base_url('/public').'/assets/vendor/fonts/flag-icon-css/flag-icon.min.css'?>">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>MINI Market</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Mini Market</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
								</button>
							
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
										</button>
					
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
														<li class="nav-divider">Menu</li>

                            <li class="nav-item">
																<a 
																	class="nav-link" 
																	href="#" data-toggle="collapse" 
																	aria-expanded="false" data-target="#submenu-2" 
																	aria-controls="submenu-2">
																	<i class="fa fa-fw fa-user-circle"></i>
																	Client
																</a>
                                <div id="submenu-2" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
																						<a class="nav-link" href="/usuario">General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/usuario/create">New client</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
																<a 
																	class="nav-link" 
																	href="#" data-toggle="collapse" 
																	aria-expanded="false" data-target="#submenu-3" 
																	aria-controls="submenu-3">
																	<i class="fas fa-dolly-flatbed"></i>
																	Inventary
																</a>
                                <div id="submenu-3" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
																						<a class="nav-link" href="/product">General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/product/create">New product</a>
                                        </li>
                                    </ul>
                                </div>
														</li>
                            <li class="nav-item">
																<a 
																	class="nav-link" 
																	href="#" data-toggle="collapse" 
																	aria-expanded="false" data-target="#submenu-4" 
																	aria-controls="submenu-4">
																	<i class="far fa-money-bill-alt"></i>
																	Market
																</a>
                                <div id="submenu-4" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
																						<a class="nav-link" href="/sales">Cashier</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/sales/statistics">Estadistics</a>
                                        </li>
                                    </ul>
                                </div>
														</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                <!-- Validation FORM  -->
                <?php if(validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php echo validation_errors('<li>', '</li>'); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>


												<!-- Other Messages -->
								<?php if(isset($message[0]) && count($message[0])) {?>
									<div class="alert <?php echo $class.'' ?>" role="alert">
										<ul>
											<?php foreach ($message[0] as $key => $value) { ?>
												<li><?php echo $value ?></li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>

								<div class="container-fluid">
									<?php $this->load->view($content)?>
								</div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
	<!-- jquery 3.3.1 -->
	
	<script src="<?php echo base_url('/public').'/assets/vendor/jquery/jquery-3.3.1.min.js'?>"></script>
	<script src="<?php echo base_url('/public').'/assets/vendor/bootstrap/js/bootstrap.bundle.js'?>"></script>
	<script src="<?php echo base_url('/public').'/assets/vendor/slimscroll/jquery.slimscroll.js'?>"></script>
	<script src="<?php echo base_url('/public').'/assets/libs/js/main-js.js'?>"></script>
</body>
 
</html>
