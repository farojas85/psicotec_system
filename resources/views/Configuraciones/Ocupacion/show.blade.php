<!-- sample modal content -->
<div id="ocupacion-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="ocupacion-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ocupacion-show-title">Mostrar Ocupaci&oacute;n</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="ocupacion-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="ocupacion.nombre" 
                            placeholder="Nombre Ocupación"  disabled>
                        <small class="text-danger" v-for="error in errores.codigo">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="ocupacion.area_id" disabled>
                            <option value="">-Área-</option>
                            <option v-for="area in areas_filtro" :key="area.id"
                                    :value="area.id">@{{area.nombre}}</option>
                        </select>
                        <small class="text-danger" v-for="error in errores.area_id">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="ocupacion.personalidad_id" disabled>
                            <option value="">-Personalidad-</option>
                            <option v-for="per in personalidads_filtro" :key="per.id"
                                    :value="per.id">@{{per.nombre}}</option>
                        </select>
                        <small class="text-danger" v-for="error in errores.personalidad_id">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input id="ocupacion-estado-show" type="checkbox" v-model="ocupacion.estado" disabled>
                            <label for="ocupacion-estado-show" v-if="ocupacion.estado == 1">Activo</label>
                            <label for="ocupacion-estado-show" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="ocupacion-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>