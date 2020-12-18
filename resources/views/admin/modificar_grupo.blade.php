@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Modificar Grupo</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->





        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Nuevo Grupos</div>
            <div class="card-body">

                <form method="post" action="{{url('admin/actualizar_grupo')}}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <input type="text" id="nombre" class="form-control" placeholder="Nombre" autofocus="autofocus" name="nombre" value="{{$grupo->nombre}}">
                                <label for="nombre">Nombre del Grupo</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="serie" class="form-control" placeholder="Serie" autofocus="autofocus" name="serie" value="{{$grupo->serie}}">
                                <label for="serie">Serie</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="subserie" class="form-control" placeholder="Subserie" autofocus="autofocus" name="subserie" value="{{$grupo->subserie}}">
                                <label for="subserie">Subserie</label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">

                            <div class="col-md-2">
                                <input type="hidden" name="id" value="{{$grupo->id}}">
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">

                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
