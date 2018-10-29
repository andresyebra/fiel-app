@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Empresas</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/companies/create')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="empresas_id">Empresas ID</label>
                                <div class="col-md-4">
                                    <input id="empresas_id" name="empresas_id" type="text" placeholder="Empresa ID"
                                           class="form-control input-md" value="{{ old('empresas_id')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="clave_empresa">Clave Empresa</label>
                                <div class="col-md-4">
                                    <input id="clave_empresa" name="clave_empresa" type="text"
                                           placeholder="Clave Empresa" class="form-control input-md"
                                           value="{{ old('clave_empresa')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="descripcion_empresa">Descripcion
                                    Empresa</label>
                                <div class="col-md-4">
                                    <input id="descripcion_empresa" name="descripcion_empresa" type="text"
                                           placeholder="Descripcion Empresa" class="form-control input-md"
                                           value="{{ old('descripcion_empresa')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="area_empresa">Area</label>
                                <div class="col-md-4">
                                    <select id="area_empresa" name="area_empresa" class="form-control">
                                        <option value="" selected disabled hidden>Seleciona Area</option>
                                        @if(count($areas) > 0)
                                            @foreach ($areas as $area => $value)
                                                <option value="{{$value->descripcion}}">{{$value->clave}}
                                                    - {{$value->descripcion}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <button id="insert" name="insert" class="btn btn-primary" value="insert">Ingresar
                                    </button>
                                    <button id="delete" name="delete" class="btn btn-primary" value="delete">Eliminar
                                    </button>
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
                    <div class="panel-heading"><h4>Lista de Empresas</h4></div>
                    <div class="panel-body">

                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Empresa ID</th>
                                <th scope="col">Clave Empresa</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Area</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($companies) > 0)
                                @foreach ($companies as $company => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->clave}}</td>
                                        <td>{{$value->descripcion}}</td>
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
