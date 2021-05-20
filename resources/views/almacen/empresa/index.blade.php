@extends ('layouts.admin')
@section ('head')
    <div class="masthead-subheading">DETALLE EMPRESA</div>
@stop
@section ('contenido')

 <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Detalle Empresa</h2>
                <h3 class="section-subheading text-muted">Información principal de la empresa</h3>
                
            </div> <br>   
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<th>Nombre</th>
								<th>NIT</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Informacion</th>
								<th>OPCIONES</th>
							</thead>
			               @foreach ($empresa as $emp)
							<tr>
								<td>{{ $emp->nombre_empresa}}</td>
								<td>{{ $emp->nit}}</td>
								<td>{{ $emp->direccion}}</td>
								<td>{{ $emp->telefono}}</td>
								<td>{{ $emp->correo}}</td>
								<td>{{ $emp->informacion}}</td>
								<td>
									
			                        <a href="" data-target="#modal-delete-{{$emp->id_detalle}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
									
								</td>
								
							</tr>
							@include('almacen.empresa.edit')
							@endforeach
						</table>
					</div>
					{{$empresa->render()}}
				</div>
			</div>

        </div>
    </section>

@stop
