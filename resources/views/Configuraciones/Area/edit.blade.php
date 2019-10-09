<!-- sample modal content -->
<div id="area-edit" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="area-editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="area-edit-title">Mostrar &Aacute;rea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="area-edit-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.siglas" 
                            placeholder="Siglas Área">
                        <small class="text-danger" v-for="error in errores.siglas">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.nombre" 
                            placeholder="Área Formativa">
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">                        
                        <div class="checkbox checkbox-success mb-2">
                            <input id="area-estado-edit" type="checkbox" v-model="area.estado">
                            <label for="area-estado-edit" v-if="area.estado == 1">Activo</label>
                            <label for="area-estado-edit" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="area-edit-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="actualizarArea">
                    <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>