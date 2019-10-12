@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item">Configuraciones</li>
                        <li class="breadcrumb-item active">Test Burga</li>
                    </ol>
                </div>
                <h4 class="page-title">Configuraciones de Test Burga </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        @can('burga-alternativas.index')
                            <li class="nav-item">
                                <a href="#burga-alternativas" data-toggle="tab" 
                                    aria-expanded="false" class="nav-link show active">
                                    Alternativas
                                </a>
                            </li>
                        @endcan
                        @can('burga-afirmaciones.index')
                            <li class="nav-item">
                                <a href="#burga-afirmaciones" data-toggle="tab" 
                                    aria-expanded="false" class="nav-link">
                                    Afirmaciones
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="burga-alternativas">
                            @include('Configuraciones.test_burga.alternativa.index')
                        </div>
                        <div class="tab-pane" id="burga-afirmaciones">
                            @include('Configuraciones.test_burga.afirmacion.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripties')
    <script src="js/configuraciones/test_burga.js"></script>
@endsection