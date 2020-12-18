<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - PQRS</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ secure_asset('site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ secure_asset('site/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ secure_asset('site/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ secure_asset('site/css/sb-admin.css')}}" rel="stylesheet">


    @yield('head')
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{route('home')}}">Admin - Pqrs</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle"  href="{{route('home')}}">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

            <div class="input-group-append">

            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a href="{{ url('admin/cambiarpassword') }}"  class="dropdown-item">Cambiar Password</a>


                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">



                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>Logout </a>

            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>PQRS</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Menu:</h6>
                <a class="dropdown-item" href="{{url('pqrs/nuevas')}}">Nuevas PQRS</a>
                <a class="dropdown-item" href="{{url('pqrs/abiertas')}}">Abiertas</a>
                <a class="dropdown-item" href="{{url('pqrs/cerradas')}}">Cerradas</a>



            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="{{url('contactos/index')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Contactos</span></a>
        </li>

        @if (Auth::user()->privilegio == 1)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-toolbox"></i>
                    <span>Administrador</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Gestión Usuarios</h6>
                    <a class="dropdown-item" href="{{url('register')}}">Nuevo Usuario</a>
                    <a class="dropdown-item" href="{{url('admin/ver_usuarios')}}">Ver Usuarios</a>
                    <h6 class="dropdown-header">Gestión Grupos</h6>
                    <a class="dropdown-item" href="{{url('admin/nuevo_grupo')}}">Nuevo Grupo</a>
                    <a class="dropdown-item" href="{{url('admin/ver_grupos')}}">Ver Grupos</a>
                    <h6 class="dropdown-header">D&iacute;as Festivos</h6>
                    <a class="dropdown-item" href="{{url('admin/festivos')}}">D&iacute;as Festivos</a>





                </div>
            </li>
        @endif
    </ul>

    <div id="content-wrapper">

        @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Sistema PQRS - 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Click en cerrar sesion para salir.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="#">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ secure_asset('site/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ secure_asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ secure_asset('site/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{ secure_asset('site/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{ secure_asset('site/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ secure_asset('site/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ secure_asset('site/js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{ secure_asset('site/js/demo/datatables-demo.js')}}"></script>
<script src="{{ secure_asset('site/js/demo/chart-area-demo.js')}}"></script>

@yield('scripts')

</body>

</html>
