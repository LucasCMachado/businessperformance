<div id="cadastrar-pergunta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Cadastrar pergunta</h4> 
            </div>
            <form method='post' id='pergunta-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="pergunta" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="pergunta" id="pergunta" value="" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;">
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $id_categoria ?>" style="display: none;">     
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="tipo" class="control-label">Tipo pergunta</label>
                                <select class="select2" id="tipo" name="tipo" style="text-transform: capitalize">
                                  <option value="#"></option>
                                  <?php listarTipOption($dbh); ?>
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

<div id="editar-pergunta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar pergunta</h4> 
            </div>
            <form method='post' id='pergunta-EditForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="editPergunta" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="editPergunta" id="editPergunta" value="" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="2" style="display: none;">
                                <input type="text" class="form-control" name="idPergunta" id="idPergunta" style="display: none;">    
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="editTipo" class="control-label">Tipo pergunta</label>
                                <select class="select2" id="editTipo" name="editTipo" style="text-transform: capitalize">
                                  <option id="tipoSelected" selected></option>
                                  <?php listarTipOption($dbh); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="editCat" class="control-label">Categoria</label>
                                <select class="select2" id="editCat" name="editCat">
                                  <option id="catSelected" selected></option>
                                  <?php listarCatOption($dbh,$id_categoria); ?>
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