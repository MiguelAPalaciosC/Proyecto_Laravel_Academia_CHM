@extends('layouts.app')

@section('content')
<div id="fondopng">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10">
                                <h2 class="section-heading text-uppercase">RESPUESTAS</h2>
                            </div>
                            <div class="contenedor-modal col-md-2">
                                <a href="" data-target="#modal-create-tarea" data-toggle="modal" ><button
                                        class="btn btn-info"><font face="verdana" size=3>+</font></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    
                                        @foreach ($respuesta as $res)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body available" id="tarjetas">
                                                    <br>
                                                    <h4 class="card-title">{{ $res->nombre }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Nota: {{ $res->nota }}</h6>
                                                    <p class="card-text">{{ $res->descripcion }}</p>
                                                    <p class="card-text">Tarea: {{ $res->id_tarea }}</p>
                                                    <p class="card-text">Usuario: {{ $res->id_usuario }}</p>
                                                    <a href="" data-target="#modal-edit-{{ $res->id_respuesta }}"
                                                        data-toggle="modal"><button class="btn btn-info">
                                                        Calificar</button>
                                                    </a>
                                                    <a href="" data-target="#modal-delete-{{ $res->id_respuesta }}"
                                                        data-toggle="modal"><button class="btn btn-danger">
                                                        Eliminar</button>
                                                    </a>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                            @include('academia.respuestas.edit')
                                            @include('academia.respuestas.delete')
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