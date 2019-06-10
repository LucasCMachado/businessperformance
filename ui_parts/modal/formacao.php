<div id="cadastrar-formacao" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Cadastrar Formação</h4> 
            </div>
            <form method='post' id='formacao-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nome" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="1" style="display: none;"> 
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

<div id="editar-formacao" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Editar Formação</h4> 
            </div>
            <form method='post' id='formacao-EditForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="editNomeForm" class="control-label">Nome</label> 
                                <input type="text" class="form-control" name="editNomeForm" id="editNomeForm" placeholder="">
                                <input type="text" class="form-control" name="op" id="op" value="2" style="display: none;">
                                <input type="text" class="form-control" name="token" id="token" style="display: none;"> 
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

<div id="cadastrar-assessments" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Vincular assessments</h4> 
            </div>
            <form method='post' id='assessment-SaveForm' action="#" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <input type="text" class="form-control" name="formacao" id="formacao" value="<?php echo $id; ?>" style="display: none;"> 
                                <input type="text" class="form-control" name="op" id="op" value="6" style="display: none;"> 
                            </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="assessment" class="control-label">Assessments</label>
                                <select class="select2" id="assessment" name="assessment">
                                  <option value="#">&nbsp;</option>
                                  <?php listarAssessmentOption($dbh); ?>
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