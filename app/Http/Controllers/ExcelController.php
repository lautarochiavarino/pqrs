<?php

namespace App\Http\Controllers;

use App\Exports\ContactoExport;
use App\Exports\Pqrs10Export;
use App\Exports\Pqrs30Export;
use App\Exports\Pqrs31Export;
use App\Exports\PqrsClosedExport;
use App\Exports\PqrsExport;
use App\Exports\PqrsNewExport;
use App\Exports\PqrsOpenExport;
use App\Pqrs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;


class ExcelController extends Controller
{

    public function pqrs()
    {




        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS-'.$date.'.xlsx';

        return Excel::download(new PqrsExport(), $archivo);
    }

    public function pqrsnuevas()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS Nuevas-'.$date.'.xlsx';

        return Excel::download(new PqrsNewExport(), $archivo);
    }

    public function pqrsabiertas()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS Abiertas-'.$date.'.xlsx';

        return Excel::download(new PqrsOpenExport(), $archivo);
    }

    public function pqrscerradas()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS Cerradas-'.$date.'.xlsx';

        return Excel::download(new PqrsClosedExport(), $archivo);
    }

    public function contactos()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'Contactos-'.$date.'.xlsx';

        return Excel::download(new ContactoExport(), $archivo);
    }

    public function pqrsdiez()
    {


        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS Diez dias-'.$date.'.xlsx';

        return Excel::download(new Pqrs10Export(), $archivo);
    }

    public function pqrstreinta()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS 30 dias-'.$date.'.xlsx';

        return Excel::download(new Pqrs30Export(), $archivo);
    }

    public function pqrstreintayuno()
    {

        $date = Carbon::now();

        $date = $date->format('Y-m-d');

        $archivo= 'PQRS +30 dias-'.$date.'.xlsx';

        return Excel::download(new Pqrs31Export(), $archivo);
    }

}
