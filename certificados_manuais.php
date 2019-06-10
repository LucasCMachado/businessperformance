<?php
include 'restrict.php';
date_default_timezone_set('America/Sao_Paulo');
$page='gerar-certificados';
include 'view/certificado.php';
require_once './_connect/connect_pdo.php';
$dbh = Database::conexao();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head_main.php'; ?>
        <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="assets/select2/select2.css" />
    </head>
    <body>
        <?php include 'header.php'; ?>

        <!--Main Content Start -->
        <section class="content">            
            <?php include 'navbar.php'; ?>
            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">Certificados</h3> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Gerar certificado</h3>
                            </div>
                            <div class="panel-body">
                                <button type="button" class="btn btn-primary btn-rounded m-b-5" data-toggle="modal" data-target="#certificado-cliente">Certificado por cliente</button>
                                <button type="button" class="btn btn-primary btn-rounded m-b-5" data-toggle="modal" data-target="#certificado-grupo">Certificado em grupo</button>
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- End Row -->
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->
            <?php include 'ui_parts/modal/certificado_manual.php'; ?>
            <?php include 'footer.php'; ?>
        </section>
        <!-- Main Content Ends -->     

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="js/jquery.app.js"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="js/jquery.mask.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
                $('.date').mask('00/00/0000');
                $('.time').mask('00:00');
            } );
        </script>

    </body>
</html>
