@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Registro de Rol</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Edición de Rol</li>
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
                    <form method="post" action="/rolEdit/{{$rol->id}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT')}}
           
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $rol->name }}" required placeholder="" >

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>

                        <div class="col-md-6">
                            
                      
                    
                        

                        <select multiple="multiple" name="permisos[]" id="permisos" class="form-control">
                          @foreach($permisos as $permA )
                          <option value="{{$permA->id}}" 
                            @foreach($rolhaspermiso  as $permL) 
                              @if($permA->id == $permL->permission_id)
                                selected="selected"
                              @endif 
                            @endforeach                          
                          >{{$permA->name}}</option>                          
                          @endforeach
                        </select>                           
                        </div>
                    </div>                                                                                        

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Registrar') }}
                              </button>
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