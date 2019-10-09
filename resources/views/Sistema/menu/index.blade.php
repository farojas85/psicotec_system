@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item active">Men&uacute;s</li>
                    </ol>
                </div>
                <h4 class="page-title">Men&uacute;s</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Listado de Men&uacute;s</h4>
                <div class="row">
                    <div class="col-md-6">
                        {{-- @can('roles.create') --}}
                        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="nuevo">
                            <i class="fas fa-plus"></i> Nuevo Men&uacute; 
                        </button>
                        {{-- @endcan --}}
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="input-group input-group-sm">
                            <input type="text" v-model="busqueda"
                                class="form-control"  placeholder="Buscar..." @change="buscar">
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
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">Ruta</th>
                                        <th class="text-white">Padre</th>
                                        <th class="text-white">Orden</th>
                                        <th class="text-white">Estado</th>                                                
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="total_menus == 0">
                                        <td class="text-center" colspan="6">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                                    </tr>
                                    <tr v-else v-for="menu in menus.data" :key="menu.id">
                                        <td>@{{menu.nombre}}</td>
                                        <td class="text-center">
                                            <span v-if="menu.ruta">@{{menu.ruta}}</span>
                                            <span v-else>--</span>
                                        </td>
                                        <td class="text-center">
                                            <span v-if="menu.padre">@{{menu.padre.nombre}}</span>
                                            <span v-else>--</span>
                                        </td>
                                        <td class="text-center">@{{menu.orden}}</td>
                                        <td class="text-center">
                                            <span class="badge badge-success" v-if="menu.estado">Activo</span>
                                            <span class="badge badge-danger" v-else>Inactivo</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-blue btn-xs"
                                                title="Mostrar Menú" @click="mostrar(menu.id)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-xs"
                                                title="Editar Usuario" @click="editar(menu.id)" >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                title="Eliminar Usuario" @click="eliminar(menu.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
		                <nav>
                            <ul class="pagination">
                                <li v-if="menus.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link">
                                        <span><i class="mdi mdi-skip-previous"></i></span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber" class="page-item"
                                    v-bind:class="[ page == isActived ? 'active' : '']">
                                    <a href="#" class="page-link"
                                        @click.prevent="changePage(page)">@{{ page }}</a>
                                </li>
                                <li v-if="menus.current_page < menus.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="changePage(menus.current_page + 1)">
                                        <span aria-hidden="true"><i class="mdi mdi-skip-next"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
    @include('Sistema.menu.create')
    @include('Sistema.menu.show')
    @include('Sistema.menu.edit')
@endsection

@section('scripties')
    <script src="js/sistema/menu.js"></script>
@endsection