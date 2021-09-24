@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestión Motorizado</h1>
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
                    <div class="form-group">
                      <label>Guia </label>
                      <input class="form-control"  placeholder="Guia ..." id="codigos" name="codigos" autofocus required></textarea>
                    </div> 
                    </div>
                  </div>

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
                          <option value="{{$provincia->provincia}}">{{$provincia->provincia}}</option>
                          @endforeach                        
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
var base_url = window.location.origin;
//hiden
//$("#subestado").hide();
$("#Divsubsubestado").hide();
$("#Divprovincia").hide();
$("#Divpdistribucion").hide();
$("#Divagendamiento").hide();
$("#Divagendamiento2").hide();
$("#Divinventario").hide();
//

      $( "#API" ).click(function() {
        });
       $("#idCliente").change(function(){
           recargarPrestamo();
       });
        
      $("#estado").change(function () {
        if($("#estado").val() == ""){
            emptySelect('subestado');
        }else {
            $id = this.value;
            $.get(base_url+"/subestado/", {id: $id}, function (data) {
               // fillSelect('subestado', data);
             console.log(data)
             emptySelect('subestado');
             var $select = $('#subestado');
                $.each(data, function(id, name) {
                  if(name.id !=13){
                  $select.append('<option value=' + name.id + '>' + name.nombre + '</option>');
                  }
                });
            });
        }
      });
      $("#subestado").change(function () {
        sub=$("#subestado").val();
        //estados inhabilitados
        provincia = ['9','10','11','12','23'];
        inventario = ['2','3','9','10','12','13','14','15','16','23','27','28','33'];
        //estados habilitados
        agendamiento = ['2','3','6','7','11','16','25','26'];
        //estados punto distribucion
        if(sub!=12){
          $("#Divpdistribucion").show();
        }else{
          $("#Divpdistribucion").hide();
          $("#pdistribucion").val('');
        }
        //estados punto distribucion inhabilitado
       
        if((provincia.includes(sub))==true){
          $("#Divprovincia").hide();
          $("#provincia").val('');
        }else{
          $("#Divprovincia").show();
        }
        //estados agendamientos habilitado        
        if((agendamiento.includes(sub))==true){
          $("#Divagendamiento").show();
          $("#Divagendamiento2").show();
         
        }else{
          $("#Divagendamiento").hide();          
          $("#Divagendamiento2").hide();
          $("#fechaAgendamiento").val('');
          $("#horaAgendamiento").val('');
        }
        //inventario
        if((inventario.includes(sub))==false){
          $("#Divinventario").show();
        }else{
          $("#Divinventario").hide(); 
          $("#inventario").val('');         
        }

        if($("#subestado").val() == ""){
            emptySelect('subsubestado');
        }else {
            $id = this.value;
            //$.get("{{ route('getSubsubestado') }}", {id: $id}, function (data) {
            $.get(base_url+"/subsubestado/", {id: $id}, function (data) {
              
             
            
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
      });
 
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