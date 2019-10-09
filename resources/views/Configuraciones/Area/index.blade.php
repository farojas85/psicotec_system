<div class="row">
    <div class="col-md-6">
        @can('area.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevaArea">
            <i class="fas fa-plus"></i> Nueva &Aacute;rea
        </button>
        @endcan
        @can('area.showdeletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosArea">
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
                        <th class="text-center text-white" width="5px">Siglas</th>
                        <th class="text-white">Nombre</th>
                        <th class="text-white">Estado</th>
                        <th class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="total_areas == 0">
                        <td class="text-center" colspan="4">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                    <tr v-else v-for="area in areas.data" :key="area.id">
                        <td>@{{ area.siglas}}</td>
                        <td>@{{ area.nombre }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="area.estado">Activo</span>
                            <span class="badge badge-danger" v-else>Inactivo</span>
                        </td>
                        <td>
                            <span v-show="!showdeletes_area">
                            @can('area.show')
                            <button type="button" class="btn btn-blue btn-xs"
                                title="Mostrar Área" @click="mostrarArea(area.id)">
                                <i class="fas fa-eye"></i>
                            </button>
                            @endcan
                            @can('area.edit')
                            <button type="button" class="btn btn-warning btn-xs"
                                title="Editar Área" @click="editarArea(area.id)" >
                                <i class="fas fa-edit"></i>
                            </button>
                            @endcan
                            @can('area.destroy')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Eliminar Área" @click="eliminarArea(area.id)">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endcan
                            </span>
                            <span v-show="showdeletes_area">
                            @can('area.restoredelete')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Restaurar Área Eliminado" @click="restaurarArea(area.id)">
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
                <li v-if="areas.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberArea" class="page-item"
                    v-bind:class="[ page == isActivedArea ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePageAreas(page)">@{{ page }}</a>
                </li>
                <li v-if="areas.current_page < areas.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePageAreas(areas.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.Area.create')
@include('Configuraciones.Area.show')
@include('Configuraciones.Area.edit')