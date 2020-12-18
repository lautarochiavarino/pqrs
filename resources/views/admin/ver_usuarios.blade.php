@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Lista Usuarios</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->



        <p class="alert-danger">
            <strong>  {!! Session::has('eliminarusuario') ? Session::get("eliminarusuario") : '' !!}</strong>
        </p>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Usuarios</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Grupo Resolutor</th>
                            <th>Privilegio</th>
                            <th>Fecha Alta</th>
                            <th>Estado</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Grupo Resolutor</th>
                            <th>Privilegio</th>
                            <th>Fecha Alta</th>
                            <th>Estado</th>
                            <th></th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @if($users)

                            @foreach($users as $u)
                                <tr>

                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->grupo->nombre}}</td>

                                    @if($u->privilegio == '1')
                                    <td>Administrador</td>
                                    @elseif ($u->privilegio == '2')
                                        <td>Gestionador</td>
                                    @elseif ($u->privilegio == '3')
                                        <td>Usuario</td>
                                    @else
                                        <td>Desactivado</td>
                                    @endif




                                    <td>{{$u->created_at}}</td>

                                    @if($u->privilegio == '0')
                                        <td>Desactivado</td>
                                    @else
                                        <td>Activo</td>
                                    @endif


                                    <td><a href="{{url('admin/gestionar', $u->id)}}" class="btn btn-primary btn-block">Administrar</a></td>

                                </tr>
                            @endforeach


                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

@endsection
