<!-- sample modal content -->
<div id="afirmacion-create" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="afirmacion-createLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="afirmacion-create-title">Nueva Afirmaci&oacute;n</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="afirmacion-create-body">
                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control" v-model="burga_afirmacion.nombre"
                            placeholder="Nombre Afirmación"></textarea>
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="afirmacion-create-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="guardarAfirmacion">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>