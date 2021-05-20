<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
				 <h5 class="modal-title">REGISTRAR RELACION</h5>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					{!!Form::open(array('url'=>'academia/inscribir','method'=>'POST','autocomplete'=>'off'))!!}
					{{Form::token()}}

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

                    
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <div>Asignatura:</div>
                        </div>
                        <div class="form-group col-sm-8">
                            <select name="id_asignatura" class="form-control">
                                @foreach($asignatura as $a)
                                <option value="{{$a->id_asignatura}}">{{$a->nombre}}</option>
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