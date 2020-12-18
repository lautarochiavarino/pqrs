@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Nuevo Grupo</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->





        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                D&iacute;as Festivos</div>
            <div class="card-body">

                <form method="post" action="{{url('admin/save_festivo')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <input type="date" id="nombre" class="form-control" autofocus="autofocus" name="fecha">
                                <label for="nombre">Fecha</label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">

                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary btn-block" value="Agregar">

                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
<div class="festivo">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Enero</div>
            <div class="card-body">
                @foreach($enero as $f)

                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Febrero</div>
            <div class="card-body">
                @foreach($febrero as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Marzo</div>
            <div class="card-body">
                @foreach($marzo as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Abril</div>
            <div class="card-body">
                @foreach($abril as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Mayo</div>
            <div class="card-body">
                @foreach($mayo as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Junio</div>
            <div class="card-body">
                @foreach($junio as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>
                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Julio</div>
            <div class="card-body">
                @foreach($julio as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Agosto</div>
            <div class="card-body">
                @foreach($agosto as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Septiembre</div>
            <div class="card-body">
                @foreach($septiembre as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Octubre</div>
            <div class="card-body">
                @foreach($octubre as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Noviembre</div>
            <div class="card-body">
                @foreach($noviembre as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Diciembre</div>
            <div class="card-body">
                @foreach($diciembre as $f)


                    <a href="{{url('admin/eliminar_festivo', $f->id)}}" onclick="
return confirm('¿Seguro que desea quitar este dia festivo?')" class="btn btn-danger">{{ Carbon\Carbon::parse($f->fecha)->format('d') }}</a>

                @endforeach

            </div>

        </div>
</div>

    </div>
@endsection
