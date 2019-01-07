@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{ __('Verifica tu correo electronico') }}</h4></div>
                    <div class="panel-body">
                        {{ __('Antes de proceder, por favor verifica tu correo con el enlace de validacion.') }}
                        <br>
                        {{ __('Si no recibiste el correo') }}, <a
                                href="{{ route('verification.resend') }}">{{ __('click aqui para intentar de nuevo') }}</a>.
                        <br>

                        @if (session('resent'))
                            <div class="col-md-6 alert alert-success" role="alert">
                                {{ __('Un nuevo enlace de verificacion ha sido enviado a tu correo electronico.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
