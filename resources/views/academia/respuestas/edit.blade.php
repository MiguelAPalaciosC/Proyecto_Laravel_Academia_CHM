<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-edit-{{ $res->id_respuesta }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CALIFICAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                {!!Form::model($res, ['method' => 'PATCH', 'route' => ['academia.respuestas.update',$res->id_respuesta  ]])!!}
                    {{Form::token()}}


                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Tarea:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="nombre_tarea" value="{{$res->nombre_tarea}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Usuario:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="nombre_usuario" value="{{ $res->nombre_usuario }}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nombre:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="nombre" value="{{ $res->nombre }}" disabled>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Descripcion:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="descripcion" value="{{ $res->descripcion }}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nota:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="number" class="form-control" name="nota" value="{{ $res->nota }}" min=0 max=50>
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