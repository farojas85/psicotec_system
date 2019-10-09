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
                    <tr v-else v-for="estilo in estiloAprendizajes.data" :key="estilo.id">
                        <td>@{{ estilo.id}}</td>
                        <td>@{{ estilo.nombre }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="estilo.estado">Activo</span>
                            <span class="badge badge-danger" v-else>Inactivo</span>
                        </td>
                        <td>
                            <span v-show="!showdeletes_estilo">
                            @can('estiloaprendizaje.show')
                            <button type="button" class="btn btn-blue btn-xs"
                                title="Mostrar Estilo de Aprendizaje" @click="mostrarEstiloAprendizaje(estilo.id)">
                                <i class="fas fa-eye"></i>
                            </button>
                            @endcan
                            @can('estiloaprendizaje.edit')
                            <button type="button" class="btn btn-warning btn-xs"
                                title="Editar Estilo de Aprendizaje" @click="editarEstiloAprendizaje(estilo.id)" >
                                <i class="fas fa-edit"></i>
                            </button>
                            @endcan
                            @can('estiloaprendizaje.destroy')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Eliminar Estilo de Aprendizaje" @click="eliminarEstiloAprendizaje(estilo.id)">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endcan
                            </span>
                            <span v-show="showdeletes_estilo">
                            @can('estiloaprendizaje.restoredelete')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Restaurar Estilo de Aprendizaje Eliminado" @click="restaurarEstiloAprendizaje(estilo.id)">
                                <i class="fas fa-trash-restore-alt"></i>
                            </button>
                            @endcan
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="estiloAprendizajes.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberEstilo" class="page-item"
                    v-bind:class="[ page == isActivedEstilo ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePageEstilos(page)">@{{ page }}</a>
                </li>
                <li v-if="estiloAprendizajes.current_page < estiloAprendizajes.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePageEstilos(estiloAprendizajes.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.Estilo_Aprendizaje.create')
@include('Configuraciones.Estilo_Aprendizaje.show')
@include('Configuraciones.Estilo_Aprendizaje.edit')