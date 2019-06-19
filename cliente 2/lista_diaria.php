<?php
$pagename="Lista Diária";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("head_main.php");?>
</head>

<body class="layout-horizontal">
	<!-- START APP WRAPPER -->
	<div id="app">
		<div class="container-fluid">
			<!-- START TOP TOOLBAR WRAPPER -->
			<?php include_once('user_menu.php');?>
			<!-- END TOP TOOLBAR WRAPPER -->
		</div>
		<!-- START TOP HEADER WRAPPER -->
		<div class="header-wrapper">
			<div class="header-top">
				<!-- START MOBILE MENU TRIGGER -->
				<ul class="mobile-only navbar-nav nav-left">
					<li class="nav-item">
						<a href="javascript:void(0)" data-toggle-state="aside-left-open">
							<i class="icon dripicons-align-left"></i>
						</a>
					</li>
				</ul>
				<!-- END MOBILE MENU TRIGGER -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 col-lg-6">
							<ul class="site-logo">
								<li>
									<!-- START LOGO -->
									<a href="index.html">
										<div class="logo">
											<img src="assets/img/tr.png" alt="">
										</div>
										<h1 class="brand-text"></h1>
									</a>
									<!-- END LOGO -->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- START HEADER BOTTOM -->
			<?php include_once('menu_principal.php'); ?>
			<!-- END HEADER BOTTOM -->
		</div>
		<!-- END TOP HEADER WRAPPER -->
		<div class="content-wrapper">
			<div class="content container-fluid">
				<!--START PAGE HEADER -->
				<header class="page-header">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h1>Minhas Formações</h1>
						</div>
					</div>
				</header>
				<!--END PAGE HEADER -->
				<!--START PAGE CONTENT -->
				<section class="page-content">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<h5 class="card-header">Formações</h5>
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
												<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Em andamento</a>
												<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Finalizadas</a>
												<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Canceladas</a>
											</div>
										</div>
										<div class="col-9">
											<div class="tab-content" id="v-pills-tabContent">
												<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
													<div class="col-sm-12 col-md-6 col-xl-3">
														<div class="card">
															<div class="card-content">
																<img class="card-img-top img-fluid" src="./assets/img/demos/31.jpg" alt="Card image cap">
																<div class="card-body">
																	<h4 class="card-title">NOME FORMACAO EM ANDAMENTO</h4>
																	<p class="card-text">DATA DE INICIO</p>
																	<a href="#" class="btn btn-primary">Acessar</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
													<div class="col-sm-12 col-md-6 col-xl-3">
														<div class="card">
															<div class="card-content">
																<img class="card-img-top img-fluid" src="./assets/img/demos/31.jpg" alt="Card image cap">
																<div class="card-body">
																	<h4 class="card-title">NOME FORMACAO FINALIZADA</h4>
																	<p class="card-text">DATA DE INICIO</p>
																	<a href="#" class="btn btn-primary">Acessar</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
													<div class="col-sm-12 col-md-6 col-xl-3">
														<div class="card">
															<div class="card-content">
																<img class="card-img-top img-fluid" src="./assets/img/demos/31.jpg" alt="Card image cap">
																<div class="card-body">
																	<h4 class="card-title">NOME FORMACAO CANCELADA</h4>
																	<p class="card-text">DATA DE INICIO</p>
																	<a href="#" class="btn btn-primary">Acessar</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
                <!--END PAGE CONTENT -->
            </div>
        </div>
        <!-- END CONTENT WRAPPER -->
		<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
        <script src="assets/vendor/modernizr/modernizr.custom.js"></script>
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/js-storage/js.storage.js"></script>
        <script src="assets/vendor/js-cookie/src/js.cookie.js"></script>
        <script src="assets/vendor/pace/pace.js"></script>
        <script src="assets/vendor/metismenu/dist/metisMenu.js"></script>
        <script src="assets/vendor/switchery-npm/index.js"></script>
        <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
        <script src="assets/vendor/countup.js/dist/countUp.min.js"></script>
        <script src="assets/vendor/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="assets/vendor/flot/jquery.flot.js"></script>
        <script src="assets/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
        <script src="assets/vendor/flot/jquery.flot.time.js"></script>
        <script src="assets/vendor/flot.curvedlines/curvedLines.js"></script>
        <script src="assets/vendor/datatables.net/js/jquery.dataTables.js"></script>
        <script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- ================== GLOBAL APP SCRIPTS ==================-->
        <script src="assets/js/global/app.js"></script>
        <!-- ================== PAGE LEVEL SCRIPTS ==================-->
        <script src="assets/js/components/datatables-init.js"></script>
    </body>

    </html>
