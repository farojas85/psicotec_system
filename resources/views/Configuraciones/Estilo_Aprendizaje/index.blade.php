<div class="row">
    <div class="col-md-6">
        @can('estiloaprendizaje.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevoEstiloAprendizaje">
            <i class="fas fa-plus"></i> Nuevo Estilo de Aprendizaje 
        </button>
        @endcan
        @can('estiloaprendizaje.showdeletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosEstiloAprendizaje">
            <i class="far fa-trash-alt"></i> Mostrar Eliminados 
        </button>
        @endcan
    </div>
    <div class="col-md-6 text-right">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control"  placeholder="Buscar..." @change="">
            <div class="input-group-append">
                <button type="button" class="btn btn-info">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-center text-white" width="5px">Id</th>
                        <th class="text-white">Nombre</th>
                        <th class="text-white">Estado</th>
                        <th class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="total_aprendizajes == 0">
                        <td class="text-center" colspan="4">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('Configuraciones.Estilo_Aprendizaje.create')
@include('Configuraciones.Estilo_Aprendizaje.show')
@include('Configuraciones.Estilo_Aprendizaje.edit')