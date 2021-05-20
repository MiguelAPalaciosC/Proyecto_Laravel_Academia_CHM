<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-edit-{{ $ta->id_tarea }}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR TAREA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['url' => 'academia/respuesta', 'method' => 'POST', 'autocomplete' => 'off']) !!}
                    {{ Form::token() }}

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Tarea:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="id_tarea" value="{{$ta->id_tarea}}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Usuario:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nombre:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Descripcion:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="descripcion">
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