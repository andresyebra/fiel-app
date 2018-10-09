@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Empresas</h4></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="rfc">RFC</label>
                                    <div class="col-md-4">
                                        <input id="rfc" name="rfc" type="text" placeholder="RFC" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="company">Nombre Empresa</label>
                                    <div class="col-md-4">
                                        <input id="company" name="company" type="text" placeholder="Empresa" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="address">Contacto</label>
                                    <div class="col-md-4">
                                        <input id="address" name="address" type="text" placeholder="Contacto" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="phone">Tel.</label>
                                    <div class="col-md-4">
                                        <input id="phone" name="phone" type="text" placeholder="Telefono" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="mail">E-mail</label>
                                    <div class="col-md-4">
                                        <input id="mail" name="mail" type="text" placeholder="E-mail" class="form-control input-md">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="id_request">Solicitud</label>
                                <div class="col-md-4">
                                    <input id="id_request" name="id_request" type="text" placeholder="Numero de Solicitud" class="form-control input-md">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="area">Area</label>
                                <div class="col-md-4">
                                    <select id="area" name="area" class="form-control">
                                        <option value="1">Option one</option>
                                        <option value="2">Option two</option>
                                    </select>
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
