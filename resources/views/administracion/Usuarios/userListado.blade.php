@extends('layouts.template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Todos los Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('homeCourier')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
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

                <div class="card-header">
                  <h3 class="card-title"><a href="{{ route('formUser') }}" class="py-4 text">
                    <i class="fas fa-user-plus"> </i> Nuevo Usuario               
                  </a></h3> 
                </div>
                
                
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
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th>Ubicación</th>
                      <th>Fecha Creación</th>
                      <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $dat)
                    <tr>
                      <td>{{$dat->id}}</td>                      
                      <td>{{$dat->ci}}</td>
                      <td>{{$dat->name}}</td>
                      <td>{{$dat->user}}</td>
                      <td>{{$dat->rol}}</td>
                      <td>{{$dat->location}}</td>
                      <td>{{$dat->created_at}}</td>
                      <td>
                        <a href="{{ route('userEdit',$dat)}}"  class="btn btn-sm btn-info"><i class="fas fa-user-lock"></i></a>
                        <form action="{{ url('/user/'.$dat->id)}}" method="post" class="d-inline" >
                          @csrf
                          {{ method_field('DELETE')}}
                          <button onClick="return confirm('Desea Eliminar el Usuario?');submit()" class="btn btn-sm btn-danger"> <i class="fad fa-trash"></i></button>
                          <!--<input type="submit" value="Eliminar" class="btn btn-danger btn-sm  fa-user " onclick="return confirm('Desea Eliminar el Cliente?')">-->
                      </form>
                      
                      </td>
                    </tr>
                    @endforeach                                          
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th>Ubicación</th>
                      <th>Fecha Creación</th>
                      <th>Eliminar</th>
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