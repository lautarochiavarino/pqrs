@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Contacto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="tipoContacto" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Contacto') }}</label>

                            <div class="col-md-6">
                                <select name="tipoContacto" class="form-control{{ $errors->has('tipoContacto') ? ' is-invalid' : '' }}" name="tipoContacto" value="{{ old('tipoContacto') }}" required autofocus>
                                    <option value="1">primero</option>
                                    <option value="2">segundo</option>
                                    <option value="3">tercero</option>
                                    <option value="4">cuarto</option>
                                </select>



                                @if ($errors->has('tipoContacto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipoContacto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Entidad') }}</label>

                            <div class="col-md-6">
                                <input id="entidad" type="text" class="form-control{{ $errors->has('entidad') ? ' is-invalid' : '' }}" name="entidad" value="{{ old('entidad') }}" required autofocus>

                                @if ($errors->has('entidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('entidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" value="{{ old('cargo') }}" required autofocus>

                                @if ($errors->has('cargo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                            <div class="col-md-6">
                                <select name="pais" class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" value="{{ old('pais') }}" required autofocus>
                                    <option value="1">Argentina</option>
                                    <option value="2">Brasil</option>
                                    <option value="3">Uruguay</option>
                                    <option value="4">Chile</option>
                                </select>



                                @if ($errors->has('pais'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <select name="ciudad" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" value="{{ old('ciudad') }}" required autofocus>
                                    <option value="1">Cordoba</option>
                                    <option value="2">Rosario</option>
                                    <option value="3">Santiago</option>
                                    <option value="4">Montevideo</option>
                                </select>



                                @if ($errors->has('ciudad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
