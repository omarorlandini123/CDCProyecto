@extends('layouts.app')

@section('content')
<div class="container-completo">
    <div class="panel-login mdc-elevation--z3">
        <ul class="mdc-image-list my-image-list" style="display:table;">
            <li class="mdc-image-list__item">
                <div class="mdc-image-list__image-aspect-container">
                    <img class="mdc-image-list__image" src="img/logo.png" alt="Text label"></div>
                <div class="mdc-image-list__supporting">
                    <span class="login-titulo mdc-image-list__label ">Bienvenido</span>
                </div>
            </li>

            </li>

        </ul>
        <br><br>
        <form method="POST" action="{{ route('login') }}" style="text-align: center;">
            @csrf
            <div class="mdc-text-field 
            mdc-text-field--outlined 
            mdc-text-field--dense
            {{$errors->has('name')?'mdc-text-field--invalid':''}}            
            ">
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="mdc-text-field__input"
                    required autocomplete="off">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="tf-outlined" class="mdc-floating-label">{{ __('Usuario') }}</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>

            </div>

            <p id="username-helper-text" class="mdc-text-field-helper-text 
            {{$errors->has('name')?'mdc-text-field-helper-text--validation-msg':''}} "
                aria-hidden="true">
                @if ($errors->has('name'))
                <strong style="color:red;">{{ $errors->first('name') }}</strong>
                @endif
            </p>


            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--dense">
                <input type="password" name="password" id="password" class="mdc-text-field__input">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="tf-outlined" class="mdc-floating-label">{{ __('Contraseña') }}</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>
            @if ($errors->has('password'))
            <p id="username-helper-text" class="mdc-text-field-helper-text 
            {{$errors->has('password')?' mdc-text-field-helper-text--validation-msg':''}} "
                aria-hidden="true">
                @if ($errors->has('password'))
                <strong style="color:red;">{{ $errors->first('password') }}</strong>
                @endif
            </p>

            @endif
            <br><br>

            <button type="submit" class="mdc-button mdc-button--raised mdc-button--dense" style="float: right;">
                <span class="mdc-button__label">Ingresar</span>
            </button>

            @if (Route::has('password.request'))
            <a class="link-normal" href="{{ route('password.request') }}">
                {{ __('¿Olvidó su contraseña?') }}
            </a>
            @endif
        </form>
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingreso al Sistema') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection