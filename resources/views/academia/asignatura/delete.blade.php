<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{ $as->id_asignatura }}">
	{{!! Form::Open(['route'=>['asignatura.destroy',$as->id_asignatura],'method'=>'DELETE']) !!}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ELIMINAR CATEGORÍA</h5>
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar la asignatura?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{!! Form::Close() !!}}

</div>