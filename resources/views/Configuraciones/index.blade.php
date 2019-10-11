@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item active">Configuraciones</li>
                    </ol>
                </div>
                <h4 class="page-title">Configuraciones de Módulos</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                        <ul class="nav nav-pills navtab-bg nav-justified">
                        @can('habilidadsocial.index')
                        <li class="nav-item">
                            <a href="#habilidades" data-toggle="tab" aria-expanded="false" class="nav-link show active">
                                Habilidades Sociales
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="#estilos" data-toggle="tab" aria-expanded="true" class="nav-link" >
                                Estilos de Aprendizaje
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#areas" data-toggle="tab" aria-expanded="false" class="nav-link"  >
                                &Aacute;reas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#personalidades" data-toggle="tab" aria-expanded="false" class="nav-link" >
                                Personalidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#ocupaciones" data-toggle="tab" aria-expanded="false" class="nav-link" >
                                Ocupaciones
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @can('habilidadsocial.index')
                        <div class="tab-pane active" id="habilidades">
                            @include('Configuraciones.HabilidadSocial.index')
                        </div>
                        @endcan
                        <div class="tab-pane " id="estilos">
                            @include('Configuraciones.Estilo_Aprendizaje.index')
                        </div>
                        <div class="tab-pane" id="areas">
                            @include('Configuraciones.Area.index')
                        </div>
                        <div class="tab-pane" id="personalidades">
                            @include('Configuraciones.Personalidad.index')
                        </div>
                        <div class="tab-pane" id="ocupaciones">
                            @include('Configuraciones.Ocupacion.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripties')
    <script src="js/configuraciones/tabla.js"></script>
@endsection