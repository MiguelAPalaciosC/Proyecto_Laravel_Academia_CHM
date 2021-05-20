@extends('layouts.app')

@section('content')
<div id="fondopng">
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
                                <a  href="" data-target="#modal-create-tarea" data-toggle="modal" ><button id="boton"
                                        class="btn btn-info"><font face="verdana" size=3>+</font></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                        @foreach ($tarea as $ta)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body available" id="tarjetas">
                                                    <br>
                                                    <h4 class="card-title">{{ $ta->id_asignatura }}</h5>
                                                        <h4 class="card-title">{{ $ta->codigo }}</h5>
                                                    <h4 class="card-title">{{ $ta->nombre }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Estado: {{ $ta->estado }}</h6>
                                                    <p class="card-text">{{ $ta->descripcion }}</p>
                                                    <p class="card-text">Fecha de entrega: {{ $ta->fecha_entrega }}</p>
                                                    <a href="" data-target="#modal-edit-{{ $ta->id_tarea }}"
                                                        data-toggle="modal"><button class="btn btn-info">
                                                        Editar</button>
                                                    </a>
                                                    <a href="" data-target="#modal-delete-{{ $ta->id_tarea }}"
                                                        data-toggle="modal"><button class="btn btn-danger">Eliminar</button>
                                                    </a>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                            
                                            @include('academia.tarea.edit')
                                            @include('academia.tarea.delete') 
                                        @endforeach
                                   
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
</div>
@endsection