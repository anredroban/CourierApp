@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edicion de Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Edicion de Usuario</li>
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
               
                
                <div class="card-body">
                    <form method="post" action="{{ route('userEditFormUpdate',$user)}}" enctype="multipart/form-data">
                        {{ method_field('PUT')}}
                        @csrf
                        <input id="id" type="hidden" name="id" value="{{$user->id}}" >

                        <div class="form-group row">
                          <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('Identificación') }}</label>

                          <div class="col-md-6">
                            <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror"  name="ci" value="{{$user->ci}}"  required placeholder="" autofocus>
                            
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
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" placeholder="Nombre Apellido" >

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
                              <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $user->user}}" required placeholder="usuario01" autocomplete="user">

                              @error('user')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Localización') }}</label>

                        <div class="col-md-6">
                          <select name="location" class="form-control" id="location" >
                            <option value="" selected>Cambiar?</option>
                            <option value="Quito">Quito</option>
                            <option value="Guayaquil">Guayaquil</option>
                            <option value="Cuenca">Cuenca</option>
                          </select>

                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="******">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="******">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Actualizar') }}
                              </button>
                              <a href="{{route('gestionUser')}}" class="btn btn-danger">Salir</a>
                          </div>
                      </div>
                        
                        
                       
                        
                                         
                        
                    
                    </form>
                  
                    
                </div>
            </div>


            <!-- /.row -->
        
          <!-- /.row -->
        </div>
    </div>
</div>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
@endsection