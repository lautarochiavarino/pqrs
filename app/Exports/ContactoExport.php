<?php

namespace App\Exports;

use App\Contacto;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ContactoExport implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sql = DB::table('contacto')->join('pais', 'contacto.pais_id', '=', 'pais.id')->join('provincia', 'provincia_id', '=', 'provincia.id')->select('contacto.id','tipoContacto','entidad','contacto','cargo','pais.nombre as pais','provincia.nombre as provincia','ciudad','direccionFisica','CP','email','telFijo1','telFijo2','telCelular','fax','proposito','datosAdicionales','contacto.created_at')->get();


        return $sql;
    }



    public function headings(): array
    {
        return [
            'ID',
            'Tipo de Contacto',
            'Entidad',
            'Nombre',
            'Cargo',
            'Pais',
            'Provincia',
            'Ciudad',
            'Dirección',
            'CP',
            'E-mail',
            'Tel 1',
            'Tel2',
            'Celular',
            'Fax',
            'Proposito',
            'datosAdicionales',
            'Creado'

        ];
    }

    public function title(): string
    {
        return 'Reporte de Contactos';
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
