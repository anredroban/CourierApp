@extends('layouts.template')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Registro Historico</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
          <li class="breadcrumb-item active">historico</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!--
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3> 
          </div>
          -->
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                    
              <div class="col-sm-4">
                <!-- select -->
                <div class="form-group">
                  <label>Guia</label>
                  <input  class="form-control" id="guia" name="guia">
                </div>
              </div>
              
              
              <div class="col-sm-4" id="Divsubsubestado">
                <!-- select -->
                <div class="form-group">
                  <br>
                  <button  class="btn btn-md btn-info" id="buscar">Buscar</button>                                           
                </div>
              </div>                         
            </div>
            <div class="panel-body" id="upload_data">
          
            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>


 

<script type="text/javascript">

  
$("#buscar").click(function () {
  fecha=$("#fecha").val();
  guia=$("#guia").val();
  //alert("click "+ruta);
 
  if($("#guia").val()==""){
    alert("Guia incorrecta");
  }
  
  load_historico(guia);
});
  

  function load_historico(guia)
  {
    $.ajax({
      url:"{{ route('historico.buscar') }}",
      data:{guia : guia},
      success:function(data)
      {
        console.log(data);
        $('#upload_data').html(data);
      }
    })
  }

</script>
@endsection