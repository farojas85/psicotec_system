<!-- sample modal content -->
<div id="personalidad-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="personalidad-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="personalidad-show-title">Mostrar Personalidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="personalidad-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.codigo" 
                            placeholder="Código Personalidad" disabled>
                        <small class="text-danger" v-for="error in errores.codigo">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.nombre" 
                            placeholder="Nombre Personalidad" disabled>
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input type="checkbox" v-model="personalidad.estado" disabled>
                            <label v-if="personalidad.estado == 1">Activo</label>
                            <label v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="personalidad-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>