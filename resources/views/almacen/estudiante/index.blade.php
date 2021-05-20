@extends ('layouts.admin')
@section ('head')
    <div class="masthead-subheading">Estudiantes</div>
@stop
@section ('contenido')

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Estudiantes</h2>
                <h3 class="section-subheading text-muted">Listado de estudiantes</h3>
                <a href="almacen/estudiante/create"><button class="btn btn-success">Registrar Nuevo</button></a>
            </div> <br>   
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Codigo</th>
								<th>Opciones</th>
							</thead>
			               @foreach ($estudiantes as $est)
							<tr>
								<td>{{ $est->id_estudiante}}</td>
								<td>{{ $est->nombre}}</td>
								<td>{{ $est->apellido}}</td>
								<td>{{ $est->codigo}}</td>
								<td>
									<a href="{{URL::action('EstudianteController@edit',$est->id_estudiante)}}"><button class="btn btn-info">Editar</button></a>
			                        <a href="" data-target="#modal-delete-{{$est->id_estudiante}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
								</td>
								
							</tr>
							@include('almacen.estudiante.modal')
							@endforeach
						</table>
					</div>
					{{$estudiantes->render()}}
				</div>
			</div>

        </div>
    </section>

@stop
