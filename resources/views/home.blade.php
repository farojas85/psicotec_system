@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="home">Psicotec</a></li>
                        <li class="breadcrumb-item">Principal</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    @if(Auth::user()->roles[0]['slug']=='admin')
        @include('dashboards.admin-dashboard')
    @endif
@endsection
