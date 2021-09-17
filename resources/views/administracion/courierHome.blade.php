@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Plus Wireless </h1>
            </div>
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">                 
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Courier
                      <small class="float-right">Fecha: <span id="fechaActual"></span></small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->                
                <!-- /.row -->                  
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-12">
                    <p class="lead">Sistema de Gestion</p>
                    
  
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Gestión de Proceso por codigos                      
                    </p>
                  </div>
                 
                </div>
                <!-- /.row -->
  
                
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

<script>

var f=new Date();
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  window.onload = function what(){
    document.getElementById('fechaActual').innerHTML = f.getDate() +' '+meses[f.getMonth()]+' ' +f.getFullYear();
  };

</script>
@endsection