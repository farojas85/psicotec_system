<!-- sample modal content -->
<div id="afirmacion-edit" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="afirmacion-editLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="afirmacion-edit-title">Editar Afirmaci&oacute;n</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="afirmacion-edit-body">
                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control" v-model="burga_afirmacion.nombre"
                            placeholder="Nombre Afirmación"></textarea>
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="afirmacion-edit-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="actualizarAfirmacion">
                    <i class="fa fa-save"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>