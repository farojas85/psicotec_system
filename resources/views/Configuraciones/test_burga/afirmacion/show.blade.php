<!-- sample modal content -->
<div id="afirmacion-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="afirmacion-showLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="afirmacion-show-title">Mostrar Afirmaci&oacute;n</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="afirmacion-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control" v-model="burga_afirmacion.nombre"
                            placeholder="Nombre Afirmación" disabled></textarea>
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="afirmacion-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>