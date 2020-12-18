@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Privilegios y Grupos</li>
        </ol>



        <!-- Area Busqueda-->

        <div class="card mb-3">


            <div class="card-header">
                Configure las opciones para el usuario {{$user->name}} ({{$user->email}})
            </div>

                <div class="card-body">
                    @if($user->privilegio == '1')
                        <p>Privilegio: <b>Administrador</b></p>
                    @endif
                    @if($user->privilegio == '2')
                        <p>Privilegio: <b>Gestionador</b> </p>
                    @endif
                    @if($user->privilegio == '3')
                        <p>Privilegio: <b>Usuario</b></p>
                    @endif
                    @if($user->privilegio == '0')
                        <p>Actualmente no tiene privilegios, deberá asignarle uno.</p>
                    @endif

                    @if ($user->grupo_id == 0)
                        Actualmente el usuario no pertenece a ningun grupo, deberá asignarle uno.
                    @else
                        <p>Actualmente pertenece a: <b>{{$user->grupo->nombre}}</b></p>
                    @endif
                    <form method="post" action="{{url('admin/save_profile')}}">
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

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <select class="form-control" name="privilegio" required>
                                        <option value="">Seleccione Privilegio</option>

                                            <option value="1">Administrador</option>
                                            <option value="2">Gestionador</option>
                                            <option value="3">Usuario</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary btn-block" value="Guardar">

                                </div>
                            </div>
                        </div>

                    </form>


                        @if($user->privilegio == '0')
                            <a href="{{url('admin/activar_usuario', $user->id)}}" class="btn btn-primary">Activar Usuario</a>
                        @else

                            <a href="{{url('admin/desactivar_usuario', $user->id)}}" onclick="
return confirm('¿Seguro que desea desactivar este Usuario? No podrá iniciar sesión hasta que sea activado.')"
                               class="btn btn-danger">Desactivar Usuario</a>
                                @endif










                        <a href="{{url('admin/eliminar_usuario', $user->id)}}" onclick="
return confirm('¿Seguro que desea eliminar este Usuario? Se borraran todos sus datos y no podrá recuperarse.')"
                           class="btn btn-danger">Eliminar Usuario</a>
                </div>






            <a href="{{url('admin/reset_usuario', $user->id)}}" class="btn btn-primary">Resetear Password</a>



            </div>

        <p class="alert-danger">
            <strong>  {!! Session::has('reestrablecespassword') ? Session::get("reestrablecespassword") : '' !!}</strong>
        </p>


            <!-- DataTables Example -->



    </div>
@endsection
