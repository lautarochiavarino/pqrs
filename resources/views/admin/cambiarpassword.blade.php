@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Cambiar Password</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->





        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Cambiar el password de inicio de sesión para la cuenta de {{$user->name}}</div>
            <div class="card-body">


                    <form class="pure-form" method="POST" action="{{ url('admin/changepass') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" placeholder="Password" id="password" required name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" placeholder="Confirm Password" id="confirm_password" required>
                            </div>
                        </div>


                        <input type="hidden" name="id" value="{{$user->id}}">


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="pure-button pure-button-primary">Cambiar Password</button>




                            </div>
                        </div>



                    </form>



            </div>
            <p class="alert-danger">
                <strong>  {!! Session::has('cambiarpass') ? Session::get("cambiarpass") : '' !!}</strong>
            </p>

        </div>

    </div>
@endsection


@section('scripts')
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

    @endsection
