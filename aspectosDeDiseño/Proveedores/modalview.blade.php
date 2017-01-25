<div id="modalVer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog modal-wide">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" title="Cerrar" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Información del Proveedor</h4>
			</div>
			<div class="modal-body">
				<div class="form-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tbody>
							@if($tipo_proveedor == 1)
									<tr>
										<td width="30%">Código: </td>
										<td width="70%"> {{$provider->id}}</td>
									</tr>
									<tr>
										<td>RUT:</td>
										<td>{{$provider->rut}}</td>
									</tr>
									<tr>
										<td>Nombre Comercial:</td>
										<td>{{$provider->nombre}}</td>
									</tr>
									<tr>
										<td>Razón Social:</td>
										<td>{{$provider->razon_social}}</td>
									</tr>
									<tr>
										<td>Dirección:</td>
										<td>{{$provider->direccion}}</td>
									</tr>
									<tr>
										<td>Región:</td>
										<td>{{$provider->regiones->nombre}}</td>
									</tr>
									<tr>
										<td>Ciudad:</td>
										<td>{{$provider->city->nombre}}</td>
									</tr>
									<tr>
										<td>Comuna:</td>
										<td>{{$provider->comune->nombre}}</td>
									</tr>
									<tr>
										<td>Pais de Origen:</td>
										<td>{{$provider->country->nombre}}</td>
									</tr>

								@endif
								@if($tipo_proveedor == 2)
										<tr>
											<td width="30%">Código: </td>
											<td width="70%"> {{$provider->id}}</td>
										</tr>
										<tr>
											<td>Tax ID:</td>
											<td>{{$provider->id_tax}}</td>
										</tr>
										<tr>
											<td>Nombre Comercial:</td>
											<td>{{$provider->nombre}}</td>
										</tr>
										<tr>
											<td>Razón Social:</td>
											<td>{{$provider->razon_social}}</td>
										</tr>
										<tr>
											<td>Dirección:</td>
											<td>{{$provider->direccion}}</td>
										</tr>
										<tr>
											<td>Región:</td>
											<td>{{$provider->region_internacional}}</td>
										</tr>
										<tr>
											<td>Ciudad:</td>
											<td>{{$provider->ciudad_internacional}}</td>
										</tr>

										<tr>
											<td>Pais de Origen:</td>
											<td>{{$provider->country->nombre}}</td>
										</tr>

										<tr>
											<td>Código Postal:</td>
											<td>{{$provider->codigo_postal}}</td>
										</tr>
									@endif
							</tbody>
						</table>
					</div>
					<h3 class="form-section">Información de Datos Bancarios</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tbody>
							@if($tipo_proveedor == 1)
									<tr>
										<td width="30%">Nombre Beneficiario: </td>
										<td width="70%"> {{$provider->nombre_beneficiario}}</td>
									</tr>
									<tr>
										<td>Rut Beneficiario:</td>
										<td>{{$provider->rut_beneficiario}}</td>
									</tr>
									<tr>
										<td>Número de Cuenta:</td>
										<td>{{$provider->nro_cuenta}}</td>
									</tr>
									<tr>
										<td>Banco:</td>
										<td>{{$provider->banco}}</td>
									</tr>
									<tr>
										<td>Tipo de Cuenta:</td>
										<td>{{$provider->tipo_cuenta}}</td>
									</tr>
									<tr>
										<td>Forma de Pago:</td>
										<td>{{$provider->formadepago->condicion}}</td>
									</tr>
									<tr>
										<td>Moneda:</td>
										<td>{{$provider->currency->moneda}}</td>
									</tr>

								@endif
								@if($tipo_proveedor == 2)
										<tr>
											<td width="30%">Nombre Beneficiario: </td>
											<td width="70%"> {{$provider->nombre_beneficiario}}</td>
										</tr>
										<tr>
											<td>Dirección Beneficiario Banco:</td>
											<td>{{$provider->direccion_beneficiario_banco}}</td>
										</tr>
										<tr>
											<td>Dirección del Banco:</td>
											<td>{{$provider->direccion_banco}}</td>
										</tr>
										<tr>
											<td>Código Swif:</td>
											<td>{{$provider->codigo_swif}}</td>
										</tr>
										<tr>
											<td>Número de Cuenta:</td>
											<td>{{$provider->nro_cuenta}}</td>
										</tr>
										<tr>
											<td>Código ABA:</td>
											<td>{{$provider->codigo_aba}}</td>
										</tr>
										<tr>
											<td>Banco:</td>
											<td>{{$provider->banco}}</td>
										</tr>
										<tr>
											<td>Banco Intermediario:</td>
											<td>{{$provider->banco_intermediario}}</td>
										</tr>
										<tr>
											<td>Dirección Banco Intermediario:</td>
											<td>{{$provider->direccion_banco_intermediario}}</td>
										</tr>
										<tr>
											<td>Codigo ABA Banco Intermediario:</td>
											<td>{{$provider->codigo_aba_intermediario}}</td>
										</tr>
										<tr>
											<td>Moneda:</td>
											<td>{{$provider->currency->moneda}}</td>
										</tr>
										<tr>
											<td>Tipo de Cuenta:</td>
											<td>{{$provider->tipo_cuenta}}</td>
										</tr>
										<tr>
											<td>Forma de Pago:</td>
											<td>{{$provider->formadepago->condicion}}</td>
										</tr>
									@endif
							</tbody>
						</table>
					</div>
					<!--/row-->
					<h3 class="form-section">Información de Contacto</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<th>Nombre</th>
									<th>telefono</th>
									<th>Correo Contacto</th>
									<th>Correo Empresa</th>
									<th>Celular</th>

								</tr>
								<tr>
									<td>{{$provider->contacto}}</td>
									<td>{{$provider->telefono}}</td>
									<td>{{$provider->correo}}</td>
									<td>{{$provider->email_empresa}}</td>
									<td>{{$provider->celular}}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<h3 class="form-section">Información Adicional</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td width="30%">Página Web: </td>
									<td width="70%"> {{$provider->pagina_web}}</td>
								</tr>
								<tr>
									<td>Información Página Web:</td>
									<td>{{$provider->info_web}}</td>
								</tr>
								<tr>
									<td>Usuario Pagina Web:</td>
									<td>{{$provider->usuario_pagina}}</td>
								</tr>
								<tr>
									<td>Login:</td>
									<td>{{$provider->login}}</td>
								</tr>
								<tr>
									<td>Comentarios:</td>
									<td>{{$provider->comentarios}}</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!--/row-->

				</div>
				<div class="form-actions fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-offset-3 col-md-9">
								@if(in_array($tipo_permiso,[4,5]))
									<a href="proveedores/edit/{{$provider->id}}" title="Editar" class="btn btn-warning"><i class="fa fa-pencil"></i> Editar</a>
								@endif
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
