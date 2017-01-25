<div id="modalEliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" title="Cerrar" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Advertencia</h4>
			</div>
			<div class="modal-body">
				<p>
					 ¿Esta seguro que desea borrar el Proveedor para siempre?
				</p>
			</div>
			<form action="proveedores/delete" method="post">
			<div class="modal-footer">
				<button class="btn btn-default" title="Cancelar" data-dismiss="modal" aria-hidden="true">Cancelar</button>
				<button type="submit" title="Confirmar" class="btn btn-info btn-borrar">Confirmar</a>

			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_id" value="{{ $provider->id }}">
			</form>
		</div>
	</div>
</div>
