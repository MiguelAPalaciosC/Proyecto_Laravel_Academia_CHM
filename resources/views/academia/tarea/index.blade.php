@extends('layouts.app')

@section('content')
    <div class="container">
        @include('academia.tarea.create')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <h2 class="section-heading text-uppercase">TAREAS</h2>
                            </div>
                            <div class="contenedor-modal col-md-2">
                                <a href="" data-target="#modal-create-tarea" data-toggle="modal"><button
                                        class="btn btn-info">Registrar Tarea</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>DESCRIPCION</th>
                                            <th>FECHA DE ENTREGA</th>
                                            <th>ASIGNATURA</th>
                                            <th>ESTADO</th>
                                            <th>OPCIONES</th>
                                        </thead>
                                        @foreach ($tarea as $ta)
                                            <tr>
                                                <td>{{ $ta->id_tarea }}</td>
                                                <td>{{ $ta->nombre }}</td>
                                                <td>{{ $ta->descripcion }}</td>
                                                <td>{{ $ta->fecha_entrega }}</td>
                                                <td>{{ $ta->id_asignatura }}</td>
                                                <td>{{ $ta->estado }}</td>
                                                <td>

                                                    <a href="" data-target="#modal-edit-{{ $ta->id_tarea }}"
                                                        data-toggle="modal"><button class="btn btn-info">Editar</button></a>

                                                    <a href="" data-target="#modal-delete-{{ $ta->id_tarea }}"
                                                        data-toggle="modal"><button
                                                            class="btn btn-danger">Eliminar</button></a>

                                                </td>
                                            </tr>
                                            @include('academia.tarea.edit')
                                            @include('academia.tarea.delete') 
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if (session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection