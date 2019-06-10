<div id="cadastrar-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Cadastrar categoria</h4> 
            </div>
            <form method='post' id='categoria-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nomeCat" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="nomeCat" id="nomeCat" value="" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;">  
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="form" class="control-label">Formulário</label>
                                <select class="select2" id="form" name="form">
                                  <option value="#">&nbsp;</option>
                                  <?php listarFormOption($dbh,$id_formulario); ?>
                                </select>
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

<div id="editar-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar categoria</h4> 
            </div>
            <form method='post' id='categoria-EditForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="editNomeCat" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="editNomeCat" id="editNomeCat" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="2" style="display: none;">
                                <input type="text" class="form-control" name="id" id="id" style="display: none;"> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="editForm" class="control-label">Formulário</label>
                                <select class="select2" id="editForm" name="editForm">
                                  <option id="formSelected" selected></option>
                                  <?php listarFormOption($dbh,$id_formulario); ?>
                                </select>
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