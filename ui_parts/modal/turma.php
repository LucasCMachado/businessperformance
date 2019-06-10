<div id="cadastrar-turma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Cadastrar Turma</h4> 
            </div>
            <form method='post' id='turma-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nome" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
                            </div>
                            <div class="form-group"> 
                                <label for="data" class="control-label">Data</label> 
                                <input type="text" class="form-control" name="data" id="data" placeholder="">
                            </div>
                            <div class="form-group"> 
                                <label for="local" class="control-label">Local</label> 
                                <input type="text" class="form-control" name="local" id="local" placeholder="">
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

<div id="editar-turma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar Turma</h4> 
            </div>
            <form method='post' id='turma-EditForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nome" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="editNome" id="editNome" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
                                <input type="text" class="form-control" name="idTurma" id="idTurma" value="1" style="display: none;"> 
                            </div>
                            <div class="form-group"> 
                                <label for="data" class="control-label">Data</label> 
                                <input type="text" class="form-control" name="editData" id="editData" placeholder="">
                            </div>
                            <div class="form-group"> 
                                <label for="local" class="control-label">Local</label> 
                                <input type="text" class="form-control" name="editLocal" id="editLocal" placeholder="">
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

<div id="cadastrar-formacao" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Vincular formação</h4> 
            </div>
            <form method='post' id='formacao-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <input type="text" class="form-control" name="turma" id="turma" value="<?php echo $id; ?>" style="display: none;"> 
                                <input type="text" class="form-control" name="op" id="op" value="4" style="display: none;"> 
                            </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="formacao" class="control-label">Formação</label>
                                <select class="select2" id="formacao" name="formacao">
                                  <option value="#">&nbsp;</option>
                                  <?php listarFormacaoOption($dbh); ?>
                                </select>
                            </div>
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