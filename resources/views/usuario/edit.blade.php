<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-edit-{{ $usu->id }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::model($usu, ['method' => 'PATCH', 'route' => ['usuario.update', $usu->id]]) !!}
                    {{ Form::token() }}

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nombre:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="name" value="{{ $usu->name }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Correo:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="email" class="form-control" name="email" value="{{ $usu->email }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Contraseña:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="password" class="form-control" name="password" value="" required placeholder="Ingrese la contraseña">
                        </div>
                    </div>

                    <div class="form-row">
						<div class="form-group col-sm-4">
							<div>Tipo de usuario:</div>
						</div>
						<div class="form-group col-sm-8">
							<select name="usertype_id_usertype" class="form-control">
								@foreach($usertype as $ut)
								<option value="{{$ut->id_usertype}}">{{$ut->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

                    <div class="form-row" align="center">
                        <div class="form-group col-sm-12" align="center">
                            <button class="btn btn-info" type="submit">Guardar</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>


</div>