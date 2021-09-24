@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Registros Asignados </h1> 
              
            </div><!-- /.col -->
            <div class="col-sm-6">              
              <ol class="breadcrumb float-sm-right">
                
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Registros Asignados</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              @if(session('message'))

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-info"></i> {{ session('message') }} !</h6>
                    
                  </div>
              @endif
              <div class="card">
                
              
                
                
                <!-- /.card-header -->
                <div class="card-body ">
                  
                  
                  <table id="dbtable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Tramite</th>
                      <th>Numero Guia</th>  
                      <th>Numero Lote</th>  
                      <th>Nombre Cliente</th>                      
                      <!-- <th>Editar</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tramites as $tramite)
                    <tr>                      
                      <td>{{$tramite->tramite_id}}</td>                      
                      <td>{{$tramite->numero_guia}}</td> 
                      <td>{{$tramite->numero_lote}}</td> 
                      <td>{{$tramite->nombre_cliente}}</td> 
                      <!-- <td>
                       <a href="{{ route('tramiteEdit',$tramite->id)}}"  class="btn btn-sm btn-info"><i class="fas fa-pencil"></i></a></td>
                    </tr>-->
                    @endforeach                                          
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Tramite</th>
                      <th>Numero Guia</th>  
                      <th>Numero Lote</th>  
                      <th>Nombre Cliente</th>                      
                      <!-- <th>Editar</th> -->
                    </tr>
                    </tfoot>
                  </table>
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
    <!-- /.content -->


<script>
/*  $(document).ready(function () {
  $('#dbtable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
*/
$(document).ready(function() {
  function mdelete() {
    agree=confirm("¿Desea Eliminar el Cliente?");
  if (agree)
    return true;
  else
    return false ;
  }

    $('#dbtable').dataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>      

@endsection