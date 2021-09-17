<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Tramites;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteGestion implements FromCollection,WithHeadings
{
    
    public $data;
    public function __construct($data)
    {
        $this->data=$data['data'];  
    }
    public function headings():array{
        return[
           /* 'Trámites - ID' ,
            'Trámites - Número guía' ,
            'Trámites - Número lote' ,
            'Trámites - Nombre cliente' ,
            'Trámites - Estado' ,
            'Trámites - Fecha registro' ,
            'Trámites - Ciclo' ,
            'Trámites - Fecha para entrega' ,
            'Trámites - Cédula destinatario' ,
            'Trámites - Nombre destinatario' ,
            'Trámites - Dirección destinatario' ,
            'Trámites - Ciudad destino' ,
            'Trámites - Télefono' ,
            'Trámites - ID Tarjeta' ,
            'Trámites - Fecha entrega' ,
            'Trámites - Recibido por' ,
            'Trámites - Fecha excepcion' ,
            'Trámites - Contenido' ,
            'Trámites - Motivo excepción' ,
            'Trámites - Mensajero actual' ,
            'Trámites - Cantidad' ,
            'ID VENTA' ,
            'Estado',
            'SubEstado',
            'Usuario',
            'Fecha Gestion',
            'Ubicación',*/
            'Trámites - ID',
            'Trámites - Número guía',
            'Trámites - Número lote',
            'Trámites - Nombre cliente',
            'Trámites - Estado',
            'Trámites - Fecha registro',
            'Trámites - Ciclo',
            'Trámites - Fecha para entrega',
            'Trámites - Cédula destinatario',
            'Trámites - Nombre destinatario',
            'Trámites - Dirección destinatario',
            'Trámites - Ciudad destino',
            'Trámites - Télefono',
            'Trámites - ID Tarjeta',
            'Trámites - Fecha entrega',
            'Trámites - Recibido por',
            'Trámites - Fecha excepcion',
            'Trámites - Contenido',
            'Trámites - Motivo excepción',
            'Trámites - Mensajero actual',
            'Trámites - Cantidad',
            'ID VENTA',
            'CEDULA',
            'NOMBRES',
            'APELLIDOS',
            'NOMBRES Y APELLIDOS',
            'PROVINCIA DOMICILIO',
            'CIUDAD DOMICILIO',
            'PARROQUIA DOMICILIO',
            'CLL P DOMICILIO',
            'NUMERACION DOMICILIO',
            'CALL SECUNDARIA DOMICILIO',
            'REFERENCIAS DOMICILIO',
            'DIRECCION COMPLETA DOMICILIO',
            'PROVINCIA TRABAJO',
            'CIUDAD TRABAJO',
            'PARROQUIA TRABAJO',
            'CLL P TRABAJO',
            'NUMERACION TRABAJO',
            'CALL SECUNDARIA TRABAJO',
            'REFERENCIAS TRABAJO',
            'DIRECCION COMPLETA TRABAJO',
            'TELEFONO CONTACTADO',
            'TELEFONO REFERENCIA',
            'TELEFONO 1',
            'TELEFONO 2',
            'TELEFONO 3',
            'TELEFONO 4',
            'TELEFONO 5',
            'TELEFONO 6',
            'TELEFONO 7',
            'TELEFONO 8',
            'TELEFONO 9',
            'TELEFONO 10',
            'ID CLIENTE',
            'FECHA GESTION',
            'CREADAS NO CREADAS',
            'IMPUTABLE',
            'DETALLE IMPUTABLE',
            'FECHA ENVIO CREACION',
            'NOMBRE DE LA BASE',
            'LOTE',
            'CODIGO CAMPANIA',
            'CICLO COURIER',
            'CIERRE DE CICLO',
            'GUIA COURIER',
            'CEDULA TITULAR',
            'Estado',
            'SubEstado',
            'Sub SubEstado',
            'Usuario',
            'Fecha Gestion CourierApp',
            'Ubicación'
        ];
    }
    public function collection()
    {
        //
        return collect($this->data);
    }
}
