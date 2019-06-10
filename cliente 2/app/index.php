<?php
$pagename="Atalhos";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("head_main.php");?>
</head>

<body class="layout-horizontal">
	<!-- START APP WRAPPER -->
	<div id="app">
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
											<img src="../assets/img/tr.png" alt="">
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
							<h1>Atalhos</h1>
						</div>
						<ul class="actions top-right">
							<li class="dropdown">
								<a href="javascript:void(0)" class="btn btn-fab" data-toggle="dropdown" aria-expanded="false">
									<i class="la la-ellipsis-h"></i>
								</a>
								<div class="dropdown-menu dropdown-icon-menu dropdown-menu-right">
									<div class="dropdown-header">
										Quick Actions
									</div>
									<a href="#" class="dropdown-item">
										<i class="icon dripicons-clockwise"></i> Refresh
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon dripicons-gear"></i> Manage Widgets
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon dripicons-cloud-download"></i> Export
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon dripicons-help"></i> Support
									</a>
								</div>
							</li>
						</ul>
					</div>
				</header>
				<!--END PAGE HEADER -->
				<!--START PAGE CONTENT -->
				<section class="page-content">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="row m-0 col-border-xl">
									<div class="col-md-12 col-lg-6 col-xl-3">
										<div class="card-body">
											<div class="icon-rounded icon-rounded-primary float-left m-r-20">
												<i class="icon dripicons-graph-bar"></i>
											</div>
											<h5 class="card-title m-b-5 counter" data-count="5627">0</h5>
											<h6 class="text-muted m-t-10">
												Active Sessions
											</h6>
											<div class="progress progress-active-sessions mt-4" style="height:7px;">
												<div class="progress-bar bg-primary" role="progressbar" style="" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small class="text-muted float-left m-t-5 mb-3">
												Change
											</small>
											<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="72">
												0
											</small>
										</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<div class="card-body">
											<div class="icon-rounded icon-rounded-accent float-left m-r-20">
												<i class="icon dripicons-cart"></i>
											</div>
											<h5 class="card-title m-b-5 append-percent counter" data-count="67">0</h5>
											<h6 class="text-muted m-t-10">
												Add to Cart
											</h6>
											<div class="progress progress-add-to-cart mt-4" style="height:7px;">
												<div class="progress-bar bg-accent" role="progressbar" style="" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small class="text-muted float-left m-t-5 mb-3">
												Change
											</small>
											<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="67">
												0
											</small>
										</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<div class="card-body">
											<div class="icon-rounded icon-rounded-info float-left m-r-20">
												<i class="icon dripicons-mail"></i>
											</div>
											<h5 class="card-title m-b-5 counter" data-count="337">0</h5>
											<h6 class="text-muted m-t-10">
												Newsletter Sign Ups
											</h6>
											<div class="progress progress-new-account mt-4" style="height:7px;">
												<div class="progress-bar bg-info" role="progressbar" style="" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small class="text-muted float-left m-t-5 mb-3">
												Change
											</small>
											<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="83">
												0
											</small>
										</div>
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<div class="card-body">
											<div class="icon-rounded icon-rounded-success float-left m-r-20">
												<i class="la la-dollar f-w-600"></i>
											</div>
											<h5 class="card-title m-b-5 prepend-currency counter" data-count="37873">0</h5>
											<h6 class="text-muted m-t-10">
												Total Revenue
											</h6>
											<div class="progress progress-total-revenue mt-4" style="height:7px;">
												<div class="progress-bar bg-success" role="progressbar" style="" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<small class="text-muted float-left m-t-5 mb-3">
												Change
											</small>
											<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="77">
												0
											</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-xl-6">
							<div class="card">
								<h5 class="card-header">Links
									<div class="actions top-right">
										<div class="dropdown">
											<a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-ellipsis-h"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right animation" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
								</h5>
								<div class="card-body">
									<div class="timeline timeline-border ">
										<div class="timeline-list timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">CUIC Principal</div>
												<small class="float-right text-muted"><a href="https://c580cgecuic11.int.thomsonreuters.com:8444/cuic/Login.htmx" target="_blank">ACESSAR</a></small>
											</div>
										</div>
										<div class="timeline-list timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Delivery complete</div>
												<small class="float-right text-muted">10min.</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Delivery processing</div>
												<small class="float-right text-muted">1hr.</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Payment recorded</div>
												<small class="float-right text-muted">11:22am</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Order complete</div>
												<small class="float-right text-muted">9:30AM</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Product quantities updated</div>
												<small class="float-right text-muted">9:27am</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Ticket #627 Closed</div>
												<small class="float-right text-muted">8:02am</small>
											</div>
										</div>
										<div class="timeline-list  timeline-border timeline-info">
											<div class="timeline-info">
												<div class="d-inline-block">Cache cleared</div>
												<small class="float-right text-muted">6:00am</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-xl-6">
							<div class="card">
								<div class="card-header"><span class="m-t-10 d-inline-block">Tickets</span>
									<ul class="nav nav-pills nav-pills-primary float-right" id="pills-demo-sales" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-month-tab" data-toggle="tab" href="#sales-month-tab" role="tab">Cadastro</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-year-tab" data-toggle="tab" href="#sales-year-tab" role="tab">Exclusão</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-year-tab" data-toggle="tab" href="#sales-year-tab" role="tab">Outros</a>
										</li>
									</ul>
								</div>
								<div class="card-body p-0">
									<div class="tab-content" id="pills-tabContent-sales">
										<div class="tab-pane fade show active" id="sales-month-tab" role="tabpanel" aria-labelledby="sales-month-tab">
											<table class="table v-align-middle">
												<thead class="bg-light">
													<tr>
														<th class="p-l-20">Name</th>
														<th>Earnings</th>
														<th>Quota</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><img class="align-self-center mr-3 ml-2 w-50 rounded-circle" src="../assets/img/avatars/27.jpg" alt="">
															<strong class="nowrap">Robert Norris</strong>
														</td>
														<td>$37,000</td>
														<td><span class="badge badge-pill badge-success">Above</span></td>
													</tr>
											</tbody>
										</table>
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
	<script src="../assets/vendor/modernizr/modernizr.custom.js"></script>
	<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/vendor/js-storage/js.storage.js"></script>
	<script src="../assets/vendor/js-cookie/src/js.cookie.js"></script>
	<script src="../assets/vendor/pace/pace.js"></script>
	<script src="../assets/vendor/metismenu/dist/metisMenu.js"></script>
	<script src="../assets/vendor/switchery-npm/index.js"></script>
	<script src="../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
	<script src="../assets/vendor/countup.js/dist/countUp.min.js"></script>
	<script src="../assets/vendor/chart.js/dist/Chart.bundle.min.js"></script>
	<script src="../assets/vendor/flot/jquery.flot.js"></script>
	<script src="../assets/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<script src="../assets/vendor/flot/jquery.flot.resize.js"></script>
	<script src="../assets/vendor/flot/jquery.flot.time.js"></script>
	<script src="../assets/vendor/flot.curvedlines/curvedLines.js"></script>
	<script src="../assets/vendor/datatables.net/js/jquery.dataTables.js"></script>
	<script src="../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- ================== GLOBAL APP SCRIPTS ==================-->
	<script src="../assets/js/global/app.js"></script>
	<!-- ================== PAGE LEVEL SCRIPTS ==================-->
	<script src="../assets/js/components/countUp-init.js"></script>
	<script src="../assets/js/cards/counter-group.js"></script>
	<script src="../assets/js/cards/recent-transactions.js"></script>
	<script src="../assets/js/cards/monthly-budget.js"></script>
	<script src="../assets/js/cards/users-chart.js"></script>
	<script src="../assets/js/cards/bounce-rate-chart.js"></script>
	<script src="../assets/js/cards/session-duration-chart.js"></script>
</body>

</html>
