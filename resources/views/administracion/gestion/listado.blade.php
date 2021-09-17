@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Todos los Registros</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Todos los Registros</li>
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
              <div class="card">
                <!--
                <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3> 
                </div>
                -->
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="dbtable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Guia</th>
                      <th>Tramite ID</th>
                      
                      <th>Estado</th>
                      <th>Subestado</th>
                      <th>Sub Subestado</th>
                      <th>Usuario</th>
                      <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $dat)
                    <tr>
                      <td>{{$dat->id}}</td>  
                      <td>{{$dat->numero_guia}}</td>                    
                      <td>{{$dat->tramite_id}}</td>
                      
                      <td>{{$dat->estadoNombre}}</td>
                      <td>{{$dat->subestadoNombre}}</td>
                      <td>{{$dat->subsubestadoNombre}}</td>
                      <td>{{$dat->usuario}}</td>
                      <td>{{$dat->Tfecha_gestion}}</td>
                    </tr>
                    @endforeach                                          
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Subestado</th>
                      <th>Usuario</th>
                      <th>Fecha</th>
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