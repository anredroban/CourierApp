@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestión Distribución</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Gestión</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="/guardarGestionArribo" method="POST" enctype="multipart/form-data" >
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
          <div class="col-md-2">
            <!-- general form elements -->        
            <!-- Horizontal Form -->
            
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- Form Element sizes -->    
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Arribo de Distribucion</h3>
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

                    <label>Valija</label>
                        <select name="balija" class="form-control" id="balija" required >
                          <option value="">SELECCIONE</option>
                          @foreach ($codigoGeneral as $codigo)
                          <option value="{{$codigo->codigo_general}}">{{$codigo->codigo_general}}</option>
                          @endforeach
                        </select>
                     
                    <div class="col-sm-4">
                      
                      <div class="form-group">
                        <label>Estado </label>
                        <p>{{ $estados->nombre}}</p>                        
                        <input type="hidden" name="estado" id="estado" value="{{ $estados->id}}" id="">                                                    
                      </div>
                    </div>
                    <div class="col-sm-4">
                      
                      <div class="form-group">
                        <label>Subestado</label>
                        <label>Estado </label>
                        <p>{{ $subestados->nombre}}</p>                        
                        <input type="hidden" name="subestado" id="subestado" value="{{ $subestados->id}}" id="">                                                 
                      </div>
                    </div>
                    <!--
                    <div class="col-sm-4" id="Divsubsubestado">                    
                      <div class="form-group">
                        <label>Sub Subestado</label>
                        <select name="subsubestado" class="form-control" id="subsubestado" >                          
                        </select>                                                
                      </div>
                    </div>
                  -->                   
                  </div>
                 
                  <div class="row">
                    
                    <!--<div id="Divagendamiento"> -->
                      <div class="col-sm-6"  id="Divagendamiento">
                        <!-- select -->
                        <div class="form-group">
                          <label>Fecha</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>  
                            <input type="date" class="form-control " name="fechaAgendamiento" id="fechaAgendamiento"  data-target="#reservationdate" required>                                
                          </div>                             
                        </div>
                      </div>
                      <div class="col-sm-6"  id="Divagendamiento2">
                        <!-- select -->
                        <div class="form-group">
                          <label>Hora</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate">
                              <div class="input-group-text"><i class="fa fa-clock"></i></div>
                          </div>  
                            <input type="time" class="form-control " name="horaAgendamiento" id="horaAgendamiento"  data-target="#reservationdate" required>                                
                          </div>                             
                        </div>
                      </div>
                   <!-- </div>-->                     
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6" id="Divprovincia">
                      <!-- select -->
                      <div class="form-group" >
                        <label>Provincia de Ruta</label>
                        <select name="provincia" class="form-control" id="provincia" required >  
                          <option value="">SELECCIONE</option>
                          @foreach ($provincias as $provincia)
                          <option value="{{$provincia->provincia}}">{{$provincia->provincia}}</option>
                          @endforeach                        
                        </select>                                                
                      </div>
                    </div> 
                    <div class="col-sm-6" id="Divpdistribucion">
                      <!-- select -->
                      <div class="form-group" >
                        <label>Punto de Distribución</label>
                        <select name="pdistribucion" class="form-control" id="pdistribucion" required>                          
                          <option value="">SELECCIONE</option>
                          <option value="QUITO">QUITO</option>
                          <option value="GUAYAQUIL">GUAYAQUIL</option>
                          <option value="CUENCA">CUENCA</option>
                          <option value="SANTO DIMINGO">SANTO DIMINGO</option>
                          <option value="TUNGURAHUA">TUNGURAHUA</option>
                          <option value="MACHALA">MACHALA</option>
                          <option value="IMBABURA">IMBABURA</option>
                        </select>                                                
                      </div>
                    </div>    
                                     
                  </div>

                  <div class="row" id="Divsalidaruta">
                    <div class="col-sm-6" >
                      <!-- select -->
                      <div class="form-group" >
                        <label># Transporte - Tracking</label>
                        <input type="text" class="form-control" name="tracking" id="tracking" required>                                                
                      </div>
                    </div> 
                    <div class="col-sm-6"  >
                      <!-- select -->
                      <div class="form-group" >
                        <label>Persona a Recibir</label>
                        <input type="text" class="form-control" name="personaRecibir" id="personaRecibir" required>                                                
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group" >
                        <label>Distribución</label>
                        <select name="validadorEstados" class="form-control" id="validadorEstados" required>                          
                          <option value="">SELECCIONE</option>
                          <option value="BODEGA">BODEGA</option>
                          <option value="RUTA">RUTA</option>
                          
                        </select>                                                
                      </div>
                  </div> 
                    <div class="col-sm-8" >
                      <!-- select -->
                      <div class="form-group">
                        <label>Imagenes</label>
                        <input type="file" name="Documento[]" multiple id="Documento"   class="form-control" required>
                      </div>                      
                    </div> 
                                      
                  </div> 
                  
                  <div class="row">
                    <div class="col-sm-12" >
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
      var base_url = window.location.origin;
      //hiden
      //$("#subestado").hide();
      

      //
      cargarSubestado();
                          
            
            function cargarSubestado() {
              
     
                  $id = 12;
                  //$.get("{{ route('getSubsubestado') }}", {id: $id}, function (data) {
                  $.get(base_url+"/subsubestado/", {id: $id}, function (data) {
                    
                  // console.log(data)
                  
                   if(data.length==0){
                    $("#Divsubsubestado").hide();
                   }else{
                    $("#Divsubsubestado").show();
                    var $select = $('#subsubestado');
                    emptySelect('subsubestado');
                      $.each(data, function(id, name) {
                        $select.append('<option value=' + name.id + '>' + name.nombre + '</option>');
                      });
                   }
                   
                  });
              
            }
       
        function emptySelect(idSelect) {
            var select = document.getElementById(idSelect);
            var option = document.createElement('option');
            var NumberItems = select.length;
        
            while (NumberItems > 0) {
                NumberItems--;
                select.remove(NumberItems);
            }  
            option.text = 'SELECCIONE';
            option.value = ''
            select.add(option, null);
        }
                
      </script>
      

@endsection