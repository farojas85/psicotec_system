<!-- sample modal content -->
<div id="estilo-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="estilo-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="estilo-show-title">Mostrar Estilo de Aprendizaje</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="estilo-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="estilo_aprendizaje.nombre" 
                            placeholder="Nombre Estilo Aprendizaje"  disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <textarea rows="5" v-model="estilo_aprendizaje.descripcion" class="form-control" 
                                placeholder="Descripción de Estilo de Aprendizaje" disabled></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input id="estado" type="checkbox" v-model="estilo_aprendizaje.estado" disabled>
                            <label for="estado" v-if="estilo_aprendizaje.estado == 1">Activo</label>
                            <label for="estado" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="estilo-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->