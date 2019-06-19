<?php
$pagename="Formação";
require_once './view/view_listar.php';
require_once './restrict.php';
require_once './_connect/connect_pdo.php';
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
							<h1>Formação: NOME FORMAÇÃO</h1>
						</div>
					</div>
				</header>
				<!--END PAGE HEADER -->
				<!--START PAGE CONTENT -->
				<section class="page-content">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<h5 class="card-header">DADOS FORMAÇÃO</h5>
								<div class="card-body">
									<ul class="nav nav-pills nav-pills-primary nav-fill mb-3" id="pills-demo-4" role="tablist">
										<li class="nav-item">
											<a class="nav-link active show" id="pills-10-tab" data-toggle="pill" href="#pills-10" role="tab" aria-controls="pills-10" aria-selected="true"><i class="la la-file-text"></i>ASSESSMENTS</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab" aria-controls="pills-11" aria-selected="false"><i class="la la-stack-exchange"></i>AVALIAÇÃO DA FORMAÇÃO</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-12-tab" data-toggle="pill" href="#pills-12" role="tab" aria-controls="pills-12" aria-selected="false"><i class="la la-graduation-cap"></i>CERTIFICADO</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent-4">
										<div class="tab-pane fade active show" id="pills-10" role="tabpanel" aria-labelledby="pills-10">
											<div class="alert alert-primary alert-outline alert-dismissible fade show" role="alert">
												<div class="icon"><i class="la la-warning"></i></div>
												<div class="text">Responda os assessments abaixo para liberar a avaliação da formação.</div>
											</div>
											<div class="alert alert-success alert-outline alert-dismissible fade show" role="alert">
												<div class="text">Etapa concluida, Avaliação da Formação liberada.</div>
											</div>
												<div class="accordion" id="accordion">
													<div class="card">
														<div class="card-header" id="headingOne">
															<h5 class="mb-0">
																	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																		ASSESSMENT 1
																	</button>
																</h5>
														</div>
														<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
															<div class="card-body">
																<button class="btn btn-primary btn-block">RESPONDER</button>
																<button class="btn btn-success btn-block">ACESSAR RESULTADO</button>
															</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header" id="headingTwo">
															<h5 class="mb-0">
																	<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																	ASSESSMENT 2
																	</button>
																</h5>
														</div>
														<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
															<div class="card-body">
																<button class="btn btn-primary btn-block">RESPONDER</button>
																<button class="btn btn-success btn-block">ACESSAR RESULTADO</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11">
												<div class="alert alert-primary alert-outline alert-dismissible fade show" role="alert">
													<div class="icon"><i class="la la-warning"></i></div>
													<div class="text">Responda a avaliação da formação para liberar seu certificado!</div>
												</div>
												<div class="alert alert-success alert-outline alert-dismissible fade show" role="alert">
													<div class="text">Etapa concluida, Aguarde o Download do certificado ser liberado.</div>
												</div>
												<button class="btn btn-primary btn-block">RESPONDER</button>
												<button class="btn btn-success btn-block">ACESSAR RESULTADO</button>
											</div>
											<div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12">
												<button class="btn btn-success btn-block">DOWNLOAD CERTIFICADO</button>
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
	<script src="assets/js/components/countUp-init.js"></script>
	<script src="assets/js/cards/counter-group.js"></script>
	<script src="assets/js/cards/recent-transactions.js"></script>
	<script src="assets/js/cards/monthly-budget.js"></script>
	<script src="assets/js/cards/users-chart.js"></script>
	<script src="assets/js/cards/bounce-rate-chart.js"></script>
	<script src="assets/js/cards/session-duration-chart.js"></script>
</body>

</html>
