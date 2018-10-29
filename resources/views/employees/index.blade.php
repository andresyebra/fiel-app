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
                                    <input id="id_empleado" name="id_empleado" type="text" placeholder="Empleado ID" class="form-control input-md">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="clave_empleado">Clave Empleado</label>
                                <div class="col-md-4">
                                    <input id="clave_empleado" name="clave_empleado" type="text" placeholder="Clave Empleado" class="form-control input-md" value="{{ old('clave_empleado')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="nombre_empleado">Nombre Empleado</label>
                                <div class="col-md-4">
                                    <input id="nombre_empleado" name="nombre_empleado" type="text" placeholder="Nombre Empleado" class="form-control input-md" value="{{ old('nombre_empleado')}}">
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="curp_empleado">CURP</label>
                                    <div class="col-md-4">
                                        <input id="curp_empleado" name="curp_empleado" type="text" placeholder="CURP Empleado" class="form-control input-md" value="{{ old('curp_empleado')}}">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="imss_empleado">IMSS(NSS)</label>
                                <div class="col-md-4">
                                    <input id="imss_empleado" name="imss_empleado" type="number" placeholder="NSS Empleado" class="form-control input-md" value="{{ old('imss_empleado')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="empresa_empleado">Empresa</label>
                                <div class="col-md-4">

                                    <select id="empresa_empleado" name="empresa_empleado" class="form-control">
                                        <option value = "" selected disabled hidden>Seleciona Empresa</option>
                                        @if(count($companies) > 0)
                                            @foreach ($companies as $company => $value)
                                                <option value="{{$value->descripcion}}">{{$value->clave}} -  {{$value->descripcion}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="area">Area</label>
                                <div class="col-md-4">
                                    <select id="area_empleado" name="area_empleado" class="form-control">
                                        <option value = "" selected disabled hidden>Seleciona Area</option>
                                        @if(count($areas) > 0)
                                            @foreach ($areas as $area => $value)
                                                <option value="{{$value->descripcion}}">{{$value->clave}} -  {{$value->descripcion}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-8">
                                        <button id="insert" name="insert" class="btn btn-primary" value="insert">Ingresar</button>
                                        <button id="delete" name="delete" class="btn btn-primary" value="delete">Eliminar</button>
                                    </div>
                                </div>

                            @if($errors->any())
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="alert alert-danger" role="alert">
                                        {{$errors->first()}}
                                    </div>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="col-md-4 col-md-offset-2">
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
                    <div class="panel-heading"><h4>Lista de Empleados</h4></div>
                    <div class="panel-body">

                        <table class="table">
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
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No hay Empresas.</td>
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
