@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestión</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Gestión Motorizado</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="/guardarGestion"  method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-10">
              @if(session('message'))

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-info"></i> {{ session('message') }} !</h6>
                    
                  </div>
              @endif
            </div>
          </div>
        <div class="row">
          <!-- left column -->          
          <div class="col-md-4">
            <!-- general form elements -->        
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Codigos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label>Codigos Ingresados</label>
                    <textarea class="form-control" rows="11" placeholder="Enter ..." id="codigos" name="codigos" autofocus required></textarea>
                  </div>           
                </div>                               
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- Form Element sizes -->    
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Gestión</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <!--<div class="row">
                    <div class="col-sm-8">
                     
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>                    
                  </div> -->

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control" id="estado" >
                          <option value="">SELECCIONE</option>
                          @foreach ($estados as $est)
                          <option value="{{$est->id}}">{{$est->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Subestado</label>
                        <select name="subestado" class="form-control" id="subestado" >     
                          <option value="">SELECCIONE</option>                     
                        </select>                                                
                      </div>
                    </div>
                    <div class="col-sm-4" id="Divsubsubestado">
                      <!-- select -->
                      <div class="form-group">
                        <label>Sub Subestado</label>
                        <select name="subsubestado" class="form-control" id="subsubestado" >                          
                        </select>                                                
                      </div>
                    </div>                       
                  </div>
                 
                  <div class="row">
                    <div class="col-sm-4" id="Divinventario" >
                      <!-- select -->
                      <div class="form-group">
                        <label>Inventario</label>
                        <input name="inventario" class="form-control" id="inventario" >                                                  
                      </div>
                    </div>
                    <!--<div id="Divagendamiento"> -->
                      <div class="col-sm-4"  id="Divagendamiento">
                        <!-- select -->
                        <div class="form-group">
                          <label>Agendamientos</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>  
                            <input type="date" class="form-control " name="fechaAgendamiento" id="fechaAgendamiento"  data-target="#reservationdate">                                
                          </div>                             
                        </div>
                      </div>
                      <div class="col-sm-4"  id="Divagendamiento2">
                        <!-- select -->
                        <div class="form-group">
                          <label>Hora</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate">
                              <div class="input-group-text"><i class="fa fa-clock"></i></div>
                          </div>  
                            <input type="time" class="form-control " name="horaAgendamiento" id="horaAgendamiento"  data-target="#reservationdate">                                
                          </div>                             
                        </div>
                      </div>
                   <!-- </div>-->                     
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6" >
                      <!-- select -->
                      <div class="form-group" id="Divprovincia">
                        <label>Provincia de Ruta</label>
                        <select name="provincia" class="form-control" id="provincia" >  
                          <option value="">SELECCIONE</option>
                          @foreach ($provincias as $provincia)
                          <option value="{{$provincia->id}}">{{$provincia->provincia}}</option>
                          @endforeach                        
                        </select>                                                
                      </div>
                    </div> 
                    <div class="col-sm-6" >
                      <!-- select -->
                      <div class="form-group" id="Divpdistribucion">
                        <label>Punto de Distribución</label>
                        <select name="pdistribucion" class="form-control" id="pdistribucion" >                          
                          <option value="">SELECCIONE</option>
                          <option value="QUITO">QUITO</option>
                          <option value="GUAYAQUIL">GUAYAQUIL</option>
                          <option value="CUENCA">CUENCA</option>
                          <option value="SANTO DIMINGO">SANTO DIMINGO</option>
                          <option value="SANTO DIMINGO">TUNGURAHUA</option>
                          <option value="SANTO DIMINGO">MACHALA</option>
                        </select>                                                
                      </div>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-sm-8" >
                      <!-- select -->
                      <div class="form-group">
                        <label>Imagenes</label>
                        <input type="file" name="Documento[]" multiple id="Documento"   class="form-control">
                      </div>

                      
                    </div>                    
                  </div> 
                  <div class="row">
                    <div class="col-sm-8" >
                      <!-- select -->
                      <div class="form-group">
                        <label>Observaciones</label>
                        <textarea name="observaciones" class="form-control" id="observaciones" rows="3"></textarea>                                              
                      </div>
                    </div>                    
                  </div>  

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href="{{route('homeCourier')}}" class="btn btn-danger float-right">Cancel</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
         
          <!--/.col (right) -->
        </div>
      </form>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    <script type="text/javascript">

      $(document).ready(function() {
  
        $(".btn-success").click(function(){ 
  
            var lsthmtl = $(".clone").html();
  
            $(".increment").after(lsthmtl);
  
        });
  
        $("body").on("click",".btn-danger",function(){ 
  
            $(this).parents(".hdtuto control-group lst").remove();
  
        });
  
      });
  
  </script>

@endsection