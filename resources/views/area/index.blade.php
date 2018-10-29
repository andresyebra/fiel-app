@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Areas</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/area/create')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="area_id">Area ID</label>
                                <div class="col-md-4">
                                    <input id="area_id" name="area_id" type="text" placeholder="ID Area"
                                           class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="key_area">Clave Area</label>
                                <div class="col-md-4">
                                    <input id="key_area" name="key_area" type="text" placeholder="Clave Area"
                                           class="form-control input-md" value="{{ old('key_area')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description_area">Descripcion Area</label>
                                <div class="col-md-4">
                                    <input id="description_area" name="description_area" type="text"
                                           placeholder="Descripcion Area" class="form-control input-md"
                                           value="{{ old('description_area')}}">
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
                    <div class="panel-heading"><h4>Lista de Areas</h4></div>
                    <div class="panel-body">

                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Area ID</th>
                                <th scope="col">Clave Area</th>
                                <th scope="col">Descripcion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($areas) > 0)
                                @foreach ($areas as $area => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->clave}}</td>
                                        <td>{{$value->descripcion}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No hay Areas.</td>
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
