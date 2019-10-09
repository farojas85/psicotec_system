<!-- sample modal content -->
<div id="area-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="area-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="area-show-title">Mostrar &Aacute;rea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="area-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.siglas" 
                            placeholder="Siglas Área" disabled>
                        <small class="text-danger" v-for="error in errores.siglas">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.nombre" 
                            placeholder="Área Formativa" disabled>
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input type="checkbox" v-model="area.estado" disabled>
                            <label v-if="area.estado == 1">Activo</label>
                            <label v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="area-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>