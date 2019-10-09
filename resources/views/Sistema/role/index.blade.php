@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
                <h4 class="page-title">Roles</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Listado de Roles</h4>
                <div class="row">
                    <div class="col-md-6">
                        {{-- @can('roles.create') --}}
                        <button type="button" class="btn btn-danger btn-sm btn-rounded" @click="nuevoRol">
                            <i class="fas fa-plus"></i> Nuevo Rol 
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
                                        <th class="text-center text-white">Id</th>
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">Slug</th>
                                        <th class="text-white">Descripci&oacute;n</th>                                                 
                                        <th class="text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="total_roles == 0">
                                        <td class="text-center" colspan="5">-- Datos No Registrados - Tabla Vac&iacute;a --</td>
                                    </tr>
                                    <tr v-else v-for="rol in roles.data" :key="rol.id">
                                        <td class="text-center">@{{rol.id}}</td>
                                        <td>@{{rol.name}}</td>
                                        <td>@{{rol.slug}}</td>
                                        <td>@{{rol.description}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs"
                                                title="Mostrar Roles" @click="mostrar(rol.id)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-xs"
                                                title="Editar Roles" @click="editar(rol.id)" >
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                title="Eliminar Roles" @click="eliminar(rol.id)">
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
                                <li v-if="roles.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link">
                                        <span><i class="mdi mdi-skip-previous"></i></span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber" class="page-item"
                                    v-bind:class="[ page == isActived ? 'active' : '']">
                                    <a href="#" class="page-link"
                                        @click.prevent="changePage(page)">@{{ page }}</a>
                                </li>
                                <li v-if="roles.current_page < roles.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="changePage(roles.current_page + 1)">
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
    @include('Sistema.role.create')
    @include('Sistema.role.show')
    @include('Sistema.role.edit')
@endsection

@section('scripties')
    <script src="js/sistema/role.js"></script>
@endsection