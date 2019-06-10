<div id="cadastrar-cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Cadastrar cliente</h4> 
            </div>
            <form method='post' id='cliente-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nome" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="email" class="control-label">E-mail</label> 
                                <input type="email" class="form-control" name="email" id="email" placeholder=""> 
                            </div> 
                        </div>  
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-white btn-rounded" data-dismiss="modal">Cancelar</button> 
                    <button type="submit" class="btn btn-success btn-rounded">Salvar</button> 
                </div>
            </form> 
        </div> 
    </div>
</div><!-- /.modal -->

<div id="editar-cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar cliente</h4> 
            </div>
            <form method='post' id='cliente-EditForm' action="#" role="form">
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="editNome" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="editNome" id="editNome" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="2" style="display: none;">
                                <input type="text" class="form-control" name="token" id="token" style="display: none;"> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="editEmail" class="control-label">E-mail</label> 
                                <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder=""> 
                            </div> 
                        </div>  
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-white btn-rounded" data-dismiss="modal">Cancelar</button> 
                    <button type="submit" class="btn btn-success btn-rounded">Salvar</button> 
                </div>
            </form> 
        </div> 
    </div>
</div><!-- /.modal -->

<div id="enviar-formulario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar cliente</h4> 
            </div>
            <form method='post' id='cliente-EnviaForm' action="#" role="form">
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="form" class="control-label">Fomulário</label>
                                <select class="select2" id="form" name="form" style="text-transform: capitalize">
                                  <option value="#">&nbsp</option>
                                  <?php listarFormulario($dbh); ?>
                                </select>
								<input type="text" class="form-control" name="tokenCliente" id="tokenCliente" style="display: none;">
								<input type="text" class="form-control" name="op" id="op" val="5" style="display: none;">
                            </div>
                        </div>   
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-white btn-rounded" data-dismiss="modal">Cancelar</button> 
                    <button type="submit" class="btn btn-success btn-rounded">Salvar</button> 
                </div>
            </form> 
        </div> 
    </div>
</div><!-- /.modal -->

<div id="resultado-formulario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar cliente</h4> 
            </div>
            <form method='post' id='cliente-ResultadosForm' action="#" role="form">
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="resultadoForm" class="control-label">Fomulário</label>
                                <select class="select2" id="resultadoForm" name="resultadoForm" style="text-transform: capitalize">
                                  <option value="#">&nbsp</option>
                                  <?php listarFormulario($dbh); ?>
                                </select>
                                <input type="text" class="form-control" name="tokenCliente" id="tokenCliente" style="display: none;">
                            </div>
                        </div>   
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-white btn-rounded" data-dismiss="modal">Cancelar</button> 
                    <button type="submit" class="btn btn-success btn-rounded">Salvar</button> 
                </div>
            </form> 
        </div> 
    </div>
</div><!-- /.modal -->