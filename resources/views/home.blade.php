@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Inicio</li>
        </ol>

        <!-- Icon Cards-->
       {{-- <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">{{$count_new}} Nuevas PQRS!</div>
                        <div class="mr-5">10 días: {{$count_new_10}} PQRS</div>
                        <div class="mr-5">30 días: {{$count_new_30}} PQRS</div>
                        <div class="mr-5">+30 días: {{$count_new_31}} PQRS</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('pqrs/nuevas')}}">
                        <span class="float-left">Ver Detalles</span>
                        <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">{{$count_open}} PQRS Abiertas</div>
                        <div class="mr-5">10 días: {{$count_open_10}} PQRS</div>
                        <div class="mr-5">30 días: {{$count_open_30}} PQRS</div>
                        <div class="mr-5">+30 días: {{$count_open_31}} PQRS</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('pqrs/abiertas')}}">
                        <span class="float-left">Ver</span>
                        <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">{{$count_close}} PQRS Cerradas</div>
                        <div class="mr-5">10 días: {{$count_close_10}} PQRS</div>
                        <div class="mr-5">30 días: {{$count_close_30}} PQRS</div>
                        <div class="mr-5">+30 días: {{$count_close_31}} PQRS</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('pqrs/cerradas')}}">
                        <span class="float-left">Ver</span>
                        <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">Total PQRS: {{$count_all}}</div>
                        <div class="mr-5">10 días: {{$count_all_10}} PQRS</div>
                        <div class="mr-5">30 días: {{$count_all_30}} PQRS</div>
                        <div class="mr-5">+30 días: {{$count_all_31}} PQRS</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{url('pqrs/todas')}}">
                        <span class="float-left">Ver</span>
                        <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>

        </div>--}}



        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
           Estado de Requerimientos
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                        <tr>

                            <th>Tiempo de Respuesta</th>
                            <th><a  href="{{url('pqrs/nuevas')}}">Nuevas</a></th>
                            <th><a  href="{{url('pqrs/abiertas')}}">Abiertas</a></th>
                            <th><a  href="{{url('pqrs/cerradas')}}">Cerradas</a></th>
                            <th><a  href="{{url('pqrs/todas')}}">General</a></th>
                            <th>Ver</th>




                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>10 días</td>
                                <td>{{$count_new_10}}</td>
                                <td>{{$count_open_10}}</td>
                                <td>{{$count_close_10}}</td>
                                <td>{{$count_all_10}}</td>
                                <td><a href="{{url('pqrs/diez')}}" class="btn-sm btn-success">Ver</a></td>
                            </tr>
                            <tr>
                                <td>30 días</td>
                                <td>{{$count_new_30}}</td>
                                <td>{{$count_open_30}}</td>
                                <td>{{$count_close_30}}</td>
                                <td>{{$count_all_30}}</td>
                                <td><a href="{{url('pqrs/treinta')}}" class="btn-sm btn-warning">Ver</a></td>
                            </tr>
                            <tr>
                                <td>+30 días</td>
                                <td>{{$count_new_31}}</td>
                                <td>{{$count_open_31}}</td>
                                <td>{{$count_close_31}}</td>
                                <td>{{$count_all_31}}</td>
                                <td><a href="{{url('pqrs/treintayuno')}}" class="btn-sm btn-danger">Ver</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Area Busqueda-->




        {{--<div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>

                   PQRS por tiempo

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>

                            <th>Tiempo de Respuesta</th>

                            <th>Nuevas</th>
                            <th>Abiertas</th>
                            <th>Cerradas</th>


                            <th>General</th>



                        </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>10 días</td>
                                <td>{{$count_new_10}}</td>
                                <td>{{$count_open_10}}</td>
                                <td>{{$count_close_10}}</td>
                                <td>{{$count_all_10}}</td>
                            </tr>

                            <tr>
                                <td>30 días</td>
                                <td>{{$count_new_30}}</td>
                                <td>{{$count_open_30}}</td>
                                <td>{{$count_close_30}}</td>
                                <td>{{$count_all_30}}</td>
                            </tr>

                            <tr>
                                <td>+ 30 días</td>
                                <td>{{$count_new_31}}</td>
                                <td>{{$count_open_31}}</td>
                                <td>{{$count_close_31}}</td>
                                <td>{{$count_all_31}}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>--}}



        <!-- DataTables Example -->
        @if ($pqrsXgrupo)
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                @if ($usr->grupo_id != 0)
                    Últimas PQRS
                @endif
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


                            <th>Estado</th>
                            <th>Requerimiento</th>

                            <th>Cerrado</th>



                        </tr>
                        </thead>

                        <tbody>
                        @foreach($pqrsXgrupo as $p)
                        <tr>



                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->created_at->format('Y-m-d') }}</a></td>
                            <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->id}}</a></td>
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->contacto->contacto}}</a></td>
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->breveDescripcion}}</a></td>
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->etiqueta}}</a></td>
                                    @if ($p->responsable_id != NULL)
                                        <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->responsable->name}}</a></td>
                                    @else
                                        <td>Sin responsable</td>
                                    @endif
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->grupo->nombre}}</a></td>


                                    <td>
                                        @if($p->estado == '0')
                                            <span class="text-danger">Recibido</span>
                                        @endif
                                        @if($p->estado == '1')
                                            <span class="text-warning">En Proceso</span>
                                        @endif
                                        @if($p->estado == '2')
                                            <span class="text-success">Cerrado</span>
                                        @endif
                                    </td>
                                    <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->tipoSolicitud}}</a></td>
                            <td><a href="{{url('pqrs/gestionar', $p->id)}}">{{$p->cerrado}}</a></td>


                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endif




        @if (Auth::user()->privilegio == 1)
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-search"></i>
                    Busqueda por palabra (solo administradores)</div>
                <div class="card-body">
                    <form method="POST" action="{{url('pqrs/resultadoavanzado')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="texto" class="form-control" placeholder="Ingrese una palabra o texto" required="required"  name="texto">
                                        <label for="texto">Palabra o Texto a Filtrar</label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="date" id="fecha_desde_a" class="form-control" placeholder="Fecha desde" required="required"  name="fecha_desde_a">
                                        <label for="fecha_desde_a">Fecha desde</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="date" id="fecha_hasta_a" class="form-control" placeholder="Fecha desde" required="required"  name="fecha_hasta_a">
                                        <label for="fecha_hasta_a">Fecha hasta</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        @endif

        <div class="card mb-3">




            <div class="card-header">
                <i class="fas fa-search"></i>
                Buscar</div>
            <div class="card-body">
                <form method="POST" action="{{url('pqrs/resultado')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" id="fecha_desde" class="form-control" placeholder="Fecha desde" required="required" name="fecha_desde">
                                    <label for="fecha_desde">Fecha desde</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" id="fecha_hasta" class="form-control" placeholder="Fecha desde" required="required" name="fecha_hasta">
                                    <label for="fecha_hasta">Fecha hasta</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-search"></i>
                Filtros por etiquetas</div>
            <div class="card-body">
                <form method="POST" action="{{url('pqrs/resultadoetiqueta')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="etiqueta" required>
                                        <option value="">Seleccione una etiqueta</option>
                                        @foreach($etiqueta as $e)

                                            <option value="{{$e->etiqueta}}">{{$e->etiqueta}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" id="fecha_desde_e" class="form-control" placeholder="Fecha desde" required="required"  name="fecha_desde_e">
                                    <label for="fecha_desde_e">Fecha desde</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" id="fecha_hasta_e" class="form-control" placeholder="Fecha desde" required="required" name="fecha_hasta_e">
                                    <label for="fecha_hasta_e">Fecha hasta</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>


    </div>
@endsection
