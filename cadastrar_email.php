<?php
include 'restrict.php';
date_default_timezone_set('America/Sao_Paulo');
$page='emails';
include 'restrict.php';
include 'view/email.php';
require_once './_connect/connect_pdo.php';
$dbh = Database::conexao();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head_main.php'; ?>
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
                    <h3 class="title">E-mails</h3> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cadastrar e-mail</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php if(isset($_GET['return'])){
                                            switch ($_GET['return']) {
                                                case 'form':
                                                    echo '
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> O formulário selecionado já possuí e-mail vinculado.
                                        </div>';
                                                    break;
                                                
                                                default:
                                                    echo '
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Cadastro realizado com sucesso. <a href="listar-cliente" class="alert-link">Enviar esse formulário?</a>.
                                        </div>';
                                                    break;
                                            }
                                        } ?>
                                        <form action="cadastra-email" method="post" role="form">
                                            <div class="form-group">
                                                <label for="form" class="control-label">Assunto</label>
                                                <input type="text" id="assunto" name="assunto" class="form-control" placeholder="Assunto">
                                                <input type="text" id="op" name="op" value="1" class="form-control" style="display: none;">
                                            </div>
                                            <div class="form-group">
                                                <label for="formulario" class="control-label">Formulário</label>
                                                <select class="select2" id="formulario" name="formulario">
                                                  <option value="#">&nbsp;</option>
                                                  <?php listarFormOption($dbh);?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="mensagem" id="mensagem" rows="10" cols="80" placeholder="Mensagem"></textarea>
                                            </div>
                                            <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-white btn-rounded" data-dismiss="modal">Cancelar</a> 
                                            <button type="submit" class="btn btn-success btn-rounded">Salvar</button> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- End Row -->
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <?php include 'footer.php'; ?>
        </section>
        <!-- Main Content Ends -->     

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="ckeditor/ckeditor.js"/>

        <script src="js/jquery.app.js"></script>       
        
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script>
            CKEDITOR.replace( 'mensagem' );
            // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
        </script>    

    </body>
</html>
