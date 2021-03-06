@extends('layouts.app')

@section('content')
<div id="fondopng">
    <div class="container">
        @include('academia.asignatura.create')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="section-heading text-uppercase">Asignaturas</h2>
                            </div>
                            <div class="contenedor-modal col-md-2">
                                <a href="" data-target="#modal-create" data-toggle="modal"><button
                                        class="btn btn-info">Crear Asignatura</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed table-hover">
									<thead>
										<th>CODIGO</th>
										<th>NOMBRE</th>
										<th>OPCIONES</th>
									</thead>

									@foreach ($asignatura as $as)
									<tr>
                                    
										<td>{{ $as->codigo}}</td>
										<td>{{ $as->nombre}}</td>
                                        <td>	
                                            <a href="" data-target="#modal-edit-{{ $as->id_asignatura }}"  data-toggle="modal"><button class="btn btn-info">Editar</button></a>
                                            <a href="" data-target="#modal-delete-{{ $as->id_asignatura }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                        </td>

									</tr>
                                        @include('academia.asignatura.edit')
                                        @include('academia.asignatura.delete') 

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
</div>
@endsection