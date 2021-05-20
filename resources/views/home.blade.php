@extends('layouts.app')

@section('content')
    <div id="fondopng">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Bienvenido {{ Auth::user()->name }}</h1>
                        </div>

                        <div class="panel-body">
                            @if (Auth::user()->usertype_id_usertype > 1)
                                @if (count($asignatura) > 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table 
                                                    class="table table-striped table-bordered table-condensed table-hover">
                                                    <caption>
                                                        <h3>ASIGNATURAS ASIGNADAS</h3>
                                                    </caption>
                                                    <thead>
                                                        <th id="tablehome">ID ASIGNATURA</th>
                                                        <th id="tablehome">CODIGO</th>
                                                        <th id="tablehome">NOMBRE</th>
                                                    </thead>
                                                    @foreach ($asignatura as $asi)
                                                        <tr>
                                                            <td>{{ $asi->id_asignatura }}</td>
                                                            <td>{{ $asi->codigo }}</td>
                                                            <td>{{ $asi->nombre }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h4 id="titleuser">No hay materias asignadas</h4>
                                @endif
                            @else
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-condensed table-hover">
                                                <caption>
                                                    <h3>USUARIOS REGISTRADOS</h3>
                                                </caption>
                                                <thead>
                                                    <th id="tablehome">ID</th>
                                                    <th id="tablehome">NOMBRE</th>
                                                    <th id="tablehome">CORREO</th>
                                                    <th id="tablehome">TIPO DE USUARIO</th>
                                                </thead>
                                                @foreach ($usuario as $usu)
                                                    <tr>
                                                        <td>{{ $usu->id }}</td>
                                                        <td>{{ $usu->name }}</td>
                                                        <td>{{ $usu->email }}</td>
                                                        <td>{{ $usu->usertype_id_usertype }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (session('info'))
                            <div id="mensajepermisos" class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
