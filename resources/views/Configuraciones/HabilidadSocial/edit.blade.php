<!-- sample modal content -->
<div id="habilidad-edit" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="habilidad-editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="habilidad-edit-title">Editar Habilidad Social</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="habilidad-edit-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="habilidad_social.nombre" 
                            placeholder="Nombre Habilidad Social" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <textarea rows="5" v-model="habilidad_social.descripcion" class="form-control" 
                                placeholder="Descripción de Hablidad Social"></textarea>
                        <small class="text-danger" v-for="error in errores.descripcion">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-success mb-2">
                            <input id="estado" type="checkbox" v-model="habilidad_social.estado">
                            <label for="estado" v-if="habilidad_social.estado == 1">Activo</label>
                            <label for="estado" v-else>Inactivo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="habilidad-edit-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" @click="actualizarHabilidadSocial">
                    <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->