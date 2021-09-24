<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impresiones</title>
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
  
  @media print {
   body {
       display: table;
       table-layout: fixed;
       padding-top: 2.5cm;
       padding-bottom: 2.5cm;
       height: auto;
   }
}

   
    
    


       
</style>
</head>
<body onclick="window.print();"> 
    <main  >
        <div class="page">
          <div class="container-fluid">
              <div class="row py-3">
                  <div class="col float-left"><label> <img src="../newTem/dist/img/favicon.png" width="50px" > </label></div>
                  <div class="col-6 text-center" ><label><h4 ><strong>ORDEN DE SERVICIO</strong></h4></label></div>
                  <div class="col-4 float-right"><label> Orden no.</label><strong>{{$numOrden}}</strong></div>
              </div>
              <div class="row">
                <div class="col float-left"><label><strong>Courier:</strong> {{$courier->user}} </label></div>
                <div class="col-6 text-center" ><label><strong>Fecha:</strong> {{\Carbon\Carbon::now()}}</label></div>
                <div class="col float-right"><label><strong> Número envios:</strong> {{$count}}</label></div>
            </div>
              <div class="row ">
                <table class="table table-bordered py-5">
                    
                    <thead>
                      <tr>
                        <th scope="col">Guía</th>
                        <th scope="col">Destinatario</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Teléfonos</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tramites as $producto)
                        <tr>
                            <td>{{ $producto->numero_guia }}</td>
                            <td>{{ $producto->nombre_destinatario }}</td>
                            <td>{{ $producto->direccion_destinatario }}</td>
                            <td>{{ $producto->ciudad_destino }}</td>
                            <td>{{ $producto->telefono }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
              <div class="row py-5"></div>
              <div class="row py-5">
                <div class="col-sm-6 float-left text-center"><hr style="width:70%;background-color: black;height: 1px;">
              Firma de quien recibe
              </div>
              <div class="col-sm-6 float-right text-center">
                  <hr style="width:70%;background-color: black;height: 2px;">
              Cédula de quien recibe
              </div>

            </div>
            <div class="row py-1">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <p style="font-size: 10px"><strong>AVISO IMPORTANTE:</strong> AL FIRMAR ESTA ORDEN DE SERVICIO ACEPTO LAS SIGUIENTES CONDICIONES:<br>
                  1. MANIFIESTO EL DESEO DE ENTREGAR VOLUNTARIAMENTE CADA UNA DE LAS ENTREGAS AQUÍ RELACIONADAS EN LOS TIEMPOS DE ENTREGA ESTIPULADOS.<br>
                  2. CONOZCO LAS RESPONSABILIDADES CIVILES Y PENALES QUE REPRESENTAN UNA ENTREGA INDEBIDA Y/O MAL GESTIONADA COMO FALSIFICAR UNA F IRMA, INVENTAR UNA FIRMA DE UN SUPUESTO
                  DESTINATARIO, SUMINISTRAR DATOS FALSOS, ENTRE OTROS.<br>
                  3. LAS ENTREGAS ASIGNADAS LAS DEBO REALIZAR SOLO Y UNICAMENTE EN EL LUGAR INDICADO EN LA GUIA Y DEBEN SER ENTREGADAS AL MISMO TITULAR.<br>
                  4. LOS GASTOS DE COMBUSTIBLE Y/O MANTENIMIENTO DEL MEDIO DE TRANSPORTE QUE UTILICE PARA DESARROLLAR LOS SERVICIOS CORREN POR CUENTA DEL COURIER.<br>
                  5. CONOZCO QUE ESTA ACEPTACIÓN DE ORDEN DE SERVICIO NO REPRESENTA NINGUN VINCULO LABORAL CON LA EMPRESA , NI CON LA EMPRESA PLUS -WIRELESS.COM ASI COMO CON LOS CLIENTES DE
                  PLUS-WIRELESS</p>
              </div>
              <div class="col-sm-1"></div>
              
            </div>
          </div>
        </div>
        
    </main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      
 </body>
</html>