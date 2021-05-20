@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Estudiante: {{ $estudiante->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($estudiante,['method'=>'PATCH','route'=>['almacen.estudiante.update',$estudiante->id_estudiante]])!!}
                  {{Form::token()}}
                  <div class="form-group">
                  	<label for="nombre">Nombre</label>
                  	<input type="text" name="nombre" class="form-control" value="{{$estudiante->nombre}}" placeholder="Nombre...">
                  </div>
                  <div class="form-group">
                  	<label for="descripcion">Apellido</label>
                  	<input type="text" name="apellido" class="form-control" value="{{$estudiante->apellido}}" placeholder="Descripción...">
                  </div>
                  <div class="form-group">
                  	<label for="descripcion">C&oacute;digo</label>
                  	<input type="text" name="codigo" class="form-control" value="{{$estudiante->codigo}}" placeholder="Código...">
                  </div>
                  <div class="form-group">
                  	<button class="btn btn-primary" type="submit">Guardar</button>
                  	<button class="btn btn-danger" type="reset">Cancelar</button>
                  </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection