@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Grupos</li>
        </ol>



        <!-- Area Busqueda-->

        <div class="card mb-3">


                <div class="card-header">
                    @if ($usr->grupo_id == 0)
                        Actualmente el usuario no pertenece a ningun grupo
                    @else
                Actualmente perteneces a: {{$usr->grupo->nombre}}
                    @endif
                <div class="card-body">
                    <form method="post" action="{{url('cambiargrupo')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <select class="form-control" name="grupo_id" required>
                                        <option value="">Seleccione un grupo</option>
                                        @foreach($grupo as $g)
                                            <option value="{{$g->id}}">{{$g->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary btn-block" value="Cambiar de Grupo">

                                </div>
                            </div>
                        </div>


                    </form>

                </div>







        </div>



        <!-- DataTables Example -->


    </div>
@endsection
