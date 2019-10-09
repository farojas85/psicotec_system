<!-- sample modal content -->
<div id="modelo-show" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="modelo-showLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelo-show-title">Mostrar Rol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="modelo-show-body">
                <input type="hidden" v-model="role.id" >
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="role.name" 
                            placeholder="Nombre de Rol" disabled >
                        <small class="text-danger" v-for="error in errores.name">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="role.slug" 
                            placeholder="Enlace/Slug de Rol"  disabled>
                        <small class="text-danger" v-for="error in errores.slug">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" v-model="role.description" 
                            placeholder="Descripción de Rol"  disabled>
                        <small class="text-danger" v-for="error in errores.description">@{{ error }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <select class="form-control" v-model="role.special" disabled>
                            <option value="">Acceso Parcial</option>
                            <option v-for="acceso in accesos" :key="acceso.id" 
                                    :value="acceso.id">@{{ acceso.nombre }}</option>
                        </select>
                        <small class="text-danger" v-for="error in errores.special">@{{ error }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="modelo-show-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->