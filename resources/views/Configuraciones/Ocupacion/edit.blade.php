<!-- sample modal content -->
<div id="ocupacion-edit" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="ocupacion-editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ocupacion-edit-title">Editar Ocupaci&oacute;n</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="ocupacion-edit-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="ocupacion.nombre" 
                            placeholder="Nombre Ocupación" >
                        <small class="text-danger" v-for="error in errores.codigo">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="ocupacion.area_id">
                            <option value="">-Área-</option>
                            <option v-for="area in areas_filtro" :key="area.id"
                                    :value="area.id">@{{area.nombre}}</option>
                        </select>
                        <small class="text-danger" v-for="error in errores.area_id">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="ocupacion.personalidad_id">
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
                            <input id="ocupacion-estado-edit" type="checkbox" v-model="ocupacion.estado">
                            <label for="ocupacion-estado-edit" v-if="ocupacion.estado == 1">Activo</label>
                            <label for="ocupacion-estado-edit" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="ocupacion-edit-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="actualizarOcupacion">
                    <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>