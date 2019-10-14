@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item active">Configuraciones</li>
                        <li class="breadcrumb-item active">Colegio</li>
                    </ol>
                </div>
                <h4 class="page-title">Colegios</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Importar Colegios</h4>
                    <div class="row">
                        <div class="col-md-6">                        
                                <form name="foo" enctype="multipart/form-data">
                                    <input type="file" @change="cargarArchivo">
                                    <small class="text-danger" v-for="error in errores.file">@{{ error }}</small>
                                </form>
                                @can('colegio.cargar')
                                <button type="button" class="btn btn-success btn-sm btn-rounded mt-2" 
                                    @click="subir" v-show="excel_file!=''">
                                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel
                                </button>
                                @endcan
                            </form>
                            <span>
                            @can('colegio.procesar')
                                <button type="button" class="btn btn-blue btn-sm btn-rounded mt-2" 
                                        @click="" v-show="procesar">
                                    <i class="fas fa-redo-alt"></i> Procesar
                                </button>
                            @endcan
                            </span>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control"  placeholder="Buscar..." 
                                        @change="">
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
                                            <th class="text-white" width="10px">N&deg;</th>
                                            <th class="text-white">Codigo Modular</th>
                                            <th class="text-white">Colegio</th>
                                            <th class="text-white">Ubigeo</th>                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="total_colegios == 0">
                                            <td colspan="4" class="text-center text-danger">
                                                -- Datos No Registrados --
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(colegio,index) in colegios.data" :key="colegio.id">
                                            <td>@{{ index+1}}</td>
                                            <td>@{{ colegio.codigo_modular }}</td>
                                            <td>@{{ colegio.nombre }}</td>
                                            <td>@{{ colegio.ubigeo }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
		                    <nav>
                                <ul class="pagination">
                                    <li v-if="colegios.current_page > 1" class="page-item">
                                        <a href="#" aria-label="Previous" class="page-link">
                                            <span><i class="mdi mdi-skip-previous"></i></span>
                                        </a>
                                    </li>
                                    <li v-for="page in pagesNumber" class="page-item"
                                        v-bind:class="[ page == isActived ? 'active' : '']">
                                        <a href="#" class="page-link"
                                            @click.prevent="changePage(page)">@{{ page }}</a>
                                    </li>
                                    <li v-if="colegios.current_page < colegios.last_page" class="page-item">
                                        <a href="#" aria-label="Next" class="page-link"
                                            @click.prevent="changePage(colegios.current_page + 1)">
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
    </div>
@endsection

@section('scripties')
    <script src="js/configuraciones/colegio.js"></script>
@endsection