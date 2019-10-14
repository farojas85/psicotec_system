@extends('layouts.lalogin')

@section('content')
<div class="account-pages mt-2 mb-5">
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
                                                                <span class="d-none d-sm-inline">Finalizar</span>
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
                                                                    <div class="form-group row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="name1"> First name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="name1" name="name1" class="form-control" value="Francis">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="surname1"> Last name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="surname1" name="surname1" class="form-control" value="Brinkman">
                                                                        </div>
                                                                    </div>
                                            
                                                                    <div class="form-group row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="email1">Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="email" id="email1" name="email1" class="form-control" value="cory1979@hotmail.com">
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
                                                        </div>    
                                                        <div class="tab-pane" id="finish-2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="text-center">
                                                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                        <h3 class="mt-0">Thank you !</h3>
    
                                                                        <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                            mattis dictum aliquet.</p>
    
                                                                        <div class="mb-3">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                                <label class="custom-control-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->
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
