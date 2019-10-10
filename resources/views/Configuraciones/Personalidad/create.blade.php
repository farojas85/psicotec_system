<!-- sample modal content -->
<div id="personalidad-create" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="personalidad-createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="personalidad-create-title">Nueva Personalidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="personalidad-create-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.codigo" 
                            placeholder="Código Personalidad" >
                        <small class="text-danger" v-for="error in errores.codigo">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="personalidad.nombre" 
                            placeholder="Nombre Personalidad" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="personalidad-create-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" @click="guardarPersonalidad">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>