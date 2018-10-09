@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Areas</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="area_id">Area ID</label>
                                    <div class="col-md-4">
                                        <input id="area_id" name="area_id" type="text" placeholder="ID Area" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="area">Nombre Area</label>
                                    <div class="col-md-4">
                                        <input id="area" name="area" type="text" placeholder="Nombre Area" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-8">
                                        <button id="insert" name="singlebutton" class="btn btn-primary">Ingresar</button>
                                        <button id="delete" name="singlebutton" class="btn btn-primary">Eliminar</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
