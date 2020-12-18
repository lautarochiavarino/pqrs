<?php

namespace App\Exports;

use App\Pqrs;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class Pqrs31Export implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sql = DB::table('pqrs')

            ->join('contacto', 'contacto_id', '=', 'contacto.id')
            ->join('pais', 'contacto.pais_id', '=', 'pais.id')
            ->join('provincia', 'contacto.provincia_id', '=', 'provincia.id')
            ->leftJoin('ciudad', 'contacto.ciudad', '=', 'ciudad.id')
            ->leftJoin('grupo', 'pqrs.grupo_id', '=', 'grupo.id')
            ->leftJoin('respuesta', 'pqrs.id', '=', 'respuesta.pqrs_id')


            ->select('pqrs.id','aSuNombre','formatoRecepcion','tipoSolicitud','tipoSolicitante_id',
                'medioRespuesta','breveDescripcion','descripcion','adjuntarSoporte','contacto.contacto','pais.nombre as pais',
                'provincia.nombre as provincia','ciudad.nombre as ciudad','contacto.cp','contacto.direccionFisica','contacto.email',
                'contacto.telFijo1','contacto.telFijo2','contacto.telCelular','contacto.fax','contacto.razonSocial','contacto.tipoTramite','contacto.causal','contacto.detalleCausal','contacto.codigoSic','contacto.nroFactura','contacto.fechaEvento','grupo.nombre','grupo.serie',
                'grupo.subserie','pqrs.created_at','tiempoRespuesta','nuevaGestion','pqrs.respuestaPreliminar','pqrs.respuestaFinal','pqrs.consecutivoCorrespondencia','pqrs.cerrado')
            ->where('pqrs.tiempoRespuesta','=', '+30')
            ->get();


        return $sql;
    }

    public function headings(): array
    {
        return [
            'ID',
            'A su Nombre',
            'Formato',
            'Tipo Solicitud',
            'Tipo Solicitante',
            'Medio de Respuesta',
            'Breve Descripcion',
            'Descripcion',
            'Adjuntar Soporte',
            'Contacto',
            'Pais',
            'Provincia',
            'Ciudad',
            'CP',
            'Direccion',
            'Email',
            'Tel 1',
            'Tel 2',
            'Celular',
            'Fax',
            'Razon Social',
            'Tipo Tramite',
            'Causal',
            'Detalle Causal',
            'Codigo SIC',
            'Nro. Factura',
            'Fecha Evento',
            'Grupo',
            'Serie',
            'Subserie',
            'Creado',
            'Tiempo de Respuesta',
            'Gestion',
            'Respuesta Preliminar',
            'Respuesta Final',
            'Consecutivo Correspondencia',
			'Fecha de Cerrado'
        ];
    }

    public function title(): string
    {
        return 'Tiempo de respuesta +30 dias';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->getSheet()->autoSize();
                $event->getSheet()->getDelegate()->getStyle('A1:C11')
                    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
}
