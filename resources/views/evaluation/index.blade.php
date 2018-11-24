@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Empleados</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/employees/create')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="id_empleado">Empleado ID</label>
                                <div class="col-md-4">
                                    <input id="id_empleado" name="id_empleado" type="text" placeholder="Empleado ID"
                                           class="form-control input-md" readonly="true"
                                           value="{{ old('id_empleado')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="clave_empleado">Clave Empleado</label>
                                <div class="col-md-4">
                                    <input id="clave_empleado" name="clave_empleado" type="text"
                                           placeholder="Clave Empleado" class="form-control input-md"
                                           value="{{ old('clave_empleado')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="nombre_empleado">Nombre Empleado</label>
                                <div class="col-md-4">
                                    <input id="nombre_empleado" name="nombre_empleado" type="text"
                                           placeholder="Nombre Empleado" class="form-control input-md"
                                           value="{{ old('nombre_empleado')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="curp_empleado">CURP</label>
                                <div class="col-md-4">
                                    <input id="curp_empleado" name="curp_empleado" type="text"
                                           placeholder="CURP Empleado" class="form-control input-md"
                                           value="{{ old('curp_empleado')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="imss_empleado">IMSS(NSS)</label>
                                <div class="col-md-4">
                                    <input id="imss_empleado" name="imss_empleado" type="number"
                                           placeholder="NSS Empleado" class="form-control input-md"
                                           value="{{ old('imss_empleado')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="job_empleado">Puesto</label>
                                <div class="col-md-4">
                                    <select id="job_empleado" name="job_empleado" class="form-control selector">
                                        <option value="default" selected disabled hidden>Seleciona Puesto</option>
                                        @if(count($jobs) > 0)
                                            @foreach ($jobs as $job => $value)

                                                <option value="{{$value->id}}" id="{{$value->id}}">{{$value->id}}
                                                    - {{$value->descripcion}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <button id="insert" name="insert" class="btn btn-primary" value="insert">Guardar
                                    </button>
                                    <button id="delete" name="delete" class="btn btn-primary" value="delete">Eliminar
                                    </button>
                                    <button id="discard" type="button" name="discard" class="btn btn-primary">Limpiar
                                    </button>
                                </div>
                            </div>

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
                        </form>
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
                            <div class="col-md-9"><h4>Lista de Empleados</h4></div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input id="buscar_empleado" type="text" class="form-control" name="buscar"
                                           placeholder="Buscar Empleado">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <table class="table" id="tabla_employee">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Empleado ID</th>
                                <th scope="col">Clave</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Curp</th>
                                <th scope="col">Imss(NSS)</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Area</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($employees) > 0)
                                @foreach ($employees as $employee => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->clave}}</td>
                                        <td>{{$value->nombre}}</td>
                                        <td>{{$value->curp}}</td>
                                        <td>{{$value->imss}}</td>
                                        <td>{{$value->empresa}}</td>
                                        <td>{{$value->area}}</td>
                                        <td>
                                            <button type="button" name="edit_employee" id="edit_employee"
                                                    class="btn btn-primary edit_employee"
                                                    value="{{$value->id}}">Editar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No hay Empleados.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
