<div class="row">
        <div class="col-md-6">
            @can('burga-afirmacion.create')
            <button type="button" class="btn btn-success btn-sm btn-rounded" 
                    @click="nuevaAfirmacion">
                <i class="fas fa-plus"></i> Nueva Afirmaci&oacute;n
            </button>
            @endcan
            <span v-show="showdeletes_burga_afirmacion==false">
            @can('burga-afirmacion.show-deletes')
            <button type="button" class="btn btn-danger btn-sm btn-rounded" 
                    @click="mostrarEliminadosAfirmacion">
                <i class="far fa-trash-alt"></i> Mostrar Eliminados 
            </button>
            @endcan
            </span>
            <span v-show="showdeletes_burga_afirmacion==true">
            @can('burga-afirmacion.show-actives')
            <button type="button" class="btn btn-blue btn-sm btn-rounded" 
                    @click="mostrarActivosAfirmacion">
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
                            <th class="text-center text-white" width="5px">ID</th>
                            <th class="text-white">Nombre</th>
                            <th class="text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="total_burga_afirmaciones==0">
                            <td colspan="4" class="text-danger text-center">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                        </tr>
                        <tr v-else v-for="afi in burga_afirmaciones.data" :key="afi.id">
                            <td>@{{ afi.id}}</td>
                            <td>@{{ afi.nombre }}</td>
                            <td>
                                <span v-show="!showdeletes_burga_afirmacion">
                                    @can('burga-afirmacion.show')
                                        <button type="button" class="btn btn-blue btn-xs"
                                            title="Mostrar Afirmación" @click="mostrarAfirmacion(afi.id)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    @endcan
                                    @can('burga-afirmacion.edit')
                                        <button type="button" class="btn btn-warning btn-xs"
                                            title="Editar Afirmación" @click="editarAfirmacion(afi.id)" >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('burga-afirmacion.destroy')
                                        <button type="button" class="btn btn-danger btn-xs"
                                            title="Eliminar Afirmación" @click="eliminarAfirmacion(afi.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endcan
                                </span>
                                <span v-show="showdeletes_burga_afirmacion">
                                    @can('burga-afirmacion.restore-delete')
                                        <button type="button" class="btn btn-danger btn-xs"
                                            title="Restaurar Afirmación" @click="restaurarAfirmacion(afi.id)">
                                            <i class="fas fa-trash-restore-alt"></i>
                                        </button>
                                    @endcan
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination">
                    <li v-if="burga_afirmaciones.current_page > 1" class="page-item">
                        <a href="#" aria-label="Previous" class="page-link">
                            <span><i class="mdi mdi-skip-previous"></i></span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumberAfirmacion" class="page-item"
                        v-bind:class="[ page == isActivedAfirmacion ? 'active' : '']">
                        <a href="#" class="page-link"
                            @click.prevent="changePageAfirmaciones(page)">@{{ page }}</a>
                    </li>
                    <li v-if="burga_afirmaciones.current_page < burga_afirmaciones.last_page" class="page-item">
                        <a href="#" aria-label="Next" class="page-link"
                            @click.prevent="changePageAfirmaciones(burga_afirmaciones.current_page + 1)">
                            <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    
    @include('Configuraciones.test_burga.afirmacion.create')
    @include('Configuraciones.test_burga.afirmacion.show')
    @include('Configuraciones.test_burga.afirmacion.edit')