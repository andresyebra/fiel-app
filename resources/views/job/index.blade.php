@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Puestos</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/job/create')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="job_id">Puesto ID</label>
                                <div class="col-md-4">
                                    <input id="job_id" name="job_id" type="text" placeholder="ID Puesto"
                                           class="form-control input-md" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description_job">Descripcion de Puesto</label>
                                <div class="col-md-4">
                                    <input id="description_job" name="description_job" type="text"
                                           placeholder="Descripcion Puesto" class="form-control input-md"
                                           value="{{ old('description_job')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <button id="insert" name="insert" class="btn btn-primary" value="insert">Guardar
                                    </button>
                                    <button id="delete" name="delete" class="btn btn-primary" value="delete">Eliminar
                                    </button>
                                    <button id="discard" type="button" name="discard" class="btn btn-primary">Limpiar</button>
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
                    <div class="panel-heading"><h4>Lista de Puestos</h4></div>
                    <div class="panel-body">

                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Puesto ID</th>
                                <th scope="col">Descripcion de Puesto</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($jobs) > 0)
                                @foreach ($jobs as $job => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->descripcion}}</td>
                                        <td>
                                            <button type="button" name="edit_job" id="edit_job"
                                                    class="btn btn-primary edit_job"
                                                    value="{{$value->id}}">Editar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No hay Puestos.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="GET" id="DataJobsById" action="{{ url('/job/id/')}}"></form>
@endsection

@section('scripts')
    <script src="{{ asset('js/jobs/index.js') }}"></script>
@endsection
