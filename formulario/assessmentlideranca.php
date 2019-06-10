<!--Main Content Start -->       
    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-left"><img src="img/logo_business2.png" style="max-width: 50%;" alt="Logotipo Business Performance"></h4>                            
                            </div>
                            <div class="pull-right">
                                <h4></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">                                        
                                <div class="pull-left m-t-30">
                                    <address>
                                      <strong>Dúvidas?</strong><br>
                                      <abbr title="e-mail">Telefones:</abbr> (48)3521-3836 / (48) 99175-1998
                                      </address>
                                </div>
                            </div>
                            <h4 class="text-center text-primary"><?php nomeFormulario($dbh,$_GET['tokenFormulario']); ?></h4>
                        </div>
                        <div class="m-h-50"></div>
                        <form class="form-horizontal" action="assessmentlideranca" id="form" method="post" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <?php formulario($dbh,$_GET['tokenFormulario']); ?>
                                        <input type="text" class="form-control" name="tokenForm" id="tokenForm" value="<?php echo $_GET['tokenFormulario']; ?>" style="display: none;"> 
                                        <input type="text" class="form-control" name="tokenCliente" id="tokenCliente" value="<?php echo $_GET['tokenCliente']; ?>" style="display: none;"> 
                                        <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-12">
                                    <hr>
                                    <button type="button" id="enviar" class="btn btn-block btn-lg btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="js/jquery.app.js"></script>
<script src="assets/sweet-alert/sweet-alert.min.js"></script>
<script src="assets/sweet-alert/sweet-alert.init.js"></script>


<script type="text/javascript">
    $('#enviar').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var qtd=0;
		var qtdBranco=0;
        var name='';

        $("input:radio").each( function(index, value) {
            
            if (!$(this).prop("checked")) {
                name=$(this).attr('name');

				$("input[name="+name+"]").each( function(index, value) {                    
					if (!$(this).prop("checked")) {
						qtd+=1;
					}                    
				});

				if(qtd<=10){
					qtd=0;
				}else{
					qtdBranco+=1;
				}
            }                    
        });
        if (qtdBranco>1) {
            swal({   
                title: "Alerta!",   
                text: "Todos os campos são de preenchimento obrigatório.",
                timer: 2000,   
                showConfirmButton: false 
            });                        
        }else{
            $(this).html('Enviando <i class="ion-loading-c"></i>');
            $( "#form" ).submit();
        }
    });
</script>