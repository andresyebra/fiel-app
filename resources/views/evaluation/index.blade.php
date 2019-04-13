@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Evaluacion de Empleado ({{$info_company->descripcion}}) </h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url("/evaluate/create")}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="row col-md-offset-1">
                                    <div class="col-md-4"><b>Nombre:</b> {{$employee->nombre}}</div>
                                    <div class="col-md-3"><b>Clave:</b>{{$employee->clave}} </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row col-md-offset-1">
                                    <div class="col-md-4"><b>Curp:</b> {{$employee->curp}}</div>
                                    <div class="col-md-4"><b>IMMS(NSS):</b>{{$employee->imss}} </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-offset-1">
                                    <div class="col-md-4"><b>Puesto:</b> {{$job->descripcion}}</div>
                                    <div class="col-md-4"><b>Fecha Evaluacion:</b> {{$date_evaluation}} </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">

                                    <label class=" control-label" for="radios">*El trabajador era competente en el área
                                        que se desempeñó:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <label class="radio-inline" for="radios_competente">Competente</label>
                                        <label class="radio-inline" for="radios-competente0">
                                            <input type="radio" name="radios_competente" id="radios-competente0"
                                                   value="0" {{ old('radios_competente')== "0" || (isset($evaluation_info->competente) && $evaluation_info->competente == "0") ? 'checked' : '' }} >
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-competente1">
                                            <input type="radio" name="radios_competente" id="radios-competente1"
                                                   value="1" {{ old('radios_competente')== "1" || (isset($evaluation_info->competente) && $evaluation_info->competente == "1") ? 'checked' : '' }} >
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-competente2">
                                            <input type="radio" name="radios_competente" id="radios-competente2"
                                                   value="2" {{ old('radios_competente')== "2" || (isset($evaluation_info->competente) && $evaluation_info->competente == "2")  ? 'checked' : '' }} >
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-competente3">
                                            <input type="radio" name="radios_competente" id="radios-competente3"
                                                   value="3" {{ old('radios_competente')== "3" || (isset($evaluation_info->competente) && $evaluation_info->competente == "3")  ? 'checked' : '' }} >
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-competente4">
                                            <input type="radio" name="radios_competente" id="radios-competente4"
                                                   value="4" {{ old('radios_competente')== "4" || (isset($evaluation_info->competente) && $evaluation_info->competente == "4") ? 'checked' : '' }} >
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-competente5">
                                            <input type="radio" name="radios_competente" id="radios-competente5"
                                                   value="5" {{ old('radios_competente')== "5" || (isset($evaluation_info->competente) && $evaluation_info->competente == "5")  ? 'checked' : '' }} >
                                            5
                                        </label>
                                        <label class="radio-inline control-label"
                                               for="radios_competente">Competente</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">
                                    <label class="control-label" for="radios">*El trabajador cumplía con su horario de
                                        trabajo:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <label class="radio-inline" for="radios_cumplia">No cumplía</label>
                                        <label class="radio-inline" for="radios-cumplia0">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia0"
                                                   value="0" {{ old('radios_cumplia')== "0" || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "0") ? 'checked' : '' }}>
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-cumplia1">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia1"
                                                   value="1" {{ old('radios_cumplia')== "1" || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "1") ? 'checked' : '' }}>
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-cumplia2">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia2"
                                                   value="2" {{ old('radios_cumplia')== "2"  || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "2") ? 'checked' : '' }}>
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-cumplia3">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia3"
                                                   value="3" {{ old('radios_cumplia')== "3" || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "3") ? 'checked' : '' }}>
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-cumplia4">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia4"
                                                   value="4" {{ old('radios_cumplia')== "4" || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "4") ? 'checked' : '' }}>
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-cumplia5">
                                            <input type="radio" name="radios_cumplia" id="radios-cumplia5"
                                                   value="5" {{ old('radios_cumplia')== "5" || (isset($evaluation_info->cumplia) && $evaluation_info->cumplia == "5") ? 'checked' : '' }}>
                                            5
                                        </label>
                                        <label class="radio-inline control-label" for="radios_cumplia">Cumplía</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">

                                    <label class="control-label" for="radios">*Grado de satisfacción de obtuvo el
                                        patrón:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <label class="radio-inline" for="radios_satisfecho">No satisfecho</label>
                                        <label class="radio-inline" for="radios-satisfecho0">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho0"
                                                   value="0" {{ old('radios_satisfecho')== "0" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "0") ? 'checked' : '' }}>
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-satisfecho1">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho1"
                                                   value="1" {{ old('radios_satisfecho')== "1" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "1") ? 'checked' : '' }}>
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-satisfecho2">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho2"
                                                   value="2" {{ old('radios_satisfecho')== "2" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "2") ? 'checked' : '' }}>
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-satisfecho3">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho3"
                                                   value="3" {{ old('radios_satisfecho')== "3" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "3") ? 'checked' : '' }}>
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-satisfecho4">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho4"
                                                   value="4" {{ old('radios_satisfecho')== "4" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "4") ? 'checked' : '' }}>
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-satisfecho5">
                                            <input type="radio" name="radios_satisfecho" id="radios-satisfecho5"
                                                   value="5" {{ old('radios_satisfecho')== "5" || (isset($evaluation_info->satisfecho) && $evaluation_info->satisfecho == "5") ? 'checked' : '' }}>
                                            5
                                        </label>
                                        <label class="radio-inline control-label"
                                               for="radios_satisfecho">Satisfecho</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">

                                    <label class="control-label" for="radios">*Trabajaba bien en equipo:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <label class="radio-inline" for="radios_equipo">No trabajo</label>
                                        <label class="radio-inline" for="radios-equipo0">
                                            <input type="radio" name="radios_equipo" id="radios-equipo0"
                                                   value="0" {{ old('radios_equipo')== "0" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "0") ? 'checked' : '' }}>
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-equipo1">
                                            <input type="radio" name="radios_equipo" id="radios-equipo1"
                                                   value="1" {{ old('radios_equipo')== "1" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "1") ? 'checked' : '' }}>
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-equipo2">
                                            <input type="radio" name="radios_equipo" id="radios-equipo2"
                                                   value="2" {{ old('radios_equipo')== "2" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "2") ? 'checked' : '' }}>
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-equipo3">
                                            <input type="radio" name="radios_equipo" id="radios-equipo3"
                                                   value="3" {{ old('radios_equipo')== "3" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "3") ? 'checked' : '' }}>
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-equipo4">
                                            <input type="radio" name="radios_equipo" id="radios-equipo4"
                                                   value="4" {{ old('radios_equipo')== "4" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "4") ? 'checked' : '' }}>
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-equipo5">
                                            <input type="radio" name="radios_equipo" id="radios-equipo5"
                                                   value="5" {{ old('radios_equipo')== "5" || (isset($evaluation_info->equipo) && $evaluation_info->equipo == "5") ? 'checked' : '' }}>
                                            5
                                        </label>
                                        <label class="radio-inline control-label"
                                               for="radios_equipo">Si trabajo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">
                                    <label class="control-label" for="radios">*Se realizo Antidoping:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="col-md-4">
                                            <select id="antidoping" name="antidoping" class="form-control selector" {{ ($employee->empresa ==  Auth::user()->empresa) ? '' : 'disabled'}}>
                                                <option value="default" selected disabled hidden>Seleciona Antidoping
                                                </option>
                                                @if(count($antidopings) > 0)
                                                    @foreach ($antidopings as $antidopings => $value)

                                                        <option value="{{$value->id}}"
                                                                id="{{$value->id}}" {{ (old('antidoping') == $value->id || (isset($evaluation_info->antidoping) && $evaluation_info->antidoping == $value->id) ? 'selected':'') }}>{{$value->id}}
                                                            - {{$value->descripcion}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">
                                    <label class="control-label" for="radios">*Tipo de renuncia:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="col-md-4">
                                            <select id="resignation" name="resignation" class="form-control selector" {{ ($employee->empresa ==  Auth::user()->empresa) ? '' : 'disabled'}}>
                                                <option value="default" selected disabled hidden>Seleciona Renuncia
                                                </option>
                                                @if(count($resignations) > 0)
                                                    @foreach ($resignations as $resignation => $value)

                                                        <option value="{{$value->id}}"
                                                                id="{{$value->id}}" {{ (old('resignation') == $value->id || (isset($evaluation_info->renuncia) && $evaluation_info->renuncia == $value->id) ? 'selected':'') }}>{{$value->id}}
                                                            - {{$value->descripcion}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">
                                    <label class="control-label" for="radios">*Perido Laboro:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                            </span>
                                                <input id="perido_laboro" type="text" class="form-control" name="perido_laboro"
                                                       placeholder="Ingresa Periodo (1 año, 2 meses)." {{ ($employee->empresa ==  Auth::user()->empresa) ? '' : 'readonly="true"'}} value="{{(isset($evaluation_info->perido_laboro) ? $evaluation_info->perido_laboro : '')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @if($employee->empresa == Auth::user()->empresa)
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-8">
                                        <button id="insert" name="insert" class="btn btn-primary" value="insert">Guardar
                                            Evaluacion
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <input type="hidden" name="empleado_id" id="empleado_id" value="{{$employee->id}}">
                            <input type="hidden" name="empresa_evalua" id="empresa_evalua"
                                   value="{{$employee->empresa}}">
                        </form>
                        @if($errors->any())
                            <div class="col-md-4 col-md-offset-2" id="alert">
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first()}}
                                </div>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="col-md-4 col-md-offset-2" id="alert">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9"><h4>Lista de Evaluaciones</h4></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="tabla_employee">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Evaluacion ID</th>
                                <th scope="col">Empleado ID</th>
                                <th scope="col">Empresa Evaluo</th>
                                <th scope="col">Evaluacion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($evaluacion_externa) > 0)
                                @foreach ($evaluacion_externa as $evaluation_external => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->empleado_id}}</td>
                                        <td>{{$value->nombre_empresa}}</td>
                                        <td>
                                            <a type="button" href="{{url('/evaluate/id/'.$value->empleado_id)}}"
                                               name="evaluate_employee" id="evaluate_employee"
                                               class="btn btn-primary">Ver Evaluacion
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No hay evaluaciones para este empleado.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
