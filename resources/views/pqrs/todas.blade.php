@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">PQRS</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Todas las PQRS
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fecha PQRS</th>
                            <th>#</th>
                            <th>Solicitante</th>
                            <th>Título</th>
                            <th>Clasificación</th>
                            <th>Responsable</th>

                            <th>Grupo</th>



                            <th>Requerimiento</th>


                        </tr>
                        </thead>

                        <tbody>
                        @foreach($pqrs_todas as $p)
                            <tr>



                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->created_at->format('Y-m-d') }}</a></td>
                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->id}}</a></td>
                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->contacto->contacto}}</a></td>
                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->breveDescripcion}}</a></td>
                                @if ($p->etiqueta != NULL)
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->etiqueta}}</a></td>
                                @else
                                    <td>Sin clasificación</td>
                                @endif
                                @if ($p->responsable_id != NULL)
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->responsable->name}}</a></td>
                                @else
                                    <td>Sin responsable</td>
                                @endif
                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->grupo->nombre}}</a></td>



                                <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->tipoSolicitud}}</a></td>



                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <!-- DataTables Example -->

        <p><a href="{{url('/export-pqrs')}}" class="btn btn-primary">Exportar a Planilla de Cálculo</a></p>
    </div>
@endsection
