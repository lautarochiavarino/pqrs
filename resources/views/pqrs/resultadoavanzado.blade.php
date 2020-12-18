@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Resultado de la Busqueda con filtro</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-search"></i>
                Filtro:</div>
            <div class="card-body">
               PQRS que contienen la palabra "{{$request['texto']}}", tanto en Descripción como en Breve Descripción.<br/>
                Fecha desde: {{$request['fecha_desde_a']}}<br/>
                Fecha Hasta: {{$request['fecha_hasta_a']}}
            </div>

        </div>



        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                PQRS</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>

                            <th>Fecha PQRS</th>
                            <th>Nro. PQRS</th>
                            <th>Tipo de Solicitante</th>
                            <th>Grupo Resolutor</th>


                            <th>Tipo de Requerimiento</th>
                            <th>Ver</th>



                        </tr>
                        </thead>
                        <tfoot>
                        <tr>

                            <th>Fecha PQRS</th>
                            <th>Nro. PQRS</th>
                            <th>Tipo de Solicitante</th>
                            <th>Grupo Resolutor</th>


                            <th>Tipo de Requerimiento</th>
                            <th>Ver</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @if($pqrs)

                            @foreach($pqrs as $p)
                                <tr>

                                    <td>{{$p->created_at}}</td>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->tipoSolicitante_id}}</td>
                                    <td>{{$p->grupo->nombre}}</td>

                                    <td>{{$p->tipoSolicitud}}</td>
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}" class="btn btn-primary btn-block">Gestionar</a></td>

                                </tr>
                            @endforeach


                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
