@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Registro de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Nuevo Usuario</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          @if(session('message'))

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-info"></i> {{ session('message') }} !</h6>
                    
                  </div>
              @endif
            <div class="card py-4">
                <!--<div class="card-header">{{ __('Carga de Base') }}</div>-->
                
                <div class="card-body">
                         
                        
                        <div class="form-group row">
                          <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('Identificación') }}</label>

                          <div class="col-md-6">
                              <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" readonly name="ci" value="{{$user->ci}}"  required placeholder="" autofocus>
                              
                              @error('ci')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" readonly name="name" value="{{ $user->name }}" required placeholder="Nombre Apellido" >

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                          <div class="col-md-6">
                              <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" readonly name="user" value="{{ $user->user }}" required placeholder="usuario01" autocomplete="user">

                              @error('user')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="user" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                            
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Listado de Roles') }} </label>
                            
                        </div>
                    </div>
                     
                      
                        
                    {!! Form::model($user, ['route'=>['userUpdate',$user],'method'=>'put']) !!}
                    @csrf
                    <div class="form-group row">
                    @foreach ($role as $rol)
                    <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>
                    <div class="col-md-6 ">
                            <label>
                                {!! Form::checkbox('roles[]', $rol->id, null, ['class'=>'mr-1']) !!}
                                {{$rol->name}}
                            </label>
                    </div>
                    @endforeach                                             
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                         {!! Form::submit("enviar", ['class'=>"btn btn-primary"]) !!}
                         <a href="{{route('gestionUser')}}" class="btn btn-danger">Salir</a>
                    </div>
                </div>
                        
                    {!! Form::close() !!}
              
                
                </div>
            </div>


            <!-- /.row -->
        
          <!-- /.row -->
        </div>
    </div>
</div>

@endsection