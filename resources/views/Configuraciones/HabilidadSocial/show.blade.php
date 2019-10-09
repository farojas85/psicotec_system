<!-- sample modal content -->
<div id="habilidad-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="habilidad-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="habilidad-show-title">Mostrar Habilidad Social</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="habilidad-show-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="habilidad_social.nombre" 
                            placeholder="Nombre Habilidad Social">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <textarea rows="5" v-model="habilidad_social.descripcion" class="form-control" 
                                placeholder="Descripción de Hablidad Social" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="habilidad-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->