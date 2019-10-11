<div class="row">
    <div class="col-md-6">
        @can('ocupacion.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevaOcupacion">
            <i class="fas fa-plus"></i> Nueva Ocupaci&oacute;n
        </button>
        @endcan
        <span v-show="showdeletes_ocupacion==false">
        @can('ocupacion.showdeletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosOcupacion">
            <i class="far fa-trash-alt"></i> Mostrar Eliminados 
        </button>
        @endcan
        </span>
        <span v-show="showdeletes_ocupacion==true">
        @can('ocupacion.showactivos')
        <button type="button" class="btn btn-blue btn-sm btn-rounded" @click="mostrarActivosOcupacion">
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
                        <th class="text-center text-white">Nombre</th>
                        <th class="text-white">&Aacute;rea</th>
                        <th class="text-white">Personalidad</th>
                        <th class="text-white">Estado</th>
                        <th class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="total_ocupaciones==0">
                        <td colspan="5" class="text-danger text-center">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                    <tr v-else v-for="ocupacion in ocupaciones.data" :key="ocupacion.id">
                        <td>@{{ ocupacion.nombre }}</td>
                        <td>@{{ ocupacion.area.nombre }}</td>
                        <td>@{{ ocupacion.personalidad.nombre }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="ocupacion.estado">Activo</span>
                            <span class="badge badge-danger" v-else>Inactivo</span>
                        </td>
                        <td>
                            <span v-show="!showdeletes_ocupacion">
                                @can('ocupacion.show')
                                    <button type="button" class="btn btn-blue btn-xs"
                                        title="Mostrar Ocupación" @click="mostrarOcupacion(ocupacion.id)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @endcan
                                @can('ocupacion.edit')
                                    <button type="button" class="btn btn-warning btn-xs"
                                        title="Editar Ocupación" @click="editarOcupacion(ocupacion.id)" >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endcan
                                @can('ocupacion.destroy')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Eliminar Ocupación" @click="eliminarOcupacion(ocupacion.id)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endcan
                            </span>
                            <span v-show="showdeletes_ocupacion">
                                @can('ocupacion.restoredelete')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Restaurar Ocupación Eliminada" @click="restaurarOcupacion(ocupacion.id)">
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
                <li v-if="ocupaciones.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberOcupacion" class="page-item"
                    v-bind:class="[ page == isActivedOcupacion ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePageOcupaciones(page)">@{{ page }}</a>
                </li>
                <li v-if="ocupaciones.current_page < ocupaciones.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePageOcupaciones(ocupaciones.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.Ocupacion.create')
@include('Configuraciones.Ocupacion.show')
@include('Configuraciones.Ocupacion.edit')