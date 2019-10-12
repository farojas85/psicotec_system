<!-- sample modal content -->
<div id="alternativa-create" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="alternativa-createLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="alternativa-create-title">Nueva Alternativa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="alternativa-create-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="burga_alternativa.nombre" 
                            placeholder="Nombre Alternativa" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="alternativa-create-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="guardarAlternativa">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>