<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-edit-{{ $as->id_asignatura }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h5 class="modal-title">EDITAR ASIGNATURA</h5>

            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    {!!Form::model($as, ['method' => 'PATCH', 'route' => ['academia.asignatura.update', $as->id_asignatura]])!!}
                    {{Form::token()}}

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Codigo:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="codigo" value="{{ $as->codigo }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nombre:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="Nombre" value="{{ $as->nombre }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Usuario:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <select name="id_usuario" class="form-control">
                                @foreach($users as $us)
                                <option value="{{$us->id}}">{{$us->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row" align="center">
                        <div class="form-group col-sm-12" align="center">
                            <button class="btn btn-info" type="submit">Guardar</button>
                        </div>
                    </div>

                    {!!Form::close()!!}
                </div>
            </div>
			<div class="modal-footer">
			</div>

        </div>
    </div>


</div>
