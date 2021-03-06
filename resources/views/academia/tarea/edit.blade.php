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
                    {!! Form::model($ta, ['method' => 'PATCH', 'route' => ['academia.tarea.update', $ta->id_tarea]]) !!}
                    {{ Form::token() }}

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Nombre:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="nombre" value="{{$ta->nombre}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Descripcion:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="text" class="form-control" name="descripcion" value="{{$ta->descripcion}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Fecha de entrega:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <input type="date" class="form-control" name="fecha_entrega" value="{{$ta->fecha_entrega}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Asignatura:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <select name="id_asignatura" class="form-control">
                                @foreach ($asignatura as $as)
                                    <option value="{{ $as->id_asignatura }}">{{ $as->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Estado:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <select name="estado" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
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