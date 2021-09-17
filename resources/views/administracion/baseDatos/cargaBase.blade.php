@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Carga de Base de Datos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Carga de Base</li>
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
                    <form method="POST" action="/carga_base" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="input-group py-4">
                            <div class="custom-file">
                             
                              <input id="file" type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="file" autofocus>
                              <label class="custom-file-label" for="file">Seleccionar el Archivo</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cargar') }}
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