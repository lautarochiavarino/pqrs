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





        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Grupos</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Serie</th>
                            <th>Subserie</th>
                            <th>Estado</th>
                            <th width="20%"></th>


                        </tr>
                        </thead>
                        <tfoot>
                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Serie</th>
                            <th>Subserie</th>
                            <th>Estado</th>
                            <th width="20%"></th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @if($grupos)

                            @foreach($grupos as $u)
                                <tr>

                                    <td>{{$u->id}}</td>
                                    <td>{{$u->nombre}}     <a href="{{url('admin/modificar_grupo', $u->id)}}"><i class="fas fa-fw fa-edit"></i></a></td>
                                    <td>{{$u->serie}}</td>
                                    <td>{{$u->subserie}}</td>

                                    @if($u->estado == '1')
                                    <td>Activo</td>
                                    @endif
                                    @if($u->estado == '0')
                                        <td>Desactivado</td>
                                    @endif

                                    @if($u->estado == '1')
                                        <td><a href="{{url('admin/desactivar_grupo', $u->id)}}" class="btn btn-danger btn-sm">Desactivar</a>
                                    @endif
                                    @if($u->estado == '0')
                                        <td><a href="{{url('admin/activar_grupo', $u->id)}}" class="btn btn-success btn-sm">Activar</a>
                                    @endif

                                    <a href="{{url('admin/listar_usuarios_grupo', $u->id)}}" class="btn btn-primary btn-sm">Ver Usuarios</a></td>

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
