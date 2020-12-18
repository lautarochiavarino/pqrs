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
                El envio de mails fallo.</div>
            <div class="card-body">

                <h2>No se pudo realizar el envio te mails.</h2>

            </div>

        </div>

    </div>
@endsection
