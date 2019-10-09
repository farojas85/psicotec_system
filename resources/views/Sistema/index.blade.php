@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item active">Sistema</li>
                    </ol>
                </div>
                <h4 class="page-title">Configuraciones del Sistema</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="false" class="nav-link active"
                                @click="vistaRoles" >
                                Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="true" class="nav-link" 
                                @click="vistaUsuario">
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="false" class="nav-link"  >
                                Permisos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="false" class="nav-link" >
                                Permisos/Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="false" class="nav-link" >
                                Men&uacute;s
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="tab" aria-expanded="false" class="nav-link" >
                                Men&uacute;s/Roles
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @include('Sistema.role')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripties')
<script src="js/sistema/sistema.js" ></script>
@endsection