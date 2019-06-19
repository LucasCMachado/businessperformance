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
							<h1>Listagem de Transfêrencias Diárias</h1>
						</div>
					</div>
				</header>
				<!--END PAGE HEADER -->
				<!--START PAGE CONTENT -->
				<section class="page-content">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<h5 class="card-header">Cadastrar</h5>
									<div class="card-body">
										<form class="form-inline">
											<label class="sr-only" for="ramal_transferidor">Ramal</label>
											<input type="text" class="form-control mb-2 mr-sm-2" id="ramal_transferidor" placeholder="Ramal Técnico">

											<div class="form-check mb-2 mr-sm-2">
												<div class="custom-control custom-checkbox checkbox-primary">
													  <input type="checkbox" class="custom-control-input" id="customCheck1">
													  <label class="custom-control-label" for="customCheck1">Não aparece ramal</label>
												</div>
											</div>

											<label class="sr-only" for="nome_tecnico">Nome</label>
											<div class="input-group mb-2 mr-sm-2" style="display: none;">
												<div class="input-group-prepend">
													<div class="input-group-text">@</div>
												</div>
												<input type="text" class="form-control" id="nome_tecnico" placeholder="Nome Técnico">
											</div>
											<label class="sr-only" for="ramal_transferidor">Fila incorreta</label>
											<input type="text" class="form-control mb-2 mr-sm-2" id="ramal_transferidor" placeholder="Fila incorreta">
											<label class="sr-only" for="ramal_transferidor">Fila Correta</label>
											<input type="text" class="form-control mb-2 mr-sm-2" id="ramal_transferidor" placeholder="Fila Correta">
											<label class="sr-only" for="ramal_transferidor">Assunto</label>
											<input type="text" class="form-control mb-2 mr-sm-2" id="ramal_transferidor" placeholder="Assunto">

											<button type="submit" class="btn btn-primary mb-2">Salvar</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<h5 class="card-header">Lista de transferências</h5>
									<div class="card-body">
										<table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>Ramal</th>
													<th>Fila Errada</th>
													<th>Fila Certa</th>
													<th>Data</th>
													<th>Hora</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1217481</td>
													<td>43</td>
													<td>41</td>
													<td>20/03/2019</td>
													<td>11:53:15h</td>
													<td>
														<button class="btn btn-primary btn-rounded">Editar</button>
														<button class="btn btn-primary btn-rounded">Remover</button>
													</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th>Ramal</th>
													<th>Fila Errada</th>
													<th>Fila Certa</th>
													<th>Data</th>
													<th>Hora</th>
													<th>Ações</th>
												</tr>
											</tfoot>
										</table>
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
        <script src="../assets/js/components/datatables-init.js"></script>
    </body>

    </html>
