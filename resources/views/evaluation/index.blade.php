@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Evaluacion de Empleado</h4></div>
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="">
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
                                    <div class="col-md-4"><b>Puesto:</b> {{$employee->puesto}}</div>
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
                                        <label class="radio-inline" for="radios">Competente</label>
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="radios" id="radios-0" value="0" checked="checked">
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="radios" id="radios-1" value="1">
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-2">
                                            <input type="radio" name="radios" id="radios-2" value="2">
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-3">
                                            <input type="radio" name="radios" id="radios-3" value="3">
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-4">
                                            <input type="radio" name="radios" id="radios-4" value="4">
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-5">
                                            <input type="radio" name="radios" id="radios-5" value="5">
                                            5
                                        </label>
                                        <label class="radio-inline control-label" for="radios">Competente</label>
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
                                        <label class="radio-inline" for="radios">No cumplía</label>
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="radios" id="radios-0" value="0" checked="checked">
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="radios" id="radios-1" value="1">
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-2">
                                            <input type="radio" name="radios" id="radios-2" value="2">
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-3">
                                            <input type="radio" name="radios" id="radios-3" value="3">
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-4">
                                            <input type="radio" name="radios" id="radios-4" value="4">
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-5">
                                            <input type="radio" name="radios" id="radios-5" value="5">
                                            5
                                        </label>
                                        <label class="radio-inline control-label" for="radios">Cumplía</label>
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
                                        <label class="radio-inline" for="radios">No satisfecho</label>
                                        <label class="radio-inline" for="radios-0">
                                            <input type="radio" name="radios" id="radios-0" value="0" checked="checked">
                                            0
                                        </label>
                                        <label class="radio-inline" for="radios-1">
                                            <input type="radio" name="radios" id="radios-1" value="1">
                                            1
                                        </label>
                                        <label class="radio-inline" for="radios-2">
                                            <input type="radio" name="radios" id="radios-2" value="2">
                                            2
                                        </label>
                                        <label class="radio-inline" for="radios-3">
                                            <input type="radio" name="radios" id="radios-3" value="3">
                                            3
                                        </label>
                                        <label class="radio-inline" for="radios-4">
                                            <input type="radio" name="radios" id="radios-4" value="4">
                                            4
                                        </label>
                                        <label class="radio-inline" for="radios-5">
                                            <input type="radio" name="radios" id="radios-5" value="5">
                                            5
                                        </label>
                                        <label class="radio-inline control-label" for="radios">Satisfecho</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-8 col-md-offset-1">
                                    <label class="control-label" for="radios">*Usted que aspecto o actitudes le pediría
                                        que modificara al trabajador:</label>
                                </div>
                                <div class="row col-md-offset-2">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="col-md-4">
                                            <textarea class="form-control" id="textarea" name="textarea">Describa actitudes y areas de mejora .</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-offset-1">
                                    <div class="col-md-4"><b>E-mail:</b> Sin informaion</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-md-offset-1">
                                    <div class="col-md-4"><b>Perido Laboro:</b> Sin informaion</div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <button id="insert" name="insert" class="btn btn-primary" value="insert">Guardar
                                        Evaluacion
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="GET" id="DataEmployeesById" action="{{ url('/employees/id/')}}"></form>
@endsection

@section('scripts')
    <script src="{{ asset('js/employees/index.js') }}"></script>
@endsection
