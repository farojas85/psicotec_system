<div class="row">
    <div class="col-md-6">
        @can('burga-alternativa.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevaAlternativa">
            <i class="fas fa-plus"></i> Nueva Alternativa
        </button>
        @endcan
        <span v-show="showdeletes_burga_alternativa==false">
        @can('burga-alternativa.show-deletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosAlternativa">
            <i class="far fa-trash-alt"></i> Mostrar Eliminados 
        </button>
        @endcan
        </span>
        <span v-show="showdeletes_burga_alternativa==true">
        @can('burga-alternativa.show-actives')
        <button type="button" class="btn btn-blue btn-sm btn-rounded" @click="mostrarActivosAlternativa">
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
                        <th class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="total_burga_alternativas==0">
                        <td colspan="4" class="text-danger text-center">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                    <tr v-else v-for="burga in burga_alternativas.data" :key="burga.id">
                        <td>@{{ burga.id}}</td>
                        <td>@{{ burga.nombre }}</td>
                        <td>
                            <span v-show="!showdeletes_burga_alternativa">
                                @can('burga-alternativa.show')
                                    <button type="button" class="btn btn-blue btn-xs"
                                        title="Mostrar burga" @click="mostrarAlternativa(burga.id)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @endcan
                                @can('burga-alternativa.edit')
                                    <button type="button" class="btn btn-warning btn-xs"
                                        title="Editar burga" @click="editarAlternativa(burga.id)" >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @endcan
                                @can('burga-alternativa.destroy')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Eliminar burga" @click="eliminarAlternativa(burga.id)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endcan
                            </span>
                            <span v-show="showdeletes_burga_alternativa">
                                @can('burga-alternativa.restore-delete')
                                    <button type="button" class="btn btn-danger btn-xs"
                                        title="Restaurar burga Eliminado" @click="restaurarAlternativa(burga.id)">
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
                <li v-if="burga_alternativas.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberBurgaAlt" class="page-item"
                    v-bind:class="[ page == isActivedBurgaAlt ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePageBurgaAlt(page)">@{{ page }}</a>
                </li>
                <li v-if="burga_alternativas.current_page < burga_alternativas.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePageBurgaAlt(burga_alternativas.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.test_burga.alternativa.create')
@include('Configuraciones.test_burga.alternativa.show')
@include('Configuraciones.test_burga.alternativa.edit')