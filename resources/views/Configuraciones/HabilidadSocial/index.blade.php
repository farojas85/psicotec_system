<div class="row">
    <div class="col-md-6">
        @can('habilidadsocial.create')
        <button type="button" class="btn btn-success btn-sm btn-rounded" @click="nuevaHabilidadSocial">
            <i class="fas fa-plus"></i> Nueva Habilidad Social 
        </button>
        @endcan
        @can('habilidadsocial.showdeletes')
        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="mostrarEliminadosHabilidadSocial">
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
                    <tr v-if="total_habilidadSocial == 0">
                        <td class="text-center" colspan="5">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                    </tr>
                    <tr v-else v-for="hab in habilidadSocials.data" :key="hab.id">
                        <td>@{{ hab.id}}</td>
                        <td>@{{ hab.nombre }}</td>
                        <td class="text-center">
                            <span class="badge badge-success" v-if="hab.estado">Activo</span>
                            <span class="badge badge-danger" v-else>Inactivo</span>
                        </td>
                        <td>
                            <span v-show="!showdeletes">
                            @can('habilidadsocial.show')
                            <button type="button" class="btn btn-blue btn-xs"
                                title="Mostrar Habilidad Social" @click="mostrarHabilidadSocial(hab.id)">
                                <i class="fas fa-eye"></i>
                            </button>
                            @endcan
                            @can('habilidadsocial.edit')
                            <button type="button" class="btn btn-warning btn-xs"
                                title="Editar Habilidad Social" @click="editarHabilidadSocial(hab.id)" >
                                <i class="fas fa-edit"></i>
                            </button>
                            @endcan
                            @can('habilidadsocial.destroy')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Eliminar Habilidad Social" @click="eliminarHabilidadSocial(hab.id)">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endcan
                            </span>
                            <span v-show="showdeletes">
                            @can('habilidadsocial.restoredelete')
                            <button type="button" class="btn btn-danger btn-xs"
                                title="Restaurar Habilidad Social Eliminada" @click="restaurarHabilidadSocial(hab.id)">
                                <i class="fas fa-trash-restore"></i>
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
                <li v-if="habilidadSocials.current_page > 1" class="page-item">
                    <a href="#" aria-label="Previous" class="page-link">
                        <span><i class="mdi mdi-skip-previous"></i></span>
                    </a>
                </li>
                <li v-for="page in pagesNumberHabilidad" class="page-item"
                    v-bind:class="[ page == isActivedHabilidad ? 'active' : '']">
                    <a href="#" class="page-link"
                        @click.prevent="changePageHabilidades(page)">@{{ page }}</a>
                </li>
                <li v-if="habilidadSocials.current_page < habilidadSocials.last_page" class="page-item">
                    <a href="#" aria-label="Next" class="page-link"
                        @click.prevent="changePageHabilidades(habilidadSocials.current_page + 1)">
                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('Configuraciones.HabilidadSocial.create')
@include('Configuraciones.HabilidadSocial.show')
@include('Configuraciones.HabilidadSocial.edit')