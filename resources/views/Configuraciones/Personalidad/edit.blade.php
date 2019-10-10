<!-- sample modal content -->
<div id="personalidad-edit" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="personalidad-editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="personalidad-edit-title">Editar Personalidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="personalidad-edit-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.codigo" 
                            placeholder="Código Personalidad" >
                        <small class="text-danger" v-for="error in errores.codigo">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.nombre" 
                            placeholder="Nombre Personalidad" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input id="personalidad-estado-edit" type="checkbox" v-model="personalidad.estado" >
                            <label for="personalidad-estado-edit" v-if="personalidad.estado == 1">Activo</label>
                            <label for="personalidad-estado-edit" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="personalidad-edit-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" @click="actualizarPersonalidad">
                    <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>