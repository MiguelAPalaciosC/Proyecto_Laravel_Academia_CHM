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
                                <h2 class="section-heading text-uppercase">NOTAS</h2>
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
                                    
                                    <!-- {{$cont=0}} -->
                                    <!-- {{$uno=1}} -->
                                    @foreach ($asignatura as $a)
                                    
                                    <div class="col-sm-12 col-lg-4 mb-3">
                                        <div class="card">
                                            <div class="card-body available">
                                                <!-- {{$var=0}} -->
                                                <br>
                                                <h4 class="card-title">{{ $a->nombre }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Notas: </h6>
                                                @foreach ($nota as $n)
                                                @if($a->id_asignatura==$n->id_asignatura)
                                                    @if($n->id_usuario == (Auth::user()->id))
                                                    <p class="card-text">{{ $n->nota }}</p>
                                                    <!-- {{$cont=($cont)+($uno)}} -->
                                                    <!-- {{$var=$var+$n->nota}} -->
                                                    @endif
                                                @endif
                                                @endforeach
                                                
                                                <p class="card-text">Definitiva: {{ ($var/$cont) }}</p>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
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