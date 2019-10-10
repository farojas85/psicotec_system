<div class="row">
    <div class="col-md-6">
        @can('personalidad.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevaPersonalidad">
            <i class="fas fa-plus"></i> Nueva Personalidad
        </button>
        @endcan
        <span v-show="showdeletes_personalidad==false">
        @can('personalidad.showdeletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosPersonalidad">
            <i class="far fa-trash-alt"></i> Mostrar Eliminados 
        </button>
        @endcan
        </span>
        <span v-show="showdeletes_personalidad==true">
        @can('personalidad.showactivos')
        <button type="button" class="btn btn-blue btn-sm btn-rounded" @click="mostrarActivosPersonalidad">
            <i class="fas fa-eye"></i> Mostrar Activos 
        </button>
        @endcan
        </span>
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
                        <th class="text-center text-white" width="5px">C&oacute;digo</th>
                        <th class="text-white">Nombre</th>
                        <th class="text-white">Estado</th>
                        <th class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="total_personalidads==0">
                        <td colspan="4" class="text-danger text-center">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                    <tr v-else v-for="personalidad in personalidads.data" :key="personalidad.id">
                        <td>@{{ personalidad.codigo}}</td>
                        <td>@{{ personalidad.nombre }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="personalidad.estado">Activo</span>
                            <span class="badge badge-danger" v-else>Inactivo</span>
                        </td>
                        <td>
                            <span v-show="!showdeletes_personalidad">
                                @can('personalidad.show')
                                    <button type="button" class="btn btn-blue btn-xs"
                                        title="Mostrar Personalidad" @click="mostrarPersonalidad(personalidad.id)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @endcan
                                @can('personalidad.edit')
                                    <button type="button" class="btn btn-warning btn-xs"
                                        title="Editar Personalidad" @click="editarPersonalidad(personalidad.id)" >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endcan
                                @can('personalidad.destroy')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Eliminar Personalidad" @click="eliminarPersonalidad(personalidad.id)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endcan
                            </span>
                            <span v-show="showdeletes_personalidad">
                                @can('personalidad.restoredelete')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Restaurar Personalidad Eliminado" @click="restaurarPersonalidad(personalidad.id)">
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
                <li v-if="personalidads.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberPersonalidad" class="page-item"
                    v-bind:class="[ page == isActivedPersonalidad ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePagePersonalidades(page)">@{{ page }}</a>
                </li>
                <li v-if="personalidads.current_page < personalidads.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePagePersonalidades(personalidads.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.Personalidad.create')
@include('Configuraciones.Personalidad.show')
@include('Configuraciones.Personalidad.edit')