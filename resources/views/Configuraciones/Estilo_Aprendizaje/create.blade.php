<!-- sample modal content -->
<div id="estilo-create" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="estilo-createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="estilo-create-title">Nuevo Estilo de Aprendizaje</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="estilo-create-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="estilo_aprendizaje.nombre" 
                            placeholder="Nombre Estilo Aprendizaje" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <textarea rows="5" v-model="estilo_aprendizaje.descripcion" class="form-control" 
                                placeholder="Descripción de Estilo de Aprendizaje"></textarea>
                        <small class="text-danger" v-for="error in errores.descripcion">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="estilo-create-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" @click="guardarEstiloAprendizaje">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>