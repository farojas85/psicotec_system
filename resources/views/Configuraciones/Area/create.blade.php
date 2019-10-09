<!-- sample modal content -->
<div id="area-create" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="area-createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="area-create-title">Nueva &Aacute;rea</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="area-create-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.siglas" 
                            placeholder="Siglas Área" >
                        <small class="text-danger" v-for="error in errores.siglas">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="area.nombre" 
                            placeholder="Área Formativa" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="area-create-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" 
                        @click="guardarArea">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>