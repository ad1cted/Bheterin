<!-- INICIO MODAL SELECCIONAR ORDEN DE COMPRA -->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" title="Cerrar" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Seleccione un Tipo de Orden de Compra</h4>

				<form action="proveedores/option" method="post">
	                <div class="row">
	                    <div class="modal-body">
	                        <div class="form-group">
	                            <div class="col-md-6">
	                                <label class="control-label">Tipo (*)</label>
	                                <select required id="tipo_prove" name="tipo_prove" class="form-control select2me" data-placeholder="Select...">
	                                    <option value="">Elegir Tipo</option>
	                                    <option value="1">Crear Proveedor Nacional</option>
	                                    <option value="2">Crear Proveedor Internacional</option>
	                                </select>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-default" title="Cancelar" data-dismiss="modal" aria-hidden="true">Cancelar</button>
	                    <button type="submit" title="Confirmar" class="btn btn-info btn-borrar">Confirmar</a>
	                </div>
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            </form>
			</div>
		</div>
	</div>
 </div>
 <!-- FIN MODAL SELECCIONAR ORDEN DE COMPRA -->
