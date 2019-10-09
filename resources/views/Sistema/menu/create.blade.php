<!-- sample modal content -->
<div id="modelo" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="modeloLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelo-title">Nuevo Men&uacute;</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="modelo-body">
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="menu.nombre" 
                            placeholder="Nombre de Menú" >
                        <small class="text-danger" v-for="error in errores.nombre">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="menu.ruta" 
                            placeholder="Ruta de Menú / Enlace" >
                        <small class="text-danger" v-for="error in errores.ruta">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="menu.icono" 
                            placeholder="Ícono de Menú" >
                        <small class="text-danger" v-for="error in errores.icono">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="menu.padre_id">
                            <option value="">-PADRE-</option>
                            <option v-for="padre in padres" :key="padre.id" 
                                    :value="padre.id">@{{ padre.nombre }}</option>
                        </select>
                        <small class="text-danger" v-for="error in errores.padre_id">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="modelo-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-success waves-effect waves-light" @click="guardar">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->