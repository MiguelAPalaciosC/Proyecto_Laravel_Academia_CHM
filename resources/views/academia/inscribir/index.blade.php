@extends('layouts.app')

@section('content')
<div id="fondopng">
    <div class="container">
        @include('academia.inscribir.create')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="section-heading text-uppercase">Asignaturas de cada usuario</h2>
                            </div>
                            <div class="contenedor-modal col-md-2">
                                <a href="" data-target="#modal-create" data-toggle="modal"><button
                                        class="btn btn-info">Crear relacion</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed table-hover">
									<thead>
										<th>ASIGNATURA</th>
										<th>USUARIO</th>
										<th>OPCIONES</th>
									</thead>

									@foreach ($asigus as $au)
									<tr>
                                    
										<td>{{ $au->id_asignatura}}</td>
										<td>{{ $au->id_usuario}}</td>
                                        <td>	
                                            <a href="" data-target="#modal-edit-{{ $au->id_relacion }}"  data-toggle="modal"><button class="btn btn-info">Editar</button></a>
                                            <a href="" data-target="#modal-delete-{{ $au->id_relacion }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                        </td>

									</tr>
                                        @include('academia.inscribir.edit')
                                        @include('academia.inscribir.delete') 

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