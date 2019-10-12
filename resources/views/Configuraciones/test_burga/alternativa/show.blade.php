<!-- sample modal content -->
<div id="alternativa-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="alternativa-showLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="alternativa-show-title">Mostrar Alternativa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="alternativa-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="burga_alternativa.nombre" 
                            placeholder="Nombre Alternativa" disabled >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="alternativa-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>