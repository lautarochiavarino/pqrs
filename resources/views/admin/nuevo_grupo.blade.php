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
                Nuevo Grupos</div>
            <div class="card-body">

                <form method="post" action="{{url('admin/save_grupo')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <input type="text" id="nombre" class="form-control" placeholder="Nombre" autofocus="autofocus" name="nombre">
                                <label for="nombre">Nombre del Grupo</label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">

                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary btn-block" value="Guardar">

                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
