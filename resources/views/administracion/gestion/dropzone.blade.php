@extends('layouts.template')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Registro de Imagenes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
          <li class="breadcrumb-item active">Imagenes</li>
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
                  <label>Busqueda</label>
                  <select name="tipoBusqueda" class="form-control" id="tipoBusqueda" >
                    <option value="">SELECCIONE</option>
                    <option value="guia">GUIA</option>
                    <option value="balija">VALIJA</option>
                    
                  </select>
                </div>
              </div>    
              <div class="col-sm-4" id='divGuia'>                
                <div class="form-group">
                  <label>Guia</label>
                  <input  class="form-control" id="guia" name="guia">
                </div>
              </div>
              <div class="col-md-4" id='divBalija'>
                <label>Valija</label>
                        <select name="balija" class="form-control" id="balija" >
                          <option value="">SELECCIONE</option>
                          @foreach ($codigoGeneral as $codigo)
                          <option value="{{$codigo->codigo_general}}">{{$codigo->codigo_general}}</option>
                          @endforeach
                        </select>
              </div>
               <!--
              <div class="col-sm-4" id="divFecha">
                
                <div class="form-group">
                  <label>Fecha</label>
                  <input type="date" class="form-control" name="fecha" id="fecha">                                           
                </div>
              </div>-->
              <div class="col-sm-4" >
                <!-- select -->
                <div class="form-group">
                  <br>
                  <button  class="btn btn-md btn-info" id="buscar">Buscar</button>                                           
                </div>
              </div>                         
            </div>
            <div class="panel-body" id="uploaded_image">
         
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
$("#divGuia").hide();
$("#divBalija").hide();
$("#divFecha").hide();

$("#tipoBusqueda").change(function () {
  seleccion=$("#tipoBusqueda").val();
 
  if(seleccion=='balija'){
    $("#divGuia").hide();
    $("#divFecha").hide();
    $("#divBalija").show();
  }
  if(seleccion=='guia'){
    $("#divGuia").show();
    $("#divFecha").show();
    $("#divBalija").hide();
  }
  
});

$("#buscar").click(function () {

  if($("#divGuia").is(':visible')){
    fecha=$("#fecha").val();
    ruta='imagenes/'+$("#guia").val();

  if($("#guia").val()==""){
      alert("Guia incorrecta");    
  }else{
        if(fecha==""){
          alert("Fecha incorrecta");          
        }else{
          load_images(ruta);
          //alert(ruta);
        } 
  }
  }
  if($("#divBalija").is(':visible')){
    balija=$("#balija").val();
    ruta='imagenesDistribucion/'+balija+'/';
    if(balija==""){
      alert('Valija Seleccionada Incorrecta')
    }else{
      load_images(ruta);
      //alert(ruta);
    }
    
  } 
  
});
  
function remover() {
  var element = document.getElementById("imgRmv");
  element.classList.remove("imgRemove");
}
  function load_images(ruta)
  {
    $.ajax({
      url:"{{ route('dropzone.fetch') }}",
      data:{ruta : ruta},
      success:function(data)
      {
        $('#uploaded_image').html(data);
      }
    })
  }

  $(document).on('click', '.remove_image', function(){
    var name = $(this).attr('id');
    $.ajax({
      url:"{{ route('dropzone.delete') }}",
      data:{name : name},
      success:function(data){
        load_images();
      }
    })
  });

</script>
@endsection