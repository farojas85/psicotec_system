@extends('layouts.lalogin')

@section('content')
<div class="account-pages mt-2 mb-5" id="contenido">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-6">
                <div class="card bg-pattern">
                    <div class="card-body">                                
                        <div class="text-center m-auto">
                            <a href="index">
                                <span><img src="images/LogoPsicote.png" alt="" height="48"></span>
                            </a>
                            <p class="text-muted mt-2">No tienes una cuenta? Cr&eacute;ala, no tomar&aacute mucho tiempo</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">        
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div id="progressbarwizard">
                                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                                        <li class="nav-item">
                                                            <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                <i class="mdi mdi-account-circle mr-1"></i>
                                                                <span class="d-none d-sm-inline">Cuenta</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                <i class="mdi mdi-face-profile mr-1"></i>
                                                                <span class="d-none d-sm-inline">Datos Personales</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                                <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                                                <span class="d-none d-sm-inline">Datos Colegio</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content b-0 mb-0">                                      
                                                        <div class="tab-pane" id="account-2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <label for="name" class="col-md-3 col-form-label text-md-right">Usuario</label>                                            
                                                                        <div class="col-md-9">
                                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                                                                placeholder="Nombre de Usuario">                                            
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>                                            
                                                                        <div class="col-md-9">
                                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                                                placeholder="Correo Electrónico">                                            
                                                                            @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="password" class="col-md-3 col-form-label text-md-right">Contraseña</label>                                                
                                                                        <div class="col-md-9">
                                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                                                                name="password" required autocomplete="new-password" placeholder="Ingrese Contraseña">                                                
                                                                            @error('password')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group row">
                                                                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirmar</label>
                                            
                                                                        <div class="col-md-9">
                                                                            <input id="password-confirm" type="password" class="form-control" 
                                                                            name="password_confirmation" required autocomplete="new-password"
                                                                            placeholder="Confirmar Contraseña">
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
                                                        </div>        
                                                        <div class="tab-pane" id="profile-tab-2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <label for="dni" class="col-md-3 col-form-label text-md-right">D.N.I.</label>                                            
                                                                        <div class="col-md-9">
                                                                            <input id="dni" type="text" class="form-control 
                                                                                    @error('dni') is-invalid @enderror" name="dni" 
                                                                                    value="{{ old('dni') }}" required 
                                                                                    @change="buscarDni"
                                                                                placeholder="Nro. Documento Identidad">                                            
                                                                            @error('dni')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="apellido_parterno" class="col-md-3 col-form-label text-md-right">Ape. Paterno</label>                                            
                                                                        <div class="col-md-9">
                                                                        <input id="apellido_paterno" name="apellido_paterno" type="text" 
                                                                            class="form-control @error('apellido_paterno') is-invalid @enderror"                                                                                   
                                                                            required v-model="alumno.apellido_paterno"
                                                                            placeholder="Apellido paterno">                                            
                                                                        @error('apellido_paterno')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="apellido_materno" class="col-md-3 col-form-label text-md-right">Ape. Materno</label>                                            
                                                                        <div class="col-md-9">
                                                                        <input id="apellido_materno" name="apellido_materno" type="text" 
                                                                            class="form-control @error('apellido_materno') is-invalid @enderror"                                                                                   
                                                                            required v-model="alumno.apellido_materno"
                                                                            placeholder="Apellido paterno">                                            
                                                                        @error('apellido_materno')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="nombres" class="col-md-3 col-form-label text-md-right">Nombres</label>                                            
                                                                        <div class="col-md-9">
                                                                        <input id="nombres" name="nombres" type="text" 
                                                                            class="form-control @error('nombres') is-invalid @enderror"                                                                                   
                                                                            required v-model="alumno.nombres"
                                                                            placeholder="Apellido paterno">                                            
                                                                        @error('nombres')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="sexo" class="col-md-3 col-form-label text-md-right">sexo</label>                                            
                                                                        <div class="col-md-9">
                                                                            <select id="sexo" name="sexo" class="form-control" required>
                                                                                <option value="">-SELECCIONE-</option>
                                                                                <option value="Masculino">Masculino</option>
                                                                                <option value="Femenino">Femenino</option>
                                                                            </select>                                           
                                                                            @error('sexo')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
                                                        </div>    
                                                        <div class="tab-pane" id="finish-2">
                                                            <div class="form-group row">
                                                                <label for="departamento" class="col-md-3 col-form-label text-md-right">Departamento</label>                                            
                                                                <div class="col-md-9">
                                                                    <select id="departamento" name="departamento" class="form-control" required>
                                                                        <option value="">-SELECCIONE-</option>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino">Femenino</option>
                                                                    </select>                                           
                                                                    @error('departamento')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>    
                                                        <ul class="list-inline mb-0 wizard">
                                                            <li class="previous list-inline-item float-left">
                                                                <a href="javascript: void(0);" class="btn btn-secondary">Anterior</a>
                                                            </li>
                                                            <li class="next list-inline-item float-right">
                                                                <a href="javascript: void(0);" class="btn btn-secondary">Siguiente</a>
                                                            </li>
                                                        </ul>    
                                                    </div> <!-- tab-content -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
@section('scripties')
    <script src="js/configuraciones/registro.js"></script>
@endsection
