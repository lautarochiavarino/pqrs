@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Contactos</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Contactos</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tipo de Contacto</th>
                            <th>Entidad</th>
                            <th>Contacto</th>
                            <th>Cargo</th>
                            <th>Email</th>


                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Tipo de Contacto</th>
                            <th>Entidad</th>
                            <th>Contacto</th>
                            <th>Cargo</th>
                            <th>Email</th>


                        </tr>
                        </tfoot>
                        <tbody>
                        @if($contactos)

                            @foreach($contactos as $p)
                                <tr>
                                    <td>{{$p->tipoContacto}}</td>
                                    <td>{{$p->entidad}}</td>
                                    <td>{{$p->contacto}}</td>
                                    <td>{{$p->cargo}}</td>
                                    <td>{{$p->email}}</td>


                                </tr>
                            @endforeach


                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <p><a href="{{url('/export-contactos')}}" class="btn btn-primary">Exportar a Planilla de Cálculo</a></p>
    </div>
@endsection
