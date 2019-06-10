<div id="certificado-cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Certificado por cliente</h4> 
            </div>
            <form method='post' id='' action="gera-certificado-unico" role="form" target="_blank"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="nomeCliente" class="control-label">Nome do cliente</label> 
                                <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" value="" placeholder=""> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="assessment" class="control-label">Assessments</label>
                                <select class="select2" id="assessment" name="assessment">
                                  <option value="#">&nbsp;</option>
                                  <?php listarFormOption($dbh); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="cargaHoraria" class="control-label">Carga horária</label> 
                                <input type="text" class="form-control time" name="cargaHoraria" id="cargaHoraria" value="" placeholder=""> 
                            </div> 
                        </div>
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="data" class="control-label">Data</label> 
                                <input type="text" class="form-control date" name="data" id="data" value="" placeholder=""> 
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

<div id="certificado-grupo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Certificado grupo</h4> 
            </div>
            <form method='post' id='categoria-EditForm' action="gera-certificado-multiplo" role="form"> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="editForm" class="control-label">Clientes</label>
                                <select class="select2" name="clientes[]" multiple>
                                    <option value="#">&nbsp;</option> 
                                    <?php listarClienteOption($dbh); ?>                                           
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editForm" class="control-label">Assessments</label>
                                <select class="select2" name="assessment">
                                  <option id="formSelected" selected>&nbsp</option>
                                  <?php listarFormOption($dbh); ?>
                                </select>
                            </div>
                            <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="cargaHoraria" class="control-label">Carga horária</label> 
                                <input type="text" class="form-control time" name="cargaHoraria" id="cargaHoraria" value="" placeholder=""> 
                            </div> 
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="data" class="control-label">Data</label> 
                                    <input type="text" class="form-control date" name="data" id="data" value="" placeholder=""> 
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