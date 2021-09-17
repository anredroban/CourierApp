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
                    <form method="POST" action="/descargar_bitacora" enctype="multipart/form-data">
                        @csrf                        
                        
<!-- <input type="text" name="datefilter" value="" class="datepicker form-control"  /> -->
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Date:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
          <div class="input-group-append" data-target="#reservationdate" >
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>  
          <input type="date" class="form-control " name="fecha1" id="fecha1" required data-target="#reservationdate">                                
        </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Date:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
          <div class="input-group-append" data-target="#reservationdate" >
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>  
          <input type="date" class="form-control " name="fecha2" id="fecha2" required data-target="#reservationdate">                                
        </div>
    </div>
  </div>
</div>
                        

                        <div class="input-group-append justify-content-center">
                          <button type="submit" class="btn btn-success">
                              {{ __('Descargar') }}
                          </button>
                      </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        
          <!-- /.row -->
        </div>
    </div>
</div>
<script type="text/javascript">
  $(function() {
  
    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
  
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
  
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
  
  });
  </script>
@endsection